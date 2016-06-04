<?php

namespace App\Http\Controllers;

use App\ListsModel;

use Illuminate\Http\Request;

use App\Http\Requests;

class welcomeController extends Controller
{

    public function __construct()
    {
    //    $this->middleware('auth');
    }

    public function index(){
    

    
        return view('welcome', compact('user_id'));

    }

    public function select(Request $request)
    {
    
        $list_id = $request->list_id;
    
        session(['list_id' => $list_id]);
        
        return(view);
    }
}
