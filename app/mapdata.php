<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapdata extends Model
{
   protected $primaryKey='name';
   public $incrementing = false;
    protected $fillable=['name','data'];
    protected $dates=['created_at','updated_at'];

}
