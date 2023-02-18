<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category , $product , $count=1 , $productsRelate;
    public function increment()
    {
        if($this->count < $this->product->quantity)
        $this->count++;
    }
    public function decrement()
    {
        if($this->count >1)
        $this->count--;
    }
    public function addtoWishlist(int $product_id)
    {
        if(Auth::check())
        {
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::user()->id)->exists())
            {
                    session()->flash('info','Already Added To Wishlist');
                    return false;
            }
            else
            {
                Wishlist::create([
                    'user_id'=> Auth::user()->id,
                    'product_id'=>$product_id
                ]);

                session()->flash('message','Wishlist Added Successfully');
            }
        }
        else
        {
            session()->flash('warn','must login to can add to wishlist');
            return false;
        }
    }

    public function addtoCart(int $product_id)
    {
        if(Auth::check())
        {
            if($this->product->where('id',$product_id)->where('status','0')->exists())
            {
                if($this->product->quantity > '0')
                {
                    if(Cart::where('user_id',Auth::user()->id)->where('product_id',$product_id)->exists())
                    {
                        session()->flash('warn','This Is Product Is Already In Your Cart');
                        return false;
                    }
                    else
                    {
                        Cart::create([
                            'user_id'=>Auth::user()->id,
                            'product_id'=>$product_id,
                            'quantity'=>$this->count
                        ]);
                        session()->flash('message','Product Added in Your Cart');
                        return false;
                    }
                }
                else
                {
                    session()->flash('warn','This Is Product Is Out Stock');
                    return false;
                }
            }
            else
            {
                session()->flash('warn','This Is Product Does Not Exist');
                return false;
            }
        }
        else
        {
            session()->flash('warn','must login to can add to wishlist');
            return false;
        }
    }
    public function mount($category,$product,$productsRelate)
    {
        $this->category=$category;
        $this->product=$product;
        $this->productsRelate=$productsRelate;
    }
    public function render()
    {

        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product,
            'productsRelate'=>$this->productsRelate
        ]);
    }
}
