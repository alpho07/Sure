@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
        <nav class="breadcrumb" >
            <a class="breadcrumb-item" href="{{url('/articles')}}">All</a>
            <span class="breadcrumb-item active">{{$article->title}}</span>
        </nav>
        <div class="card-deck-wrapper">
            <div class="card-deck">
                    <div class = "card mb-3">
                        <img class="card-img-top img-fluid" src="{{asset('public/storage/articles/images/').'/'.$article->cover_image}}" alt="{{$article->cover_image_caption}} ">
                        <p class="card-text"><small class="text-muted">{{$article->cover_image_caption}}</small></p>
                        <div class="card-block" >
                            <h4 class="card-title" >{{$article->title}}</h4>
                            <p class="card-text">{!!$article->body!!}</p>
                            <!--span class="tag tag-pill tag-default" >Video</span-->
                            <p class="card-text text-muted" >team@sure</p>
                        </div>
                    </div>
            </div>
        </div>  
    </div>
  </main>
@endsection
  