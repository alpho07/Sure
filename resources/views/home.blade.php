@extends('layouts.app')
<title>Dashboard</title>
@section('content')
    <style>
    .bg-aqua{
    background-color:#449D44;
    padding:10px;
    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
    }
    </style>   

<div class="container">
<h1>Dashboard</h1>
    @if(Session::has('flash_notification.message'))
          <div class="alert alert-info">
            {{session('flash_notification.message')}}
          </div>
        @endif @if(Session::has('message'))
          <div class="alert alert-info">
            {{session::get('message')}}
          </div>
        @endif
       
     <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-aqua card">
            <div class="inner">
              <h3>My Caveats</h3>
   <div class="pull-right">
              <i class="fa fa-file fa-inverse fa-4x"></i>
            </div>
              <p style="color:white;">{{$count}}</p>
            </div>
         
            <a href="{{url('caveats')}}" class="small-box-footer" style="color:white;">View  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
               
            </div>
            
                 <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-aqua card">
            <div class="inner">
              <h3>My Account</h3>
               <div class="pull-right">
              <i class="fa fa-user fa-inverse fa-4x"></i>
            </div>
              <p style="color:white;">Profile Update</p>
              
            </div>
           
            <a href="{{url('/profile')}}" class="small-box-footer" style="color:white;">View  <i class="fa fa-arrow-circle-right"></i></a> |
            <a href="{{url('/myusers')}}" class="small-box-footer" style="color:white;">My Users <i class="fa fa-users"></i></a>
          </div>
               
            </div>

            @if(empty($plan))
            
        <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-aqua card">
            <div class="inner">
              <h3>No Subscription</h3>
                     <div class="pull-right">
              <i class="fa fa-briefcase fa-inverse fa-4x"></i>
            </div>
              <a href="{{url('plans2').'/'.$count}}" class="small-box-footer btn btn-sm btn-primary" style="color:white;">Subscribe Now!</a>
            </div>
           
              <a href="#" class="small-box-footer" style="color:white;">&nbsp;</a>
          </div>
               
            </div>
    @else
             <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-aqua card">
            <div class="inner">
              <h3>{{ucfirst($plan[0]->Alias)}} Plan</h3>
                     <div class="pull-right">
              <i class="fa fa-briefcase fa-inverse fa-4x"></i>
            </div>
            @if($plan[0]->Notices > '75')
            {{$plan[0]->current}}/&#x221e;
            @else
              <p style="color:white;">{{$plan[0]->current.'/'.$plan[0]->Notices}} Caveats</p>
              @endif
            </div>
           
            <a href="{{url('planview')}}" class="small-box-footer" style="color:white;">Change Plan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
               
            </div>

        @endif
             <div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-aqua card">
            <div class="inner">
              <h3>Finance</h3>
                     <div class="pull-right">
              <i class="fa fa-money fa-inverse fa-4x"></i>
            </div>
              <p style="color:white;">Payments </p>
            </div>
           
            <a href="#" class="small-box-footer" style="color:white;">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
               
            </div>
      
</div>
{{ session()->forget('flash_notification.message')}}
@endsection
