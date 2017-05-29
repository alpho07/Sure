@extends('layouts.app')
@section('content')
  <!-- Main Page content -->
  <main class="ce--main" role="main">
    <div class="container">
      <h3>Pricing</h3><br>
      <div class="card-deck-wrapper">
        <div class="card-deck">

          <div class="card ce--plan-jaribu">
            <div class="card-header">
              <h3 class="card-title">Jaribu Plan</h3>
              <h5 class="card-title">5 Notices</h5>
              <p class="card-text">
                KShs. - monthly <br> KShs. - annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Entry Level, For non-lawyers</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              
            </ul>
            <div class="card-block text-xs-center">
              <a href="{{ url('caveats/create') }}" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-primary card-inverse ce--plan-hakika">
            <div class="card-header ">
              <h3 class="card-title">Hakika Plan</h3>
              <h5 class="card-title">10 Notices</h5>
              <p class="card-text">
                KShs. - monthly <br> KShs. - annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Intermediate</li>
              <li class="list-group-item">Contains unverified caveats</li>
              <li class="list-group-item">Can upload 1 photo</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
        
            </ul>
            <div class="card-block text-xs-center">
              <a href="{{ url('caveats/create') }}" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-info card-inverse ce--plan-kifani">
            <div class="card-header">
              <h3 class="card-title">Kifani Plan</h3>
              <h5 class="card-title">75 Notices</h5>
              <p class="card-text">
                KShs. - monthly <br> KShs. - annually
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Pro (For Lawyers)</li>
              <li class="list-group-item">Contains verified caveats</li>
              <li class="list-group-item">Can upload 3 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
              
            </ul>
            <div class="card-block text-xs-center">
              <a href="{{ url('caveats/create') }}" class="btn btn-secondary text-uppercase">subscribe now</a>
            </div>
          </div>

          <div class="card card-info card-inverse ce--plan-kifani-enterprise">
            <div class="card-header">
              <h3 class="card-title">Enterprise Plan</h3>
              <h5 class="card-title">Unlimited Notices</h5>
              <p class="card-text">
                Prices Negotiable<br>.
              </p>
            </div>
            <ul class="list-group list-group-flush text-xs-center">
              <li class="list-group-item">Enterprise (For Institutions)</li>
              <li class="list-group-item">Contains verified caveats</li>
              <li class="list-group-item">Can upload 10 photos</li>
              <li class="list-group-item">Has date of caveat fee receipt</li>
              <li class="list-group-item">Caveat reasons template</li>
             
            </ul>
            <div class="card-block text-xs-center">
              <a href="{{ url('contacts') }}" class="btn btn-success text-uppercase">Contact us</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection