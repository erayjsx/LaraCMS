<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $total = 0;
        $items = [];

        foreach ($request->products as $item) {
            $product = Product::find($item['id']);
            $price = $product->price;
            $quantity = $item['quantity'];
            $total += $price * $quantity;

            $items[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ];
        }

        $order = Order::create([
            'user_id' => 1,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($items as $item) {
            $order->items()->create($item);
        }

        return response()->json(['success' => true, 'order_id' => $order->id]);
    }
}
