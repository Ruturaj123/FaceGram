<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$name = $request['search_input'];
    	$users = User::where('name', 'like', '%'.$name.'%')->get();
    	// info($users);
    	return view('search_results', ['users' => $users]);
   	}
}
