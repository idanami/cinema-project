<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cinema;
use App\Models\Radiations;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    // public function cinemas(){
    //     return $this->belongsTo(Cinema::class);
    // }
    public function radiations(){
        return $this->hasMany(Radiations::class);
    }
    // public function tickets(){
    //     return $this->hasMany(Tickets::class);
    // }
}
