@extends('layouts.dashboard')
<title>Caveat Publisher</title>
@section('content')
  <style>
        .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}

 .card1{
        padding: 30px;
        font-size: 16px;
    } 
    .ribbon-wrapper-green {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: -3px;
  right: -3px;
}

.ribbon-green {
  font: bold 15px Sans-Serif;
  color: #333;
  text-align: center;
  text-shadow: rgba(255,255,255,0.5) 0px 1px 0px;
  -webkit-transform: rotate(45deg);
  -moz-transform:    rotate(45deg);
  -ms-transform:     rotate(45deg);
  -o-transform:      rotate(45deg);
  position: relative;
  padding: 7px 0;
  left: -5px;
  top: 15px;
  width: 120px;
  background-color: #074104;;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#BFDC7A), to(#8EBF45)); 
  background-image: -webkit-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:    -moz-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:     -ms-linear-gradient(top, #BFDC7A, #8EBF45); 
  background-image:      -o-linear-gradient(top, #BFDC7A, #8EBF45); 
  color: #6a6340;
  -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
  -moz-box-shadow:    0px 0px 3px rgba(0,0,0,0.3);
  box-shadow:         0px 0px 3px rgba(0,0,0,0.3);
}

.ribbon-green:before, .ribbon-green:after {
  content: "";
  border-top:   3px solid #074104;   
  border-left:  3px solid transparent;
  border-right: 3px solid transparent;
  position:absolute;
  bottom: -3px;
}

.ribbon-green:before {
  left: 0;
}
.ribbon-green:after {
  right: 0;
}​
    </style>
<div class = "container">
    <div class = "row">
        <div class="offset-md-2 col-md-8 ">
    	        @if(Session::has('message'))
		            <div class="alert alert-success">
		            	{{session('message')}}
		            </div>
	            @endif
       
                    <a href="{{url('caveats')}}" class="btn btn-primary left" style="margin:10px;"><i class="fa fa-arrow-left"></i> All My Caveats</a>

            
	        <div class="card-block">
                      
	      	        				
            <div class=" col-md-12 ">
               
            <div class = "card1 card">
                   <div class="ribbon-wrapper-green"><div class="ribbon-green">VERIFIED</div></div>  
                <h4 class = "card-header">CAVEAT EMPTOR/ BUYER BEWARE</h4>
                <div class="row">
                    <div class="col-md-12">
                        <center><p style="margin:20px; font-weight: bolder; text-decoration: underline;">KENYA: PUBLIC NOTICE</p></center>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <center><p style="margin:10px; font-weight: bold; text-decoration: underline;" id="NUMBER1"><span id="PLC">{{$caveats[0]->Caveat_Ref}}</span>/<span id="NO1">{{$caveats[0]->LR_No}}}</span>/<span id="NO2">{{$caveats[0]->LRNo_Block}}</span>/<span id="NO3">{{$caveats[0]->IR_IC_Nos}}</span></p></center> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that property Number <span id="NUMBER"><span id="PLC">{{$caveats[0]->Caveat_Ref}}</span>/<span id="NO1">{{$caveats[0]->LR_No}}</span>/<span id="NO2">{{$caveats[0]->LRNo_Block}}/<span id="NO3">{{$caveats[0]->IR_IC_Nos}}</span> and other developments thereof is vested in the name of <span id="owner"><strong>{{$caveats[0]->name }}</strong></span>.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p>The property lies within <span id="AREA">{{$caveats[0]->Area}} </span> in <span id="TOWN">{{$caveats[0]->Town}} town</span> in the county of <span id="COUNTY">{{$caveats[0]->County}}</span>.  It is situated along <span id="ROAD">{{$caveats[0]->Road}} road</span>  adjacent to <span id="LANDMARK">{{$caveats[0]->Landmark}}</span>(building, landmark, school or river).<p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that any purported allotment, buying, selling, letting, leasing, charging subdivisions construction upon or dealings on the said parcel of land in any
                                other manner <strong>HOWSOEVER</strong> without <span id="OWNER2">{{$caveats[0]->name }}</span> is unlawful, illegal, fraudulent and further amounts to trespass.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE FURTHER NOTICE</strong> that any person(s) interfering with the said parcel of land as aforesaid stands to lose his/her money ask <span id="OWNER3">{{$caveats[0]->name }}</span> 
                                will neither honor nor agreements, contracts entered into into with the person(s) purporting to have authority to transact the parcel of land whether in the manner described above or in any manner <strong>WHATSOEVER</strong> nor will it re-imburse 
                                any monies paid in respect to such transactions. 
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>AND TAKE FURTHER NOTICE</strong> that any person(s) interfering with the said parcel of land as aforesaid risks both criminal and civil action by this Authority.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>DATED</strong> at <span id="PLACE">{{$caveats[0]->Town}}</span> this <span id="DATE">{{$caveats[0]->Caveat_Date}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="RBY"><strong>{{$caveats[0]->name}}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                      
                            @if($caveats[0]->Publish_status == 0)      
	        	    <a href="{{url('myplan').'/'.$caveats[0]->id}}" class="btn btn-primary left">Publish Caveat</a>
                            @elseif($caveats[0]->Publish_status == 1)  
                           <a href="{{url('unpublish').'/'.$caveats[0]->id}}" class="btn btn-warning left">Un-Publish</a>
                            @elseif($caveats[0]->Publish_status == 2)  
                           <a href="{{url('republish').'/'.$caveats[0]->id}}" class="btn btn-warning left">Re-Publish</a>
                           @endif

                         <div class="pull-right">
                        <a class="btn btn-primary pull-left {{$p}}"  href="{{url('caveats').'/'.$prev}}" style="margin:10px;"><i class="fa fa-arrow-left"></i> Previous</a> 
                        <a class="btn btn-primary pull-right {{$n}}" href="{{url('caveats').'/'.$next}}" style="margin:10px;">Next <i class="fa fa-arrow-right"></i></a>
                    </div>
	        </div>
            
            
                 
     
    </div>
</div>
</div>
@endsection