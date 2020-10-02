
@extends('layouts.blog')
@section('content')
    <h1 class="my-4">Posts</h1>

    @foreach ($posts as $post)
        <x-post-item :post="$post"/>
    @endforeach

    <!-- Blog Post -->
    

    <!-- Pagination -->
    {{ $posts->appends(request()->query())->links() }}
@endsection

@section('sidebar')
<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-append">
          <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <x-categories-widget :categories="$categories" />
  
  @if(Auth::check())
    <x-last-visited :posts="$lastVisited" />
  @endif
    
@endsection