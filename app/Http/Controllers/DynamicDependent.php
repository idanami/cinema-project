<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Radiations;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class DynamicDependent extends Controller
{


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
        $radiations = Radiations::select('screening_time','id','seats')->where('movie_id',$movie_id)->where('cinema_id',$cinema_id)->get();

        return response()->json($radiations);//then sent this data to ajax success
    }

    function fetchSeats(Request $request)
    {
        $radiations= $request->id;
        $tickets = Tickets::select('chair_number','owner_card')->where('radiations_id',$radiations)->get();

        return response()->json($tickets);//then sent this data to ajax success
    }
    // function fetchTicket(Request $request)
    // {
    //     $radiations= $request->id;
    //     $tickets = Tickets::select('chair_number','owner_card')->where('radiations_id',$radiations)->take(100)->get();

    //     return response()->json($tickets);//then sent this data to ajax success
    // }
}
