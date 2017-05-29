<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <div class="container">
    <div class="card text-xs-center">
      <p>Hello {{ $name }}</p>
      <p>Thank you for signing up to Hakikisha. Please activate your account by clicking on the button below.
      <p><a href="{{ url('register/verify/'.$token) }}" >{{ url('register/verify/'.$token) }}</a></p>
      <p>Thank you,</p>
      <p>Regards,Hakikisha Admin. </p>
      <hr>
    <div class = "card-footer text-muted">All Rights Reserved. Hakikisha</div>
    </div>
  </div>
</html>
