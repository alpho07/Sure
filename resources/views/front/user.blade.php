@extends('layouts.app')
<title>My Profile</title>
@section('content')
<style>
    input[type=text], input[type=password]{
        width:350px;
    }
    
   .user{
    margin:10px;
    }
</style>
<main class = " col-md-10 offset-md-2" >
    <section class = "row text-center placeholders col-md-12" style="height:600px;">
        @if(Session::has('message'))
          <div class="alert alert-info">
            {{session('message')}}
          </div>
        @endif
    <div class="col-md-6 form-group">
    <form class="form-horizontal" method="POST" action="{{url('editpass')}}">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Password Details</legend> 
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="newpass" name="newpass" placeholder="New Password" class="form-control input-md user" required="" type="password">

                        </div>
                    </div>
                    <p></p>
                    <!-- Password input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control input-md user" required="" type="password">

                        </div>
                    </div>
                    <br>
                    <p></p>
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button id="signin" name="signin" class="btn btn-primary user" id="pchange">Update Password</button>
                        </div>
                    </div>

                </fieldset>
            </form>
</div>
    <div class="col-md-6 form-group">
    <form class="form-horizontal" method="POST" action="{{url('edit')}}">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Profile Details</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input  id="email" name="email" placeholder="Email" value ="{{$data[0]->email}}"class="form-control user input-md" required=""  type="text">

                        </div>
                    </div>
                   <p></p>
                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="textinput" name="name" placeholder="Name" value="{{$data[0]->name}}" class="form-control user input-md" required  type="text">

                        </div>
                    </div>
                 <p></p>

                    <div class="form-group">
                        <div class="col-md-9">
                            <select id="user_type_id"  class="form-control user" name="user_type_id" required>
                                <option value="{{$data[0]->userType->id}}">{{$data[0]->userType->type}}</option>
                                @foreach($types as $t)
                                <option value="{{$t->id}}">{{$t->type}}</option>
                                @endforeach

                            </select>


                        </div>
                    </div>

              
              <p></p>
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button id="signin" name="signin" class="btn btn-primary user" id="pchange">Update Info</button>
                        </div>
                    </div>

                </fieldset>
            </form>
</div>

<span class="clearfix">
    
    
       

    </section>
</main>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

<script>
$(document).ready(function () {
//$("#user_type_id").find("option").eq(0).remove();
var map = {};
$('select option').each(function () {
    if (map[this.value]) {
        $(this).remove()
    }
    map[this.value] = true;
})

    $('#signin').on('click', function(){
    if ($('#newpass').val() !== $('#cpassword').val()){
    prompt("Password Mismatch", "Passwords do not match")
            return false;
    } else if ($('#newpass').val() = '' || $('#cpassword').val() == ''){
    prompt("Blank Field", "Please fill all fields")
            return false;
    } else{

    return true;
    }

});


function prompt(title, message) {
    $.Zebra_Dialog(message, {
    'type': 'error',
            'title': title,
            'modal': true,
            'buttons': [
            {caption: 'Ok', callback: function () {

            }},
            ]
    });
    }
}
);
</script>
