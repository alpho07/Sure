@extends('layouts.dashboard')
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
</style>






<div class = "container">
    <div class = "row">
        <center>   
            <div class="offset-md-2 col-md-8 card">    	        
                <div class="alert alert-warning" style='margin-top: 15px'>
                    <i class='fa fa-warning'></i> {{$message}}  <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-home"></i> Go Home</a>
                </div>	          
            </div></center>
    </div>
</div>

@endsection

