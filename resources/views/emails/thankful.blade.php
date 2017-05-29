<html>
    <head>
        <title>Thank you</title>
    </head>
    <body>
    @if($cavid=='0')
    <p>Thank you for your message, we shall get back to you soon with a feedback.<br>

The SURE Team</p>
    @else
      <p>Thank you for expressing interest in the property with caveat <a href="http://sure.co.ke/sure/display/{{$cavid}}">{{$messagebody}}</a><br>

The caveat holder will get back in touch with you soon.<br>


Thank you.</p>

<p>The SURE Team © </p>
@endif


    </body>
</html>
