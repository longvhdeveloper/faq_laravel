<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Noi dung email</title>
</head>
<body>
    <h1>Hello, {{$user}}</h1>
    Thank you for doing required to reset password. New password is: <br/>
    New password: <b>{{$password}}</b>
    <br><br>
    <a href="{{URL::route('index')}}" target="_blank">Click here to back website</a>

    Best regard
</body>
</html>