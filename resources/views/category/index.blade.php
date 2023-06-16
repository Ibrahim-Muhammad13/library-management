@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
    <a href="{{route('category.create')}}" type="submit" class="btn btn-primary col-md-4">Add Category</a>
        <div class="card-header text-center">category</div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">catname</th>
                        <th scope="col">decription</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$category)

                    <tr>
                        <td>{{$key = $key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-primary ">Edit</a></td>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <td>
                               
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                         
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection