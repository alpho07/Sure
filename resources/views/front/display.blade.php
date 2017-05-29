@extends('layouts.dashboard')
<title>Caveats</title>
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
    
    a.disabled {
   pointer-events: none;
   cursor: default;
}
    </style>

<div class = "container">
    <div class = "row">
        <div class="offset-md-2 col-md-8 ">
    	        @if(Session::has('message'))
		            <div class="alert alert-success">
		            	{{session('message')}}
		            </div>
	            @endif
  
            
            <a class="btn btn-primary pull-left" href="{{url('/')}}" style="margin:10px;"><i class="fa fa-arrow-left"></i> Back<a> 
	        <div class="card-block">
                   
	      	        				
            <div class=" col-md-12 ">
            <div class = "card1 card">
                <h4 class = "card-header">CAVEAT EMPTOR/ BUYER BEWARE</h4>
                <div class="row">
                    <div class="col-md-12">
                        <center><p style="margin:20px; font-weight: bolder; text-decoration: underline;">KENYA: PUBLIC NOTICE</p></center>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <center><p style="margin:10px; font-weight: bolder; text-decoration: underline;" id="NUMBER1">{{$caveats[0]->Caveat_Ref}}/{{$caveats[0]->LR_No}}/{{$caveats[0]->LRNo_Block}}/{{$caveats[0]->IR_IC_Nos}}</p></center> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that property Number <span id="NUMBER" style="font-weight:bolder;">{{$caveats[0]->Caveat_Ref}}/{{$caveats[0]->LR_No}}/{{$caveats[0]->LRNo_Block}}/{{$caveats[0]->IR_IC_Nos}}</span> and other developments thereof is vested in the name of <span id="owner"><strong>{{$caveats[0]->name}}</strong></strong></span>.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p>The property lies within <span id="AREA">{{$caveats[0]->Area}} </span> in <span id="TOWN">{{$caveats[0]->Town}} town</span> in the county of <span id="COUNTY">{{$caveats[0]->County}}</span>.  It is situated along <span id="ROAD">{{$caveats[0]->Road}} road</span>  adjacent to <span id="LANDMARK">{{$caveats[0]->Landmark}}</span>(building, landmark, school or river).<p>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col-md-12">
                            <p>{{@$caveats[0]->description}}<p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that any purported allotment, buying, selling, letting, leasing, charging subdivisions construction upon or dealings on the said parcel of land in any
                                other manner <strong>HOWSOEVER</strong> without <span id="OWNER2"><strong>{{strtoupper($caveats[0]->name)}}</strong></span> is unlawful, illegal, fraudulent and further amounts to trespass.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE FURTHER NOTICE</strong> that any person(s) interfering with the said parcel of land as aforesaid stands to lose his/her money ask <span id="OWNER3"  style="font-weight: bolder;">{{strtoupper($caveats[0]->name)}}</span> 
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
                            <p><strong>DATED</strong> at <span id="PLACE " style="font-weight: bolder;">{{$caveats[0]->Town}}</span> this <span id="DATE"  style="font-weight: bolder;">{{$caveats[0]->Caveat_Date}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="RBY"><strong>{{strtoupper($caveats[0]->name)}}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                      
                            
                            
	        		
	        		
	        
	        </div>
                    <div class="pull-left">
                        <a class="btn btn-primary pull-left {{$p}}"  href="{{url('display').'/'.$prev}}" style="margin:10px;"><i class="fa fa-arrow-left"></i> Previous</a> 
                        <a class="btn btn-primary pull-right {{$n}}" href="{{url('display').'/'.$next}}" style="margin:10px;">Next <i class="fa fa-arrow-right"></i></a>
                    </div>
                 
                 <a class="btn btn-primary pull-right" href="#" id="moreinfo">More Info</a>
            
            
                 
    
    </div>
</div>
</div>
@endsection

<script>
$(document).ready(function(){
   $('#moreinfo').click(function(){
       alert('This functionality will be Operational soon..');
   }) 
});
</script>