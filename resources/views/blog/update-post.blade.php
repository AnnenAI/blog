@extends('layouts.base')

@section('content')
  <div class="container mt-4">
    <form action="{{ route('updatePostSubmit',['id'=> $post->id]) }}" method="post">
      @csrf
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">{{__('Title')}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title">
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">{{__('Description')}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" value="{{$post->description}}" placeholder="Description">
        </div>
      </div>
      <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">{{__('Content')}}</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="content"rows="5">{{$post->content}}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-success">{{__('Update')}}</button>
    </form>
  </div>
@endsection
