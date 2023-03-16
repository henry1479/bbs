<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Message;

class Chat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $chat;
    
    public function __construct($firstUserId = 4, $secondUserId = 1)

    {
        $query = Message::where("from_user_id",$secondUserId)->where("to_user_id", $firstUserId);
        $this->chat = Message::where("to_user_id",$secondUserId)->where("from_user_id",$firstUserId)->union($query)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat');
    }
}
