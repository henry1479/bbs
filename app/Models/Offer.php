<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bb;

class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";


    public function bbs()
    {
        return $this->belongsTo(Bb::class);
    }
}
