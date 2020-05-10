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
//return view('welcome');
//});

Route::get('/', 'FrontBlogController@index')->name('front_index');
Route::get('/home', 'FrontBlogController@home')->name('front_home');
Route::get('/article/{id?}', 'FrontBlogController@article')->name('front_article');
Route::post('/comment/post','FrontBlogController@commentPost')->name('commentPost');


Route::prefix('admin')->group(function(){
    Route::get('form/{id?}','AdminBlogController@form')->name('admin_form');
    Route::post('post','AdminBlogController@post')->name('admin_post');
    Route::post('delete', 'AdminBlogController@delete')->name('admin_delete');
    Route::get('list','AdminBlogController@list')->name('admin_list');

    Route::get('category', 'AdminBlogController@category')->name('admin_category');
    Route::post('category/edit', 'AdminBlogController@editCategory')->name('admin_category_edit');
    Route::post('category/delete', 'AdminBlogController@deleteCategory')->name('admin_category_delete');

    Route::get('introduction','AdminBlogController@introduction')->name('admin_introduction');
    Route::post('introduction/edit','AdminBlogController@editIntroduction')->name('admin_introduction_edit');

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
