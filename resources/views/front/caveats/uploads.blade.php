@extends('layouts.app')
@section('content')
<style>
    tr.th{
        font-weight:bolder;
    }
    .datepicker{
        z-index: 100000;
    }
    .has-error{
    color:red;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/jquery.dataTables.min.css" />
<div class="container">


    <p>&nbsp;</p>
        <div class = "row"  style="margin-top:20px;>

        <div class=" col-md-5 ">
            <div class = "card">
                <h4 class = "card-header">Upload property photo</h4>

                <div class="card-block">
                 <span class="has-error">*Kindly Upload only photos.</span><br>
                 <span class="has-error">*Photo must have no border and</span><br>
                  <span class="has-error">*Photo not to exceed 2MB</span>
                   <form action="{{url('doUpload')}}" method="POST" class='form_horizontal' role='form' enctype='multipart/form-data'>
                       <input type="hidden" name="cid" value="{{$id}}"/>
    <div class="form-group{{ $errors->has('document_uploads') ? ' has-error' : '' }} row">
                           

                            <div class="col-md-12">
                                <input id="document_uploads" type="file" class="form-control A" name="document_uploads"  required data-toggle="tooltip" data-placement="top" title="Max size 2MB ">

                                @if ($errors->has('document_uploads'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document_uploads') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                           <button class="btn btn-success" type="submit">Upload Image</button>
                      
                      
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
   
</div>
@endsection
