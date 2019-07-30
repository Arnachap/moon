<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Stripe;
use App\Order;
use App\OrderItem;
use App\Address;
use App\Tissu;
use App\Bowtie;

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

    public function place(Request $request) {
        $request->validate([
            'name' => 'required',
            'address1' => 'required',
            'postcode' => 'required',
            'city' => 'required',
        ]);

        // Save Address
        $address = new Address;
        $address->name = $request->name;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->postcode = $request->postcode;
        $address->city = $request->city;
        $address->save();

        // Save Order
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->address = $address->id;
        $order->status = 'not-payed';
        $order->save();

        // Save ordered items
        foreach(Cart::content() as $product) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $product->qty;
            $orderItem->options = $product->options;
            $orderItem->save();
        }

        return redirect('/payment/' . $order->id);
    }

    public function payment($id) {
        $order = Order::find($id);
        $tissus = Tissu::all();
        $bowties = Bowtie::all();

        return view('orders.payment')->with([
            'order' => $order,
            'tissus' => $tissus,
            'bowties' => $bowties
        ]);
    }

    public function pay(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (Cart::total() + 3) * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Commande n°" . $request->id
        ]);
        
        $order = Order::find($request->id);
        $order->status = 'payed';
        if(Cart::discount() > 0) {
            $order->promo = Cart::discount();
        }
        $order->save();
        
        Cart::destroy();
        return redirect('/home')->with('success', 'Commande validé ! Vous allez recevoir un email récapitulatif.');
    }
}
