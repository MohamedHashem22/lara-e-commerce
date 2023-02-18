<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders= DB::table('Orders')->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.order.index',compact('orders'));
    }

    public function view($order_id)
    {
        $order=Order::where('id',$order_id)->where('user_id',Auth::user()->id)->first();

        if($order)
        {
            return view('frontend.order.view',compact('order'));
        }
        else
        {
            return redirect()->back()->with('message','No Order Found');
        }

    }
}
