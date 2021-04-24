@extends('layouts.base')
@section('title')
{{__('Update')}} {{$post->title}}
@endsection

@section('content')
  <div class="container mt-4">
    <form id="addPostForm" action="{{ route('updatePostSubmit',['id'=> $post->id]) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">{{__('Title')}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title">
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-sm-2">{{__('Image')}}</label>
        <div class="col-sm-10">
          <input type="file"  name="image" value="{{ asset('/storage/'.$post->img_url) }}" accept=".jpg, .jpeg, .png">
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
      <div class="form-group row">
        <label for="tags" class="col-sm-2 col-form-label">{{__('Tags')}}</label>
        <div class="col-sm-10">
          @include('blog.includes.update-post-tags')
        </div>
      </div>
      <button type="submit" class="btn btn-success">{{__('Update')}}</button>
    </form>
  </div>
  <script src="{{asset('js/postTags.js')}}"></script>
@endsection
