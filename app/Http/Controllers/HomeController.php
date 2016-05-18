<?php

namespace App\Http\Controllers;


use App\ListsModel;
use App\WordsModel;
use Auth;
use DB;


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
    
        $lists = ListsModel::where('user_id', $user_id)->get();
                
        $words = DB::select('select * from words where list_id in (select list_id from lists where user_id = ?) order by id DESC limit 5', [$user_id]);
        
        return view('home', compact('lists', 'user_id', 'words'));
    }
}
