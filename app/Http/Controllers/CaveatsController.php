<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Caveats;
use App\User_caveats;
use App\Subscriptions;
use App\Traits\sendRegistrationEmail;
use DB;
use App\CaveatInfo;
use App\Plans;
use App\ViewCount;

class CaveatsController extends Controller {

    use sendRegistrationEmail;

    public function __construct(Caveats $caveats) {

       // $this->middleware('auth');
        // $this->middleware('plan');
        $this->Caveats = $caveats;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        @$user = Auth::user()->email;
        @$id = Auth::user()->id;

        @$caveats = DB::select(DB::raw("SELECT c.*,ci.id cid FROM caveats c INNER JOIN user_caveats uc ON c.id = uc.caveat_id LEFT JOIN caveat_infos ci ON c.id = ci.cid WHERE uc.email= '$user' ORDER BY c.id DESC"));
        @$s = $this->check();

        
        return view('front.caveats.index')->with(['caveats' => @$caveats, 's' => @$s]);
    }

    function check() {
        @$id = Auth::user()->id;
        return DB::select(DB::raw("SELECT s.*,p.Notices FROM subscriptions s INNER JOIN plans p ON p.id = s.plan_id INNER JOIN users u  ON u.id=s.user_id WHERE u.id='$id'"));
    }
    
    
            function getUserIP() {
        return $_SERVER['REMOTE_ADDR'];
    }

    function setVisitorCount($id) {
        $check = DB::table('view_counts')->where('caveat_id',$id)->where('visitor',$this->getUserIP())->count();
        if ($check > 0):

        else:
        $view_count = new ViewCount();
        $view_count->caveat_id = $id;
        $view_count->visitor= $this->getUserIP();
        $view_count->save();    

        endif;
    }
    
    function getViewCount($id){
    return ViewCount::where('caveat_id', $id)->count();
    }
    
 
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $caveat = new Caveats;
        $s = $this->check();
        if (empty($s[0]->current) && empty($s[0]->Notices)):
         return view('front.caveats.create', ['caveat' => $caveat]);
          
        elseif($s[0]->current >= $s[0]->Notices):
              return redirect()->to('caveats');
        else:
            return view('front.caveats.create', ['caveat' => $caveat]);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    
    
 
    
    
    
    
        $res = '';
        $r = $request->reason;
        foreach ($r as $d):
            $res .= $d . ';';
        endforeach;


        //Upload caveat document
       // $caveats_path = $request->file('document_uploads')->store('caveats');


        //Store caveat in caveats table
        $caveat = new Caveats;
        $caveat->caveat_date = $request->caveat_date;
        $caveat->caveat_ref = $request->caveat_ref;
        $caveat->description = $request->description;
        $caveat->enquiry_details = $request->enquiry_details;
        $caveat->lr_no = $request->lr_no;
        $caveat->lrno_block = $request->lrno_block;
        $caveat->ir_ic_nos = $request->ir_ic_nos;
        $caveat->town = $request->town;
        $caveat->size = $request->size;
        $caveat->document_uploads = 'NONE';
        $caveat->county = $request->county;
        $caveat->area = $request->area;
        $caveat->road = $request->road;
        $caveat->landmark = $request->landmark;
        $caveat->reason = $res;
        $caveat->who = $request->who;
        $caveat->save();

        //Store caveat-user relation in user_caveats table
        if (Auth::check()) {
            $email = Auth::user()->email;
        } else {
            $email = $request->email;
        }
        
     


        if ($caveat) {

            @$id = Auth::user()->id;
            $plan_id = new Subscriptions;
            $k = $plan_id->checkIfSubscribed($id);

            $user_caveat = new User_Caveats;
            $user_caveat->email = $email;
            $user_caveat->caveat_id = $caveat->id;
            $user_caveat->save();
            
           if(empty($k)):
            
            else:
            $auth = Auth::user()->id;
            $pid = $k->plan_id;
            $new = (int) $k->current + 1;

            DB::table('subscriptions')->where('plan_id', $pid)->where('user_id', $auth)->update(['current' => $new]);
            endif;
        }

