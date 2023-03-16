<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "messages";

    protected $fillable = [
        "from_user_id",
        "to_user_id",
        "content",
        "additional_files"
    ];

    protected $cast = [
        "to_user_id" => "int",
    ];

    public function fromUser() {
        return $this->belongsTo(User::class, "from_user_id", "id");
    }

    public function toUser() {
        return $this->belongsTo(User::class, "to_user_id", "id");
    }


}
