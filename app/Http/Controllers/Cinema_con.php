<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Support\Str;

class Cinema_con extends Controller
{
    public function cinemaUpdate($id){

        $cinema= Cinema::all();

        return view('home.home_master',compact('cinema'));
    }
    public function movieUpdate($cinemaandmovie){
        // $teest=0;
        // $aaa="";
        // for ($i=0; $i < Str::length($cinemaandmovie) ; $i++) {
        //     $teest ++;
        //     $aaa = $aaa."1";
        // }
        // return $aaa." ".$teest;

        $movie=Movie::all();

        return view('auth.login',compact('movie'));
    }}
