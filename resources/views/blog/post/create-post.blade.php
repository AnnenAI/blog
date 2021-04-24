@extends('layouts.base')
@section('title')
{{__('Creating new post')}}
@endsection

@section('content')
  <div class="container mt-4">
    <form id="addPostForm" action="{{ route('createPostSubmit') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">{{__('Title')}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-sm-2">{{__('Image')}}</label>
        <div class="col-sm-10">
          <input type="file"  name="image">
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">{{__('Description')}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" placeholder="Description">
        </div>
      </div>
      <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">{{__('Content')}}</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="content"rows="5"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="tags" class="col-sm-2 col-form-label">{{__('Tags')}}</label>
        <div class="col-sm-10">
          @include('blog.includes.create-post-tags')
        </div>
      </div>
      <button type="submit" class="btn btn-success">{{__('Create post')}}</button>
    </form>
  </div>
  <script src="{{asset('js/postTags.js')}}"></script>
@endsection
