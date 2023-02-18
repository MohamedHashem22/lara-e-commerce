<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class CartCount extends Component
{
    public $cartcount;
    public function checkcount()
    {
        if(Auth::check())
        {
            $this->cartcount=Cart::where('user_id',Auth::user()->id)->count();
        }
        else
        {
            $this->cartcount=0;
        }
    }
    public function render()
    {   $this->checkcount();
        return view('livewire.frontend.cart.cart-count',['cartcount'=>$this->cartcount]);
    }
}
