@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8 ">
                @if(session()->has('flash_notification.message'))
                    <div class="alert alert-success">
                        {{ session()->get('flash_notification.message') }}
                    </div>
                @endif
            <div class="card">
                <h4 class="card-header">Login</h4>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class = "col-md-4">Remember Me</label>
                            <div class="col-md-6 col-md-offset-4">
                                <div class="form-check">
                                    <label class = "form-check-label">
                                        <input class = "form-check-input" type="checkbox" name="remember">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                         <!--include social auth here-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@php session()->forget('flash_notification') @endphp
@endsection
