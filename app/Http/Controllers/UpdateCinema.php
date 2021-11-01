<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Radiations;
use App\Models\Tickets;
use Illuminate\Http\Request;

class UpdateCinema extends Controller
{

    // add new cinema to table
    public function cinemaUpdate(Request $request){

        $checkIfExsist = Cinema::where('cinema_name', $request->cinema_name)->where('address', $request->cinema_address)->get();

        if (!sizeof($checkIfExsist)){
            $cinema= new Cinema;
            $cinema->cinema_name = $request->cinema_name;
            $cinema->address = $request->address;
            $cinema->save();
            return back()->with('success','you have successfuly');
        }
        return back()->with('fail','you have not successfuly');

        $cinema_list= Cinema::all();
        return view('home.home_master',compact('cinema_list'));
    }

    // add new movie to table
    public function movieUpdate(Request $request){

        $request->validate([
            'movie_name' => 'required|unique:movies|min:4',
        ]);
            $movie= new Movie;
            $movie->movie_name = $request->movie_name;
            $movie->genres = $request->genres;
            $movie->duration_of_screenin = $request->runtime;
            $movie->save();
            return back()->with('success','you have successfuly');
        // }
        return back()->with('fail','you have not successfuly');
    }

    // add new radiations to table
    public function radiationsUpdate(Request $request){

        $checkIfExsist = Radiations::where('movie_id', $request->Hmovie_id)
                                    ->where('cinema_id', $request->Hcinema_id)
                                    ->where('screening_time', $request->screening_time)
                                    ->where('seats', $request->seats)
                                    ->get();
        //check if this  Radiations is already exists
        if (!sizeof($checkIfExsist)){
            $radiations= new Radiations;
            $radiations->movie_id = $request->Hmovie_id;
            $radiations->cinema_id = $request->Hcinema_id;
            $radiations->seats = $request->seats;
            $radiations->screening_time = $request->screening_time;
            $radiations->save();
            return back()->with('success','you have successfuly');
        }
        return back()->with('fail','you have not successfuly');
    }


    public function cinemaUpdateSeats(Request $request){
        $seatNumber = $request->seatNumber;
        $radiationsId = $request->radiations_id;

        for ($i = 0; $i < $seatNumber; $i++){
            $index = 'seat_num'.$i;
            if($request->$index != ""){
                $addTicket= new Tickets;
                $addTicket->owner_card = $request->$index;
                $addTicket->chair_number = $i;
                $addTicket->radiations_id = $radiationsId;
                $addTicket->save();
             }
        }
        $cinema_list= Cinema::all();
        return back()->withArticle($cinema_list)->with('success_save','Preservation of chairs was done successfully');

        // return view('home.home_page',compact('cinema_list'));
    }
}
