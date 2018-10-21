<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comments;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostController extends Controller{

	public function postCreatePost(Request $request){
		$this->validate($request, [
			'body' => 'max:1000'
		]);
		$post = new Post();
		$message = 'There was an error while creating the post!';

		if($request['body']){
			$post->body = $request['body'];
		} 

		$input = Input::all();
		if(Input::hasFile('imageFile')) { 
			$file = Input::file('imageFile');
			$filename = $file->getClientOriginalName();
			$file->storeAs('public/upload', $filename);
			$post->image_name = $filename;
			// return $filename;
		} 

		if($request->user()->posts()->save($post)){
			$message = 'Post successfully created!';
		}
		return redirect()->route('home')->with(['message' => $message]);

	}

	public function deletePost($post_id)
	{
		$post = Post::where('id', $post_id)->first();
		if(Auth::user() != $post->user){
			return redirect()->back();
		}
		$post->delete();
		return redirect()->route('home')->with(['message' => 'Post deleted successfully!']);
	}

	public function increaseLikes($post_id, $friend_id)
	{
		$post = Post::where('id', $post_id)->first();
		if(Auth::user() != $post->user){
			return redirect()->back();
		} elseif ($post->friend_id != $friend_id) {
			$post->likes = $post->likes + 1;
			$post->friend_id = $friend_id;
			$post->save();
		}
		return redirect()->route('home');
	}

	public function comment($post_id, $friend_id, Request $request)
	{
		$comment = new Comments();
		if($request['comment']){
			$comment->post_id = $post_id;
			$comment->user_id = $friend_id;
			$comment->body = $request['comment'];
		}

		if($request->user()->comments()->save($comment)){
			$message = 'Post successfully created!';
		}

		return redirect()->route('home');
	}

	public function fetchComments($post_id)
	{
		$comments = Comments::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
		info($comments);
		return response()->json(['comments' => $comments, 'c_flag' => true]);
        // return view('home', ['comments' => $comments, 'c_flag' => true])->renderSections()['cmts'];
	}

	public function message()
    {

        // $user = Auth::user();

        // $user_list = $user->messagePeopleList();

        // $show = false;
        // if ($id != null){
        //     $friend = User::find($id);
        //     if ($friend){
        //         $show = true;
        //     }
        // }

        return View::make('msg');
        // , compact('user', 'user_list', 'show', 'id')
    }
}