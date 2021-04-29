<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB; 
use App\mapdata;


class MapdataController extends Controller
{
    public function post(Request $request)
    {

        $input=$request->input();
        
        $mapdata=mapdata::updateOrCreate(['name'=>$input['name']],$input);
        
        return response()->json($mapdata);
    }
    
        public function delete(Request $request)
    {

        $input=$request->input();
        
        $mapdata=mapdata::where('name',$input['name'])->delete();
        
        return response()->json($mapdata);
    }
    
    public function get(Request $request)
    {   
        $result=mapdata::find($request->name);//where('name','=',$request->name);
        
        return response()->json($result);
    }
    
    public function map()
    {
        $items=mapdata::select('name')->get()->toArray();
                return view('admin_blog.map',compact('items'));


    }
    public function view()
    {
        $items=mapdata::select('name')->get()->toArray();
                return view('admin_blog.mapview',compact('items'));


    }
}
