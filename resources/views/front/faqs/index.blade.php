@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
    <div id = "accordion" role="tablist" aria-multiselectable="true">
      	@foreach($faqs as $v) 
  	    	<div class="card">
  		    	<div class="card-header" role="tab" id="heading{{$v->id}}" >
	                <h4>
	    			    <a data-toggle = "collapse" data-parent = "#accordion" href="#collapse{{$v->id}}" aria-expanded="true" aria-controls="collapse{{$v->id}}">{{$v->question}}</a>
	                </h4>
  			    </div>
              	<div id="collapse{{$v->id}}" class="collapse show" role="tabpanel" aria-labelledby="heading{{$v->id}}">
	                <div class="card-block">
	                  	{{$v->answer}}
	                </div>
              </div>	
  		    </div>
      	@endforeach
      </div>
	</div>
  </main>
 @endsection