<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spare;

class Machine extends Model
{
    use HasFactory;


    protected $table = "machines";

    protected $fillable = [
        "name"
    ];

    public function spares()
    {
        return $this->belongsToMany(Spare::class)->withPivot("cnt")->withTimestamps();
    }
}
