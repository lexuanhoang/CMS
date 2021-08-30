<!DOCTYPE html>
<html>
<body>


<h1>Update </h1>

<form action="/create" method="POST">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">

Title: <input type="text" name="title" value="{{$p->title}}"><br>
Body: <input type="textarea"  size="50" value="{{$p->body}}" name="body"><br>

<!-- <input type="submit"> -->
  <button type="reset" class="btn btn-default">Làm Mới</button>
   <button type="submit" class="btn btn-primary">Thêm</button>

</form>

</body>
</html>