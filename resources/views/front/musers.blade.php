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
    <h2>Users</h2> 
    <a href="{{url('home')}}" class="btn btn-primary pull-left" style="margin:10px;" ><i class="fa fa-dashboard"></i> Dashboard</a> 

    @if(empty($s[0]->Notices))
    <a href="#select-plan" class="btn btn-primary pull-right" style="margin:10px;" id="selectPlan"><i class="fa fa-plus-circle"></i> Add Caveat Notice &uparrow;</a>
    @elseif(!empty(@$s[0]->Notices) && $s[0]->current >= @$s[0]->Notices)
    <a href="#Plan-Upgrade" class="btn btn-primary pull-right" style="margin:10px;"  id="caveatCounter" ><i class="fa fa-plus-circle"></i> Add Caveat Notice</a>  
    @else
    <a href="{{url('caveats/create')}}" class="btn btn-primary pull-right" style="margin:10px;"><i class="fa fa-plus-circle"></i> Add Caveat Notice</a>
    @endif
    @if(Session::has('infomessage'))
    <div class="alert alert-info">
        {{session('infomessage')}}
    </div>
    @endif   
<a href="#add-user" class="btn btn-success pull-right" style="margin:10px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Add New User</a>
    <table class="table table-striped .table-bordered">
        <thead>
            <tr style="font-weight:bolder;">
           
                <th>Name</th>
                <th>Email</th>
                <th>User Type.</th>             
            

            </tr>
        </thead>
        <tbody>
            @foreach(@$users as $c)
            <tr>         
                <td>{{$c->name}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->userType->type}}</td>
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
                    <h4 class="modal-title">New User Info</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row col-md-12">
                        <form class="form-horizontal col-md-8 col-md-offset-2" method="POST" action='{{url('saveinfo')}}'enctype="multipart/form-data" >
                            <input name="cid" class="form-control" value='' type="hidden" id="cid" />
                            {{csrf_field()}}

                            <p><strong><u>The User added will be under the main account</u></strong></p>
                          
                         
                            <div class="form-group row">
                                <div class="col-10">
                                    <input class="form-control" name="username" type="text" id="username" placeholder="Username" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-10">
                                    <input class="form-control" type="text" placeholder="Email" id="email" name="email" required/>
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <div class="col-10">
                                   <select class="form-control" name="usertype">
                                @foreach($types as $t)
                                <option value="{{$t->id}}">{{$t->type}}</option>
                                @endforeach;
                                   </select>
                                </div>
                            </div>
                                  <div class="form-group row">
                                <div class="col-10">
                                <p style="color:red;">NB:Password will be set to 123456 as default.</p>
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