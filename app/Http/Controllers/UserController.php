<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
	public function postSignUp(Request $request){

		$this->validate($request, [
			'email' => 'required|email|unique:users',
			'name' => 'required|max:120',
			'password' => 'required|min:4'
		]);
		$email = $request['email'];
		$name = $request['name'];
		$password  = bcrypt($request['password']);

		$user = new User();
		$user->email = $email;
		$user->name = $name;
		$user->password = $password;

		$user->save();
		return redirect()->route('home');
	}

	public function postLogin(Request $request){
		if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
			return redirect()->route('home');
		} else{
			Auth::logout();
			return redirect()->guest('login');
		}
	}

	public function getHome(){
		return view('home');
	}

	// public function index()
 //    {
 //        $users = DB::select('select * from users where active = ?', [1]);

 //        return view('user.index', ['users' => $users]);
 //    }
}
