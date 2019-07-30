<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Stripe;
use Stripe_Error;
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
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => (Cart::total() + 3) * 100,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => "Commande n°" . $request->id
            ]);

            return redirect('/home')->with('success', 'Commande validé ! Vous allez recevoir un email récapitulatif.');
        }  catch(\Stripe\Error\Card $e) {
            return back()->with('error', 'Erreur lors du paiement. Vérifiez que vous avez suffisament de fonds. Si le problème persiste, merci de nous contacter.');
          } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
          } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
          } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
          } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
          } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
          } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
          }
        // } finally {
        //     if(!isset($e)) {
        //         $order = Order::find($request->id);
        //         $order->status = 'payed';
        //         if(Cart::discount() > 0) {
        //             $order->promo = Cart::discount();
        //         }
        //         $order->save();
                
        //         Cart::destroy();
    
        //         return redirect('/home')->with('success', 'Commande validé ! Vous allez recevoir un email récapitulatif.');
        //     } else {
        //         return redirect('/cart')->with('error', 'Erreur lors du paiement. Vérifiez que vous avez suffisament de fonds. Si le problème persiste, merci de nous contacter.');
        //     }
        // }
    }
}
