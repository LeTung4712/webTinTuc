<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
// Route admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);

    //thao tac voi category
    Route::group(['prefix' => 'category'], function () {
        //view
        Route::get('add', [CategoryController::class, 'addCategory']);
        Route::get('list', [CategoryController::class, 'listCategory']);
        Route::get('update/{id}', [CategoryController::class, 'updateCategory']);
        //logic
        Route::post('add', [CategoryController::class, 'handleAddCategory']);
        Route::post('update/{id}', [CategoryController::class, 'handleUpdateCategory']);
        Route::post('delete/{id}', [CategoryController::class, 'handleDeleteCategory']);
    });

    //thao tac voi view newstype
    Route::group(['prefix' => 'newstype'], function () {
        //view
        Route::get('add', [NewsTypeController::class, 'addNewsType']);
        Route::get('list', [NewsTypeController::class, 'listNewsType']);
        Route::get('update/{id}', [NewsTypeController::class, 'updateNewsType']);
        //logic
        Route::post('add', [NewsTypeController::class, 'handleAddNewsType']);
        Route::post('update/{id}', [NewsTypeController::class, 'handleUpdateNewsType']);
        Route::post('delete/{id}', [NewsTypeController::class, 'handleDeleteNewsType']);
    });

    //thao tac voi view news
    Route::group(['prefix' => 'news'], function () {
        //view
        Route::get('add', [NewsController::class, 'addNews']);
        Route::get('list', [NewsController::class, 'listNews']);
        Route::get('update/{id}', [NewsController::class, 'updateNews']);
        //logic
        Route::post('add', [NewsController::class, 'handleAddNews']);
        Route::post('update/{id}', [NewsController::class, 'handleUpdateNews']);
        Route::post('delete/{id}', [NewsController::class, 'handleDeleteNews']);
        
    });

    //thao tac voi view user
    Route::group(['prefix' => 'user'], function () {
        Route::get('add', [UserController::class, 'addUser']);
        Route::get('list', [UserController::class, 'listUser']);
        Route::get('update', [UserController::class, 'updateUser']);
    });

    //thao tac voi view comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('list/{id}', [CommentController::class, 'listComment']);
    });
    // Route group Ajax
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('getnewstype/{id}', [AjaxController::class, 'getNewsTypeByCategoryId']);
		Route::get('timestamp', [AjaxController::class, 'timestamp']);
	});
});
// Route user
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [HomeController::class, 'index']);
});
