<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function listComment(Request $request)
    {
        $news = News::find($request->id);
        return view('admin.comment.list', ['news' => $news]);
    }
}
