<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin_view;

use App\User;

use App\Caveats;

use App\Subscriptions;


class AdminController extends Controller
{

   

//Constructor
public function __construct(Admin_view $admin_view, User $user, Subscriptions $sub, Caveats $cav){
	$this->middleware(['auth', 'admin']);
	$this->Admin_view = $admin_view;
	$this->User = $user;
	$this->Subscriptions = $sub;
	$this->Caveats = $cav;
}




//Returns admin home dashboard
public function index(){

	//Initialize data array
	$data = array();

	//Get dashboard cards
	$views = $this->Admin_view->getAll();

	//Loop through views
	foreach ($views as $view) {
		
		//Define model
		$model = $view->alias;

		//Define Method 
		$method = 'getMonthly'.$model.'Overview';

		//Fetch data from db
		${$view->name} = $this->$model->$method();
		
		//Push fetched data into an array
		$data[$view->name] =  ${$view->name};
	}

	return view('admin.dashboard', compact('data'));

}



//Admin Users
public function users(){

	return view('admin.users', compact('data'));
}


//Admin Subscriptions
public function subscriptions(){

	return view('admin.subscriptions', compact('data'));
}


//Admin Caveats
public function caveats(){

	return view('admin.caveats', compact('data'));

}

	

}
