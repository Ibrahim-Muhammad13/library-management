@extends('layouts.app')
@section('content')
<div class="categories">
<div class="container">
    <h1 class="display-4 my-4">All Categories<h1>
        <hr>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col my-2">
            <div class="card category-box" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">{{$category->name}}</h3>
                    <a href="#" class="btn btn-primary btn-ourBtn">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
