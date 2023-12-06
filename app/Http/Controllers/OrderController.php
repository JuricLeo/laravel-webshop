<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $request->input('total_price'),
            'status' => 'u tijeku',
        ]);

        return response()->json(['message' => 'Order successfully created', 'order' => $order]);
    }

    public function userOrders()
    {
        $userOrders = Order::where('user_id', auth()->id())->get();
        return view('orders.user_orders', ['userOrders' => $userOrders]);
    }

    public function updateOrderStatus($orderId, $newStatus)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $order->status = $newStatus;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated.');
    }

    public function orderProduct(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->input('product_id'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $product->cijena,
            'status' => 'u tijeku',
        ]);

        $order->products()->attach($product);

        return response()->json(['message' => 'Order placed successfully', 'order_id' => $order->id]);
    }
}
