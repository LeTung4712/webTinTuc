<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'cate_name.required' => 'Bạn chưa nhập tên Thể Loại!',
                'cate_name.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
                'cate_name.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
                'cate_name.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!',
            ]);

        // Thêm dữ liệu vào CSDL
        $category = new Category;
        $category->name = $request->cate_name;
        $category->unsigned_name = changeTitle($request->cate_name);
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
