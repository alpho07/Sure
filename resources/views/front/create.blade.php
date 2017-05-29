@extends('layouts.app')
@section('content')
<div class = "container">
    <div class = "row">
        <div class="offset-md-2 col-md-8 ">
        <div class = "card">
        <h4 class = "card-header">Add Caveat</h4>
            <div class="card-block">
             {!!Form::model($caveat, ['action'=>'CaveatsController@store', 'class'=>'form_horizontal', 'role'=>'form', 'enctype'=>'multipart/form-data'])!!}
             @if(!Auth::check())
                <fieldset class="form-group">
                    <legend>Personal Details</legend>
                        <div class="form-group{{ $errors->has('caveat_date') ? ' has-error' : '' }} row">
                                <label for="name" class="col-md-4 col-form-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('caveat_ref') ? ' has-error' : '' }} row">
                                <label for="email" class="col-md-4 col-form-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                </fieldset>
                @endif
                <fieldset class = "form-group">
                <legend>Caveat Details</legend>
                        <div class="form-group{{ $errors->has('caveat_date') ? ' has-error' : '' }} row">
                                <label for="caveat_date" class="col-md-4 col-form-label">Caveat Date</label>

                                <div class="col-md-6">
                                    <input id="caveat_date" type="date" class="form-control" name="caveat_date" value="{{ old('caveat_date') }}" required>

                                    @if ($errors->has('caveat_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caveat_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('caveat_ref') ? ' has-error' : '' }} row">
                                <label for="caveat_ref" class="col-md-4 col-form-label">Caveat Ref</label>

                                <div class="col-md-6">
                                    <input id="caveat_ref" type="text" class="form-control" name="caveat_ref" value="{{ old('caveat_ref') }}" required>

                                    @if ($errors->has('lr_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caveat_ref') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} row">
                                <label for="description" class="col-md-4 col-form-label">Description</label>   
                                <div class="col-md-6">
                                    <textarea id="description" type="date" class="form-control" name="description" value="{{ old('description') }}" required></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('enquiry_details') ? ' has-error' : '' }} row">
                                <label for="enquiry_details" class="col-md-4 col-form-label">Enquiry Details</label>

                                <div class="col-md-6">
                                    <textarea id="enquiry_details" type="text" class="form-control" name="enquiry_details" value="{{ old('enquiry_details') }}" required></textarea>

                                    @if ($errors->has('enquiry_details'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('enquiry_details') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </fieldset>
                    <fieldset class = "form-group" >
                    <legend>Property Details</legend>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                                <label for="lr_no" class="col-md-4 col-form-label">LR No.</label>

                                <div class="col-md-6">
                                    <input id="lr_no" type="text" class="form-control" name="lr_no" value="{{ old('lr_no') }}" required>

                                    @if ($errors->has('lr_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lr_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                                <label for="lr_no" class="col-md-4 col-form-label">LR No. Block</label>

                                <div class="col-md-6">
                                    <input id="lrno_block" type="text" class="form-control" name="lrno_block" value="{{ old('lr_no') }}" required>

                                    @if ($errors->has('lrno_block'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lrno_block') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('enquiry_details') ? ' has-error' : '' }} row">
                                <label for="enquiry_details" class="col-md-4 col-form-label">IR IC Nos</label>

                                <div class="col-md-6">
                                    <input id="ir_ic_nos" type="text" class="form-control" name="ir_ic_nos" value="{{ old('enquiry_details') }}" required>

                                    @if ($errors->has('ir_ic_nos'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ir_ic_nos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                                <label for="lr_no" class="col-md-4 col-form-label">Town</label>

                                <div class="col-md-6">
                                    <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}" required>

                                    @if ($errors->has('lr_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('town') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('lr_no') ? ' has-error' : '' }} row">
                                <label for="lr_no" class="col-md-4 col-form-label">Size</label>

                                <div class="col-md-6">
                                    <input id="size" type="text" class="form-control" name="size" value="{{ old('size') }}" required>

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('size') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('document_uploads') ? ' has-error' : '' }} row">
                                <label for="document_uploads" class="col-md-4 col-form-label">Document Uploads</label>

                                <div class="col-md-6">
                                    <input id="document_uploads" type="file" class="form-control" name="document_uploads" value="{{ old('caveat_date') }}" required>

                                    @if ($errors->has('document_uploads'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('document_uploads') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </fieldset>
                    <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection