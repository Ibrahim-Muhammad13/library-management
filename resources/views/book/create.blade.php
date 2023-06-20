@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">list</div>
                    <div class="card-body text-right ">
                        <ul class="list-group ">
                            <a  href="{{ route('book.index') }}" class="list-group-item list-group-item-action ">Show books</a>
                            <a href="{{ route('book.create') }}" class="list-group-item list-group-item-action">Add book</a>   
                        </ul>
                    </div>
                </div>
            </div>

    <div class="container col-md-9">
        <div class="card-body">
            <div class="card-header lh-lg text-light text-center bg-danger ">
               book
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div>
                <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" >BookName</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" >
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div>
                        <label for="description">Description</label>
                      <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
                      @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div>
                        <label for="select">select category</label>
                        <select name="categories[]" class="form-control">
                        <option>Select Category</option>
                            @foreach($cats as $cat)          
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                    </div>

                    <div>
                        <label for="select">select Author</label>
                        <select name="author" class="form-control">
                        <option >Select Author</option>
                            @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->author_name}}</option>
                            @endforeach
                        </select>
                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div>
                    <label for="image" >Book image</label>
                    <input type="file" name="image" value="{{old('image')}}"  class="form-control">
                    @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
<!-- 
                    <input name="categories[0]" hidden value="10">
                    <input name="categories[1]" hidden value="11"> -->
                    <br>
            <div class="form-group text-center">
                <button class="btn btn-danger" type="submit">submit</button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection