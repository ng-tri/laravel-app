@extends('admin.layouts.app')

@section('title', 'Order List')

@section('tree_path', 'Order')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách đơn hàng</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Địa Chỉ Giao Hàng</th>
                    <th>Ngày Giao Hàng</th>
                    <th>Ngày Tạo</th>
                    <th>Hành Động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_code }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->customer_phone }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>{{ $order->ordered_at->format('d/m/Y') }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($orders instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="card-footer clearfix">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection
