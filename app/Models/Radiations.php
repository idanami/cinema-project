<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tickets;

class Radiations extends Model
{
    use HasFactory;

    protected $table = 'radiations';

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function cinemas(){
        return $this->belongsTo(Cinema::class);
    }
    public function tickets(){
        return $this->hasMany(Tickets::class);
    }

}
