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
            //đây là câu lấy 5 bài trending mới nhất trong 1 tuần
            'trending' => News::where('trending', 1)->where('created_at', '>=', Carbon::now()->subWeeks(1))->orderBy('view', 'desc')->limit(5)->get(),
        ];
		view()->share('data',$data);
	}

    public function index()
    {
        $category = Category::all();
        return view('user.page.home', ['category' => $category]);
    }

    public function getNewsByNewsType(Request $request)
    {
        $newstype = NewsType::where('id', $request->id)->first();
        $news = News::where('news_type_id', $newstype->id )->paginate(4);
        return view('user.page.category', ['news' => $news, 'newstype' => $newstype]);
    }

    public function getNewsDetail(Request $request)
    {
        $newstype = NewsType::all();
        $news = News::where('id', $request->id)->first();
        $newssametype = News::where('news_type_id', $news->news_type_id)->where('id', '!=', $news->id)->limit(5)->get();
        return view('user.page.single', ['news' => $news, 'newstype' => $newstype, 'newssametype' => $newssametype]);
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
