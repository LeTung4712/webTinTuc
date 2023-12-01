<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    public function addNewsType()
    {
        $category = Category::all();
        return view('admin.newstype.add', ['category' => $category]);
    }

    public function listNewsType()
    {
        $newstype = NewsType::all();
        return view('admin.newstype.list', ['newstype' => $newstype]);
    }

    public function updateNewsType(Request $request)
    {
        $category = Category::all(); 
        $newstype = NewsType::find($request->id); 
        return view('admin.newstype.update', ['newstype' => $newstype, 'category' => $category]);
    }

    public function handleAddNewsType(Request $request)
    {
        $this->validate($request,
            [
                'cate' => 'required',
                'sub_cate' => 'required|unique:news_types,name|min:3|max:100',
            ],
            [
                'cate.required' => 'Vui lòng chọn Thể Loại!',
                'sub_cate.required' => 'Bạn chưa nhập tên Loại Tin!',
                'sub_cate.unique' => 'Tên Loại Tin đã tồn tại, vui lòng nhập tên khác!',
                'sub_cate.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
                'sub_cate.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!',
            ]);
        $newstype = new NewsType();
        $newstype->category_id = $request->cate;
        $newstype->name = $request->sub_cate;
        $newstype->unsigned_name = changeTitle($request->sub_cate);
        $newstype->save();

        return redirect('admin/newstype/add')->with('message', 'Thêm Loại Tin thành công!');
    }
    public function handleUpdateNewsType(Request $request)
    {
        $this->validate($request,
			[
				'cate' => 'required',
				'scate_changed' => 'required|unique:news_types,name|min:3|max:100'
			],
			[
				'cate.required' => 'Vui lòng chọn Thể Loại!',
				'scate_changed.required' => 'Bạn chưa nhập tên Loại Tin!',
				'scate_changed.unique' => 'Tên Loại Tin đã tồn tại, vui lòng thay đổi tên khác!',
				'scate_changed.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
				'scate_changed.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!'
			]);
        $newstype = NewsType::find($request->id);
        $newstype->category_id = $request->cate;
        $newstype->name = $request->scate_changed;
        $newstype->unsigned_name = changeTitle($request->scate_changed);
        $newstype->save();

        return redirect('admin/newstype/update/'.$request->id)->with('message','Sửa Loại Tin thành công!');
    }

}
