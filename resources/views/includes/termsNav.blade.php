
      @foreach($termsnav as $t)
      	<a href="{{url($t->alias)}}">{{$t->name}}</a> &bull; 
      	@if($t->alias == 'terms')
      		{!!'All Rights Reserved'!!}
      	@endif
      @endforeach
      