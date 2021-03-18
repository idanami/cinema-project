<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Radiations;

class Tickets extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    public function radiations(){
        return $this->belongsTo(Radiations::class);
    }
    // public function cinemas(){
    //     return $this->belongsTo(Cinema::class);
    // }
}
