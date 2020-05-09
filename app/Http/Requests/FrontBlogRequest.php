<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'integer|min:1',
            'year'=>'integer',
            'month'=>'integer',
            'category_id'=>'integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'year.integer'=>'年は整数を入れてください',
            'month.ineger'=>'月は整数を入れてください',
            'category_id.ineger'=>'カテゴリIDは整数にしてください',
            'category_id.min'=>'カテゴリIDは1以上にしてください',
            
            'id.ineger'=>'IDは整数にしてください',
            'id.min'=>'IDは1以上にしてください',
            
            
        ];
        
    }
    
    
}

