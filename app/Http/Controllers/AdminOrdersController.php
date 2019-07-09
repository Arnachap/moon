<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Address;
use App\User;

class AdminOrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $orders = Order::where('status', '!=', 'not-payed')->get();
        $users = User::all();
        
        return view('admin.orders.index')
            ->with('orders', $orders)
            ->with('users', $users);
    }

    public function show($id) {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $address = Address::find($order->address);
        $items = OrderItem::where('order_id', $order->id)->get();

        return view('admin.orders.show')
            ->with('order', $order)
            ->with('user', $user)
            ->with('address', $address)
            ->with('items', $items);
    }

    public function editStatus(Request $request) {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();

        return redirect('/admin/orders')->with('success', 'Statut de la commande modifié');
    }
}
