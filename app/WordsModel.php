<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class WordsModel extends Model
{
    //
    
    protected $table = 'words';
    
    protected function search($word)
    {
	
	$params = [];	
        
	//Get translation from Webster API

        $xdef = $this->grab_xml_definition($word, "spanish", "d397ce9a-f05e-4656-be0b-0b866f026c7c");

	//If API returns a definition pick first definition from xml response otherwise return false
	
	    $definition = new \simplexmlelement($xdef);

	if (isset($definition->entry)){
	   
	    $translation = $definition->entry->def->dt[0]->{'ref-link'}[0];

            $params['english'] = $translation;
           
	    // Get lists for the logged in user.
            $user_id = Auth::user()->id;
            $params['lists'] = ListsModel::where('user_id', $user_id)->get();
	    
	    return $params;
	} else {
	    return false;
	}

    }

    protected function grab_xml_definition($word, $ref, $key)
    {
            $uri = "http://www.dictionaryapi.com/api/v1/references/" . urlencode($ref) . "/xml/" . 
            urlencode($word) . "?key=" . urlencode($key);
                
                return file_get_contents($uri);
    }

    protected function deleteWord($word_id, $word)
    {

	// Delete saved word from the words table.
	
        $deleted = WordsModel::where('id', $word_id)->delete();

	return $deleted;

    }

    protected function storeWord($list_id, $word, $definition)
    {

	$saved = WordsModel::insert(['list_id' => $list_id, 'word' => $word, 'translation' => $definition]);

    }
}
