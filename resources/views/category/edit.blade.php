@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2" style="margin-top: 200px">@extends('layouts.side')</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    Edit category
                </div>
                <form method="POST" action="{{route('category.update',$cat_id)}}">
                    @method('PUT')
                    @csrf
                    <div class="card-body text-right">
                        <div class="form-group">
                            <label for="cat">category name</label>
                            <input type="text" name="name" value="{{old('name')? :$cat_id->name}}" class="form-control">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cat">category name</label>
                            <input type="text" name="description" value="{{old('description')? :$cat_id->description}}" class="form-control">
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group text-center ">
                            <input type="submit" value="update" class="btn btn-primary  ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endsection
