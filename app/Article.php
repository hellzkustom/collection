<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primarykey ='article_id';
    protected $fillable = ['post_date','title','body'];
    protected $dates=['post_date','created_at','deleted_at'];
    
}
