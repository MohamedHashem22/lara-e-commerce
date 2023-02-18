<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\models\Order;
use App\models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts , $totalProductAmount=0 , $fullname , $phone , $email ,$pincode , $address;
    public $payment_mode=NULL , $payment_id=NULL;


    public function rules()
    {
        return [
            'fullname'=>'required|string|max:121',
            'phone'=>'required|string|max:11|min:10',
            'email'=>'required|email|max:121',
            'pincode'=>'required|integer',
            'address'=>'required|string|max:500',
        ];
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts=Cart::where('user_id',Auth::user()->id)->get();
        foreach($this->carts as $cart)
        {
            $this->totalProductAmount += $cart->product->selling_price * $cart->quantity;

        }
        return $this->totalProductAmount;
    }

    public function placeOrder()
    {
        $this->validate();

        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'tracking_no'=>'funda-'.Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in Progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id,
        ]);
        foreach($this->carts as $cart)
        {
        $orderItem=OrderItem::create([
            'order_id'=>$order->id,
            'product_id'=>$cart->product_id,
            'quantity'=>$cart->quantity,
            'price'=>$cart->product->selling_price

        ]);
        $product= Product::FindOrfail($cart->product_id);
        $newquantity=($product->quantity - $orderItem->quantity);
        Product::where('id',$product->id)->update([
            'quantity'=>$newquantity ,
        ]);
    }
        return $order;


    }
    public function codeOrder()
    {
        $this->payment_mode='cash on delivery';
        $codeorder=$this->placeOrder();
        if($codeorder)
        {
            Cart::where('user_id',Auth::user()->id)->delete();

            session()->flash('message', 'Order Placed Successfully');
        }
        else
        {
            session()->flash('wrong', 'Something Went Wrong');
        }
    }

    public function render()
    {

        $this->totalProductAmount=$this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show',['totalProductAmount'=>$this->totalProductAmount]);
    }
}
