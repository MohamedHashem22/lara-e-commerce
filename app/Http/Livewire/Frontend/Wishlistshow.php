<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Auth;

use App\Models\Wishlist;
use Livewire\Component;

class Wishlistshow extends Component
{
    public function removeWishList($id)
    {
        Wishlist::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        session()->flash('message','Wishlist Removed Successfully');
    }
    public function render()
    {
        $wishlist=Wishlist::where('user_id',Auth::user()->id)->get();
        return view('livewire.frontend.wishlistshow',[
            'wishlist'=>$wishlist
        ]);
    }
}
