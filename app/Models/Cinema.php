<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Radiations;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';

    // public function movie(){
    //     return $this->hasMany(Movie::class);
    // }
    public function radiations(){
        return $this->hasMany(Radiations::class);
    }
    // public function tickets(){
    //     return $this->hasMany(Tickets::class);
    // }
}
