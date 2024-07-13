<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use App\Models\Job\Job;
use Auth;
use File;

class UsersController extends Controller
{
    
    public function profile(){
        $profile=User::find(Auth::user()->id);
        return View('users.profile',compact('profile'));
    }
    public function applications(){
        $applications=Application::where('user_id','=',Auth::user()->id)
        ->get();
        return View('users.applications',compact('applications'));
    }
    public function savedJobs(){
        $savedJobs=JobSaved::where('user_id','=',Auth::user()->id)
        ->get();
        return View('users.savedjobs',compact('savedJobs'));
    }
    public function editDetails(){
        $userDetails=User::find(Auth::user()->id);
        
        return View('users.editdetails',compact('userDetails'));
    }

    public function updateDetails(Request $request){
        Request()->validate([
            "name"=>"required|max:40",
            "job_tittle"=>"required|max:40",
            "bio"=>"required",
            "facebook"=>"required|max:140",
            "twitter"=>"required|max:140",
            "linkedIn"=>"required|max:140",
        ]);
       
        $userDetailsUpdate=User::find(Auth::user()->id);
        $userDetailsUpdate->update([
            "name"=>$request->name,
            "job_tittle"=>$request->job_tittle,
            "bio"=>$request->bio,
            "facebook"=>$request->facebook,
            "twitter"=>$request->twitter,
            "linkedin"=>$request->linkedin,
            
       ] );
       if($userDetailsUpdate){
        return redirect('users/edit-details/')->with('update','user details updated successfully');
    }
    }
  

    public function editCv(){
       
        
        return View('users.editcv');
    }
    public function updateCv(Request $request){
        $oldCV = User::find(Auth::user()->id);
        
  
        if(File::exists(public_path('asset/cvs/'.$oldCV->cv))){
            File::delete(public_path('asset/cvs/'.$oldCV->cv));
        }else{
            
        }
        
       
        $destinationPath = 'asset/cvs/';
        $mycv = $request->cv->getClientOriginalName(); 
        $request->cv->move(public_path($destinationPath), $mycv); 
        
       
        $oldCV->update([
            "cv" => $mycv
        ]);
    
   
        return redirect('users/profile')->with('update', 'CV updated successfully');
    }
   
        public function accept()
        {
            $userId = Auth::id(); // Get the current authenticated user's ID
        
            // Fetch only the accepted jobs of the current user
            $acceptedJobs = Application::where('user_id', $userId)
                                        ->where('status', 'accepted')
                                        ->get();
          //  dd($acceptedJobs);
           $acceptedJobCount = Application::where('user_id', $userId)
                                        ->where('status', 'accepted')
                                        ->count();
            
            return view('users.accept', compact('acceptedJobs'));
        }
        public function submit($id){
            // $job = Job::find($request->id);
 


            // // Retrieve the due date from the job
            // $dueDate = $job->Due_Date;
            //     // Compare the current date with the due date
            //     $currentDate = now(); // or use Carbon\Carbon for more flexibility
            //     if ($currentDate > $dueDate) {
            //         return redirect()->back()->with('error', 'Submission deadline has passed.');
            //     }
        
            return view('users.submit',['id'=>$id]);
        }
        public function submits(Request $request)
        {
            // Validate the form data
            $validatedData = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
            ]);
    
            // Store the contact information in the database
            $createJobs=Contact::create([
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
               
            ]);
            if($createJobs){
                return redirect()->back()->with('success', 'Your message has been submitted successfully.');
            }
    
    
            // Redirect back with a success message
            
        }
    
}
