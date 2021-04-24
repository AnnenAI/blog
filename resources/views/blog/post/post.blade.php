@extends('layouts.base')
@section('title')
  {{$post->title}}
@endsection

@section('content')
  <div class="card mt-3 p-3">
    <div class="row">
        @if ( !is_null($post->img_url) )
          <img class="card-img-top p-3" src="{{ asset('/storage/'.$post->img_url) }}" height="500"  alt="Card image cap">
        @else
          <img class="card-img-top p-3" src="{{ asset('images/me.jpg') }}" height="500" alt="Card image cap">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
            <p>Tags:
              @foreach($post->tags as $tag)
                <small>#{{ $tag->name }}</small>
              @endforeach
            <p>
          <p><small>{{ $post->created_at->format('Y.m.d h:i A') }}</small></p>
          <p><small>{{__('Created')}}: </small> {{ $post->author->name}}</p>
          <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->id==$post->author->id)
      <div class="row">
        <div class="col-1">
          <a href="{{ route('updatePost',['id' => $post->id]) }}">
            <button class="btn btn-primary">{{__('Edit')}}</button>
          </a>
        </div>
        <div class="col">
          <a href="{{ route('deletePost',['id' => $post->id]) }}">
            <button class="btn btn-danger">{{__('Delete')}}</button>
          </a>
        </div>
      </div>
    @endif
  </div>
@endsection
