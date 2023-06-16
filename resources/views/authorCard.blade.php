
@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
@section('content')
<div class="card" style="width:400px">
  <img class="card-img-top" src="img_avatar1.png" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Author name</h4>
    <p class="card-text">Number of books</p>
    <a href="#" class="btn btn-primary">Add Author</a>
  </div>
</div>
@endsection
</body>
</html>

