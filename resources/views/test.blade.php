<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Test Index Page</h1>

    <ul>
        @foreach ($users as $user)
            <li>{{$user->id}} - {{$user->name}} - {{$user->email}} - {{$user->password}}</li>
        @endforeach
    </ul>

    <hr>

    <form action="{{route('store')}}" method="post">
        @csrf
        <button type="submit">Add User</button>
    </form>

    <hr>

    <form action="{{route('delete')}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete User</button>
    </form>
    
    <hr>

    <form action="{{route('update')}}" method="post">
        @csrf
        @method('put')
        <button type="submit">Update User</button>
    </form>
</body>
</html>