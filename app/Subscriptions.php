<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subscriptions extends Model
{
   
    
    function plan(){
        return $this->belongsTo('\App\Plans');
}

    public function checkIfSubscribed($id){
        return Subscriptions::where('user_id', $id)->first();
    }

    public function checkCurrentSubscription($id){
    	return Subscriptions::where('user_id', $id)->OrderBy('created_at', 'asc')->first();
    }

    public function getMonthlySubscriptionsOverview(){
    	
    	//get Subscription Statistics
    	$subsReport = 
    	DB::select('
    	select count(*) as "Total",
    	count(case when payment_id <> NULL then payment_id end) as "Paid",
    	count(case when payment_id = NULL then payment_id end) as "Unpaid"
		from subscriptions
		where MONTH(created_at) = MONTH(CURRENT_TIMESTAMP())
		and YEAR(created_at) = YEAR(CURRENT_TIMESTAMP())
		');

    	return $subsReport;
    }


   public function getSubscriptionsReportDetailedBeta(){
    	
    	//get Subscription Statistics
    	$subsReport = 
    	DB::select('
    	select plans.Plan_Name as "Plan", count(*) as "Number"
		from subscriptions
		left join plans on subscriptions.plan_id  = plans.id
		group by plan_id
		with rollup
		');

    	return $subsReport;
    }



    //Define fillable fields
    protected $fillable = ['plan_id', 'user_id', 'caveats_balance','current', 'trial_start_date', 'trial_end_date'];

}
