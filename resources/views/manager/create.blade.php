@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2" style="margin-top: 200px">@extends('layouts.side')</div>
            <div class="col-10">
        @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <h1>Create Manager</h1>

        <form action="{{ route('managers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">role</label>
                <select name="role" id="">
                    <option value="" selected disabled>select role</option>
                    <option value="1">super admin</option>
                    <option value="2">manger</option>
                    <option value="3">viewer</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
