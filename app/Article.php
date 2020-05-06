<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
       use SoftDeletes;
    
    protected $primarykey ='article_id';
    protected $fillable = ['post_date','title','body','category_id'];
    protected $dates=['post_date','updated_at','created_at','deleted_at'];
    
        public function getPostDateTextAttribute()
    {
        return $this->post_date->format('Y/m/d');
    }

    /**
     * post_date のミューテタ YYYY-MM-DD のフォーマットでセットする
     *
     * @param $value
     */
    public function setPostDateAttribute($value)
    {
        $post_date = new Carbon($value);
        $this->attributes['post_date'] = $post_date->format('Y-m-d');
    }
    public function getArticleListAttribute($num_per_page=10)
    {
        return Article::orderby('id','desc')->paginate($num_per_page);
        
    }
    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }
    
}
