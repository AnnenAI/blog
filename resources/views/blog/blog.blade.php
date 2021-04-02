@extends('layouts.base')
@section('title')
Blog
@endsection
@section('content')
  @if (!is_null($posts))
    @foreach($posts as $post)
    <div class="card mt-3 p-3">
      <div class="row">
        <div class="col-5">
          @if ( !is_null($post->img_url) )
            <img class="card-img-top" src="{{ $post->img_url }}" height="250" alt="Card image cap">
          @else
            <img class="card-img-top" src="{{ asset('images/me.jpg') }}" height="250" alt="Card image cap">
          @endif
        </div>
        <div class="col">
          <div class="card-body">
            <a href="{{route('getPost',$post->id)}}"><h5 class="card-title">{{ $post->title }}</h5></a>
            <p><small>{{ $post->updated_at->format('Y.m.d') }}</small></p>
            <p class="card-text">{{ $post->description }}</p>
            <a href="{{route('getPost',$post->id)}}" class="btn btn-primary">Detail</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endif
@endsection
