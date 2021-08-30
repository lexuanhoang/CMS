@extends('layouts.app')
@section('content')

<div class="container">

<h1>Create Post </h1>

<form action="/create" method="POST">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Title: <input type="text" name="title"><br> -->
<label for="comment">Title:</label>

<input type="text" class="form-control" name="title" id="usr">

<!-- Body: <input type="textarea"  size="50" name="body"><br> -->
<label for="comment">Body:</label>
  <textarea class="form-control" rows="5" name="body" id="comment"></textarea>


<!-- <input type="submit"> -->
  <button type="reset" class="btn btn-default">Làm Mới</button>
   <button type="submit" class="btn btn-primary">Thêm</button>

</form>
</div>
@endsection
