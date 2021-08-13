<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    function index(){
        return view('login');
    }
}

public function Login(Request $request){
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)){
        return redirect()->intended('dashboard')
        ->withSuccess('Signed in');
    }

    return redirect("login")->withSuccess('Login details are not valid');
}

public function registration(){
    return view('register');
}

public function Registration(Request $request){
    $request->validate([
        'email' => 'required|email|unique:users',
        'firstname' => 'required',
        'lastname' => 'required',
        'password' => 'required|min:6',
    ]);

    $data =$request->all();
    $check = $this->create($data);

    return redirect("dashboard")->withSuccess('You have signed-in');
}

public function create(array $data){

    return User::create([
        'email'=>$data['email'],
        'firstname'=>$data['firstname'],
        'lastname'=>$data['lastname'],
        'password'=>Hash::make($data['password']),
    ]);
}

public function signout(){
    Seesion::flush();
    Auth::logout();

    return Redirect('login');
}