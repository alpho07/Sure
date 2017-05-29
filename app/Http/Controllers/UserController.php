<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use DB;

use App\User;

use App\User_types;

use Session;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dashboard
    }
    
    
       public function myusers()
    {
       $id = Auth::user()->id;
        $data  = User::where('parent',$id)->get();  
        $type = User_types::all();
      
        return view('front.musers')->with(['users'=>$data,'types'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
       $parent = Auth::user()->id;
       
       $u = new User;
       $u->name=$r->username;
        $u->parent=$parent;
         $u->email=$r->email; 
          $u->role_id=1; 
           $u->user_type_id=$r->usertype;  
           $u->password=bcrypt('123456'); 
            $u->p_status=1;
             $u->confirmed=1;
             $u->confirmation_token='NULL';
             $u->remember_token='NULL';
             
             $u->save();
              $id = Auth::user()->id;
              $data  = User::where('parent',$id)->get();  
        $type = User_types::all();
        
        return redirect('myusers')->with(['users'=>$data,'types'=>$type,'infomessage'=>'User Successfully Added']);
    }
    
    function check(Request $r){
    if(User::where('email', '=', $r->email)->exists()){
    //$r->session()->set('uemail', $r->email);
    echo '1';
    }else{
    echo '0';
    }
    
    
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
    public function show()
    {
        
        $id = Auth::user()->id;
        $data  = User::where('id',$id)->get();  
        $type = User_types::all();
        return view('front.user')->with(['data'=>$data,'types'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r)
    {
     $id = Auth::user()->id;
     
     $u = User::find($id);
     $u->name = $r->name;
     $u->email = $r->email;     
     $u->user_type_id = $r->user_type_id;
     $u->save();
     
     return redirect('profile')->with('message','Profile Information updated successfully');
    }
    public function editpass(Request $r)
    {
     $id = Auth::user()->id;
     
     $u = User::find($id);   
     $u->password=  Hash::make($r->newpass);
     $u->p_status =  '1';
     $u->save();
     
     return redirect('profile')->with('message','Password successfully updated!');
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
}
