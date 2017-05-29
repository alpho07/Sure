@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
    <!-- Loop through Rows , then Columns -->
      	@foreach($company as $key => $value) 
      		@foreach($value as $k => $v)
  	    		@if($k != 'id')
  	    		<div class="card">
      		    		<div class="card-header">
                    <h4>
        			    		{{ucfirst((str_replace('_', ' ', $k)))}}
                    </h4>
      			    	</div>
                  <div class="card-block">
                      {{$v}}
                  </div>
              </div>	
  		    	@endif
      		@endforeach
      	@endforeach
      </div>
  </main>
@endsection

     		