<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Machine;
use App\Models\Spare;

class MachineSpare extends Model
{
    use HasFactory;

    protected $table = "machine_spare";

    protected $fillable = [
        "cnt"
    ];


    public function machines()
    {
        return $this->belongsTo(Machine::class);
    }

    public function spares()
    {
        return $this->belongsTo(Spare::class);
    }
    


}
