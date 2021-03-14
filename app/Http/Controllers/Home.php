<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Home extends Controller
{
    public function index()
    {
        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            return view('home.home_page',$data);
        }
        return redirect('/login');
    }
}
