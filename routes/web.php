<?php

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
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'index']);
    
    //thao tac voi category
    Route::group(['prefix' => 'category'], function(){
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
    Route::group(['prefix' => 'newstype'], function(){
        //view
        Route::get('add', [NewsTypeController::class, 'addNewsType']);
        Route::get('list', [NewsTypeController::class, 'listNewsType']);
        Route::get('update', [NewsTypeController::class, 'updateNewsType']);
    });

    //thao tac voi view news
    Route::group(['prefix' => 'news'], function(){
        Route::get('add', [NewsController::class, 'addNews']);
        Route::get('list', [NewsController::class, 'listNews']);
        Route::get('update', [NewsController::class, 'updateNews']);
    });

    //thao tac voi view user
    Route::group(['prefix' => 'user'], function(){
        Route::get('add', [UserController::class, 'addUser']);
        Route::get('list', [UserController::class, 'listUser']);
        Route::get('update', [UserController::class, 'updateUser']);
    });

    //thao tac voi view comment
    Route::group(['prefix' => 'comment'], function(){
        Route::get('add', [CommentController::class, 'addComment']);
        Route::get('list', [CommentController::class, 'listComment']);
        Route::get('update', [CommentController::class, 'updateComment']);
    });

});
// Route user
Route::group(['prefix' => 'user'], function(){
    Route::get('/', [HomeController::class, 'index']);
});


