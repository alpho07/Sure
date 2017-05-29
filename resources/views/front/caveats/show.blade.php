@extends('layouts.app')
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
  
    
    .ribbon {
  position: absolute;
  left: 10px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 80px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #8F0808 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #8F0808;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #8F0808;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
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

            <a href="{{url('caveats')}}" class="btn btn-primary left" style="margin:10px;"><i class="fa fa-arrow-left"></i> All My Caveats</a>


            <div class="card-block">


                <div class=" col-md-12 ">
    @if($caveats[0]->user_type_id == '4')
                        <div class="ribbon"><span>VERIFIED</span></div>
                        @else
                        
                        @endif
                    <div class = "card1 card">
                        
                        <h4 class = "card-header">CAVEAT EMPTOR/ BUYER BEWARE   </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <center><p style="margin:20px; font-weight: bolder; text-decoration: underline;">KENYA: PUBLIC NOTICE</p></center>
                                <hr>
                            </div>
                            <div class="row">
                            
                               <div class="col-md-12">
                                    <center><p style="margin:10px; font-weight: bold; text-decoration: underline;" id="NUMBER1"><span id="PLC">{{$caveats[0]->Town}}</span></p></center> 
                                </div>
                            
                                <div class="col-md-12" style="background: black; width:98%; margin:3px; color:white;font-weight: bold;">
                                    <center><p style="margin:10px; font-weight: bold; text-decoration: underline;" id="NUMBER1"><span id="NO1">{{$caveats[0]->LR_No.$caveats[0]->IR_IC_Nos}}</span></p></center> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>TAKE NOTICE</strong> that property Number <span id="NUMBER"><span id="NO1">{{$caveats[0]->LR_No.$caveats[0]->IR_IC_Nos}}</span> and other developments thereof is vested in the name of <span id="owner"><strong>{{$caveats[0]->name }}</strong></span>.</p>
                                                </div>
                                                </div>
                                                 <div class="row">
                                        <div class="col-md-12">
                                            <p>{{@$caveats[0]->Description}}. It is {{@$caveats[0]->Size}} Hectares<p>
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


                                                {{--@if($caveats[0]->Publish_status == '0')      
                                                <a href="#additional-info" data-toggle="modal" data-target="#myModal2" class="btn btn-primary left">Publish Caveat</a>
                                                @elseif($caveats[0]->Publish_status == '1')  
                                                <a href="{{url('unpublish').'/'.$caveats[0]->id}}" class="btn btn-warning left">Un-Publish</a>
                                                @elseif($caveats[0]->Publish_status == '2')  
                                                <a href="{{url('republish').'/'.$caveats[0]->id}}" class="btn btn-warning left">Re-Publish</a>
                                                @endif--}}
                                                <a href="#CaveatMoreInfo"  data-toggle="modal" data-target="#myModal" class="btn btn-warning {{$m}}">More Info</a>
                                                 <span class="btn btn-info"><i class="fa fa-eye"></i> {{$vcount.str_plural('View',$vcount)}}</span>
                                                <div class="pull-right">
                                                    <a class="btn btn-primary pull-left {{$p}}"  href="{{url('caveats').'/'.$prev}}" style="margin:10px;"><i class="fa fa-arrow-left"></i> Previous</a> 
                                                <a class="btn btn-primary pull-right {{$n}}" href="{{url('caveats').'/'.$next}}" style="margin:10px;">Next <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                                </div>

                                                <!-- Modal -->
                                                <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title" style="margin:10px; font-weight: bold; text-decoration: underline;">Caveat: {{$caveats[0]->Caveat_Ref}}/{{$caveats[0]->LR_No}}/{{$caveats[0]->LRNo_Block}}/{{$caveats[0]->IR_IC_Nos}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-striped">
                                                                    <tr>

                                                                        <td colspan="2" style="font-weight:bolder;">MORE CAVEAT DETAILS</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Receipt Date</th>
                                                                        <td>{{@$cinfo[0]->Receipt_date}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lands Office</th>
                                                                        <td>{{@$cinfo[0]->Lands_office}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Affidavit Sign Date</th>
                                                                        <td>{{@$cinfo[0]->Affidavit_date}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lawyer Present</th>
                                                                        <td>{{@$cinfo[0]->Present_lawyer}}</td>
                                                                    </tr>

                                                                    <tr>

                                                                        <td colspan="2" style="font-weight:bolder;">LAWYER'S DETAILS</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Practising Certificate No.</th>
                                                                        <td>{{@$cinfo[0]->PcertNo}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Physical Address</th>
                                                                        <td>{{@$cinfo[0]->Address}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Email Address</th>
                                                                        <td>{{@$cinfo[0]->Email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Mobile Number</th>
                                                                        <td>{{@$cinfo[0]->Mobile}}</td>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>  
                                                <div id="myModal2" class="modal fade " role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">More Caveat Info</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row col-md-12">
                                                                    <form class="form-horizontal col-md-8 col-md-offset-2" method="POST" action='{{url('moreinfo')}}'enctype="multipart/form-data" >
                                                                        <input name="cid" class="form-control" value='' type="hidden" id="cid" />
                                                                        {{csrf_field()}}

                                                                        <p><strong><u>CAVEAT PLACEMENT INFORMATION</u></strong></p>
                                                                        <div class="form-group row ">
                                                                            <div class="col-10">
                                                                                <input name="date_receipt" class="form-control" type="text"required id="date_receipt" placeholder="Date of receipt" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <label>Upload Receipt</label>
                                                                                <input class="form-control" name='rupload' type="file" required id="example-search-input"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" name="lands" type="text" id="lands" placeholder="Lodged at which lands office?" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="text" placeholder="Date Affidaavit signed" id="daffsigned" name="daffsigned" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="text" placeholder="Present Lawyer" name="plawyer" id="plawyer" required/>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <p><strong><u>LAWYER DETAILS</u></strong></p>
                                                                        <hr>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="text" placeholder="Practising Certificate No." id="lsat" name="lsat" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="text" placeholder="Lawyer's Physical Address" id="ladress" name="ladress" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="email" placeholder="Lawyer's Email address" id="lemail" name='lemail' required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-10">
                                                                                <input class="form-control" type="tel" placeholder="Lawyer's Phone No." name='ltel' id="ltel" required/>
                                                                            </div>
                                                                        </div>                       

                                                                        <input class="form-control btn btn-primary col-md-10" type="submit" value='Submit'  >


                                                                    </form>

                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                                </div>
                                                </div>
                                                @endsection