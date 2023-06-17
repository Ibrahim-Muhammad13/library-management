@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
            <div class="w-50 m-auto">
                <h2 class="text-center">Add Author</h2>
    {!! Form::open(['route' => 'author.store','method' => 'post']) !!}
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        {!!Form::text('author_name',null,['class'=>'form-control'])!!}
        @error('author_name')
    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        {!! Form::submit('Add',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
</div>
</div>
    </div>
@endsection
