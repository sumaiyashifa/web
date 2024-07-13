<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\User;
use App\Models\Job\Application;
use Auth;
use DB;


class HomeController extends Controller
{
    public function index()


    {
        $userId = Auth::id();
        $duplicates=DB::table('searches')
        ->select('keyword',DB::raw('COUNT(*) as `count`'))
        ->groupBy('keyword')
        ->havingRaw('count(*)>1')
        ->take(3)
        ->orderBy('count','asc')
        ->get();

        $jobs=Job::select()->take(5)->orderby('id','desc')->get();
        $totalJobs=Job::all()->count();
        $totalcan=User::all()->count();
        $acceptedJobCount = Application::
        where('status', 'accepted')
        ->count();
        return view ('auth.home',compact('jobs','totalJobs','totalcan','acceptedJobCount','duplicates'));
    }

    public function contact(){
        return view('pages.contact');
    }
    public function policy(){
        return view('pages.policy');
    }
    public function about(){
        return view('pages.about');
    }
    public function terms(){
        return view('pages.terms');
    }
}
