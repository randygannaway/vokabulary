<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordsModel extends Model
{
    //
    
    protected $table = 'words';
    
    protected function search($word)
    {
	
	$params = [];	
        
	//Get translation from Webster API
        $xdef = $this->grab_xml_definition($word, "spanish", "d397ce9a-f05e-4656-be0b-0b866f026c7c");
            
	//Pick first definition from xml response
	$definition = new \simplexmlelement($xdef);
        $this->params['english'] = $definition->entry->def->dt[0]->{'ref-link'}[0];
           
	// Get lists for the logged in user.
        $user_id = Auth::user()->id;
        $this->params['lists'] = ListsModel::where('user_id', $user_id)->get();
	    
	return $this->params;

    }

    protected function grab_xml_definition($word, $ref, $key)
    {
            $uri = "http://www.dictionaryapi.com/api/v1/references/" . urlencode($ref) . "/xml/" . 
            urlencode($word) . "?key=" . urlencode($key);
                
                return file_get_contents($uri);
    }

	
}
