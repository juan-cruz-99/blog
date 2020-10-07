@extends('layouts.blog')
@section('content')

        <!-- Title -->
      <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
        <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{$post->created_at->diffForHumans()}} </p>

        <hr>

        <!-- Preview Image -->
        <img class="card-img-top" src="{{$post->img ? asset('storage/' . $post->img) : 'http://placehold.it/750x300' }}" alt="Card image cap">

        <hr>

        <!-- Post Content -->
        {{$post->content}}
        <hr>

        <!-- Comments Form -->
        @if(Auth::check())
            <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="post">
                  @csrf()
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        @endif

        @foreach ($post->comments as $comment)
            <x-comment :comment="$comment" />            
        @endforeach
  @endsection