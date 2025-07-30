@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa khách hàng')

@section('tree_path', 'Product')

@section('content')
    <div class="container">
        <h2>Chỉnh sửa khách hàng</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.customers.form', ['customer' => $customer])

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
