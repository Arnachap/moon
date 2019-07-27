<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Address;
use App\OrderItem;
use App\Product;
use App\ProductPhoto;
use App\Tissu;
use App\Bowtie;
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

        return view('users.home')->with([
            'user' => $user,
            'orders' => $orders
        ]);
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
        $tissus = Tissu::all();

        $totalPrice = 0;

        foreach($orderItems as $item) {
            if($item->product_id >= 910) {
                $totalPrice = $totalPrice + 40;
            } else if(isset($item->options['collection'])) {
                $bowtie = Bowtie::find($item->product_id);
                $item->bowtie = $bowtie;

                $subtotal = $item->bowtie->price * $item->quantity;
                $totalPrice = $totalPrice + $subtotal;
            } else {
                $product = Product::find($item->product_id);
                $item->photo = ProductPhoto::where('product_id', $product->id)->get()->first();

                $subtotal = $product->price * $item->quantity;
                $totalPrice = $totalPrice + $subtotal;
            }
        }

        return view('users.order')->with([
            'order' => $order,
            'address' => $address,
            'orderItems' => $orderItems,
            'products' => $products,
            'totalPrice' => $totalPrice,
            'tissus' => $tissus
        ]);
    }
}
