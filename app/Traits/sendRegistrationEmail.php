<?php

namespace App\Traits;
use App\Mail\DefaultPassRegistration;
use DB;
use Mail;
use Session;
use App\User;
use Auth;

trait sendRegistrationEmail {

	public function sendRegistrationEmail($name, $email, $flashmessage){


		DB::beginTransaction();
        try{

        	//Temp Tokens
        	$confirmation_token = str_random(50);


        	//Create User
            $user = User::create([
            	'name' => $name,
            	'email' => $email,
                'confirmed' => '0',
                'password' =>bcrypt('123456'),
                'confirmation_token' => $confirmation_token
            ]);

            //Set up password reset
            $user_reset = ([
                'email' => $email,
                'token' => $confirmation_token,
                'created_at' => date('Y-m-d h:i:s')
            ]);

            //Insert password reset record into DB
            DB::table('password_resets')->insert($user_reset);

            //Send email
            $email = new DefaultPassRegistration(new User(['name'=>$user->name, 'email' => $user->email, 'confirmation_token'=>$user->confirmation_token]));


            Mail::to($user->email)->send($email);

            //Set flash message
            session(['flash_notification'=>['message'=>$flashmessage]]);

            //Save user to DB
            DB::commit();
         
             $userdata =['email'=>$user->email,'password'=>'123456'];
 
          Auth::attempt($userdata);
              
            
        }
        catch(Exception $e){
            DB::rollback();
            return back();
        }

	}

}

