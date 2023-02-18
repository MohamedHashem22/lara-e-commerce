<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $today=Carbon::now();
        $orders=Order::whereDate('created_at',$today)->paginate(5);
        if($request != NULL)
        {
            if($request->date != NULL && $request->status != NULL)
            {
                $orders=Order::whereDate('created_at',$request->date)->where('status_message',$request->status)->paginate(5);

            }
            else if($request->date != NULL && $request->status == NULL)
            {
                $orders=Order::whereDate('created_at',$request->date)->paginate(5);

            }
            else if($request->date == NULL && $request->status != NULL)
            {
                $orders=Order::where('status_message',$request->status)->paginate(5);

            }
        }



        return view('admin.order.index',compact('orders'));
    }

    public function view($id)
    {
        $order=Order::where('id',$id)->first();
        return view('admin.order.view',compact('order'));
    }

    public function updateStatus(int $id,request $request)
    {
        $order=Order::findOrfail($id);
        if($order)
        {
            $order->update(['status_message'=>$request->status]);
            return redirect('admin/orders/'.$id)->with('message','Order Update Status');

        }
        else
        {
            return redirect()->with('message','Order Id Not Found');
        }
    }

    public function download(int $id)
    {

        $order=Order::findOrfail($id);
        $data=['order'=>$order];
        $pdf = Pdf::loadView('admin.invoice.view', $data);
        return $pdf->download('invoice'.$order->id.'.pdf');

    }
    public function viewInvoice(int $id)
    {
        $order=Order::findOrfail($id);
        return view('admin.invoice.view',compact('order'));
    }


}
