<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsType;

class AjaxController extends Controller
{
    public function getNewsTypeByCategoryId(Request $request)
    {
        $newstype = NewsType::where('category_id', $request->id)->get();
        foreach($newstype as $chitiet)
    		echo "<option value='".$chitiet->id."'>".$chitiet->name."</option>";
        
    }

    public function timestamp(){
    	return date('H:i:s');
    }
}
