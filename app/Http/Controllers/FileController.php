<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Files;
use Carbon\Carbon;

use App\Models\Job\Job;
use Auth;
use DB;
class FileController extends Controller
{
    public function index()
    {
        // Get all files along with the user who submitted them
        $files = DB::table('files')->get();

        //dd($files);
        
        return view('admins.all-work', compact('files'));
    }
    
    public function store(Request $request, $id)
    {
        $request->validate([
            'cv' => 'required|file|max:10240', // Assuming max file size is 10MB
        ], [
            'cv.required' => 'Please upload a file.', // Custom error message for file upload validation
        ]);
    
        // Get current user information
        $currentUser = Auth::user();
    
        // Retrieve the job application and associated job
        // $application = DB::table('applications')
        //                  ->join('job', 'applications.job_id', '=', 'job.id')
        //                  ->where('applications.user_id', $currentUser->id)
        //                  ->select('job.Due_Date')
        //                  ->first();
        
        $job=Job::where('id',$id)->first();

        // Check if the application exists and the due date is not null
        if ($job->Due_Date<now()) {
            return redirect()->back()->with('error', 'Cannot submit file as the due date has passed .');
        }
    
        $file = $request->file('cv');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('files', $fileName, 'public');
    
        // Create a new file record and populate user-related columns
        $fileRecord = new Files();
        $fileRecord->name = $fileName;
        $fileRecord->path = 'storage/files/' . $fileName;
        $fileRecord->user_id = $currentUser->id;
        $fileRecord->user_name = $currentUser->name;
        $fileRecord->user_email = $currentUser->email;
        $fileRecord->user_tittle = $currentUser->job_tittle; // Assuming job_tittle is a typo and should be job_title
        $fileRecord->job_id = $id; // Assuming job_tittle is a typo and should be job_title
        $fileRecord->save();
    
        return redirect()->back()->with('success', 'File submitted successfully.');
    }
    

    
}
