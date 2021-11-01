<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Radiations;
use App\Models\Tickets;

class Login_con extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth','verified');
    }

    public function show_login_form()
    {
        $cinema=Cinema::all();
        // return 'affa';

        return view('auth.login',compact('cinema'));
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
                $request->session()->put('userName',$request->name);
                if($request->name == 'master' && $request->password == 'master')
                    return redirect('/cinema-home_master');
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
        $email=$request->email;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return back()->with('fail',$email.' is not a valid email address');
        }


        //check if new acount is exsist
        $check_name = User::where('name','=',$name)->first();
        $check_email = User::where('email','=',$email)->first();

        if(!($check_name) && !($check_email))
        {
            //new acount created
            $user= new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $query = $user->save();

            $request->session()->put('LoggedUser',$user->id);
            $request->session()->put('userName',$request->name);

            return redirect('/cinema-home');
        }
        return back()->with('fail','you have not successfuly');


    }
    public function logout()
    {
        //logout
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }


    }


    //create new table in controller


    public function createTable($table_name, $fields = [])
    {
        // laravel check if table is not already exists
        if (!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->{$field['type']}($field['name']);
                    }
                }
                $table->timestamps();
            });

            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        }

        return response()->json(['message' => 'Given table is already existis.'], 400);
    }



    public function operate()
    {
        // set dynamic table name according to your requirements

        $table_name = 'products';

        // set your dynamic fields (you can fetch this data from database this is just an example)
        $fields = [
            ['name' => 'field_1', 'type' => 'string'],
            ['name' => 'field_2', 'type' => 'text'],
            ['name' => 'field_3', 'type' => 'integer'],
            ['name' => 'field_4', 'type' => 'longText']
        ];

        return $this->createTable($table_name, $fields);
    }
}
