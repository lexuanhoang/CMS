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
      <th scope="col">role</th>
      <th scope="col">Pass</th>
      <th scope="col">Số đt</th>
      <th scope="col">Số đt</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>{{$p->name}}<br></td>
      <td>{{$p->email}}<br></td>
        <td>{{$p->role}}<br></td>
        <td>{{$p->password}}<br></td>
        <td>{{$p->sdt}}<br></td>
        <td>
          
       <a href="/register/{{Auth::user()->id}}"><button>Edit </button></a><br>
          
        </td>
    </tr>
  </tbody>
</table>
 @endsection('content')
</div>