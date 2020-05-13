<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\AdminBlogRequest;
use App\Article;
use App\Category;
use App\User;
use Auth;

class AdminBlogController extends Controller
{
    
    protected $article;
    protected $category;
    
    const NUM_PER_PAGE=10;
    
    public function form(int $id =null)
    {
        
        
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
        
        
        $category_list=[];
        $category_list=Category::getCategoryList()->toArray();//->pluck('name','id');        //$category_list=Category::orderBy('display_order','asc')->pluck('name','id');
        
        return view('admin_blog.form',compact('input','id','category_list'));



    }
    
    public function post(AdminBlogRequest $request)
    {
        
        $input = $request->input();
        
       $id=Arr::get($input,'id');
      
            $article = Article::updateOrCreate(compact('id'), $input);
    
    
        return redirect()->route('admin_form',  ['id' => $article->id])->with('message','記事を保存しました');
        
    }
        public function delete(AdminBlogRequest $request)
    {
         $result = Article::destroy($request->id);
      
        $message = ($result) ? '記事を削除しました' : '記事の削除に失敗しました。';

        // フォーム画面へリダイレクト
        return redirect()->route('admin_list')->with('message', $message);
    }

    public function list()
    {
        $list=Article::orderby('id','desc')->paginate(self::NUM_PER_PAGE);
    
        
        return view('admin_blog.list',compact('list'));
    }
    
    public function category()
    {
    $list=Category::getCategoryList(self::NUM_PER_PAGE);
        
        return view('admin_blog.category',compact('list'));
    }
    
    public function editCategory(AdminBlogRequest $request)
    {
        $input=$request->input();
         $id=$request->id;//;Arr::get($input,'id');
     
        $category=Category::updateOrCreate(compact('id'),$input);

        
        return response()->json($category);
    }
  
      public function deleteCategory(AdminBlogRequest $request)
      {


         Article::where('category_id', $request->id) ->update(['category_id' => '1']);
         
           Category::destroy($request->id);
         
          return response()->json();
          
      }
      
        public function introduction()
    {
        
    
           $input=User::find(Auth::id());

    
        return view('admin_blog.introduction',compact('input'));


    }
    
         public function editIntroduction(AdminBlogRequest $request)
    {
        
    
           $id=Auth::id();
            
        User::where('id', Auth::id()) ->update(['name'=>$request->name,'comment'=>$request->comment]);
 
        
        
        return redirect()->route('admin_introduction')->with('message','変更を保存しました');


    }
   
  
    
}