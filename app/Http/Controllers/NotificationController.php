<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showForUpdating($id, $notification_id)

    {

        $notification = Notification::find($notification_id)->latest();
        $notification->status = 'read';
        $notification->color = 'green';
        $notification->update();

        $messagesold = Message::find($id);
        $messages=$messagesold->latest();
        return view('backend.message.index', [
            'show_message' => $messages
        ]);

    }
}
