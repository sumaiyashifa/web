<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Contact;
use App\Models\Files;
use App\Models\Catagory\Catagory;
use App\Models\Job\Application;
use Illuminate\Support\Facades\Hash;
use File;

class AdminsController extends Controller
{

    public function viewLogin(){
        return view('admins.view-login');
    }
    public function logoutadmin()
    {
        
        return view('admins.view-login');
    }
    public function checkLogin(Request $request){
        $remember_me=$request->has('remember_me')?true : false;
        if(auth()->guard('admin')->attempt(['email'=>$request->input("email"),'password'=>$request->input("password")],$remember_me))
        {
            // dd('Redirecting...');
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error'=>'error logging in']);
    }
    public function index(){
        $jobs=Job::select()->count();
        $catagories=Catagory::select()->count();
        $admins=Admin::select()->count();
        $applications=Application::select()->count();
        $files=Files::select()->count();
        return view("admins.index",compact('jobs','catagories','admins','applications','files'));
    }
    public function admins(){
        $admins=Admin::all();
        return view("admins.all-admins",compact('admins'));
    }
    public function createAdmins(){
       
        return view("admins.create-admins");
    }

    public function storeAdmins(Request $request){
        Request()->validate([
           
            "name"=>"required|max:40",
            "email"=>"required|max:40",
            "password"=>"required",
           
        ]);
       
        $createAdmins=Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if($createAdmins){
            return redirect('admin/all-admins/')->with('create','Admin created successfully');
        }
    }
    public function displayCatagories(){
        $catagories=Catagory::all();
        return view("admins.display-catagories",compact('catagories'));
    }
    public function createCatagories(){
       
        return view("admins.create-catagories");
    }
    public function storeCatagories(Request $request){
        Request()->validate([
           
            "name"=>"required|max:40",
           
           
        ]);
       
        $createCatagory=Catagory::create([
            'name'=>$request->name,
          
        ]);
        if($createCatagory){
            return redirect('admin/display-catagories')->with('create','Catagory created successfully');
        }
    }

    public function editCatagories($id){
        $catagory=Catagory::find($id);
        return view("admins.edit-catagories",compact('catagory'));
    }


    public function updateCatagories(Request $request,$id){
        Request()->validate([
           
            "name"=>"required|max:40",
           
           
        ]);
       
        $CatagoryUpdate=Catagory::find($id);
        $CatagoryUpdate->update
        
        ([
            'name'=>$request->name,
          
        ]);
        if($CatagoryUpdate){
            return redirect('admin/display-catagories')->with('update','Catagory updated successfully');
        }
    }
    public function deleteCatagories($id){
        $deleteCatagory=Catagory::find($id);
        $deleteCatagory->delete();
        if($deleteCatagory){
            return redirect('admin/display-catagories')->with('delete','Catagory deleted successfully');
        }
        
    }
    public function allJobs(){
        $jobs=Job::all();
        return view("admins.all-jobs",compact('jobs'));
    }
    public function messages(){
        $contacts=Contact::all();
        return view("admins.all-messages",compact('contacts'));
    }
    public function deletemessage(Request $request)
    {
        // Extract the contact ID from the request
        $contactId = $request->input('contact_id');

        // Find the contact by ID and delete it
        $contact = Contact::find($contactId);
        if ($contact) {
            $contact->delete();
            return redirect()->back()->with('success', ' message deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'message not found.');
        }
    }

    public function createJobs(){

        $catagories=Catagory::all();
        return view("admins.create-jobs",compact('catagories'));
    }
    public function PaymentPage(){

       
        return view("admins.payment");
    }

    public function storeJobs(Request $request){
        Request()->validate([
           
            "job_tittle"=>"required|max:40",
            "job_region"=>"required|max:40",
            "company"=>"required",
            "job_type"=>"required",
            "experience"=>"required",
            "salary"=>"required",
            "gender"=>"required",
            "jobdescription"=>"required",
            "client"=>"required",
            "responsibilities"=>"required",
            "otherbenifits"=>"required",
            "catagory"=>"required",
            "Due_Date"=>"required",
            "image"=>"required",
           
        ]);
       
        $destinationPath = 'asset/images/';
        $myimage= $request->image->getClientOriginalName(); 
        $request->image->move(public_path($destinationPath), $myimage); 
       
        $createJobs=Job::create([
            'job_tittle'=>$request->job_tittle,
            'job_region'=>$request->job_region,
            'company'=>$request->company,
            'job_type'=>$request->job_type,
            'experience'=>$request->experience,
            'salary'=>$request->salary,
            'gender'=>$request->gender,
            'jobdescription'=>$request->jobdescription,
            'client'=>$request->client,
            'responsibilities'=>$request->responsibilities,
            'otherbenifits'=>$request->otherbenifits,
           
            'catagory'=>$request->catagory,
            'Due_Date'=>$request->Due_Date,
            'image'=>$myimage,
            
        ]);
        if($createJobs){
            return redirect('admin/display-jobs/')->with('create','job created successfully');
        }

        } 

        public function deleteJobs($id){
            $deleteJob=Job::find($id);
            if(File::exists(public_path('asset/images/'.$deleteJob->image))){
             File::delete(public_path('asset/images/'.$deleteJob->image));
            }else{

            }
            $deleteJob->delete();
            if($deleteJob)

            {       
             return redirect('admin/display-jobs/')->with('delete','Job deleted successfully');

            }
           
        }
        public function showApplications(Request $request)
        {
            // Retrieve all job applications
            $apps = Application::query();
    
            // Filter applications by job title if search query is provided
            if ($request->has('q') && !empty($request->q)) {
                $apps->where('job_tittle', 'like', '%' . $request->q . '%');
            }
    
            // Get the filtered applications
            $apps = $apps->get();
    
            // Return the view with the applications data
            return view('admins.all-apps', compact('apps'));
        }
        public function displayApps(){

            $apps=Application::all();
            return view("admins.all-apps",compact('apps'));
        }
        
        
        public function displayWork(){

            
            return view("admins.all-apps",compact('apps'));
        }
        public function deleteApps($id){

            $deleteApp=Application::find($id);
            $deleteApp->delete();
            if($deleteApp)

            {       
             return redirect('admin/display-apps/')->with('delete','Application deleted successfully');

            }
        }



        public function acceptApplication($id)
        {
            $application = Application::findOrFail($id);
            if ($application->status === 'accepted') {
                return redirect()->back()->with('info', 'You have already accepted this application.');
            }
           
            $application->status = 'accepted';
            $application->save();
        
            // Delete other applications with the same job title
            Application::where('job_tittle', $application->job_tittle)
                       ->where('id', '!=', $id)  // Exclude the current application
                       ->delete();
        
            return redirect()->back()->with('success', 'Application accepted successfully.');
        }
        


}

