<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sell;
use App\Models\Order;

class SellController extends Controller
{
    //
    public function order()
    {

        $user = 1;
        $customers = Customer::where('user_id', $user)->get();

        $products = Product::where('user_id', $user)->get();


        return view('order.order')->with('customers', $customers)->with('products', $products);
    }

    public function addOrder(Request $request)
    {

        $request->validate([

            'quantity' => 'required|numeric|gt:0',

        ]);
        $cart = [];

        $exist_product = Product::where('id', $request->product_id)->first();

        if (session()->has('customer_id')) {

            
            if ($request->quantity <= $exist_product->quantity) {

                if (session()->has('cart')) {
                    $cart = json_decode(session()->get('cart'));
                }
                $product = array('id' => $request->product_id, 'name' => $request->product_name, 'quantity' => $request->quantity);
                $cart[] = (object)($product);
                $jsonCart = json_encode($cart);
                session()->put('cart', $jsonCart);
                session()->flash('p_id', $request->product_id);
                session()->flash('msg', 'Product Added In Order');
                return redirect()->route('order');   
            }
            session()->flash('p_id', $request->product_id);
            session()->flash('msg', 'Quantity Not Available');
            return redirect()->route('order');
            
        }
        session()->flash('p_id', $request->product_id);
        session()->flash('msg', 'Select Customer First');
        return redirect()->route('order');

    }

    public function cart()
    {
        $cart =[];
        if (session()->has('cart')) {
            $total_price = 0;
            $cart = json_decode(session()->get('cart'));
            foreach($cart as $p){
                $exist_product = Product::where('id',$p->id)->first();
                $price = $p->quantity * $exist_product->sales_price;
                $total_price = $total_price + $price;
            }
            return view('order.cart')->with('cart',$cart)->with('total_price',$total_price);
        }


        return view('order.cart');
    }

    public function purchase()
    {
        $cart = [];

        if (session()->has('customer_id')) {

            if (session()->has('cart')) {
                $cart = json_decode(session()->get('cart'));
                $total_price = 0;
                foreach($cart as $p){
                    $exist_product = Product::where('id',$p->id)->first();
                    if($p->quantity > $exist_product->quantity){
                        session()->flash('msgg', 'Insufficient Quantity');
                        return redirect()->route('order');
                    }
                    $price = $p->quantity * $exist_product->sales_price;
                    $total_price = $total_price + $price;
                }

                $order = new Order();
                $order->customer_id = session()->get('customer_id');
                $order->price = $total_price;
                $order->save();

                foreach($cart as $p){
                    $sell = new Sell();
                    $sell->order_id = $order->id;
                    $sell->product_id = $p->id;
                    $sell->purchase_quantity = $p->quantity;
                    $sell->save();

                    $product = Product::where('id',$p->id)->first();
                    $product->quantity = $product->quantity - $p->quantity;
                    $product->update();
                }

                session()->pull('customer_id');
                session()->pull('customer_name');
                session()->pull('cart');

                session()->flash('msgg', 'Product Purchase Successfull');
                return redirect()->route('order');


            }

            
        }
        session()->flash('msgg', 'Select Customer First');
        return redirect()->route('order');


    }

    public function customerSelect(Request $request)
    {

        if (session()->has('cart')) {
            Session::pull('cart');
        }
        session()->put('customer_id', $request->customer_id);
        session()->put('customer_name', $request->customer_name);



        return redirect()->route('order');
    }



}
