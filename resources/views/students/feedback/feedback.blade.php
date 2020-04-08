@component('mail::message')
    <strong style="color: black">From :</strong> {{$data['email']}}
    <br>
    <br>
  <strong style="color:black">Subject : </strong> {{$data['subject']}}
  <br>
  <br>
  <strong style="color:black">Message : </strong> {{$data['message']}}
  <br>
  <p style="color:black">Thanks, <span style="color:blue">{{$data['firstName']}} {{$data['lastName']}}</span></p>,
  
@endcomponent
