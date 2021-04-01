@extends('layouts.base')

@section('content')
  <div class="container mt-4">
    <form action="{{ route('updatePostSubmit', $post->id) }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" name="title">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" name="description">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" value="{{$post->description}}" placeholder="Description">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" name="content">Content</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="content"rows="5">{{$post->content}}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
@endsection
