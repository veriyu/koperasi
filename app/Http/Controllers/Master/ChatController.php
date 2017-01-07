<?php
namespace App\Http\Controllers\Master;

// Extend Controller
use App\Http\Controllers\Controller;

// require('Pusher.php');

use App\Message;

class ChatController extends Controller
{
 
    public function index()
    {
        return view("chat");
    }
 
    public function saveMessage()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $message = new Message;
            $message->author = $data["author"];
            $message->message = $data["message"];
            $message->save();
 
            Pusher::trigger('chat', 'message', ['message' => $message]);
        }
 
    }
 
    public function listMessages(Message $message) {
        
        return response()->json($message->orderBy("created_at", "DESC")->take(5)->get());
    }

    public function test(){
        $pusher = new Pusher("ee07a1de2c1768d92969", "b4601e592f5e7acd34ec", "278809");

        $pusher->trigger('test_channel', 'my_event', array('message' => 'hello world') );
    }
}