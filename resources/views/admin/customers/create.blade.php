@extends('admin.layouts.app')

@section('title', 'Tạo mới khách hàng')

@section('tree_path', 'Product')

@section('content')
    <div class="container">
        <h2>Thêm khách hàng mới</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.customers.store') }}" method="POST">
            @csrf
            @include('admin.customers.form')
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
