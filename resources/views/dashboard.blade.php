<?php 
use BeyondCode\Vouchers\Models\Voucherj;
use BeyondCode\Vouchers\Facades;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Facade;
use App\Models\Post;
use App\Http\Controllers\PostsController;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}<br></div>

                <div class="card-body">
                    

         User:{{ Auth::user()->name }}
         @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


            </div>
        </div>
    </div>

</div> 

    @if (Auth::user()->role=="admin")
       <h5>ALL USERS:</h5>
 <table class="table table-hover table-bordered ">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Số ĐT</th>
    </tr>
  </thead>
  @foreach($users as $u)
  <tbody>
    <tr>

      <th scope="row">{{$u->id}}</th>
      <td><a href="/view_user/{{$u->id}}">{{$u->name}}</a></td>
      <td>{{$u->email}}</td>
      <td>{{$u->role}}</td>
      <td>{{$u->sdt}}</td>
    </tr>
    
  </tbody>
  @endforeach
</table>
@endif

<h5>ALL POSTS:</h5>
          
                    
<table class="table table-hover table-bordered ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Count_read</th>
      <th scope="col">Created_at</th>
      <th scope="col">Update</th>


    </tr>
  </thead>
@foreach($posts as $p)
  <tbody>
    <tr>
        
      <th scope="row">{{$p->id}}</th>
      <td><a href="/view/{{$p->id}}"> {{$p->title}}</a></td>
      <td> {{substr($p->body,0,50)}}...</td>
      <td> {{$p->count_read}}</td>
      <td> {{$p->created_at}}</td>
      @if($p->user_id == Auth::user()->id)
      <td> <a href="/update/{{$p->id}}">Update</a> </td>
      @else
      <td> {{$p->user_id}}</td>
      @endif

        
  </tbody>
  @endforeach
</table>
  

</div>
@endsection
