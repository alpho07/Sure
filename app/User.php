<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token','p_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'role_id','usertype_id'
    ];

    //Get User Role
    public function hasRole($role){
        return User::where('role', $role)->get();
    }
    
    public function userType(){
        return $this->belongsTo('\App\User_types');
    }
    
     public function plan(){
        return $this->belongsTo('\App\Plans');
    }

    //Update verification status
    public function verified(){
    
    echo 1;
     // $this->confirmed = 1;
     // $this->confirmation_token = null;
     // $this->save();
    }
    
        public function getMonthlyUserOverview(){
        
        $userReport = 
        DB::select('select count(*) as "Total",
        count(case when confirmed = 1 then confirmed end ) as "Verified",
        count(case when confirmed = 0 then confirmed end ) as "Unverified"
        from users
        where MONTH(created_at) = MONTH(CURRENT_TIMESTAMP())
        and YEAR(created_at) = YEAR(CURRENT_TIMESTAMP())
        ');


       return $userReport;
    }

}
