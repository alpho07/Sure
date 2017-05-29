<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_caveats extends Model
{
    //Table Properties
    public $table = 'user_caveats'; 
    public $timestamps = false;

    public function caveats(){
    	return $this->hasMany('caveats');
    }

}
