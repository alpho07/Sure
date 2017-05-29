@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
    	<div class="card-deck-wrapper">
        	<div class="card-deck">
        		@foreach($articles as $a)
        			<div class = "card mb-3">
        				<img class="card-img-top img-fluid" src="{{asset('public/storage/articles/images/').'/'.$a->cover_image}}" alt=" ">
        				<div class="card-block" >
        					<h4 class="card-title" >{{$a->title}}</h4>
        					<p class="card-text">{!!str_limit($a->body, 200)!!}</p>
        					<a href="{{url('articles/').'/'.$a->id}}" class="btn btn-primary">Read More</a>
        				</div>
        			</div>
        		@endforeach
        	</div>
        </div>	
    </div>
  </main>
@endsection
  