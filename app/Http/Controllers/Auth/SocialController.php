<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use App\User_social;
use App\User;

class SocialController extends Controller
{

    //Redirect to OAuth Provider
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    //Receive response from OAuth redirectToProvider
    public function handleProviderCallback($provider){
    
        try {
        $user = Socialite::driver($provider)->user();
    } catch (Exception $e) {
        return redirect('/home');
    }
   
        
        // Get user and find if they exist in db, if not create them
        
        
        $appUser = $this -> findOrCreateUser($user, $provider);
        
       

        Auth::login($appUser, true);
        return redirect()->to('/home');
    }

    public function findOrCreateUser($user, $provider){
        $appUser = User::where('email','=', $user->getEmail())->first();
        
        
       
       
        if(!$appUser){
           return User::create([
            'name' => $user -> name,
            'email' => $user -> email
        ]);

        return User_social::create([
            'email' => $user -> email,
            'provider_id'=>$user-> provider_id,
            'provider' => $user-> provider
        ]);
        }
        
        return $appUser;

       
    }
}
