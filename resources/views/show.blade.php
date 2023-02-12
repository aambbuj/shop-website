<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>add information</title>
  </head>
  <body>
    <div class="container mt-4">
        <h3 class="text-center" style="color:brownd; center">User Details</h3>

        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Pin Code</th>
                <th scope="col">Village</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">District</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $key => $value)

                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->pin}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state}}</td>
                    <td>{{$value->district}}</td>
                    <td>
                      @if($value->action == 1)
                     <a href="{{url('/action',['id'=>$value->id,'action' => $value->action+1,'value'=>'Process'])}}"> <button type="button" class="btn btn-info">Assign</button></a>
                    @elseif($value->action == 2)
                    <a href="{{url('/action',['id'=>$value->id,'action' => $value->action+1,'value'=>'Close'])}}"><button type="button" class="btn btn-info">Process</button></a>
                    <a href="{{url('/action',['id'=>$value->id,'action' => 4,'value'=>'Reject'])}}"><button type="button" class="btn btn-warning">Close</button></a>
                    @elseif($value->action == 3 || $value->action == 2 || $value->action == 4)
                    <button type="button" class="btn btn-success">Complete</button>
                    <a href="{{url('/action',['id'=>$value->id,'action' => 4,'value'=>'Reject'])}}"><button type="button" class="btn btn-warning">Close</button></a>
                    <a href="{{url('/action',['id'=>$value->id,'action' => 4,'value'=>'Reject'])}}"><button type="button" class="btn btn-danger">Reject</button></a>
                    @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</form>
</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

