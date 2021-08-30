<?php
use App\Models\Post;
use App\Models\User;
use App\Models\UserCoupon;
use App\Models\Coupons;
use App\Http\Controllers\PostsController;
?>
@extends('layouts.app')
@section('content')
<div class="container">


 <h6>{{$p->title}} </h6><br>
{{$p->body}}<br>
 Create at: {{$p->created_at}}
<br>Count Read: {{$p->count_read}}
<br>

<?php
$user_id=Auth::user()->id;
?>


@if(Auth::user())
          <form action="/view/{{$p->id}}" method="POST">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <!-- Title: <input type="text" name="title"><br> -->
          <label for="comment">Your Voucher code is:</label>

          @if($user_coupons==null)
          <input type="text" class="form-control"  name="title" id="usr">
           <button type="submit" class="btn btn-primary">Get your code code!</button>
              
          @else 
           <input type="text" class="form-control" value="{{$user_coupons->code}}" name="title" id="usr">
          
           
          @endif
          </form>

@else 

@endif

</div>

 @endsection('content')
