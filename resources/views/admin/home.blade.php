@extends('layouts.blog')

@section('content')
<h1>MY POSTS</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
    
            <tr>
                <td>{{$post->title}}</td>
                <td>{{ $post->content }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
