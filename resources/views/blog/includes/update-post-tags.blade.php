<div class="row">
  <div class="col-5">
    <input class="form-control" id="searchTag" type="text" placeholder="Search..">
    <div class="mt-2 mb-2" id="allTags">
      @foreach($tags as $tag)
        <button class="btn btn-info mb-1 mt-1 p-1 mr-1" type="button" name="{{$tag->name}}" id="{{$tag->id}}" >
          #{{$tag->name}}
        </button>
      @endforeach
    </div>
  </div>
  <div class="col-2">
    <button class="btn btn-primary" type="button" id="inputedTagCheck"> Add </button>
    <a href="{{ route('addTag') }}" name="url"></a>
  </div>
  <div class="col-5" id="selectedTags">
    <p>{{__('Selected tags:')}}</p>
    @foreach($post->tags as $tag)
      <button class="btn btn-warning mb-1 mt-1 p-1 mr-1" type="button" name="{{$tag->name}}" id="{{$tag->id}}" >
        #{{$tag->name}}
      </button>
    @endforeach
  </div>
  </div>
</div>
