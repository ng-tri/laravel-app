<?php

namespace App\Http\Controllers\Admin\Order;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function __construct()
    {
        $orderStatuses = OrderStatus::options();
        $users = User::select('id', 'name')->withoutTrashed()->get();
        $customers = Customer::select('id', 'first_name', 'last_name')->withoutTrashed()->get();

        View::share([
            'orderStatuses' => $orderStatuses,
            'users' => $users,
            'customers' => $customers,
        ]);
    }

    public function index()
    {
        $orders = Order::withoutTrashed()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create(OrderService $orderService)
    {
        $orderCode = $orderService->generateOrderCode();

        Order::create([
            'order_code' => $orderCode,
            'user_id' => 1,
            'customer_id' => 1,
            'recipient_name' => 'Nam',
            'recipient_phone' => '0909123409',
            'total_amount' => '134000',
            'note' => 'no ship',
            'shipping_note' => 'no call',
            'shipping_address' => 'Hẻm 43, Đường số 9, Khu phố Tam Đa',
            'ordered_at' => now()
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->only(['name', 'description', 'price', 'stock', 'is_active']));

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
