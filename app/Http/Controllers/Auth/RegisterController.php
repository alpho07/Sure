<?php

namespace App\Http\Controllers\Auth;

use Session;
use DB;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use PHPMailer;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => str_random(25)
        ]);
    }




    public function register(Request $request)
    {

        //From https://github.com/lubusIN/laravel-53-email-verification.git


        $validator = $this->validator($request->all())->validate();
        
        $userdata =['email'=>$request->email,'password'=>$request->password];

        DB::beginTransaction();
        try{

            $user = $this->create($request->all());
            $email = new EmailVerification(new User(['confirmation_token'=>$user->confirmation_token, 'name'=>$user->name]));

            Mail::to($user->email)->send($email);
            

            //Set flash message
            session(['flash_notification'=>['message'=>'We have sent you mail, click on the link there to activate your account.']]);

            //Save user details to Db
            DB::commit();
            
            if(Auth::attempt($userdata)){
                 $auth = Auth::user()->id;
                  DB::table('users')->where('id', $auth)->update(['p_status' => 1]);
               return redirect('home');
            }else{
            echo 'success';
              // return redirect('login');
            
            }

            //Redirect to login
         
        }
        catch(Exception $e){
            DB::rollback();
            return back();
        }
    }


 
    public function verify($token)
    {
      //Verified() method referred to here is in app\user
      User::where('confirmation_token',$token)->firstOrFail()->verified();
      return redirect('home');
    }
  
}
