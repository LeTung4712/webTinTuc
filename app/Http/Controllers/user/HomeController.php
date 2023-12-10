<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){ // Trang chủ và trang liên hệ đều cần dữ liệu của thanh menu để hiển thị ra, nên ta dùng view share để cả 2 trang đều có biến này để sử dụng.
		$data = [
			'category' => Category::all(),
            //lấy 5 bài trending mới nhất trong 1 tuần
            'trending' => News::where('trending', 1)->where('created_at', '>=', Carbon::now()->subWeeks(1))->orderBy('view', 'desc')->limit(5)->get(),
            
        ];
		view()->share('data',$data);
	}

    public function index()
    {
        //lấy 6 bài mới nhất
        $latestNews = News::orderBy('created_at', 'desc')->limit(6)->get();
        //lấy 6 bài tiêu điểm tuần
        $weekNews = News::where('created_at', '>=', Carbon::now()->subWeeks(1))->orderBy('view', 'desc')->limit(6)->get();
        //lấy 10 bài đừng bỏ lỡ
        $featuredNews = News::orderBy('created_at', 'desc')->limit(10)->get();
        return view('user.page.home', ['latestNews' => $latestNews, 'featuredNews' => $featuredNews, 'weekNews' => $weekNews]);
    }

    public function getNewsByCategory(Request $request)
    {
        //dd ($request->idcate);
        $category = Category::where('unsigned_name', $request->unsigned_name)->first(); 
        $newstype = NewsType::where('category_id', $category->id)->get();
        //lấy ra tất cả bài viết có news_type_id = id của tất cả loại tin có category id = idcate lấy hết các trường của biến $newstype
        $news = News::whereIn('news_type_id', $newstype->pluck('id'))->paginate(4);
        //wherein lấy ra tất cả các bài viết có news_type_id nằm trong mảng id của $newstype, pluck là lấy ra mảng id của $newstype

        return view('user.page.category', ['newstype' => $newstype, 'category' => $category, 'news' => $news]);
    }

    public function getNewsByNewsType(Request $request) //hàm này đươc gọi khi click vào loại tin
    {
        //dd ($request-> news_type_id);   
        $category = Category::where('unsigned_name', $request->unsigned_namecate)->first();
        $newstype = NewsType::where('unsigned_name', $request->unsigned_name)->where ('category_id', $category->id)->first();
        $news = News::where('news_type_id', $newstype->id )->paginate(4);
        return view('user.page.sub-category', ['news' => $news, 'newstype' => $newstype]);
    }

    public function getNewsDetail(Request $request)
    {
        //dd ($request->id);
        $newstype = NewsType::all();
        $news = News::where('id', $request->id)->first();
        $newssametype = News::where('news_type_id', $news->news_type_id)->where('id', '!=', $news->id)->limit(5)->get();
        return view('user.page.single', ['news' => $news, 'newstype' => $newstype, 'newssametype' => $newssametype]);
    }

    public function search(Request $request)
    {
        //dd ($request->key);
        $key = $request->key;
        $newstype = NewsType::all();
        $news = News::where('title', 'like', '%' . $request->key . '%')->paginate(4);
        return view('user.page.search', ['news' => $news, 'newstype' => $newstype, 'key' => $key]);
    }
//test
    public function test()
    {
        $category = Category::all();
        return view('test.page.home', ['category' => $category]);
    }

    public function category()
    {
        $category = Category::all();
        return view('test.page.testcategory', ['category' => $category]);
    }

    public function inx()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {
        echo $request->input('editor1');
    }
}
