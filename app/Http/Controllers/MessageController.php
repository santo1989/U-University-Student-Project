<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Notification;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function index()
    {

        $messageCollection = Message::latest();

        if (request('search')) {
            $messageCollection = $messageCollection
                ->where('email', 'like', '%' . request('search') . '%');
        }

        $message = $messageCollection->paginate(10);

        return view('backend.message.index', [
            'messages' => $message,
        ]);
    }

    public function create()
    {
        // $this->authorize('create-message');


        return view('backend.message.create');
    }


  

    public function store(Request $request)
    {
        try {
            $messageTOUpdate=Message::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);
            {
                $notification = Notification::create([
                    'name' => "New message from " . $messageTOUpdate->email,
                    'status' => 'unread',
                    // 'link' => 'http://127.0.0.1:8000/notification/' . $messageTOUpdate->id,
                    'link' => route('message.show', $messageTOUpdate->id),
                    'color' => 'gray'
                ]);
                $notification->link = $notification->link . '?notification_id=' . $notification->id;
                $notification->update();
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('home');
    }


    public function edit(Message $message)
    {

        return view('backend.message.edit', [
            'single_message' => $message
        ]);
    }

    public function show(Message $message)
    {
        return view('backend.message.show', [
            'show_message' => $message
        ]);
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);


        $message->update([

            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,

        ]);

        $message->update();


        return redirect()->route('message.index');
    }

    public function destroy(Message $message)
    {
        try {
            $message->delete();
            return redirect()->route('message.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
