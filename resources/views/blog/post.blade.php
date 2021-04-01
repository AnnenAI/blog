@extends('layouts.base')
@section('title')
  {{$post->title}}
@endsection

@section('content')
<div class="card mt-3 p-3">
  <div class="row">
      @if ( !is_null($post->img_url) )
        <img class="card-img-top p-3" src="{{ asset($post->img_url) }}" height="500"  alt="Card image cap">
      @else
        <img class="card-img-top p-3" src="{{ asset('images/me.jpg') }}" height="500" alt="Card image cap">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p><small>{{ $post->created_at->format('Y.m.d h:i A') }}</small></p>
        <p><small>Created: </small> {{ $post->author->name}}</p>
        <p class="card-text">{{ $post->content }}</p>
      </div>
  </div>
  <div class="row">
    <div class="col-1">
      <a href="{{ route('updatePost',$post->id) }}"><button class="btn btn-primary">Edit</button></a>
    </div>
    <div class="col">
      <a href="{{ route('deletePost',$post->id) }}"><button class="btn btn-danger">Delete</button></a>
    </div>
  </div>
</div>

@endsection
