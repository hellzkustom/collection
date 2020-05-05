<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FrontBlogController@index')->name('front_index');


Route::prefix('admin')->group(function(){
    Route::get('form/{id?}','AdminBlogController@form')->name('admin_form');
    Route::post('post','AdminBlogController@post')->name('admin_post');
    Route::post('delete', 'AdminBlogController@delete')->name('admin_delete');
    Route::get('list','AdminBlogController@list')->name('admin_list');

Route::get('category', 'AdminBlogController@category')->name('admin_category');
    Route::post('category/edit', 'AdminBlogController@editCategory')->name('admin_category_edit');
    Route::post('category/delete', 'AdminBlogController@deleteCategory')->name('admin_category_delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
