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

}
