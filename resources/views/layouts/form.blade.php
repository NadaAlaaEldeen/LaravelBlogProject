@extends('layouts.app')



@section('content')
<div class="mb-3 my-3">
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" value="@yield('post-title')">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="@yield('post-desc')"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">post creator</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" value="@yield('post-creator')">
</div>
<div class="mb-3">
<a href="@yield('action')" class="@yield('btn')" tabindex="-1" role="button" aria-disabled="true">@yield('btn-name')</a>
</div>

@endsection