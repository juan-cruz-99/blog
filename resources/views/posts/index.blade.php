
@extends('layouts.blog')
@section('content')
    <h1 class="my-4">Posts</h1>

    @foreach ($posts as $post)
        <x-post-item :post="$post"/>
    @endforeach

    <!-- Blog Post -->
    

    <!-- Pagination -->
    {{ $posts->links() }}
@endsection