<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
<br><br>
<H1 align="center">CRUD OPERATION</H1><br><br>
<div>
<a href="{{route('users.create')}}" class="btn btn-primary">create</a>
</div>


<form action="" method="POST">
@csrf
   <table border=1 class="table">
    <thead class="thead-dark">
<tr>
    <th>S.N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Action</th>
</tr>
</thead>
<tbody>


@foreach($users as $user)

<tr>
    <td>{{ $loop->iteration}}</td>
    <td>{{$user->name }}</td>
    <td>{{ $user->email}}</td>
    <td><a href="{{ $user->image ?? ''}}" target='_blank'><img src="{{asset('/uploads/'.$user->image)}}" width="50" height="50"></td>
    
    <td>
        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-secondary">Edit</a>-
        <a href="{{ route('users.delete',$user->id)}}" class="btn btn-danger">Delete</a>
   </td>
    

</tr>
@endforeach
</tbody>
</table>


</form>
</body>
</html>