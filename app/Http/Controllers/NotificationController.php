<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // public function index()
    // {
    //     $notifications = Notification::latest()->paginate(10);
    //     return view('home', [
    //         'notifications' => $notifications
    //     ]);
    // }
    public function showForUpdating($id, $notification_id)

    {
        

        $notifications = Notification::find($notification_id)->latest();
        $notifications->status = 'read';
        $notifications->color = 'green';
        $notifications->update();
        return view('home', [
            'notifications' => $notifications
        ]);
       

    }
}
