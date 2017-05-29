<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Caveats extends Model
{
    //
    public function user_caveats(){
    	return $this->belongsTo('User_caveats');
    }
   


    //Update publish status
    public function published(){
      $this->publish_status = 1;
      $this->publish_date = date('Y-m-d');
      $this->save();
    }


    public function getAll($email){
      return Caveats::leftJoin('user_caveats','caveats.id','=', 'user_caveats.caveat_id' )
      ->where('user_caveats.email', $email)
      ->orderBy('caveats.caveat_date','desc')
      ->get();
    }
    
    public function getMonthlyCaveatsOverview(){
      
      //get Subscription Statistics
      $caveatsReport = 
      DB::select('select count(*) as "Total",
      count(case when publish_status = 1 then publish_status end ) as "Published",
      count(case when publish_status = 0 then publish_status end ) as "Unpublished"
      from caveats
      where MONTH(created_at) = MONTH(CURRENT_TIMESTAMP())
      and YEAR(created_at) = YEAR(CURRENT_TIMESTAMP())
      ');

      return $caveatsReport;
    }


}
