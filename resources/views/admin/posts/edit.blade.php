@extends('layouts.blog')

@section('content')

<form method="POST" action="{{route('posts.update', ['post'=> $post->id])}}">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label >Titulo</label>
        <input name="title" class="form-control" value ="{{$post->title}}">
        @error('title')
        {{$message}}
        @enderror
    </div>

    <div class="form-group">
        <label >Description</label>
        <input name="description" class="form-control"  value ='{{$post->description}}'>
        @error('description')
            {{$message}}
        @enderror
      </div>

    <div class="form-group">
      <label for=>Categories</label>
      <select name="category" class="form-control" >
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
      </select>
      @error('category')
      {{$message}}
      @enderror
    </div>
    
    <div class="form-group">
      <label >Content</label>
      <textarea name="content" class="form-control"  rows="3">{{$post->content}}</textarea>
      @error('content')
      {{$message}}
      @enderror
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false">
        Editar post
    </button>
  </form>

@endsection