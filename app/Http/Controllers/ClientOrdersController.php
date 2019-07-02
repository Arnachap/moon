<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Stripe;
use App\Order;

class ClientOrdersController extends Controller
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

    public function shipping() {
        return view('orders.shipping');
    }

    public function ship(Request $request) {
        $request->validate([
            'name' => 'required',
            'adress1' => 'required',
            'postcode' => 'required',
            'city' => 'required',
        ]);

        $order = new Order;
        $order->name = $request->name;
        $order->adress_1 = $request->adress1;
        $order->adress_2 = $request->adress2;
        $order->postcode = $request->postcode;
        $order->city = $request->city;
        $order->user_id = Auth::user()->id;
        $order->products = Cart::content();
        $order->status = 'not-payed';
        $order->save();

        return redirect('/payment/' . $order->id);
    }

    public function payment($id) {
        $order = Order::find($id);

        return view('orders.payment')->with('order', $order);
    }

    public function pay(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => Cart::total() * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Commande n°" . $request->id
        ]);
        
        $order = Order::find($request->id);
        $order->status = 'payed';
        $order->save();
        
        Cart::destroy();

        return redirect('/')->with('success', 'Commande validé !');
    }
}
