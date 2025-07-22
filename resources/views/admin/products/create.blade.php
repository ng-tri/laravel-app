@extends('admin.layouts.app')

@section('title', 'Tạo mới sản phẩm')

@section('tree_path', 'Product')

@section('content')
    <div class="container">
        <h2>Thêm sản phẩm mới</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Giá (₫):</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Tồn kho:</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}" required>
            </div>

            <div class="form-group">
                <label for="is_active">Trạng thái:</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Tạo sản phẩm</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
