<?php


namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products=Product::with('images')->orderBy('created_at', 'desc')->paginate(20);

        //dd($products);


        return view('home',compact('products'));
    }
    public function order_manager()
    {
        $orders = Order::where('user_id','=',\auth()->user()->id)->orderBy('id','desc')->paginate(5);
        return view('order_manager',compact('orders'));
    }

    public function order_manager_detail(Request $request, $id)
    {
        $ordered = Order::find($id);
        return view('order_manager_detail',compact('ordered'));
    }
}
