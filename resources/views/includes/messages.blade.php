@if($errors->any())
  <div class="alert alert-danger mt-2">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (Session::has('message'))
  <div class="alert alert-success mt-2">
    {{Session::get('message')}}
  </div>
@endif
