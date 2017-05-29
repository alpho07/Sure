<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Admin_nav;
use DB;


class AdminMenuRepository
{

    public function getSideBar()
    {
        $sides = Admin_nav::getAll();
        return $sides;
    }

    public function getTerms(){

    	//get segment of url
        $url = Request()->segment(1);
    	
        //get corresponding terms from db, url is parameter
    	$terms = DB::table($url)->first();
    	return $terms;
    }

    public function getTermsNav(){
    	return Admin_nav::getTerms();
    }

}