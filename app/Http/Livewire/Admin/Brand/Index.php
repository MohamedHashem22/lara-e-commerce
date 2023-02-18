<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name , $slug , $status , $brand_id , $category_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id'=>'required'
        ];
    }

    public function resetInput()
    {
        $this->name=NULL;
        $this->slug=NULL;
        $this->status=NULL;
        $this->brand_id=NULL;
        $this->category_id=NULL;
    }
    public function storeBrand()
    {
        $validate = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id=$brand_id;
        $brand=Brand::findOrfail($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;
    }

    public function updateBrand()
    {
        $validate = $this->validate();
        Brand::findOrfail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    public function deltetBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand=Brand::findOrfail($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;
    }
    public function destroyBrand()
    {
        Brand::findOrfail($this->brand_id)->delete();

        session()->flash('message','Brand Delted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $brands=Brand::orderBy('id')->paginate(4);
        $categories=Category::where('status','0')->get();
        return view('livewire.admin.brand.index',['brands'=>$brands , 'categories'=>$categories]);
    }


}

