<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews()
    {
        $category = Category::all();
        $newstype = NewsType::all();
        return view('admin.news.add', ['category' => $category, 'newstype' => $newstype]);
    }

    public function listNews()
    {
        $news = News::all();
        return view('admin.news.list', ['news' => $news]);
    }

    public function updateNews(Request $request)
    {
        $category = Category::all();
        $newstype = NewsType::all();
        $news = News::find($request->id); 
        return view('admin.news.update', ['news' => $news], ['category' => $category, 'newstype' => $newstype]);
    }

    public function handleAddNews(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        // $this->validate($request,
        //     [
        //         'sub_cate' => 'required',
        //         'article_title' => 'required|unique:news,title|min:3',
        //         'article_author' => 'required|min:3',
        //         'article_desc' => 'required',
        //         'article_content' => 'required|min:20',
        //     ],
        //     [
        //         'sub_cate.required' => 'Bạn chưa chọn Loại Tin cho Bài viết!',
        //         'article_title.required' => 'Bạn chưa nhập Tiêu Đề cho Bài viết!',
        //         'article_author.required' => 'Bạn chưa nhập Tác giả cho Bài viết!',
        //         'article_title.unique' => 'Tiêu Đề bài viết đã tồn tại!',
        //         'article_title.min' => 'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
        //         'article_desc.required' => 'Bạn chưa nhập Tóm tắt cho Bài viết!',
        //         'article_content.required' => 'Bạn chưa nhập nội dung cho Bài viết!',
        //         'article_content.min' => 'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
        //     ]);

        $news = new News();
        $news->title = $request->article_title;
        $news->unsigned_title = changeTitle($request->article_title);
        $news->author = $request->article_author;
        $news->description = $request->article_desc;
        $news->content = $request->article_content;
        $news->author = $request->article_author;
        $news->trending = $request->article_rep;
        $news->view = 0;
        $news->news_type_id = $request->sub_cate;

        if ($request->hasFile('article_img')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('article_img'); // Nhận file hình ảnh người dùng upload lên server

            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/news/add')->with('error', 'Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = Str::random(4) . '_' . $img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while (file_exists('upload/news/' . $random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = Str::random(4) . '_' . $img_file_name;
            }
            echo $random_file_name;

            $img_file->move('upload/news', $random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $news->image = $random_file_name;
        } else {
            $news->image = '';
        }
        // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $news->save();

        return redirect('admin/news/add')->with('message', 'Thêm Tin thành công!');
    }

    public function handleUpdateNews(Request $request)
    {
        return view('admin.news.update');
    }

}
