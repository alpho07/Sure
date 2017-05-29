<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subscriptions;
use App\Traits\computePlanEndDate;
use DB;
class SubscriptionsController extends Controller {

    use computePlanEndDate;

    //Auth subscribe 
    public function __construct(Subscriptions $sub) {
        $this->middleware('auth');
        $this->Subscriptions = $sub;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Get all subscriptions
        $subs = $this->Subscriptions->checkSubscription(Auth::id())->toArray();
        return view('front.subscriptions.index', compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      
        Subscriptions::create([
            'plan_id' => $request->plan_id,
            'user_id' => Auth::id(),
            'caveats_balance' => $request->notices,
            'current' => $request->caveats,
            'trial_start_date' => date('Y-m-d'),
            'trial_end_date' => $this->planEndDate(date('Y-m-d'), $request->trial_period),
        ]);

        return redirect('caveats/')->with('message', 'Successfully subscribed to ' . $request->planner . '. Now you can get publishing.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
