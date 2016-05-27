<?php

namespace App\Http\Controllers;

use DB;

use Auth;

use Redirect;

use App\ListsModel;

use Illuminate\Http\Request;

use App\Http\Requests;



class listsController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index()
    {
	
	//         
        $lists = ListsModel::all();
        
    
        return view('lists/showLists', compact('lists'));
    }
    
    public function add()
        {
    
        $lists = ListsModel::all();

    
        return view('lists/newlist');
    
    }

    public function store(Request $request)
        {
        
        $list_name = $request->list_name;
        
        $lists = ListsModel::all();
        
        $user_id = Auth::user()->id;

        if ($list_name) {
	    
	    ListsModel::newList($list_name, $user_id);
        } 
        else {
            return redirect()->back();
        }
    
        return view('/saved');
    }    
    
        public function delete($list_id)
    {
        
        $deleted = DB::table('lists')->where('list_id', $list_id)->delete();
        
        return view('deleted');
    }
}
