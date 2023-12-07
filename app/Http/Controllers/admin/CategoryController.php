<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function listCategory()
    {
        $categories = Category::all();
        return view('admin.category.list', ['categories' => $categories]);
    }

    public function updateCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.update', ['category' => $category]);
    }

    public function handleAddCategory(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'cate_name' => 'required|unique:categories,name|min:3|max:100',
                'cate_image' => 'required',
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'cate_name.required' => 'Bạn chưa nhập tên Thể Loại!',
                'cate_image.required' => 'Bạn chưa chọn hình ảnh cho thể loại',
                'cate_name.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
                'cate_name.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'cate_name.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!',
            ]);

        // Thêm dữ liệu vào CSDL
        $category = new Category;
        $category->name = $request->cate_name;
        $category->unsigned_name = changeTitle($request->cate_name);
        if ($request->hasFile('cate_image')) // Kiểm tra xem người dùng có upload hình hay không
        {
            $img_file = $request->file('cate_image'); // Nhận file hình ảnh người dùng upload lên server

            $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/category/add')->with('error', 'Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
            }

            $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

            $random_file_name = Str::random(4) . '_' . $img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
            while (file_exists('upload/category/' . $random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
            {
                $random_file_name = Str::random(4) . '_' . $img_file_name;
            }
            echo $random_file_name;

            $img_file->move('upload/category', $random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
            $category->image = $random_file_name;
        } else {
            $category->image = 'no';
        }
        // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

        $category->save();

        return redirect('admin/category/add')->with('message', 'Đã thêm Thể Loại!');

    }

    public function handleUpdateCategory(Request $request)
    {
        //dd($request->all());
        $category = Category::find($request->id);
        $this->validate($request,
            [
                'cate_changed' => 'required|unique:categories,name|min:3|max:100',
            ],
            [
                'cate_changed.required' => 'Bạn chưa nhập tên Thể Loại!',
                'cate_changed.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!!',
                'cate_changed.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'cate_changed.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!',
            ]);

        $category->name = $request->cate_changed;
        $category->unsigned_name = changeTitle($request->cate_changed);
        $category->save();

        return redirect('admin/category/update/' . $request->id)->with('message', 'Cập nhật tên Thể Loại thành công');
    }

    public function handleDeleteCategory(Request $request)
    {
        //dd($request->all());
        $category = Category::find($request->id);
        $category->delete();

        return redirect('admin/category/list')->with('message', 'Đã xóa Thể Loại !');
    }
}
