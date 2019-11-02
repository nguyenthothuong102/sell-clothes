<?php

namespace App\Http\Controllers\Shipper;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request,Order $order)
    {
        $status = $request->status;

        if ($status) {

            $orders = Order::where('status', $status)->orderBy('id')->paginate(8);
            $orderDetails = $order->orderDetails;
            //dd($orders);
            return view('shipper.orders.status', [
                'status' => $status,
                'orders' => $orders,
                'orderDetails'=>$orderDetails,
            ]);
        } else {

            $numberOfOrders          = Order::count();
            $numberOfApprovedOrders  = Order::where('status', 'approved')->count();
            $numberOfCompleteOrders   = Order::where('status', 'complete')->count();
            $numberOfCancelledOrders  = Order::where('status', 'cancelled')->count();

            return view('shipper.dashboard', [
                'numberOfOrders'          => $numberOfOrders,
                'numberOfApprovedOrders'  => $numberOfApprovedOrders,
                'numberOfCompleteOrders'   => $numberOfCompleteOrders,
                'numberOfCancelledOrders'  => $numberOfCancelledOrders,
            ]);
        }
    }

     public function show(Order $order)
    {
        $user         = $order->user;
        $orderDetails = $order->orderDetails;
        //dd($user);
        return view('shipper.orders.show', [
            'order'        => $order,
            'user'         => $user,
            'orderDetails' => $orderDetails,
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();

        return redirect()->back();
    }


}
