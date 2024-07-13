<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Files;
use App\Models\Job\Application;

class NotificationController extends Controller
{
    public function fetchNotifications()
    {
        $newFilesCount = Files::where('apply', 'new')->count();
        $newApplicationsCount = Application::where('apply', 'new')->count();
    
        return response()->json([
            'newFilesCount' => $newFilesCount,
            'newApplicationsCount' => $newApplicationsCount,
            'totalNotifications' => $newFilesCount + $newApplicationsCount
        ]);
    }
    
    
}
