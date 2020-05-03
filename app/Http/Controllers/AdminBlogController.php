<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminBlogRequest;
use App\Models\Article;

class AdminBlogController extends Controller
{
    public function form()
    {

         return view('admin_blog.form');   

    }
    
    function __construct(Article $article)
    {
        $this->article=$article;
    }
    
    public function post(AdminBlogRequest $request)
    {
        
        $input = $request->input();
        $article=$this->article->create($input);
        
        return redirect()->route('admin_form')->with('message','記事を保存しました');
        
    }
}