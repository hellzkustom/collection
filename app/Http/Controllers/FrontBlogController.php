<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Arr;
use App\Http\Requests\FrontBlogRequest;
use Carbon\Carbon;
use App\User;

class FrontBlogController extends Controller
{
    const NUM_PER_PAGE=10;
    
    protected $article;
    protected $category;
    
 //       function __construct(Article $article, Category $category)
 //   {
 //       $this->article = $article;
 //       $this->category = $category;
 //   }

    
   public function index(FrontBlogRequest $request)
    {
        $input=$request->input();
        
        $list=Article::with(['comment'])->orderby('id','desc')->paginate(self::NUM_PER_PAGE);
        
           $list = self::getArticleList(self::NUM_PER_PAGE, $input);
           
             $list->appends($input);
           
       $month_list=self::getMonthList();
        $category_list=self::getCatgoryList();
        
        $introduction =User::find(1);
        
        return view('front_blog.index',compact('list','month_list','category_list','introduction'));
    }
    
    public function getCatgoryList()
    {
        $category_list=Category::select('name','id')
                             ->orderBy('display_order','desc')
                             ->get();
     
            return $category_list;
    }
    
    public function getArticleList(int $num_per_page=10,array $condition=[])
    {
        $category_id=Arr::get($condition,'category_id');
        $year=Arr::get($condition,'year');        
        $month=Arr::get($condition,'month');
      
      
        
        $query=Article::with('category')->orderBy('id','desc');
        
        if($category_id)
       {
           $query->where('category_id',$category_id);
        }
        
        if($year)
        {
            if($month)
            {
                $start_date=Carbon::createFromDate($year,$month,1);
                $end_date=Carbon::createFromDate($year,$month,1)->addMonth();
            }
            else
            {
                $start_date=Carbon::createFromDate($year,1,1);
                $end_date=Carbon::createFromDate($year,1,1)->addYear();
            
            }
                 $query->where('post_date','>=',$start_date->format('Y-m-d'))
                         ->where('post_date','<',$end_date->format('Y-m-d'));
                         
                        
        }
        
        return $query->paginate($num_per_page);
        
    }
    public function getMonthList()
    {
        $month_list=Article::selectraw('substring(post_date,1,7) AS year_and_month')
                             ->groupBy('year_and_month')
                             ->orderBy('year_and_month','desc')
                             ->get();
                             
        foreach($month_list as $value)
      {
           list($year,$month)=explode('-',$value->year_and_month);
            $value->year=$year;
        $value->month=(int)$month;
            $value->year_month=sprintf("%04d年%02d月",$year,$month);
      }
        
        return $month_list;
    }
    
    public function article(FrontBlogRequest $request)
    {
        
        
        $article=Article::find($request->id);
        $month_list=self::getMonthList();
        $category_list=self::getCatgoryList();
        
        $introduction =User::find(1);
        
        
        return view('front_blog.article',compact('article','month_list','category_list','introduction'));
        
        
    }
    public function commentPost(FrontBlogRequest $request)
    {
 
       $article=Article::findOrFail($request->id);
 
        $article->comment()->create($request->toArray());
 
        return response()->json();
       
        
    }
    
    
    
    
}
