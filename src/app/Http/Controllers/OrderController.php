<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * save order in database
     *
     * @param Request $request
     * @return view
     */
    public function saveorder(Request $request)
    {

        $productQuantities = [];
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->save();

        $productsIds = session()->get('box') ?? [];

        foreach ($productsIds as $productId) {
            if (array_key_exists($productId, $productQuantities)) {
                $productQuantities[$productId]++;
            } else {
                $productQuantities[$productId] = 1;
            }
        }
        foreach (array_keys($productQuantities) as $pq) {
            $orderproduct = new Orderproduct();
            $orderproduct->product_id = $pq;
            $orderproduct->qte = $productQuantities[$pq];
            $orderproduct->order_id = $order->id;
            $orderproduct->save();
        }
        session()->forget('box');
        return redirect('/products');
    }
}
