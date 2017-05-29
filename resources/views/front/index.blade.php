<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')
@section('content')

  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <p class="text-xs-center"><a class="btn btn-success btn-lg" href="{{url('/caveats/create')}}" role="button">Create &amp; Publish a Caveat&hellip;</a></p>
    <div class="container">
      <div class="card-deck-wrapper">
        <div class="card-deck">

          <div class="card ce--plan-jaribu">
            <div class="card-header">
              <h3 class="card-title">Jaribu Plan</h3>
              <h5 class="card-title">5 Notices</h5>
              <p class="card-text">
                KShs. 3,000 monthly <br> KShs. 30,000 annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Entry Level, For non-lawyers</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              <li class="list-group-item">Learn more&hellip;</li>
            </ul>
            <div class="card-block text-xs-center">
              <a href="#" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-primary card-inverse ce--plan-hakika">
            <div class="card-header ">
              <h3 class="card-title">Hakika Plan</h3>
              <h5 class="card-title">10 Notices</h5>
              <p class="card-text">
                KShs. 6,000 monthly <br> KShs. 50,000 annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Entry Level, For non-lawyers</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              <li class="list-group-item">Learn more&hellip;</li>
            </ul>
            <div class="card-block text-xs-center">
              <a href="#" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-info card-inverse ce--plan-kifani">
            <div class="card-header">
              <h3 class="card-title">Jaribu Plan</h3>
              <h5 class="card-title">75 Notices</h5>
              <p class="card-text">
                KShs. 30,000 monthly <br> KShs. 250,000 annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Entry Level, For non-lawyers</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              <li class="list-group-item">Learn more&hellip;</li>
            </ul>
            <div class="card-block text-xs-center">
              <a href="#" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-info card-inverse ce--plan-kifani-enterprise">
            <div class="card-header">
              <h3 class="card-title">Jaribu Plan</h3>
              <h5 class="card-title">Unlimited Notices</h5>
              <p class="card-text">
                .<br>.
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Entry Level, For non-lawyers</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              <li class="list-group-item">Learn more&hellip;</li>
            </ul>
            <div class="card-block text-xs-center">
              <a href="#" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection
  
</html>