        //If not logged in and email does not exist, send registration email
        if (!Auth::check()) {
            if (!User::where('email', '=', $request->email)->exists()) {
                $flashmessage = 'Caveat created. To publish it, login with credentials we have sent to your mail.';
                $this->sendRegistrationEmail($request->name, $request->email, $flashmessage);
            } else {

                $flashmessage = 'Caveat created. Log in to Edit /Publish.';
            }
        } else {
            $flashmessage = 'Caveat created. Edit /Publish.';
        }


        //Set flash message
        session(['flash_notification' => ['message' => $flashmessage]]);

        //Redirect to show preview created caveat
          if (!Auth::check()) {
            return redirect('login')->with(['message'=>'Caveat created. login to view']);
            }else{
             return redirect('caveats');
            }
    }
    
    
    
      public function storeedit(Request $request) {
        $res = '';
        $r = $request->reason;
        foreach ($r as $d):
            $res .= $d . ';';
        endforeach;


        //Upload caveat document
       // $caveats_path = $request->file('document_uploads')->store('caveats');


        //Store caveat in caveats table
        $caveat = Caveats::find($request->cavid);
        $caveat->caveat_date = $request->caveat_date;
        $caveat->caveat_ref = null;
        $caveat->description = $request->description;
        $caveat->enquiry_details = $request->enquiry_details;
        $caveat->lr_no = $request->lr_no;
        $caveat->lrno_block = null;
        $caveat->ir_ic_nos = $request->ir_ic_nos;
        $caveat->town = $request->town;
        $caveat->size = $request->size;
       // $caveat->document_uploads = $caveats_path;
        $caveat->county = $request->county;
        $caveat->area = $request->area;
        $caveat->road = $request->road;
        $caveat->landmark = $request->landmark;
        $caveat->reason = $res;
       // $caveat->who = $request->who;
        $caveat->save();
          return redirect('cedit/' . $request->cavid)->with(['message' => 'Caveat Details Successfully Updated']);
        
        }
    

    public function additional_info(Request $r) {

        $receipt_path = $r->file('rupload')->store('moreinfo');

        $info = new CaveatInfo;

        $info->Receipt_date = $r->date_receipt;
        $info->Upload_path = $receipt_path;
        $info->Lands_office = $r->lands;
        $info->Affidavit_date = $r->daffsigned;
        $info->Present_lawyer = $r->plawyer;
        $info->PcertNo = $r->lsat;
        $info->Address = $r->ladress;
        $info->Email = $r->lemail;
        $info->Mobile = $r->ltel;
        $info->Cid = $r->cid;

        $info->save();

        //Redirect to show preview created caveat
        return redirect('myplan/' . $r->cid)->with(['message' => 'Additional Information Successfully Updated']);
    }

    function sendEmail(Request $r, \Illuminate\Mail\Mailer $mailer, $id) {
        $mailer->to('hakikishacaveats@gmail.com')
                ->cc('thecapitaledge@gmail.com')
                ->bcc($r->email)->send(
                new \App\Mail\CaveatEnquiry($r->caveat, $r->name, $r->email, $r->phone, $r->bodyMessage)
        );

        return redirect()->route('caveats/' . $id)->with('message', 'We have received your message and will get back to yo promptly with a feedback');
    }
    
     public function delete($id) {
       DB::table('caveats')->where('id', '=', $id)->delete();
       return redirect()->route('caveats.index')->with('message', 'Caveat Successfully Deleted!');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $email = Auth::user()->email;


        $caveatinfo = CaveatInfo::where('cid', $id)->get();
        $caveats = DB::select(DB::raw("select c.*,u.name,u.user_type_id FROM caveats c
                    JOIN user_caveats uc ON c.id = uc.caveat_id
                    JOIN users u ON u.email = uc.email
                    AND u.email='$email'
                    ORDER BY c.id DESC "));
        $previous = DB::select(DB::raw("select c.*,u.user_type_id FROM caveats c 
                    JOIN user_caveats uc ON c.id = uc.caveat_id
                    JOIN users u ON u.email = uc.email 
                    WHERE c.id < $id
                    AND u.email='$email' 
                    ORDER BY c.id DESC LIMIT 1"));
        $next = DB::select(DB::raw("select c.*,u.user_type_id FROM caveats c 
                    JOIN user_caveats uc ON c.id = uc.caveat_id
                    JOIN users u ON u.email = uc.email 
                    WHERE c.id > $id
                    AND u.email='$email' 
                    ORDER BY c.id ASC LIMIT 1"));
        if (empty($caveats)) {
            return redirect('nocaveat');
        }


        if (empty($next)) {
            $nex = $id;
            $n = 'disabled';
        } else {
            $nex = $next[0]->id;
            $n = '';
        }
        if (empty($previous)) {
            $prev = $id;
            $p = 'disabled';
        } else {
            $prev = $previous[0]->id;
            $p = '';
        }

        if ($caveatinfo == '[]') {
            $m = 'disabled';
        } else {
            $m = '';
        }
          $this->setVisitorCount($id);
        return view('front.caveats.show')
                        ->with([
                            'caveats' => $caveats,
                            'cinfo' => $caveatinfo,
                            'prev' => $prev,
                            'next' => $nex,
                            'p' => $p,
                            'n' => $n,
                            'm' => $m,
                            'vcount'=>$this->getViewCount($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploads($id) {
      return view('front.caveats.uploads')->with(['id'=>$id]);
    }
    
        public function doUpload(Request $r) {
         $this->validate($r, [
           
            'document_uploads' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $caveats_path = $r->file('document_uploads')->store('caveats');
        $file = $r->file('document_uploads') ;
        $c = Caveats::find($r->cid);
        $image = explode('/',$caveats_path);
        $c->Document_Uploads = $image[1] ; 
        $c->save();
         return redirect('caveats')->with(['message'=>'Property Photo successfully Uploaded!']);
        }
        

    public function planview() {
        $plan = new Plans;
        $plans = $plan->getAllPlans();
        $email = Auth::user()->id;
        $subscription = DB::Select(DB::raw("SELECT s.*,p.* FROM subscriptions s JOIN plans p ON p.id = s.plan_id AND s.user_id ='$email' "));           
       
       return view('front.planview', ['plans1' => $subscription, 'plans' => $plans,'w'=>$subscription[0]->plan_id]);
    }

    public function getSubscription($id) {
        $email = Auth::user()->id;
        $subscription = DB::Select(DB::raw("SELECT s.*,p.* FROM subscriptions s JOIN plans p ON p.id = s.plan_id AND s.user_id ='$email' "));

        if (empty($subscription)) {
            return redirect('plans');
        } else {
            return view('front.caveats.myplan', ['plans' => $subscription, 'caveat' => $id]);
        }


        echo 'I am here to publish my friends' . $email;
    }
    
    function changeplan(Request $r){
        $plans = Subscriptions::where('user_id',Auth::user()->id);      
        $plans->update(['plan_id'=>$r->plan_id]);
        return redirect('caveats')->with('message','Successfully changed plan to '.$r->planner);
    }

    public function unpublish($id) {
        $Publish = Caveats::find($id);
        $Publish->Publish_status = '2';
        $Publish->save();

        return redirect('caveats/' . $id)->with('message', 'Your Caveat has been successfully un-published!');
    }

    public function republish($id) {
        $Publish = Caveats::find($id);
        $Publish->Publish_status = '1';
        $Publish->save();

        return redirect('caveats/' . $id)->with('message', 'Your Caveat has been successfully republished!');
    }
    
    function cedit($id){ 
      

        @$caveats = DB::select(DB::raw("SELECT c.*,u.name FROM caveats c JOIN user_caveats uc ON c.id = uc.caveat_id JOIN users u on u.email = uc.email WHERE c.id='$id'"));

   


        return view('front.caveats.edit')->with(['caveats' => @$caveats, 'caveat' => @$caveat]);
    
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

    public function confirmpublish(Request $r, $id) {

        $auth = Auth::user()->id;
        $plan_id = $r->plan_id;
        $new = (int) $r->current + 1;
        $caveat_id = $id;

        //DB::table('subscriptions')->where('plan_id', $plan_id)->where('user_id', $auth)->update(['current' => $new]);

        $Publish = Caveats::find($caveat_id);
        $Publish->Publish_status = '1';
        $Publish->save();

        return redirect('caveats/')->with('message', 'Your Caveat has been successfully published!');
    }

    public function publish($id) {
        //  Caveats::where('id', $id)->firstOrFail()->published();
        //  return redirect('caveats');
    }

    //Return json of caveats of loggen in client
    public function caveatsByClient(Request $request) {

        $caveats = $this->Caveats->getAll($request->user());
        return response()->json($caveats);
    }

}
