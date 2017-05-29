<ul class="nav navbar-nav">
	<li class="nav-item hidden-xs-down">
        <a class="nav-item nav-link" href="{{ url ('/') }}">Home<span class="sr-only">(current)</span></a>
    </li>
	<li class="nav-item active" >
		<a class="nav-link" href="{{url('admin')}}">Overview<span class="sr-only">(current)</span></a>
	</li>
	@foreach($sides as $bar)
	<li class="nav-item active" >
		<a class="nav-link" href="{{url('admin/').'/'.$bar->alias}}">{{$bar->name}}</a>
	</li>
	@endforeach
</ul>
