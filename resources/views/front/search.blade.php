@extends('layouts.dashboard')
@section('content')
<style>
tr.th{
font-weight:bolder;
}
</style>
<div class="container">
   

    
  <h2>Search Results for: '{{$search}}' </h2>             
  <table class="table table-striped .table-bordered">   
    <tbody>
        @if(!$caveats->isEmpty())
    @foreach($caveats as $c)
    <tr>
        <td>
            <a href="{{url('display/').'/'.$c->id}}" target='_blank'>{{$c->Caveat_Ref}}</a>
        </td>
    </tr>
    @endforeach
    @else
    <tr><td>No Matches found for your search...</td></tr>
    @endif
    </tbody>
  </table>
</div>

   

@endsection
