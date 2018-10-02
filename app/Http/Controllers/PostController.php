<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
	public function postCreatePost(Request $request){
		$this->validate($request, [
			'body' => 'required|max:1000'
		]);
		$post = new Post();
		$post->body = $request['body'];
		$message = 'There was an error while creating the post!';
		if($request->user()->posts()->save($post)){
			$message = 'Post successfully created!';
		}
		return redirect()->route('home')->with(['message' => $message]);
	}
}