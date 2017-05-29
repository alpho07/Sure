<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Plans;




class PlansController extends Controller
{

    public function __construct(Plans $plans){
        $this->middleware('admin')->only('create');
        $this->Plans = $plans;
    }

    //
      public function index($id)
    {
        $plans = $this->Plans->getAllPlans();
        return view('front.pricing', ['plans'=>$plans,'no'=>$id]);
    }
    
    
        public function plans2($id)
    {
        $plans = $this->Plans->getAllPlans();
        return view('front.pricing', ['plans'=>$plans,'no'=>$id]);
    }

    public function create()
    {
        //Create new instance of Plans 
        $plan = new Plans;
        
        //Plans creation form
        return view('back.plans.create', ['plan'=>$plan]);
    }

    public function store(Request $request){
        $plan  =  new Plans;
        $plan->plan_name = $request->plan_name;
        $plan->monthly_rate = $request->monthly_rate;
        $plan->annual_rate =  $plan->monthly_rate * 12;
        $plan->notices = $request->notices;
        $plan->plan_details = $request->plan_details;
        $plan->save();

        return redirect('plans');
    }


}
