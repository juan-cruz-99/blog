@extends('layouts.blog')

@section('content')

<form method="POST" action="{{route('posts.store')}}">

  @csrf

    <div class="form-group">
      <label >Title</label>
      <input name="title" class="form-control"  placeholder="Title">
      @error('title')
          {{$message}}
      @enderror
    </div>

    <div class="form-group">
      <label >Description</label>
      <input name="description" class="form-control"  placeholder="Title">
      @error('description')
          {{$message}}
      @enderror
    </div>

    <div class="form-group">
      <label >Categories</label>
      <select name="category"class="form-control" >

        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach        

      </select>
      @error('categories')
        {{$message}}
      @enderror
    </div>

    <div class="form-group">
      <label >Content post</label>
      <textarea name="content"class="form-control" rows="3"></textarea>
      @error('content')
        {{$message}}
      @enderror
    </div>

    <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false">
      Create post
    </button>

  </form>

@endsection
