<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
    {
       // $this->middleware('auth')->only('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //Default welcome page
    public function index()
    {
       /* $caveats  = DB::table('caveats')
                    ->orderBy('id', 'desc')
                    ->where('Publish_status','0')                    
                    ->paginate(12);*/
        
    //\App\Caveats::where('Publish_status','0')->orderBy('id', 'desc')->paginate(12);
  
        return view('front.front')->with(array('caveats'=>'caveati'));
    }
    
        function getData($start){  
        $caveats  = DB::select(DB::raw("SELECT c.*,u.user_type_id FROM caveats c LEFT JOIN user_caveats uc ON c.id = uc.caveat_id LEFT JOIN users u on u.email = uc.email  ORDER BY c.id DESC LIMIT 8 OFFSET $start"));
            

        echo json_encode($caveats);
    }
    
        public function loadDefault()
    {
     $caveats  = DB::select(DB::raw("SELECT c.*,u.user_type_id FROM caveats c LEFT JOIN user_caveats uc ON c.id = uc.caveat_id LEFT JOIN users u on u.email = uc.email ORDER BY c.id DESC LIMIT 29 "));

  
         echo json_encode($caveats);
    }

// WHERE c.Publish_status='1'
    //Sure homepage on login
    public function home(){
    Session::forget('token');
    Session::forget('confirmed');
    $user = Auth::user()->email;
      $userid = Auth::user()->id;
    $subscription = DB::Select(DB::raw("SELECT s.*,p.* FROM subscriptions s JOIN plans p ON p.id = s.plan_id AND s.user_id ='$userid' "));
    $count = DB::select(DB::raw("SELECT COUNT(*) aggregate FROM user_caveats  WHERE email='$user'"));
    $verification = DB::select(DB::raw("SELECT * FROM users  WHERE email='$user'"));
    if($verification[0]->confirmed == '0'){
    Session::put('token',$verification[0]->confirmation_token);
    Session::put('confirmed',$verification[0]->confirmed);
    }
    
 
     return view('home')->with(['count'=>$count[0]->aggregate,'plan'=>$subscription]);
    }
}
