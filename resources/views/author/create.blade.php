@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['route' => 'author.store','method' => 'post']) !!}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          {!!Form::text('author_name',null,['class'=>'form-control'])!!}
          @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
        {!! Form::submit('Add',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
</div>
@endsection
