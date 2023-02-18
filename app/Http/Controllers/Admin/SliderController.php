<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestFormSlider;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(RequestFormSlider $requestFormSlider)
    {
        $validateData = $requestFormSlider->validated();
        if ($requestFormSlider->hasFile('image')) {
            $file     = $requestFormSlider->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/slider/', $filename);
            $validateData['image'] ="/upload/slider/$filename";
        }
        $validateData['status'] =  $requestFormSlider->status == true ? '1' :'0';
        Slider::create([
            'title'=>$validateData['title'],
            'description'=>$validateData['description'],
            'image'=>$validateData['image'],
            'status'=>$validateData['status']
        ]);

        return redirect('admin/slider')->with('message','Slider Added Successfully');


    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(RequestFormSlider $requestFormSlider,$id)
    {
        $validateData = $requestFormSlider->validated();
        $slider=Slider::findOrfail($id);
        $destination=$slider->image;
        if ($requestFormSlider->hasFile('image')) {

            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file     = $requestFormSlider->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('upload/slider/', $filename);
            $validateData['image'] ="/upload/slider/$filename";
        }
        $validateData['status'] =  $requestFormSlider->status == true ? '1' :'0';

       Slider::where('id',$id)->update([
            'title'=>$validateData['title'],
            'description'=>$validateData['description'],
            'image'=>$validateData['image'],
            'status'=>$validateData['status']
       ]);

       return redirect('admin/slider')->with('message','Slider Updated Successfully');

    }
}
