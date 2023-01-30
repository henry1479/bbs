<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Machine;

class Spare extends Model
{
    use HasFactory;

    protected $table = "spares";
    protected $fillable = [
        "name"
    ];

    public function machines()
    {
        return $this->belongsToMany(Machine::class);
    }
    
}
