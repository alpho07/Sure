<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
      "http://www.w3.org/TR/html4/loose.dtd">
   <html>
    <head>
  
       <title></title>
  <style>
  .main_row{
  border-radius: 3px;
  -moz-border-radius: 3px;
  border:1px solid black;
  padding:8px;
  width:97%;
  }
  
  .ribbon{
  background:red;
  color:white;
  padding:3px;
  font-weight:bolder;
  width:60px;
  border-radius:2px;
  }
  </style>
     </head>
   <body>

<div class="main_row col-md-12 ">
    @if($caveats[0]->user_type_id == '4')
    <div class="ribbon"><span>VERIFIED</span>
    </div>
    @else

    @endif
    <div class = "card1 card pull-left">
    <div class="row" style="text-align:center; background:#f5f5f5; border-bottom:1px solid gray;">
        <h4 class = "card-header"><strong>CAVEAT EMPTOR/ BUYER BEWARE</strong></h4>
        </div>
        
        <div class="row">
          <div class="col-md-12" style="text-align:center;">
                <p style="margin:20px; font-weight: bolder; text-decoration: underline;"><strong>KENYA: PUBLIC NOTICE</strong></p>
                <hr>
            </div>
        </div>
        
         <div class="row" >
                <div class="col-md-12" style="text-align:center;">

                    <p style="margin:10px; font-weight: bolder; text-decoration: underline;" id="NUMBER1"><strong>{{strtoupper($caveats[0]->Town)}}</strong></p>
                </div>
                 <hr>
            </div>
            
                <div class="row">
                        <div class="col-md-12" style="background:#000000; color:white; text-align:center; height:40px;">
                            <p style="margin:10px; font-weight: bolder;" id="NUMBER1">{{$caveats[0]->LR_No}}/{{$caveats[0]->IR_IC_Nos}}</p> 
                        </div>
                    </div>
            
              <div class="row">
                        <div class="col-md-12" ">
                            <p><strong>TAKE NOTICE</strong> that property Number <span id="NUMBER" style="font-weight:bolder;"><strong>{{$caveats[0]->LR_No}}/{{$caveats[0]->IR_IC_Nos}}</strong></span> and other developments thereof is vested in the name of <span id="owner"><strong>{{$caveats[0]->name}}</strong></span>.</p>
                        </div>
                    </div>
                    
                       <div class="row">
                        <div class="col-md-12">
                            <p>The property lies within {{$caveats[0]->Area}} in {{$caveats[0]->Town}} town in the county of {{$caveats[0]->County}}.  It is situated along {{$caveats[0]->Road}} road  adjacent to {{$caveats[0]->Landmark}}.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{@$caveats[0]->description}}</p>
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
                            <p><strong>DATED</strong> at <span id="PLACE " style="font-weight: bolder;">{{$caveats[0]->Town}}</span> this <span id="DATE"  style="font-weight: bolder;"><strong>{{$caveats[0]->Caveat_Date}}</strong></span>
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
<hr>
<small><em>Caveat Generated and verified by Hakikisha Caveats Ltd.  Date Generated: <?php echo date('d-m-Y');?></em></small>                     
</body>
</html>
