<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_nav extends Model
{
    //Table Properties
    public $table = 'admin_nav';
    public $timestamps = false;  


    //Get all admin sidebar items
    public static function getAll(){
    	return Admin_nav::all();
    }

    //Get Terms Navs
    public static function getTerms(){
    	return Admin_nav::where('type','=','terms')->where('status','=','1')->get();
    }

}
