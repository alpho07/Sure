<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\User;
use Auth;
use Mail;
use App\Company;

class CompanyController extends Controller
{

    //Company Home
    public function index()
    {
        $company = Company::all()->toArray();
        return view('front.company.index', compact('company'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }







    
        public function sureplans()
    {
        return view('pricing');
    }
    
    function sendEmail(Request $r, \Illuminate\Mail\Mailer $mailer, $id) {
        $mailer->to('hakikishacaveats@gmail.com')
                ->cc($r->owneremail)
                ->send(
                new \App\Mail\CaveatEnquiry($r->caveat, $r->name, $r->email, $r->phone, $r->bodyMessage,$r->cavid)
        );
        $email = $r->email;
             Mail::send('emails.thankful', ['cavid' => $r->cavid,'messagebody'=>$r->caveat], function ($m) use ($email) {
            $m->from('hakikishacaveats@gmail.com', 'SURE Team');

            $m->to($email)->subject('SURE Appreciation');
        });
        
        $user = User::where('email', '=', $r->email)->first();
    if ($user === null) {
            User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt('123456'),
            'p_status' => 0
        ]);
        
        Auth::attempt(['email'=>$r->email,'password'=>'123456']);
         return redirect('display/' . $id)->with('message', 'Welcome '.$r->name.', You now have an account with Hakikisha and we have received your message and will get back to you promptly with a feedback');
        
     }else{
        return redirect('display/' . $id)->with('message', 'We have received your message and will get back to you promptly with a feedback');
        }
    }
    
    
     function sendEmail1(Request $r, \Illuminate\Mail\Mailer $mailer) {
     $email = $r->email;
        $mailer->to('hakikishacaveats@gmail.com')
                ->cc('thecapitaledge@gmail.com')
                ->bcc($r->email)->send(
                new \App\Mail\CaveatEnquiry($r->caveat, $r->name, $r->email, $r->phone, $r->bodyMessage,$r->cavid)
        );
        
            Mail::send('emails.thankful', ['cavid' => $r->cavid,'messagebody'=>$r->caveat], function ($m) use ($email) {
            $m->from('hakikishacaveats@gmail.com', 'SURE Team');

            $m->to($email)->subject('SURE Appreciation');
        });
        
        
        $user = User::where('email', '=', $r->email)->first();
    if ($user === null) {
            User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt('123456'),
            'p_status' => 0
        ]);
        
        Auth::attempt(['email'=>$r->email,'password'=>'123456']);
         return redirect('contacts')->with('message', 'Welcome '.$r->name.', You now have an account with Hakikisha and we have received your message and will get back to you promptly with a feedback');
        
     }else{
        return redirect('contacts')->with('message', 'We have received your message and will get back to you promptly with a feedback');
        }
    }

}
