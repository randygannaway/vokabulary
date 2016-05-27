<?php

namespace App\Http\Controllers;

use DB;

use Redirect;

use Auth;

use App\ListsModel;

use App\WordsModel;

use Illuminate\Http\Request;

use App\Http\Requests;

class wordsController extends Controller
{

    // require user login

    public function __construct()
    {
        $this -> middleware('auth');
    }
    
    // display words
    
    public function index($list_id)
    {
        
        $words = WordsModel::where('list_id', $list_id)->get();
        
        return view('words.showWords', compact('words'));
    }
    
    
    // display search box page
    
  
    
    public function search(Request $request)
    {
        $word = $request->word;
        $lists = ListsModel::all();
  
	//Check if a word was entered, call API or Redirect
	if($word) {      
	    
	    $apiCall = WordsModel::search($word);	    
            return view('words.definitions', compact('english', 'word', 'lists'));
        } else {
            return redirect()->back();
        }
         
    }

    public function store(Request $request)
    {
        
        $word = $request->word;
        $definition = $request->definition;
        $list_id = $request->list_id;
        
        $saved = DB::insert('insert into words (list_id, word, translation) values (?, ?, ?)', array($list_id, $word, $definition));
    
        return view('saved');
     
    }
    
    public function delete($word_id, $word)
    {
        $word = $word;
        $word_id = $word_id;
        
        $deleted = DB::table('words')->where('id', $word_id)->delete();
        
        // return view('deleted');
        return Redirect::back()->with('message', 'Deleted')->with('word', $word);
    }

    public function move($word_id, $word, $translation)
    {
        
        
        $user = Auth::user();
        
        $user_id = $user->id;
    
        $lists = ListsModel::where('user_id', $user_id)->get(); //add and user_id = userid
        
        return view('words.move', compact('word_id', 'lists', 'word', 'translation'));
     
    }
    
    public function update(Request $request)
    {
        $word_id = $request->word_id;
        $list_id = $request->list_id;
        
        $update = DB::table('words')->where('id', $word_id)->update(['list_id' => $list_id]);
        
        return view('moved');
    }
    
}
