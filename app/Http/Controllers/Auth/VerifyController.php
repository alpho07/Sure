<?php

namespace App\Http\Controllers\Auth;

use Session;
use DB;
use App\Http\Controllers\Controller;
use App\User;


class VerifyController extends Controller
{

  
	public function index($token){
		DB::update(DB::raw("UPDATE users SET confirmed='1' WHERE confirmation_token='$token'"));
    return redirect('home')->with('message','Account Verification complete');
   }
	}