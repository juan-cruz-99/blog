
@extends('layouts.blog')
@section('content')
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

    @foreach ($posts as $post)
        <x-post-item :post="$post"/>
    @endforeach

    <!-- Blog Post -->
    


    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>

@endsection