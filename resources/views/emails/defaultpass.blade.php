<html>
  <div class="container">
    <div class="card text-xs-center">
      <p>Hello {{ $name }}</p>
      <p>We have created a Hakikisha account for you.
      <p>Please click on the button below to enter your preferred password and login.</p>
      <p><a class = "button" href="{{ url('password/reset/'.$token) }}" >Set password and Login.</a></p>
      <p>Thank you,</p>
      <p>Regards,Hakikisha Admin. </p>
      <hr>
    <div class = "card-footer text-muted">All Rights Reserved. Hakikisha</div>
    </div>
  </div>
</html>
