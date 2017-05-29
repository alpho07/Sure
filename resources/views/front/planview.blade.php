@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
      <h3>Upgrade/Change Plan</h3><br>
        @if(Session::has('message'))
          <div class="alert alert-info">
            {{session('message')}}
          </div>
        @endif

      <div class="card-deck-wrapper">
        <div class="card-deck">
           
        @foreach($plans as $plan)
              <div class="card  ce--plan-{{$plan['Alias']}} - ">
               <form role="form" method="POST" action="{{ url('/changeplan/') }}">
                <input type="hidden" name="plan_id" value="{{$plan['id']}}" >
                <input type="hidden" name="notices" value="{{$plan['Notices']}}" >
                <input type="hidden" name="trial_period" value="{{$plan['trial_period']}}" >
                  <div class="card-header">
                      <input type="hidden" name="planner" value={{$plan['Plan_Name']}}/>
                      @if( $plan['Notices'] > 75)
                       <h3 class="card-title">{{$plan['Plan_Name']}} </h3>
                    <h5 class="card-title">Unlimited Notices</h5>
                     <p class="card-text">
                     Price Negotiable <br>
                     &nbsp;
                     
                    </p>
                    @else
                     <h3 class="card-title">{{$plan['Plan_Name']}} </h3>
                        <h5 class="card-title">{{$plan['Notices']}} Notices</h5>
                         <p class="card-text">
                      KShs. {{$plan['Monthly_Rate']}} monthly <br> KShs. {{$plan['Annual_Rate']}} annually
                    </p>
                    @endif
                   
                  </div>
                  @if($plan['id']==1)
                   
                        <ul class="list-group list-group-flush text-xs-center">
         <li class="list-group-item">{{$plan['Plan_Details']}}</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload 1 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
        
            </ul>
                  
                  @elseif($plan['id']==2)
                   
                  
                                   <ul class="list-group list-group-flush text-xs-center">
                                
         <li class="list-group-item">{{$plan['Plan_Details']}}</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload 1 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
        
            </ul>
                  
                  
                  @elseif($plan['id']==3)
                  
                  
                  
                                   <ul class="list-group list-group-flush text-xs-center">
                                    
         <li class="list-group-item">{{$plan['Plan_Details']}}</li>
              <li class="list-group-item">Contains verified caveats</li>
              <li class="list-group-item">Can upload 3 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
        
            </ul>
                @elseif($plan['id']==4)
                    
                                   <ul class="list-group list-group-flush text-xs-center">
                                
         <li class="list-group-item">{{$plan['Plan_Details']}}</li>
              <li class="list-group-item">Contains verified caveats</li>
              <li class="list-group-item">Can upload 10 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
        
            </ul>
                  
                  @endif
                  
                 
                  <div class="card-block text-xs-center">
                      @if($plan['id']==$w)  
                    <button type="button" class="btn btn-success text-uppercase disabled" > Current Plan</a></button>
                    @else 
                    
                     @if($plans1[0]->current >= $plan['Notices'] )  
                    <button type="button" class="btn btn-danger text-uppercase disabled"  > PLAN NOT APPLICABLE </a></button>
                    @elseif($plans1[0]->current < $plan['Notices'] && $plan['Notices'] < '75')
                     <button type="submit" class="btn btn-primary text-uppercase"  >  SELECT </a></button>
                     @elseif($plan['Notices'] > '75')
                     <a href="{{url('contacts')}}" class="btn btn-primary text-uppercase "  >  Contact Us </a>
                     @else
                     <button type="submit" class="btn btn-primary text-uppercase UPDATE" > Select </a></button>
                    @endif
                    @endif
                  </div>
                </form>
              </div>
        @endforeach
    
        </div>
      </div>
    </div>
  </main>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script>
$(document).ready(function(){
$('div:contains("CURRENT PLAN")').prev('div.UPDATE').hide();
});

</script>