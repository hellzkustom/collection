<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
      use SoftDeletes;
    protected $primaryKey='id';
    protected $fillable=['name','body'];
    protected $dates=['deleted_at','created_at','updated_at'];

       public function getPostDateTextAttribute()
    {
        return $this->post_date->format('Y-m-d');
    }
    
          public function article()
        {
          return $this->belongsTo('App\Article');
      }


}
