@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card-header bg-primary text-center" >
           Edit book
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class="card-body">
            <form method="post" action="{{route('book.update',$book)}}"enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div>
                    <label for="title">book name</label>
                    <input type="text" name="title" value="{{$book->title}}" class="form-control">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" name="description"   class="form-control">{{$book->description}}</textarea>

                </div>
                <div>
                    <label for="author">choose Author</label>
                    <select name="author" class="form-control">
                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                        @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                        @endforeach
                    </select>
                </div>
              
                    <div>
                        <label for="select">select category</label>
                        <select name="categories[]" class="form-control">
                        {{-- <option>Select Category</option> --}}
                        {{-- <option value="{{$categorys->id}}">{{$categorys->name}}</option> --}}
                            @foreach($categorys as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                    </div>
                <div>
                    <label for="image">book image</label>
                    <input type="file" name="image"  class="form-control">
                </div>

                <input type="hidden"  name="old_image"  value="{{$book->image}}">
                <div class="form-group">
                    <img src="{{asset($book->image)}}" style="width: 100px; height: 100px;" alt="">
                </div>
               
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="update" >
                </div>
            </form>
        </div>
        </div>

@endsection