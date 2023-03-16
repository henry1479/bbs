<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Services\MessagesServices\Contracts\MessagesService;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    
    protected $rules = [
        "content" => "required|string|max:255",
    ];

    public function __construct() 
    {
        $this->middleware("auth");
    }

    public function show(MessagesService $messager) {
        return view("users_messages.show",["messages" => $messager->getAllInputMessages(Auth::user()->id)]);
    }

    public function create(User $user)  {
        // dd($user);
        return view("users_messages.create", ["user" => $user, "chat" => Auth::user()->messagesFrom] );
    }

    public function send(Request $request, MessagesService $messager) {
        $request->validate($this->rules);
        $request->merge(["from_user_id" => Auth::user()->id]);
        if(Message::create($request->except("_token"))) {
            return back()->with("success", "Ваше сообщение отправлено");
        } else {
            return back()->with("fail", "Cообщение не удалось отправить");
        }
    }
}
