<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    //

    public function getAllPlans(){
    	return Plans::all()->toArray();
    }
}

//