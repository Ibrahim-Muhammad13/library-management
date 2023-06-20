@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-light text-center ">list</div>
                <div class="card-body  ">
                    <ul class="list-group ">
                        <a href="{{ route('book.index') }}" class="list-group-item list-group-item-action ">Show books </a>
                        <a href="{{route('book.create')}}" class="list-group-item list-group-item-action">Add book</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container col-md-9">

            <div class="card-header bg-danger text-light text-center">
                All Books
            </div>
            @if (session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="card-body">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">image</th>
                            <th scope="col">book name</th>
                            <th scope="col">Description</th>
                            <th scope="col">category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @if(count($books) > 0)
                        @foreach($books as $key => $book)
                        <tr>
                            <th scope="row">{{$key =$key+1}} </th>
                            <td><img src="{{asset($book->image)}}" width="90"></td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->description}}</td>
                            <td>@foreach($book->categories as $category){{$category->name}}<br>@endforeach</td>
                            <td>{{$book->author->author_name}}</td>
                            <td><a href="{{route('book.edit',$book->id)}}" class="btn btn-primary ">Edit</a></td>
                            <form action="{{route('book.destroy',$book->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <td>
                               
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                         
                        </form>

                        </tr>

                        @endforeach
                        @else
                        <p>No meals</p>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection