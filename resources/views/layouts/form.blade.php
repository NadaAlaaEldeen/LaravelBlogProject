@extends('layouts.app')



@section('content')
<form  class="m-3" method="post" action="@yield('formaction')" >
   @csrf
   @yield('action')
<div class="mb-3 my-3">
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input type="text" name='title'class="form-control" id="exampleFormControlInput1" value="@yield('post-title')">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">description</label>
  <textarea name='description'class="form-control" id="exampleFormControlTextarea1" rows="3" value="@yield('post-desc')">@yield('post-desc')</textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Image</label>
  <input type="file" name="image" accept=".jpg,.png" class="form-control" >
  
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">post creator</label>
  <select name='post_creator'class="form-control" id="exampleFormControlInput1" value="@yield('post-creator')">
  <option value="none" selected disabled hidden>@yield('post-creator')</option>
  @foreach($users as $user)
  <option value="{{$user-> id}}"> {{$user->name}}</option>
  @endforeach
  </select>
</div>
<div class="mb-3">
<button type="submit" class="@yield('btn')" tabindex="-1" role="button" aria-disabled="true">@yield('btn-name')</button>
</div>
</form>
@endsection