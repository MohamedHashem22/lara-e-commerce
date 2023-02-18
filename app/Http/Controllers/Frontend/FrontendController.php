<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders=Slider::where('status','0')->get();
        $trendingProduct=Product::where('trending','1')->where('status','0')->orderBy('id','DESC')->take(15)->get();
        $featuredproduct=Product::where('featured','1')->where('status','0')->orderBy('id','DESC')->take(15)->get();
        $newarrival=Product::where('status','0')->orderBy('id','DESC')->take(20)->get();


        return view('frontend.index',compact('sliders','trendingProduct','newarrival','featuredproduct'));
    }

    public function collection()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collection.category.index',compact('categories'));
    }

    public function products($slug)
    {
        $category=Category::where('slug',$slug)->first();

        if($category)
        {


            return view('frontend.collection.product.index',compact('category'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function productview(string $slug_category,string $slug_product)
    {
        $category=Category::where('slug',$slug_category)->first();
        if($category)
        {
            $product=$category->products()->where('slug',$slug_product)->where('status','0')->first();
            if($product)
            {
                $productsRelate=$category->products()->where('status','0')->where('brand',$product->brand)->take(4)->get();
                return view('frontend.collection.product.view',compact('product','category','productsRelate'));
            }
            else{
                return redirect()->back();
            }
        }
        else
        {
                return redirect()->back();
        }
    }

    public function newarrival()
    {
        $products=Product::where('status','0')->orderBy('id','DESC')->take(20)->get();
        return view('frontend.pages.new-arrival',compact('products'));
    }

    public function featured()
    {
        $products=Product::where('featured','1')->where('status','0')->orderBy('id','DESC')->paginate(20);
        return view('frontend.pages.featured',compact('products'));
    }

    public function search(Request $request)
    {
        if($request->search)
        {
            $results=Product::where('name','like','%'.$request->search.'%')->paginate(15);
            return view('frontend.pages.search',compact('results'));
        }
        else
        {
            return redirect()->back()->with('message','Empty Search');
        }
        // $results=Product::where('name','like','%'.$request->search.'%')->get();
        // return $results[0]->name;
    }



    public function getFashion()
    {
        $productsFashion=Product::wherein('category_id',[8,9])->paginate(20);
        return view('frontend.pages.fashion',compact('productsFashion'));
    }

    public function accessories()
    {
        $category=Category::where('slug','accessories')->get();
        $productsAccessories=$category->products->paginate(20);
        return view('frontend.pages.accessories',compact('productsAccessories'));

    }

}
