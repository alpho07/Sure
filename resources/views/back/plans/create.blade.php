@extends('layouts.app')
@section('content')
<div class = "container">
    <div class = "row">
        <div class="offset-md-2 col-md-8 ">
        <div class = "card">
        <h4 class = "card-header">Add Plan</h4>
            <div class="card-block">
                {!!Form::model($plan, ['action'=>'PlansController@store', 'class'=>'form_horizontal', 'role'=>'form'])!!}
                    <div class="form-group{{ $errors->has('plan_name') ? ' has-error' : '' }} row">
                            <label for="plan_name" class="col-md-4 col-form-label">Plan Name</label>

                            <div class="col-md-6">
                                <input id="plan_name" type="text" class="form-control" name="plan_name" value="{{ old('plan_name') }}" required>

                                @if ($errors->has('plan_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('monthly_rate') ? ' has-error' : '' }} row">
                            <label for="monthly_rate" class="col-md-4 col-form-label">Monthly Rate</label>

                            <div class="col-md-6">
                                <input id="monthly_rate" type="text" class="form-control" name="monthly_rate" value="{{ old('monthly_rate') }}" required>

                                @if ($errors->has('monthly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('monthly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('notices') ? ' has-error' : '' }} row">
                            <label for="notice" class="col-md-4 col-form-label">Notices</label>

                            <div class="col-md-6">
                                <input id="notices" type="text" class="form-control" name="notices" value="{{ old('notices') }}" required placeholder = "No. of Notices" />

                                @if ($errors->has('notices'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notices') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('enquiry_details') ? ' has-error' : '' }} row">
                            <label for="plan_details" class="col-md-4 col-form-label">Plan Details</label>

                            <div class="col-md-6">
                                <textarea id="plan_details" type="text" class="form-control" name="plan_details" value="{{ old('plan_details') }}" required></textarea>

                                @if ($errors->has('plan_details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan_details') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
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