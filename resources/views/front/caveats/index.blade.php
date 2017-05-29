@extends('layouts.app')
@section('content')
<style>
    tr.th{
        font-weight:bolder;
    }
    .datepicker{
        z-index: 100000;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/jquery.dataTables.min.css" />
<div class="container">
    <h2>My Caveats</h2> 
    <a href="{{url('home')}}" class="btn btn-primary pull-left" style="margin:10px;" ><i class="fa fa-dashboard"></i> Dashboard</a> 

    @if(empty($s[0]->Notices))
    <a href="#select-plan" class="btn btn-primary pull-right" style="margin:10px;" id="selectPlan"><i class="fa fa-plus-circle"></i> Add Caveat Notice &uparrow;</a>
    @elseif(!empty(@$s[0]->Notices) && $s[0]->current >= @$s[0]->Notices)
    <a href="#Plan-Upgrade" class="btn btn-primary pull-right" style="margin:10px;"  id="caveatCounter" ><i class="fa fa-plus-circle"></i> Add Caveat Notice</a>  
    @else
    <a href="{{url('caveats/create')}}" class="btn btn-primary pull-right" style="margin:10px;"><i class="fa fa-plus-circle"></i> Add Caveat Notice</a>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
    @endif   

    <table class="table table-striped .table-bordered">
        <thead>
            <tr style="font-weight:bolder;">
            <th>Thumbnail</th>
            <th></th>
                <th>Date</th>
                <th>Town</th>
                <th>LR No.</th>                
                <th>IR.IC No</th>
                <th>Size</th>
                  <th>Edit</th>
                <th>View</th>
                <th>Status</th>
                <th>Export</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach(@$caveats as $c)
            <tr>
             <td>
             @if($c->Document_Uploads=='NONE')
             <img src="{{url('getImg2')}}/noimagefound.jpg" height="100px" width="100px;" class="img-responsive img-thumbnail" />
             @else
             <img src="{{url('getImg2')}}/{{$c->Document_Uploads}}" height="100px" width="100px;"/>
             @endif
             </td>
             <td>
                 @if($c->Document_Uploads=='NONE')
            <a class="btn btn-danger btn-sm" href="{{url('uploads',['id'=>$c->id])}}">Upload Image</a>
             @else
           <a class="btn btn-primary btn-sm" href="{{url('uploads',['id'=>$c->id])}}">Update Image</a>
             @endif
             </td>
                <td>{{$c->Caveat_Date}}</td>
                <td>{{$c->Town}}</td>
                <td>{{$c->LR_No}}</td>
                <td>{{$c->IR_IC_Nos}}</td>
                <td>{{$c->Size}}</td>    
                <td>
                 @if($c->Publish_status == '0') 
                 <a class="btn btn-sm btn-primary " href="{{url('cedit').'/'.$c->id}}" ><i class="fa fa-edit"></i> Edit</a>
                @else
                <a class="btn btn-sm btn-primary disabled" href="#not-available" ><i class="fa fa-edit"></i> Edit</a>
                @endif
                </td>             
                <td><a href="{{url('caveats').'/'.$c->id}}" >View</a></td> 
                <td> @if(@$c->Publish_status == '0')   
                    @if(empty($c->cid))
                    <a href="#morecaveatDetails" id='{{$c->id}}' data-toggle="modal" data-target="#myModal" class="btn btn-success left modaltoggle">Publish </a>
                    @else
                    <a href="{{url('myplan').'/'.$c->id}}" id='{{$c->id}}' class="btn btn-success left modaltoggle">Publish</a>
                    @endif  
                    @elseif(@$c->Publish_status == '1')  
                    <a href="{{url('unpublish').'/'.$c->id}}" class="btn  pull-left" style="background-color:#FFBF00;">Un-Publish</a>
                    @elseif(@$c->Publish_status == '2')  
                    <a href="{{url('republish').'/'.$c->id}}" class="btn pull-left" style="background-color:#FFBF00;">Re-Publish</a>
                    @endif
                    <td><a title="Export to pdf" class="btn btn-warning btn-sm"href="{{url('pdf').'/'.$c->id}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></td>
                     <td><a title="Delete" class="btn btn-danger btn-sm DELETE" data-del="{{$c->id}}" href="#delete-caveat"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach


        </tbody>
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal fade " role="dialog">
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

<script>
$(document).ready(function () {
    $('.table').DataTable();
    var pass_link = "{{url('profile')}}";
     var del = "{{url('delete').'/'}}";
    var upggrade_link = "{{url('profile')}}";
    var plans_link = "{{url('plans2').'/'.count(@$caveats)}}";
    var Notices = "{{@$s[0]->Notices}}"
    var Used = "{{@$s[0]->current}}"

    if ("{{@Auth::user()->p_status}}" === '0') {
        prompt('Password Change', "Hello {{Auth::user()->name}} Your default password is 12345, please change it now", pass_link);
    }
    $('#caveatCounter').click(function () {
        if (parseInt(Used) >= parseInt(Notices)) {
            prompt('Plan Upgrade', 'Hello {{Auth::user()->name}}, You have exhausted your caveat plan, Would you like to upgrade to a larger plan?', upggrade_link);
        }
    });
    
    
    $(document).on('click','.DELETE',function(){
         $val = $(this).attr('data-del');
          prompt2('Delete Caveat', 'You are about to delete this caveat, This Action is permanent, do you want to continue', del+$val);
    });

    $('#selectPlan').click(function () {
        if (Notices === '') {
            prompt('Plan subscription', 'Hello {{Auth::user()->name}}, please select a subscription plan before proceeding.', plans_link);
        }
    });
    function prompt(title, message, url) {
        $.Zebra_Dialog(message, {
            'type': 'warning',
            'title': title,
            'modal': true,
            'buttons': [
                {caption: 'Sure', callback: function () {
                        window.location.href = url;
                    }},
            ]
        });
    }
    
     function prompt2(title, message, url) {
        $.Zebra_Dialog(message, {
            'type': 'warning',
            'title': title,
            'modal': true,
            'buttons': [
                {caption: 'No', callback: function () {
                       
                    }},
                    {caption: 'Sure', callback: function () {
                        window.location.href = url;
                        
                    }},
            ]
        });
    }






    $('.modaltoggle').click(function () {
        $id = $(this).attr('id');
        $('#cid').val($id);
    });


    var selector = document.getElementById("date_receipt");
    var im = new Inputmask("99/99/9999", {"placeholder": "DD/MM/YYYY"});
    im.mask(selector);

    var selector = document.getElementById("daffsigned");
    var im1 = new Inputmask("99/99/9999", {"placeholder": "DD/MM/YYYY"});
    im1.mask(selector);


});

</script>


@endsection