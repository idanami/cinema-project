<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login_con extends Controller
{
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function show_login_form()
    {
        return view('auth.login');
    }
      
    
    public function process_login(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        //check if name request match in user database
        $user = User::where('name','=',$request->name)->first();

        if($user){

            //this acount is exist
            if(Hash::check($request->password,$user->password)){
                //password is match
                $request->session()->put('LoggedUser',$user->id);

                return redirect('/cinema-home');
            }
            return back()->with('fail','no match pass');
        }   
        return back()->with('fail','no found acount');
    }

    public function show_signup_form()
    {
        return view('auth.register');
    }

    public function process_signup(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:5|max:12',
        ]);
        
        $name=$request->name;

        //check if new acount is exsist
        $check_name = User::where('name','=',$name)->first();
        $check_email = User::where('email','=',$request->email)->first();

        if(!($check_name) && !($check_email))
        {
            //new acount created
            $user= new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $query = $user->save();

            $request->session()->put('LoggedUser',$user->id);

            return redirect('/cinema-home');
        }
        return back()->with('fail','you have not successfuly');

      
    }
    public function logout(Request $r)
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');    
        }


    }

}