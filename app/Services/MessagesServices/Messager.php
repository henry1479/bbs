<?php
namespace App\Services\MessagesServices;

use App\Services\MessagesServices\Contracts\MessagesService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Messager implements MessagesService {
    public function getUser(int $userId)
    {
        return User::find($userId)->first();
    }

    public function getMessages(int $userId) 
    {   
        return null;
    }

    public function getAllInputMessages(int $userId)
    {
        return User::find($userId)->messagesTo()->distinct()->get(["from_user_id"]);
    }

    
}