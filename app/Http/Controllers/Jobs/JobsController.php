<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Catagory\Catagory;
use App\Models\Job\JobSaved;
use App\Models\Job\Application;
use App\Models\Job\Search;
use App\Models\User;
use App\Models\Notification;
use App\Notifications\NewJobApplicationNotification;
use Auth;
use DB;

class JobsController extends Controller
{
    public function single($id){
        $job=Job::find($id);
        $relatedJobs=Job::where('catagory',$job->catagory)
        ->where('id','!=',$id)
        ->take(5)
        ->get();
        $relatedJobsCount=Job::where('catagory',$job->catagory)
        ->where('id','!=',$id)
        ->take(5)
        ->count();
        $catagories=DB::table('catagories')
        ->join('job','job.catagory','=','catagories.name')
        ->select('catagories.name AS name','catagories.id AS id',DB::raw('COUNT(job.catagory) AS total') )
        ->groupBy('job.catagory')
        ->get();

        if(auth()->user()){
        $savedJob=JobSaved::where('job_id',$id)
        ->where('user_id',Auth::user()->id)
        ->count();
        $appliedJob=Application::where('user_id',Auth::user()->id)
        ->where('job_id',$id)
        ->count();       
     
        

        return view('jobs.single',compact('job','relatedJobs','relatedJobsCount','savedJob','appliedJob','catagories'));
        }else{
            return view('jobs.single',compact('job','relatedJobs','relatedJobsCount','catagories'));
        }

    }
    public function saveJob(Request $request){
        $saveJob=JobSaved::create([
            'job_id'=>$request->job_id,
            'user_id'=>$request->user_id,
            'job_image'=>$request->job_image,
            'job_tittle'=>$request->job_tittle,
            'job_region'=>$request->job_region,
            'job_type'=>$request->job_type,
            'company'=>$request->company
        ]);
        if($saveJob){
            return redirect('jobs/single/'.$request->job_id.'')->with('save','job saved successfully');
        }
    }
    public function jobApply(Request $request){
        if(Auth::user()->cv=='no cv'){
            return redirect('jobs/single/'.$request->job_id.'')->with('apply','upload your cv first');
        }
        else{


        $applyJob=Application::create([
            'cv' => Auth::user()->cv,
            'job_id' => $request->job_id,
            'user_id'=>Auth::user()->id,
            'email'=>Auth::user()->email,
            'job_image'=>$request->job_image,
            'job_tittle'=>$request->job_tittle,
            'job_region'=>$request->job_region,
            'company'=>$request->company,
            'job_type'=>$request->job_type,
            'hours' => $request->time_required, // Use the value from 'time_required' field
            'money' => $request->price, // Use the
            
        ]);
        if($applyJob){
            // $user->notify(new NewJobApplicationNotification($jobTitle));
            // Notification::create([
            //     'user_id' => Auth::user()->id,
            //     'message' => 'You have applied for a job: '.$request->job_tittle, // Customize the message
            // ]);
            return redirect('jobs/single/'.$request->job_id.'')->with('applied','you applied to this job successfully')
            ->with('updateNotificationCount', true); 
        }
    }
        
    }
    public function search(Request $request){
        Request()->validate([
           
            "job_tittle"=>"required",
            "job_region"=>"required",
            "job_type"=>"required",
           
        ]);
        Search::Create([
            "keyword"=>$request->job_tittle
        ]);
        $job_tittle=$request->get('job_tittle');
        $job_region=$request->get('job_region');
        $job_type=$request->get('job_type');
        $searches=Job::select()->where('job_tittle','like',"%$job_tittle%")
        ->where('job_region','like',"%$job_region%")
        ->where('job_type','like',"%$job_type%")
        ->get();
          
         return View('jobs.search',compact('searches'));
     }
}
