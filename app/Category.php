<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $primaryKey='id';
    protected $fillable=['name','display_order'];
    protected $dates=['deleted_at','created_at','updated_at'];
    
    public static function getCategoryList(int $num_per_page=0, string $order='display_order', string $direction ='asc')
    {
        $query=self::orderBy($order,$direction);
        if($num_per_page)
        {
            return $query->paginate($num_per_page);
        }
        return $query->get();
        
    }
        public function article()
        {
            return $this->hasMany('App\Article','id','category_id');
        }
    
}
