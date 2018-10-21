<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$posts = Post::where('user_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->get();

        return view('profile', ['posts' => $posts, 'user' => $user, 'root' => true]);
    }

    public function getProfile($friend_id)
    {
        $posts = Post::where('user_id', $friend_id)->get();
        $user = User::where('id', $friend_id)->get();
        info('-----------------');
        info($user[0]);
        return view('profile', ['posts' => $posts, 'user' => $user, 'root' => false]);
    }

    public function updateProfilePic($input){
        $posts = Post::where('user_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->get();
        
        $file->storeAs('public/upload', $filename);
        info('@@@@@@@@@@@@@');
        $user = User::where('id', Auth::user()->id )->update(['profile_pic' => $profile_pic]);
        info('**********');
        return response()->json(['profile_pic' => $profile_pic]);

    }
}
