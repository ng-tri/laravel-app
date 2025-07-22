@extends('admin.layouts.app')

@section('title', 'Tạo mới người dùng')

@section('tree_path', 'User')

@section('content')
    <div class="container">
        <h2>Create User</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required minlength="6">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
