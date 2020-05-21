<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','article_id','user_id'];
    protected $dates=['deleted_at','created_at','updated_at'];
    
              public function article()
        {
          return $this->belongsTo('App\Article');
      }
      public function user()
      {
          return $this->belongsTo('App\User');
      }
      
      public function image_user()
      {
          return hasOne('App\User','image_id','id');
      }
   
}
