@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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

    body .modal {
        /* new custom width */
        width: 800px;
        padding: 10px;
        /* must be half of the width, minus scrollbar on the left (30px) */

    }

    .modal-body{
        padding: 20px;
    }
    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>


<div class = "container">
    <a href="{{url('home')}}" class="btn btn-lg  primary"><i class="fa fa-backwards"></i> My Dashboard</a>
       @if(Session::has('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
    @endif
    <div class = "row">

        <div class=" col-md-5 ">
            <div class = "card">
                <h4 class = "card-header">Edit Caveat</h4>

                <div class="card-block">
                    {!!Form::model($caveat, ['action'=>'CaveatsController@storeedit', 'class'=>'form_horizontal form22', 'role'=>'form', 'enctype'=>'multipart/form-data'])!!}<input type="hidden" value="{{$caveats[0]->id}}" name="cavid"/>
                    @if(!Auth::check())
                    <fieldset class="form-group">
                    
                        <legend>Personal Details</legend>
                        <div class="form-group{{ $errors->has('caveat_date') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control A" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caveat_ref') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control A" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    @endif
                    <fieldset class = "form-group">
                        <legend>Caveat Details</legend>
                        <div class="form-group{{ $errors->has('caveat_date') ? ' has-error' : '' }} row">
                            <label for="caveat_date" class="col-md-4 col-form-label">Caveat Date</label>

                            <div class="col-md-6">
                                <input id="caveat_date" type="text" class="form-control A" name="caveat_date" value="{{ $caveats[0]->Caveat_Date }}" required readonly>

                                @if ($errors->has('caveat_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('caveat_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--div class="form-group{{ $errors->has('caveat_ref') ? ' has-error' : '' }} row">
                            <label for="caveat_ref" class="col-md-4 col-form-label">Caveat Ref</label>

                            <div class="col-md-6">
                                <input id="caveat_ref" type="text" class="form-control A" name="caveat_ref" value="{{ $caveats[0]->Town }}" required placeholder="NRB or MSA or NKR">
                                <span><small>Abbreviation of town</small></span>
                                @if ($errors->has('lr_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('caveat_ref') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div-->
                          <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }} row">
                            <label for="town" class="col-md-4 col-form-label">Town</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control A" name="town" value="{{ $caveats[0]->Town }}" required placeholder="Nairobi West Center" data-toggle="tooltip" data-placement="top" title="The town next to or where the property is">

                                @if ($errors->has('lr_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('town') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label">Add Your Own Paragraph</label>   
                            <div class="col-md-6">
                                <textarea id="description" type="date" class="form-control" name="description" data-toggle="tooltip" data-placement="top" title="Any more information of your own to add to the caveat, leave blank if unavailable">{{ $caveats[0]->Description }}</textarea>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="enquiry_details" class="col-md-4 col-form-label">Enquiry Details</label>

                            <div class="col-md-6">
                                <textarea id="enquiry_details" type="text" class="form-control" name="enquiry_details" value="{{ old('enquiry_details') }}" data-toggle="tooltip" data-placement="top" title="Optional" >{{ $caveats[0]->Enquiry_Details }}</textarea>


                            </div>
                        </div>
                    </fieldset>
                    <fieldset class = "form-group" >
                        <legend>Property Details</legend>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                            <label for="lr_no" class="col-md-4 col-form-label">LR No.</label>

                            <div class="col-md-6">
                                <input id="lr_no" type="text" class="form-control A" name="lr_no" value="{{ $caveats[0]->LR_No }}" required data-toggle="tooltip" data-placement="top" title="Land Registration Number">

                                @if ($errors->has('lr_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lr_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                            <label for="lr_no" class="col-md-4 col-form-label">LR No. Block</label>

                            <div class="col-md-6">
                                <input id="lrno_block" type="text" class="form-control A" name="lrno_block" value="{{ old('lr_no') }}" required>

                                @if ($errors->has('lrno_block'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lrno_block') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div-->
                        <div class="form-group{{ $errors->has('enquiry_details') ? ' has-error' : '' }} row">
                            <label for="enquiry_details" class="col-md-4 col-form-label">IR IC Nos</label>

                            <div class="col-md-6">
                                <input id="ir_ic_nos" type="text" class="form-control A" name="ir_ic_nos" value="{{ $caveats[0]->IR_IC_Nos }}" data-toggle="tooltip" required data-placement="top" title="IRC">

                                @if ($errors->has('ir_ic_nos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ir_ic_nos') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }} row">
                            <label for="county" class="col-md-4 col-form-label">County</label>

                            <div class="col-md-6">
                                <select id="county" type="text" class="form-control A"  name="county" value="{{ old('area') }}" required data-toggle="tooltip" data-placement="top" title="The county where the property is">
                                <option value="{{ $caveats[0]->County }}">{{ $caveats[0]->County }}</option>
                                    <option value="">--Select Other--</option>
                                    <option value="Baringo" >Baringo </option>
                                    <option value="Bomet" >Bomet</option>
                                    <option value="Bungoma">Bungoma</option>
                                    <option value="Busia">Busia </option>
                                    <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
                                    <option value="Embu">Embu </option>
                                    <option value="Garissa">Garissa </option>
                                    <option value="Homa Bay">Homa Bay</option>
                                    <option value="Isiolo">Isiolo </option>
                                    <option value="Kajiado ">Kajiado </option>
                                    <option value="Kakamega">Kakamega </option>
                                    <option value="Kericho">Kericho </option>
                                    <option value="Kiambu">Kiambu </option>
                                    <option value="Kilifi">Kilifi </option>
                                    <option value="Kirinyaga">Kirinyaga </option>
                                    <option value="Kisii">Kisii </option>
                                    <option value="Kisumu">Kisumu </option>
                                    <option value="Kitui">Kitui </option>
                                    <option value="Kwale">Kwale </option>
                                    <option value="Laikipia">Laikipia </option>
                                    <option value="Lamu">Lamu </option>
                                    <option value="Machakos">Machakos </option>
                                    <option value="Mandera">Mandera     </option>
                                    <option value="Meru">Meru </option>
                                    <option value="Migori">Migori </option>
                                    <option value="Marsabit">Marsabit  </option>
                                    <option value="Mombasa">Mombasa  </option>
                                    <option value="Muranga">Muranga  </option>
                                    <option value="Makueni">Makueni  </option>
                                    <option value="Nairobi">Nairobi  </option>
                                    <option value="Nakuru">Nakuru  </option>
                                    <option value="Nandi">Nandi  </option>
                                    <option value="Narok">Narok  </option>
                                    <option value="Nyamira">Nyamira  </option>
                                    <option value="Nyandarua">Nyandarua  </option>
                                    <option value="Nyeri">Nyeri   </option>
                                    <option value="Samburu">Samburu   </option>
                                    <option value="Siaya">Siaya   </option>
                                    <option value="Taita Taveta">Taita Taveta  </option>
                                    <option value="Tana River">Tana River  </option>
                                    <option value="Tharaka Nithi">Tharaka Nithi    </option>
                                    <option value="Trans Nzoia ">Trans Nzoia  </option>
                                    <option value="Uasin Gishu">Uasin Gishu   </option>
                                    <option value="Vihiga">Vihiga    </option>
                                    <option value="Wajir">Wajir    </option>
                                    <option value="West Pokot">West Pokot    </option>
                                </select>

                                @if ($errors->has('county'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('county') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }} row">
                            <label for="area" class="col-md-4 col-form-label">Area/Estate</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control A" name="area" value="{{ $caveats[0]->Area }}" required placeholder="Madaraka Estate" data-toggle="tooltip" data-placement="top" title="The Estate where the property is" >

                                @if ($errors->has('area'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('area') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('road') ? ' has-error' : '' }} row">
                            <label for="road" class="col-md-4 col-form-label">Along(Road)</label>

                            <div class="col-md-6">
                                <input id="road" type="text" class="form-control A" name="road" value="{{ $caveats[0]->Road }}" required placeholder="Ole sangale Road" data-toggle="tooltip" data-placement="top" title="The road closest to the property">

                                @if ($errors->has('road'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('road') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('landmark') ? ' has-error' : '' }} row">
                            <label for="landmark" class="col-md-4 col-form-label">Landmark</label>

                            <div class="col-md-6">
                                <input id="landmark" type="text" class="form-control A" name="landmark" value="{{ $caveats[0]->Landmark }}" required placeholder="MF 25" data-toggle="tooltip" data-placement="top" title="Buildings/Rivers/Hills or other close to the property">

                                @if ($errors->has('landmark'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('landmark') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                            <label for="lr_no" class="col-md-4 col-form-label">Size</label>

                            <div class="col-md-6">
                                <input id="size" type="text" class="form-control A" name="size" value="{{ $caveats[0]->Size }}" required data-toggle="tooltip" data-placement="top" title="The size of the land in Hectare  / Acres">

                                @if ($errors->has('size'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <!--div class="form-group{{ $errors->has('document_uploads') ? ' has-error' : '' }} row">
                            <label for="document_uploads" class="col-md-4 col-form-label">Document Uploads</label>

                            <div class="col-md-6">
                                <input id="document_uploads" type="file" class="form-control A" name="document_uploads" value="{{ old('caveat_date') }}" required data-toggle="tooltip" data-placement="top" title="Upload image atmost 2MB ">

                                @if ($errors->has('document_uploads'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document_uploads') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div-->
                    </fieldset>
                    <div id="whyModal" class="modal fade col-md-10 col-md-offset-2 " role="dialog" style="padding: 10px !important; margin-left: 300px !important;">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    <h4 class="modal-title">Edit Reasons</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group why">
                                        <div class="col-md-10" id="form-wizard">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step">
                                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                        <p>Step 1</p>
                                                    </div>
                                                

                                                </div>
                                            </div>
                                            <form role="form">
                                                <div class="row setup-content" id="step-1">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-12">
                                                            <h3> Why Did you place the caveat?</h3>
                                                            <div class="form-group">
                                                                <fieldset>
                                                                    <legend></legend>
                                                                    <div class="row">
                                                                    <?php
                                                                    $new  = explode(';',$caveats[0]->Reason);
                                                                    $new2=array_map('trim',$new);
if(in_array('It has come to my attention that the property is being purported offered for sale to prospective buyers', $new2)){
 $_1='checked';
                                                                  }else{
                                                                $_1=null;
                                                                  }
                                                                  
                                                                  if(in_array('The property is not for sale', $new2)){
 $_2='checked';
                                                                  }else{
                                                                $_2=null;
                                                                  }
                                                                  
if(in_array('I have not given my consent for the property to be sold', $new2)){
 $_3='checked';
                                                                  }else{
                                                                $_3=null;
                                                                  }
                                                                  
if(in_array('To notify the public that any person interfering with the said property in whatever manner does so at their own risk such action being unlawful, illegal, fraudulent and further amounts to trespass', $new2)){
 $_4='checked';
                                                                  }else{
                                                                $_4=null;
                                                                  }
                                                                  
                                                                  
                                                                  
                                                                    
                                                                    

                                                                    ?>
                                                                        <div class="checkbox checkbox-primary col-md-12">
                                                                            <div class="col-md-1">
<input type="checkbox" {{$_1}}  name="reason[]" id="checkbox1" value="It has come to my attention that the property is being purported offered for sale to prospective buyers">
                                                                            </div>
                                                                            <div class="col-md-11">

                                                                                It has come to my attention that the property is being purported offered for sale to prospective buyers

                                                                            </div>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary col-md-12">
                                                                            <div class="col-md-1">
<input type="checkbox" {{$_2}} name="reason[]" id="checkbox2" value="The property is not for sale">
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                The property is not for sale
                                                                            </div>

                                                                        </div>
                                                                        <div class="checkbox checkbox-primary col-md-12">
                                                                            <div class="col-md-1">
<input type="checkbox" {{@$_3}} name="reason[]" id="checkbox3" value="I have not given my consent for the property to be sold">
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                I have not given my consent for the property to be sold         
                                                                            </div>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary col-md-12">
                                                                            <div class="col-md-1">
<input type="checkbox" {{@$_4}} name="reason[]" id="checkbox4" value="To notify the public that any person interfering with the said property in whatever manner does so at their own risk such action being unlawful, illegal, fraudulent and further amounts to trespass">
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                To notify the public that any person interfering with the said property in whatever manner does so at their own risk such action being unlawful, illegal, fraudulent and further amounts to trespass        
                                                                            </div>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary col-md-12">
                                                                            <div class="col-md-1">
                                                                                
                                                                            </div>    
                                                                            <div class="col-md-11">
                                                                                 <div class="col-md-11"><textarea name="reason[]"  placeholder="Please tell us other reasons you have">{{ array_values($new2)[count($new2)-2]}}</textarea></div> 
                                                                            </div>
                                                                             <div class="checkbox checkbox-primary col-md-12" id="finalReason" >
                                                                                
                                                                           

                                                                        </div>

                                                                    </div>

                                                                </fieldset>
                                                            </div>

                                                          <button class="btn btn-success btn-lg pull-right Finish" type="submit" onclick="return validateData();" >Finish!</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-4">
                    <button type="button" class="btn btn-primary"  style="margin:10px;" id="NextButton">Next <i class="fa fa-forward"></i></button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>

        <div class=" col-md-7 ">
            <div class = "card1 card">
                <h4 class = "card-header">CAVEAT EMPTOR/ BUYER BEWARE</h4>
                <div class="row">
                    <div class="col-md-12">
                        <center><p style="margin:20px; font-weight: bolder; text-decoration: underline;">KENYA: PUBLIC NOTICE</p></center>
                        <hr>
                    </div>
                      <div class="row">
                        <div class="col-md-12">
                            <center><p style="margin:10px; font-weight: bold; text-decoration: underline;" ><span style="font-weight: bold;" id="PLC">{{ strtoupper($caveats[0]->Town) }}</span></p></center> 
                        </div>
                    </div>
                    <div class="row" style="background: black; width:98%; margin:3px; color:white;font-weight: bold;">
                        <div class="col-md-12">
                            <center><p style="margin:10px; font-weight: bold; text-decoration: underline;" id="NUMBER1"><span style="font-weight: bold;" id="NO1">{{ $caveats[0]->LR_No }}</span><span style="font-weight: bold;" id="NO3">{{ $caveats[0]->IR_IC_Nos }}</span></p></center> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that property Number <span style="font-weight: bold;" id="NUMBER">{{ $caveats[0]->LR_No. $caveats[0]->IR_IC_Nos }}</span> and other developments thereof is vested in the name of <span id="owner"><strong>{{ $caveats[0]->name }}</strong></span>.</p>
                        </div>
                    </div>
                    
                  

                    <div class="row">
                        <div class="col-md-12">
                            <p>The property lies within <span id="AREA">{{ $caveats[0]->Area }}</span> in <span id="TOWN">{{ $caveats[0]->Town }} town</span> in the county of <span id="COUNTY">{{ $caveats[0]->County }}</span>.  It is situated along <span id="ROAD">{{ $caveats[0]->Road }} road</span>  adjacent to <span id="LANDMARK">{{ $caveats[0]->Landmark }}</span>(building, landmark, school or river). It is <span id="SIZE">{{ $caveats[0]->Size }}</span><p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p id="description_text">{{@$caveats[0]->Description}}<p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE NOTICE</strong> that any purported allotment, buying, selling, letting, leasing, charging subdivisions construction upon or dealings on the said parcel of land in any
                                other manner <strong>HOWSOEVER</strong> without <span id="OWNER2">{{ $caveats[0]->name }}</span> is unlawful, illegal, fraudulent and further amounts to trespass.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>TAKE FURTHER NOTICE</strong> that any person(s) interfering with the said parcel of land as aforesaid stands to lose his/her money ask <span id="OWNER3">{{ $caveats[0]->name }}</span> 
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
                            <p><strong>DATED</strong> at <span style="font-weight: bold; text-decoration:uppercase;" id="PLACE">{{@strtoupper($caveats[0]->Town)}}</span> this <span style="font-weight: bold;" id="DATE">{{@$caveats[0]->Caveat_Date}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="RBY"><strong>{{ $caveats[0]->name }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div></div>




<script>



    function validateData() {
        if ($('input[name="reason[]"]:checked').length <= 0) {
            alert('Untold Reason, Please tell us why you are placing this caveat in step 1');
            return false;
        }

//    if ($('input[type=radio]:checked').length <= 0) {
//        alert('Identity Unknown, Please tell us who you are in step 2');
//
//        return false;
//    }

        return true;
    }

    $(document).ready(function () {
    
    $('#caveat_date').datepicker({
       maxDate: '+0d',
       changeYear:true,
       changeMonth:true
    });
    
    
    

  $('[data-toggle="tooltip"]').tooltip()
  

  
        $('#NextButton').click(function () {
            var errors = 0;
            $(".A").map(function () {
                if (!$(this).val()) {
                    $(this).css('border', '1px solid red');
                    $(this).prop('placeholder', 'This field is required!')
                    errors++;
                } else if ($(this).val()) {
                    $(this).css('border', '1px solid green')
                }
            });
            if (errors > 0) {
               
                zebra('Form Incomplete','You have not  filled all fields, fill all fields circled in red!');
                return false;
            }
            
            if($("#email").length && !validateEmail($("#email").val())){
            $("#email").css('border', '1px solid red');
              zebra('Invalid email','The email you have entered is not valid!');
              return false;
            }
            $('#whyModal').modal('show');
        });

        function validateForm() {
            var x = $('#email').val();
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                $("#email").css('border', '1px solid red');
                prompt('Email Error', 'You have entered an invalid email');
                return false;
            }
        }

        $('.A').keyup(function ()
        {
            if (!$(this).val() === '') {
                $(this).css('border', '1px solid green');
            }
        });




   $('#checkbox5').click(function(){
   var div=' <div class="col-md-11"><textarea name="reason[]" required placeholder="Please tell us other reasons you have"></textarea></div>';
   if($('#checkbox5').is(":checked")){
     $('#finalReason').append(div);
   }else{
      $('#finalReason').empty();
   }

   });

 



      //  var selector = document.getElementById("caveat_date");
//
       // var im = new Inputmask("99/99/9999", {"placeholder": "DD/MM/YYYY"});
      //  im.mask(selector);
        $('#name').keyup(function () {
            $('#RBY').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
            $('#owner').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
            $('#OWNER2').html($(this).val().toUpperCase());
            $('#OWNER3').html($(this).val().toUpperCase());
        });

        $('#description').keyup(function () {

            $('#description_text').html($(this).val());
        });
        $('#town').keyup(function () {
            $('#PLACE').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
            $('#TOWN').html($(this).val());
             $('#PLC').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });
        $('#caveat_date').keyup(function () {
            $('#DATE').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });

        $('#caveat_ref').keyup(function () {
            $('#PLC').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });
        $('#lr_no').keyup(function () {
            $('#NO1').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });
        $('#lrno_block').keyup(function () {
            $('#NO2').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });
        $('#ir_ic_nos').keyup(function () {
            $('#NO3').html('<strong>' + $(this).val().toUpperCase() + '</strong>');
        });
        $('#area').keyup(function () {
            $('#AREA').html($(this).val());
        });

        $('#county').change(function () {
            $('#COUNTY').html($(this).val());
        });
        $('#road').keyup(function () {
            $('#ROAD').html($(this).val());
        });
        $('#landmark').keyup(function () {
            $('#LANDMARK').html($(this).val());
        });
         $('#size').keyup(function () {
            $('#SIZE').html($(this).val());
        });
        $('#caveat_ref,#lr_no,#lrno_block,#ir_ic_nos').change(function () {
            $('#NUMBER').text('');
            $('#NUMBER1').html();
            $('#NUMBER').html($('#NUMBER1').html());
        });


        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');
                 allPrevBtn = $('.prevBtn');
                

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

            $(".form_horizontal").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form_horizontal").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });
        
        
              allPrevBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

            $(".form_horizontal").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form_horizontal").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');







    });
    
    
    


    function zebra(title, message) {
        $.Zebra_Dialog(message, {
            'type': 'warning',
            'title': title,
            'buttons': [
                {caption: 'Ok', callback: function () { }},
            ]
        });
    }
    
    function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
</script>
@endsection

