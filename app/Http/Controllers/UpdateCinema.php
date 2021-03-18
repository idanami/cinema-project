<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class UpdateCinema extends Controller
{
    public function cinemaUpdate(Request $request){

        $cinema_list= Cinema::all();
        return view('home.home_master',compact('cinema_list'));

    }
}
