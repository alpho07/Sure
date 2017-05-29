@extends('layouts.dashboard')
@section('content')
<div class = "container" >
		<div class = "row" >
			<div class = "offset-md-2 col-md-8" >
			    	@if(Session::has('message'))
			            <div class="alert alert-success">
			            	{{session('message')}}
			            </div>
		            @endif
				<div class="card">
					<div class="card-block" >
					<h4 class="card-header" >Subscriptions</h4>	
					@foreach($subs as $sub)
						{{$sub['id']}}
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection