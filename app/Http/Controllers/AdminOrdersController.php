<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSentMail;
use App\Order;
use App\OrderItem;
use App\Address;
use App\User;
use App\Product;
use App\Bowtie;

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
        $orders = Order::where('status', '!=', 'not-payed')->orderBy('id', 'desc')->get();
        $users = User::all();
        
        return view('admin.orders.index')->with([
            'orders' => $orders,
            'users' => $users
        ]);
    }

    public function show($id) {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $address = Address::find($order->address);
        $items = OrderItem::where('order_id', $order->id)->get();
        $products = Product::all();
        $bowties = Bowtie::all();

        return view('admin.orders.show')->with([
            'order' => $order,
            'user' => $user,
            'address' => $address,
            'items' => $items,
            'products' => $products,
            'bowties' => $bowties
        ]);
    }

    public function editStatus(Request $request) {
        $order = Order::find($request->id);
        $order->status = $request->status;

        if(!empty($request->tracking_number)) {
            $order->tracking_number = $request->tracking_number;
        }

        $order->save();

        // Mail with user data
        $user = User::find($order->user_id);
        $data = [
            'username' => $user->name,
            'order_id' => $order->id,
            'tracking_number' => $request->tracking_number
        ];

        Mail::to($user->email)->send(new OrderSentMail($data));

        return redirect('/admin/orders')->with('success', 'Statut de la commande modifié');
    }
}
