<?php

namespace App\Http\Controllers\Manager;

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
            return view('manager.orders.status', [
                'status' => $status,
                'orders' => $orders,
                'orderDetails'=>$orderDetails,
            ]);
        } else {

            $numberOfOrders          = Order::count();
            $numberOfPendingOrders   = Order::where('status', 'pending')->count();
            $numberOfApprovedOrders  = Order::where('status', 'approved')->count();
            $numberOfCompleteOrders   = Order::where('status', 'complete')->count();
            $numberOfCancelledOrders  = Order::where('status', 'cancelled')->count();

            return view('manager.dashboard', [
                'numberOfOrders'          => $numberOfOrders,
                'numberOfPendingOrders'   => $numberOfPendingOrders,
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
        return view('manager.orders.show', [
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
