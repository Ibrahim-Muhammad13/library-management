@extends('layouts.app')
@section('content')
@if (session()->has('danger'))
<div class="container alert alert-danger">
    {{ session('danger') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-10">
            <div class="w-50 m-auto">
                <h2 class="text-center">Update Author</h2>
    {!! Form::model($author,['route' => ['author.update',$author],'method' => 'put']) !!}
        <div class="mb-3">
          <label for="author_name" class="form-label">Name</label>
          {!!Form::text('author_name',null,['class'=>'form-control'])!!}
            @error('author_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::submit('update',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
</div>
    </div>
</div>
@endsection
