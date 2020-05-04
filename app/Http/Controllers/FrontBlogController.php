<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Arr;
use App\Http\Requests\FrontBlogRequest;
use Carbon\Carbon;

class FrontBlogController extends Controller
{
    const NUM_PER_PAGE=10;
    
        function __construct(Article $article)
    {
        $this->article = $article;
    }

    
   public function index(FrontBlogRequest $request)
    {
        $input=$request->input();
        
        $list=Article::orderby('id','desc')->paginate(self::NUM_PER_PAGE);
        
           $list = self::getArticleList(self::NUM_PER_PAGE, $input);
           
             $list->appends($input);
           
       $month_list=self::getMonthList();
        
        return view('front_blog.index',compact('list','month_list'));
    }
    public function getArticleList(int $num_per_page=10,array $condition=[])
    {
        $year=Arr::get($condition,'year');
        $month=Arr::get($condition,'month');
        
        $query=Article::orderBy('id','desc');
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
}
