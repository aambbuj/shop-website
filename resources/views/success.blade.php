<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
</head>
<body>

    <h3>Your data has been save successfully</h3>
    <div style="text-align: center;font-size: 126%;color: brown;">
        <h5>Name : {{$user->name}}</h5>
        <h5>Phone : {{$user->phone}}</h5>
        <h5>Pin code : {{$user->pin}}</h5>
        <h5>City : {{$user->city}}</h5>
        <h5>District : {{$user->district}}</h5>
        <h5>State : {{$user->state}}</h5>
        <h5>Address : {{$user->address}}</h5>
    </div>
    <a href="{{url('/')}}"><button type="button" class="btn btn-info">Back</button></a>

</body>
</html>