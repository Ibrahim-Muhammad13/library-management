@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
      <div class="col-10">
<h2 class="text-center nav-underline">Authors</h2>
@if (session()->has('success'))
<div class="container alert alert-success text-center">
    {{ session('success') }}
    </div>
@endif
@if (session()->has('danger'))
<div class="container alert alert-danger text-center">
    {{ session('danger') }}
    </div>
@endif
        <a href="{{ route('author.create') }}" type="button" class="btn btn-primary mb-1 float-end" value="Add">Add Author</a>
        <table class="table table-dark table-hover text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($authors as $author)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$author->author_name}}</td>
                <td>
                    <a href="{{ route('author.edit',$author->id) }}" type="button" class="btn btn-primary me-2" value="edit">edit
                    </td>
                    <td>
                        <form action="{{ route('author.destroy',$author->id) }}" method="post">
                            @csrf
                            @method('delete')
                    <input  type="submit" class="btn btn-danger" value="X">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection
