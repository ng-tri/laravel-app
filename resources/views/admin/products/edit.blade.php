@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('tree_path', 'Product')

@section('content')
    <div class="container">
        <h2>Chỉnh sửa sản phẩm</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Mô tả:</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Giá (₫):</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tồn kho:</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Trạng thái:</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $product->is_active) == '1' ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('is_active', $product->is_active) == '0' ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
