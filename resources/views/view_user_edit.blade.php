<?php
use App\Models\Post;
use App\Http\Controllers\PostsController;
?>
@extends('layouts.app')
@section('content')

<div class="container">
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Số đt</th>
    </tr>
  </thead>
  <tbody>
    <form action="">
    <tr>
      <td><textarea>{{$p->name}}</textarea><br></td>
      <td><textarea>{{$p->email}}</textarea><br></td>
        <td><textarea >{{$p->sdt}}</textarea><br></td>
        <td>
          
       <input type="submit" value="Submit">
          
        </td>
    </tr>
    </form>
  </tbody>
</table>


 @endsection('content')
</div>
<!-- <form action="/action_page.php">
<label for="w3review">Review of W3Schools:</label>
<textarea >
  
  </textarea>
  <br><br>
  <input type="submit" value="Submit">
</form> -->