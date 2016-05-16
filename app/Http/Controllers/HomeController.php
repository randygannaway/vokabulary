<?php

namespace App\Http\Controllers;


use App\ListsModel;
use Auth;


use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $user = Auth::user();
        
        $user_id = $user->id;
    
        $lists = ListsModel::where('user_id', $user_id)->get(); //add and user_id = userid
        
        return view('home', compact('lists', 'user_id'));
    }
}
