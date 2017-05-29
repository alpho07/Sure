@extends('layouts.admin')
@section('content')
	<h4>{{date('M Y')}} Overview</h4>
		<div class="card-deck-wrapper">
			<div class="card-deck">		
				@foreach($data as $title => $card )
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">{{$title}}</h5>
						</div>
						<ul class="list-group list-group-flush" >
							@foreach($card as $key => $value)
									@foreach($value as $key => $value)
										<li class="list-group-item"><h5>{{$value}}</h5>&nbsp;{{$key}}</li>
									@endforeach
							@endforeach
						</ul>
						<div class="card-block">
							<a class="btn btn-primary" href="{{url('admin').'/'.lcfirst($title)}}">Manage</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
@endsection