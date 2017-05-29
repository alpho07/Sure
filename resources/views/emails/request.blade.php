<html>
    <head>
        <title>Enquiry Message</title>
    </head>
    <body>
    @if($cavid=='0')
    <h3> New client making Enquiry</h3>
    @else
      <h3> Your caveat ref: <a href="http://sure.co.ke/sure/display/{{$cavid}}">{{$caveat}}</a> has received an inquiry from a possible client who need needs more details on the property.</h3>
    @endif
      
        <p><strong>The enquirer details are as follows:</strong/></p>
        <p><strong>Names:</strong> {{$name}}</p>

<p><strong>Email: </strong>{{$email}}</p>

<p><strong>Phone No: </strong>{{$mobile}}</p>

<p><strong>Enquirer Message:</strong> {{$bodyMessage}}</p>


<p>Kindly get in touch with the enquirer.</p>

<p>The SURE Team © </p>



    </body>
</html>
