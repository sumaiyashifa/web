<?php

namespace App\Http\Controllers\Catagories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory\Catagory;
use App\Models\Job\Job;

class CatagoriesController extends Controller
{
    public function singleCatagory($name){
        $jobs=Job::where('catagory',$name)
        ->take(5)
        ->orderby('created_at','desc')
        ->get();
        return view('catagories.single',compact('jobs','name'));
    }
    
}
