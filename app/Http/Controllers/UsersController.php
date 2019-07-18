<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Address;
use App\OrderItem;
use App\Product;
use Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where([['user_id', '=', $user->id], ['status', '!=', 'not-payed']])->get();

        return view('users.home')
            ->with('user', $user)
            ->with('orders', $orders);
    }

    /**
     * Show the user order.
     */
    public function showOrder($id)
    {
        $order = Order::find($id);
        $address = Address::find($order->address);
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        $products = Product::all();

        $totalPrice = 0;

        foreach($orderItems as $item) {
            $product = Product::where('name', $item->product_name)->first();
            $subtotal = $product->price * $item->quantity;
            $totalPrice = $totalPrice + $subtotal;
        }

        return view('users.order')
            ->with('order', $order)
            ->with('address', $address)
            ->with('orderItems', $orderItems)
            ->with('products', $products)
            ->with('totalPrice', $totalPrice);
    }
}
