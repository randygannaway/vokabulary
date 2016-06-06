<?php

namespace App\Http\Controllers;

use DB;

use Redirect;

use Auth;

use App\ListsModel;

use App\WordsModel;

use Illuminate\Http\Request;

use App\Http\Requests;

use \JavaScript;

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
  
	//Check if a word was entered, call API or Redirect
	if($word) {      
	    
	    /* Get translation from model API call 
	    *  which returns an array of the english translation 
	    * and the users lists
	    */

	    $apiCall = WordsModel::search($word);	   
	    if ($apiCall) {
	        // Get variables from array returned by apiCall
	   
	        $english = $apiCall['english'];
	        $lists = $apiCall['lists'];
 
                return view('words.definitions', compact('english', 'word', 'lists'));
	    } 
		return redirect()->back()->with('message', 'That word was not found');
 
        }
         
    }

    public function store(Request $request)
    {
        
        $word = $request->word;
        $definition = $request->definition;
        $list_id = $request->list_id;
        
	// Call to store word in the chosen list
	$stored = WordsModel::storeWord($list_id, $word, $definition);   
 
        return view('saved');
     
    }
    
    public function delete($word_id, $word)
    {
       
	// Call to delete word with id $word_id

	$delete = WordsModel::deleteWord($word_id, $word);
 
        // return deleted message if true;

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

    public function flashcards($list_id)
    {
        
        $words = WordsModel::where('list_id', $list_id)->get();

        
        JavaScript::put(['words' => $words ]);
        return view('words.studyWords', compact('words'));
    }    
}
