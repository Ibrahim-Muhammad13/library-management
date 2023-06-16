@extends('layouts.app')
@section('content')
@if (session()->has('success'))
<div class="container alert alert-success">
    {{ session('success') }}
    </div>
@endif
@if (session()->has('danger'))
<div class="container alert alert-danger">
    {{ session('danger') }}
    </div>
@endif
<div class="container">
    <a href="{{ route('author.create') }}" type="button" class="btn btn-info me-2 float-end" value="edit">Add Author</a>
    <table class="table">
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
                <a href="{{ route('author.edit',$author->id) }}" type="button" class="btn btn-info me-2" value="edit">edit
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
@endsection
