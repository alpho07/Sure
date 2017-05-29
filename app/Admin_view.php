<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_view extends Model
{
    //Table Attributes
    public $table = 'admin_view'; 
    public $timestamps = false; 

    //Get all admin view cards
    public static function getAll(){
    	return Admin_view::all();
    }

}
