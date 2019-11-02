<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OrderController extends Controller
{
    public function index(Request $request,Order $order)
    {
        $status = $request->status;

        if ($status) {

            $orders = Order::where('status', $status)->orderBy('created_at','desc')->paginate(7);
            $orderDetails = $order->orderDetails; 
            //dd($orders); 
            return view('admin.orders.status', [
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

            return view('admin.dashboard', [
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
        //$orders=Order::paginate(20);
        
        $user         = $order->user;
        $orderDetails = $order->orderDetails;
        //dd($user);
        return view('admin.orders.show', [
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
    public function destroy($id)
    {
    	$order = Order::find($id);
        $OrderDetail=OrderDetail::where('order_id',$id)->delete();
        $order->delete();
        Session::flash('success','Xóa thành công!');
        return redirect()->back();
    }
}
