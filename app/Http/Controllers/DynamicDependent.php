<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Radiations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class DynamicDependent extends Controller
{
    // function index()
    // {
    //  $cinema_list = DB::table('cinemas')
    //                     ->groupBy('name')
    //                     ->get();
    //  return view('home.home_page')->with('cinema_list', $cinema_list);
    // }

    function fetchMovie(Request $request)
    {
        $cinema_id= $request->id;
        $data = Radiations::select('movie_id')->where('cinema_id',$cinema_id)->get();
        $movie = Movie::find($data);

        return response()->json($movie);//then sent this data to ajax success

    }

    function fetchTimes(Request $request)
    {
        $cinema_id= $request->cinema_id;
        $movie_id= $request->movie_id;

        // return $request->cinema_id.' '.$request->movie_id;
        $data = Radiations::select('screening_time')->where('movie_id',$movie_id)->where('cinema_id',$cinema_id)->get();

        return response()->json($data);//then sent this data to ajax success
    }
}
