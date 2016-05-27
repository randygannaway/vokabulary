<?php

namespace App;  

use DB;

use Illuminate\Database\Eloquent\Model;

class ListsModel extends Model
{
    //
    
    protected $table = 'lists';
    
    protected function userLists($user_id){
        $lists = ListsModel::where('user_id', $user_id)->get();
        
        return $lists;
    }

    protected function newList($list_name, $user_id)
    {

	//Insert name of new list and the users id	

        $saved = DB::insert('insert into lists (list_name, user_id) values (?, ?)', 
                           array($list_name, $user_id));
    }
}
