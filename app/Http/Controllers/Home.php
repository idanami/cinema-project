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
    public function update()
    {
        $cinema=Cinema::all();

        return view('home.home_master',compact('cinema'));
    }
    public function newupdate($id)
    {
        return $id;
        // return view('home.home_master');
    }
}
