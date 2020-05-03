<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\AdminBlogRequest;
use App\Models\Article;

class AdminBlogController extends Controller
{
    public function form(int $id =null)
    {
        
        
     // $article =$this->article->find('$id');
       $article=Article::find($id);
       
        
        $input=[];
        if($article){
            $input=$article->toArray();
            $input['post_date']=$article->post_date_text;
        }
        else{
            $id=null;
        }
        
        $input=array_merge($input,old());
        
        return view('admin_blog.form',compact('input','id'));

    }
    
    function __construct(Article $article)
    {
        $this->article=$article;
    }
    
    public function post(AdminBlogRequest $request)
    {
        
        $input = $request->input();
        
       $id=Arr::get($input,'id');
       
       
     // $article=Article::findOrFail($request->id);
        
       $article = $this->article->updateOrCreate(compact('id'), $input);
    //   $article=$this->article->create($input);
        //Article::updateOrCreate();

        
        return redirect()->route('admin_form',  ['id' => $article->id])->with('message','記事を保存しました');
        
    }
        public function delete(AdminBlogRequest $request)
    {
        // 記事IDの取得
        $id = $request->input('id');

        $result = $this->article->destroy($id);
        $message = ($result) ? '記事を削除しました' : '記事の削除に失敗しました。';

        // フォーム画面へリダイレクト
        return redirect()->route('admin_form')->with('message', $message);
    }
}