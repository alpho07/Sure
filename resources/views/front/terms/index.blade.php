@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
  	    	<div class="card">
              <div class="card-header"><h4>{{$terms->title}}</h4></div>
	                <div class="card-block">
	                  	{!!$terms->text!!}
	                </div>	
          </div>
	</div>
  </main>
 @endsection