<div class="row">
  <div class="col-7">
    <input class="form-control" id="searchTag" type="text" placeholder="Search..">
    <div class="col-5 mt-2 mb-2" id="allTags">
      @foreach($tags as $tag)
        <a href="#" id="{{$tag->id}}" name="{{$tag->name}}"> #{{ $tag->name }} </a>
      @endforeach
    </div>
  </div>
  <div class="col" id="selectedTags">
    <p>{{__('Selected tags:')}}</p>
  </div>
</div>
