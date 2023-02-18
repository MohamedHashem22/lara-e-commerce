<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFromRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function index()
    {

        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFromRequest $request)
    {
        $validate = $request->validated();
        $category = new Category;
        $category->name = $validate['name'];
        $category->slug = Str::slug($validate['slug']);///
        $category->description = $validate['description'];

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title       = $validate['meta_title'];
        $category->meta_keyword     = $validate['meta_keyword'];
        $category->meta_description = $validate['meta_description'];

        $category->status = $request->status == true ? '1' : '0';

        $category->save();
        return redirect('admin/category')->with('message',"Category add Suceefully");
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFromRequest $request , $category_id)
    {
        $validate = $request->validated();
        $category=Category::findorfail($category_id);

        $category->name = $validate['name'];
        $category->slug = Str::slug($validate['slug']);///
        $category->description = $validate['description'];
        $path='upload/category/'.$category->image;
        if ($request->hasFile('image')) {
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title       = $validate['meta_title'];
        $category->meta_keyword     = $validate['meta_keyword'];
        $category->meta_description = $validate['meta_description'];

        $category->status = $request->status == true ? '1' : '0';

        $category->update();

        return redirect('admin/category')->with('message','Category Updated Succefully');
    }

    public function delete($category_id)
    {
        Category::findorfail($category_id)->delete();
        return redirect('/admin/category')->with('message','Category is Deleted Succefully');
    }
}
