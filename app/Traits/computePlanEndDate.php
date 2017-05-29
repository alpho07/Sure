<?php 
namespace App\Traits;
use App\Subscriptions;

trait computePlanEndDate {

	public function planEndDate($startDate, $period){

		$end_date = date('Y-m-d', strtotime($startDate. "+ $period days"));
		return date('Y-m-d', strtotime($end_date));
	
	}
}

?>