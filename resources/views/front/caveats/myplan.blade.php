@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
       <a href="{{url('home')}}" class="btn btn-primary pull-left" style="margin:10px;" ><i class="fa fa-dashboard"></i> Dashboard</a>  <center><h3>My Current Plan</h3></center><br>
        @if(Session::has('message'))
          <div class="alert alert-info">
            {{session('message')}}
          </div>
        @endif
      <div class="card-deck-wrapper">
        <div class="card-deck">
        
              <div class="card ce--plan-{{$plans[0]->Alias}}">
               <form role="form" method="POST" action="{{ url('confirmpublish'.'/'.$caveat) }}">
                <input type="hidden" name="plan_id" value="{{$plans[0]->id}}" >
                <input type="hidden" name="notices" value="{{$plans[0]->Notices}}" >
                <input type="hidden" name="current" value="{{$plans[0]->current}}" >
                <input type="hidden" name="trial_period" value="{{$plans[0]->trial_period}}" >
                  <div class="card-header">
                      <h3 class="card-title">{{$plans[0]->Plan_Name}}</h3>
                    <h5 class="card-title">{{$plans[0]->current.'/'.$plans[0]->Notices}} Notices</h5>
                    <p class="card-text">
                      KShs. {{$plans[0]->Monthly_Rate}} monthly <br> KShs. {{$plans[0]->Annual_Rate}} annually
                    </p>
                  </div>
                  <ul class="list-group list-group-flush text-xs-center">
                    <li class="list-group-item">{{$plans[0]->Plan_Details}}</li>            
                  
                  </ul>
                  <div class="card-block text-xs-center">
                  @if(count($plans) < $plans[0]->Notices)
                          <button type="submit" class="btn btn-primary text-uppercase">Continue<i class="fa fa-arrow-right"></i></button>
                  @elseif(count($plans) >= $plans[0]->Notices)                  
                  <a href="{{url('planview')}}"  class="btn btn-danger text-uppercase"><i class="fa fa-arrow-up"></i> Upgrade Plan To Continue</a>
                  @endif
                
                  </div>
                </form>
              </div>
       
    
        </div>
      </div>
    </div>
  </main>
@endsection