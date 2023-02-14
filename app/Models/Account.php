<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "accounts";

    protected $fillable = [
        "login",
        "about_me",
        "created_at",
        "updated_at",
        "user_id"
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
