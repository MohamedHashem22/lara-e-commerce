<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFromRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\product_image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $Brands = Brand::all();
        return view('admin.product.create', compact('categories', 'Brands'));
    }

    public function store(ProductFromRequest $request)
    {
        $validateData = $request->validated();
        $category = Category::findOrfail($request->category_id);
        $product = $category->products()->create([
            'category_id' => $request->category_id,
            'name' => $validateData['name'],
            'slug' => $validateData['slug'],
            'brand' => $request->brand,
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'meta_title' => $validateData['meta_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description'],

        ]);
        if ($request->hasFile('image')) {
            $uploadpath = 'upload/products/';

            $i = 1;
            foreach ($request->file('image') as $imagefile) {
                $extention = $imagefile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imagefile->move($uploadpath, $filename);
                $finalimagePath = $uploadpath . $filename;

                $product->product_images()->create([
                    'product_id' => $product->id,
                    'image' => $finalimagePath,
                ]);
            }
        }

        return redirect('/admin/product')->with('message', 'Product Added Successfully');

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $productimage = product_image::where('product_id', $product->id)->get();

        return view('admin.product.edit', compact('product', 'categories', 'brands', 'productimage'));
    }

    public function update(ProductFromRequest $request, $product_id)
    {
        $validateData = $request->validated();
        $product = Product::where('id',$product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $request->category_id,
                'name' => $validateData['name'],
                'slug' => $validateData['slug'],
                'brand' => $request->brand,
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'status' => $request->status == true ? '1' : '0',
                'trending' => $request->trending == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0',
                'meta_title' => $validateData['meta_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadpath = 'upload/products/';

                $i = 1;
                foreach ($request->file('image') as $imagefile) {
                    $extention = $imagefile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imagefile->move($uploadpath, $filename);
                    $finalimagePath = $uploadpath . $filename;

                    $product->product_images()->create([
                        'product_id' => $product->id,
                        'image' => $finalimagePath,
                    ]);
                }
            }
            return redirect('/admin/product')->with('message', 'Product Update Succefully');
        }
        else
        {
            return redirect('/admin/product')->with('message', 'not Product');
        }
    }

    public function delete($id)
    {
        $product=Product::findOrfail($id);
        if($product->product_images)
        {
            foreach($product->product_images as $image)
            {
                if(File::exists($image->image))
                {
                    File::delete($image->image);
                }
            }

        }
        $product->delete();
        return redirect()->back()->with('message','Product delted succefully');
    }

    public function delete_image($image_id)
    {
        $productImage = product_image::findOrfail($image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('message', 'Product image removed succesfully');
    }


}
