<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Viewcart extends Component
{
    public $totalprice = 0;

    public function deletefromcart(int $cartid)
    {
        Cart::where('id', $cartid)->where('user_id', Auth::user()->id)->delete();
        session()->flash('message', 'Product deleted from Your Cart successfully');
    }

    public function render()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart)
        {
            $this->totalprice += ($cart->product->selling_price) * ($cart->quantity);
        }
        return view('livewire.frontend.cart.viewcart', ['carts' => $carts, 'totalprice' => $this->totalprice]);
    }
}
