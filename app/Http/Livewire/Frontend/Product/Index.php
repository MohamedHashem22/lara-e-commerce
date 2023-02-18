<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class Index extends Component
{
    public $products , $category,$brandInputs = [], $priceInputs ;
    protected $queryString=['brandInputs' => ['except' => '', 'as' => 'brand'],
                             'priceInputs' =>    ['except' => '', 'as' => 'price']         ];
    public function mount($category)
    {

        $this->category=$category;

    }

    public function addToWishList(int $product_id)
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
            {   $product=Product::where('id',$product_id)->where('status','0')->first();
                if(Product::where('id',$product_id)->where('status','0')->exists())
                {
                    if($product->quantity > '0')
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
                                'quantity'=>'1'
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

    public function render()
    {
        $this->products=Product::where('category_id',$this->category->id)
                                ->when($this->brandInputs,function($q){
                                    $q->whereIn('brand',$this->brandInputs);
                                })
                                ->when($this->priceInputs,function($q){
                                    $q->when($this->priceInputs == 'high-to-low',function($q2){
                                        $q2->orderBy('selling_price','DESC');
                                    })
                                    ->when($this->priceInputs == 'low-to-high',function($q2){
                                        $q2->orderBy('selling_price','ASC');
                                    });
                                })
                                ->where('status','0')
                                ->get();
        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'category'=>$this->category,

        ]);
    }
}
