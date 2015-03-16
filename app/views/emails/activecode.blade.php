<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Noi dung email</title>
</head>
<body>
    <h1>Hello , {{$user}}</h1>
    You have required for reset password, to complete you must click link to below action<br/><br/>
    <a href="{{URL::route('active', array($user,$code))}}">Click here to active</a>
</body>
</html>