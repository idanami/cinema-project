<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use App\Models\Cinema;

class Home extends Controller
{
    public function index()
    {
        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            $cinema_list= Cinema::all();
            return view('home.home_page',$data,compact('cinema_list'));
        }
        return redirect('/login');
    }
    public function masterPage()
    {
        if(session()->has('LoggedUser')){
            if(session('userName') == 'master'){
                $cinema=Cinema::all();
                $movie=Movie::all();

                return view('home.home_master',compact('cinema','movie'));
            }
            return redirect()->back();
        }
    }
}
