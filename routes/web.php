<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Blog', 'prefix' =>'blog'],function () {
   Route::resource('posts', 'PostController')->names('blog.posts');
});

//Route::resource('rest', 'RestTestController')->names('restTest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$groupData=[
    'namespace' => 'Blog\Admin',
    'prefix'=> 'admin/blog',
];
//BlogCategory - admin
Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('categories', 'CategoryController')->only($methods)->names('blog.admin.categories');

//BlogPost admin
Route::resource('posts', 'PostController')
    ->except(['show'])
    ->names('blog.admin.posts');
});