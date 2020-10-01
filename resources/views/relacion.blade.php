<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realaciones</title>
</head>
<body>
    @foreach ($users as $user)
        <p>
            {{$user->name}}
        </p>
        <ul>
            @foreach ($user->posts as $post)
                <li>{{$post->title}}</li>
             @endforeach
        </ul>

    @endforeach
</body>
</html>