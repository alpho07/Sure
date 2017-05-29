@extends('layouts.app')
<title>
    Hakikisha Search: {{$search}}
</title>
@section('content')

<style>
tr.th{
font-weight:bolder;
}
</style>
<link rel="stylesheet" href="{{url('css/style.css')}}"/>
<div class="container">

   

    
  <h4>Search Results for: '{{$search}}' </h4>             
  <p>About {{count($total)}} results</p>             
  <table class="table table-striped .table-bordered">   
    <tbody>
        @if(!$caveats->isEmpty())
    @foreach($caveats as $c)
    <tr>
        <td>
            &#10148; &nbsp;<a href="{{url('display/').'/'.$c->id}}" target='_blank'>{{$c->Caveat_Date.' ' .$c->Town .'-'.$c->LR_No.'/'.$c->Size.' Hectares :'.$c->County}}</a>
        </td>
    </tr>
    @endforeach
   
    @else
    <tr><td>No Caveat found for your search... 
    <a href="{{url('caveats/create')}}" class="btn btn-success btn-lg">Publish Caveat</a>  or   <a href="{{url('/')}}" class="btn btn-primary btn-lg">Explore</a>
    </td> 
   </tr>
    @endif
    </tbody>
  </table>
   <div class="pull-left">{{$caveats->render()}}</div>
</div>

   

@endsection
