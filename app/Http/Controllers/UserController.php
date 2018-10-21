<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use App\UserDirectMessage;
use DB;
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

	public function sendRequest($user_id, $friend_id){
		$friend = new Friend();
		$already_sent = Friend::where(['user_id' => $user_id, 'friend_id' => $friend_id, 'confirm' => 0])->get();
		if(count($already_sent) == 0){
		$friend->user_id = $user_id;
		$friend->friend_id = $friend_id;
		$friend->confirm = 0;

		$friend->save();
	}
		return redirect()->route('home');
	}

    public function acceptRequest($user_id, $friend_name)
    {
        $friend_id = User::where('name', $friend_name)->value('id');
        Friend::where(['user_id' => $friend_id, 'friend_id' => $user_id])->update(['confirm'=>1]);
        // $friend->confirm = 1;
        // $friend->save();
        return response()->json(['success' => true]);
    }

    public function getNotifs($user_id)
    {
    	info('Inside getNotifs');
    	$notif = Friend::where(['friend_id' => $user_id, 'confirm' => 0])->get();
    	info($notif);
    	$friends = array();
    	$i=0;
    	foreach($notif as $n){
    		$friends[$i++] = User::where('id', $n->user_id)->value('name');
    	}
    info($friends);
    	 return response()->json(['notif'=> $friends]);
    }

    public function friendList($user_id)
    {
    	// $friendsList = Friend::where(function($q) use ($user_id) {
     //      return $q->where(['user_id' => $user_id, 'confirm' => 1])->orWhere(['friend_id' => $user_id, 'confirm' => 1]);
     //  })->get();
    	$friendsList1 = Friend::where(['user_id' => $user_id, 'confirm' => 1])->get();
    	$friendsList2 = Friend::where(['friend_id' => $user_id, 'confirm' => 1])->get();
    	info('User Id '.$user_id);

    	info('Friend List1 '.$friendsList1);
    	info('Friend List2 '.$friendsList2);
    	
    	$friends = array();
    	$i=0;
    	foreach($friendsList1 as $fl){
    		$friends[$i++] = User::where('id', $fl->friend_id)->value('name');
    	}

    	foreach($friendsList2 as $fl){
    		$friends[$i++] = User::where('id', $fl->user_id)->value('name');
    	}
    	 return response()->json(['friends'=> $friends]);
    }

    public function sendMessage($user_id, $friend_name, $message)
    {
    	$friend_id = User::where('name', $friend_name)->value('id');
    	info('Friend Id send '.$friend_id);
    	$msg = new UserDirectMessage();
    	$msg->sender_user_id = $user_id;
    	$msg->receiver_user_id = $friend_id;
    	$msg->message = $message;

    	$msg->save();

    	$messages = UserDirectMessage::where(['sender_user_id' => $user_id, 'receiver_user_id' => $friend_id])->get();

    	return response()->json(['messages'=>$messages]);
    }

    public function getMessage($user_id, $friend_name)
    {
    	$friend_id = User::where('name', $friend_name)->value('id');
    	info('Friend Id get '.$friend_id);

    	// $messages = UserDirectMessage::where(function($q) use ($user_id, $friend_id) {
     //      return $q->where(['sender_user_id' => $user_id, 'receiver_user_id' => $friend_id])->orWhere(['sender_user_id' => $friend_id, 'receiver_user_id' => $user_id]);
     //  })->get();
    	$messages = \DB::select("SELECT * from user_direct_messages WHERE ((sender_user_id=:user_id1 AND receiver_user_id=:friend_id1 OR sender_user_id=:friend_id2 AND receiver_user_id=:user_id2))", ['user_id1' => $user_id, 'friend_id1' => $friend_id, 'user_id2' => $user_id, 'friend_id2' => $friend_id]);
    	info($messages);
    	
    	return response()->json(['messages'=>$messages]);
    }

	// public function index()
 //    {
 //        $users = DB::select('select * from users where active = ?', [1]);

 //        return view('user.index', ['users' => $users]);
 //    }
}
