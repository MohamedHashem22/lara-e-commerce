<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting=Setting::first();
        return view('admin.setting.index',compact('setting'));
    }
    public function SaveSetting(Request $request)
    {
        $setting=Setting::first();
        if($setting)
        {
            $setting->update([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'page_title'=>$request->page_title,
                'meta_keywords'=>$request->meta_keywords,
                'meta_description'=>$request->meta_description,
                'address'=>$request->address,
                'phone1'=>$request->phone1,
                'phone2'=>$request->phone2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'twiter'=>$request->twiter,
                'inst'=>$request->inst,
                'youtube'=>$request->youtube
            ]);
            return redirect()->back()->with('message','Save Setting Successfully');
        }
        else
        {
            Setting::create([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'page_title'=>$request->page_title,
                'meta_keywords'=>$request->meta_keywords,
                'meta_description'=>$request->meta_description,
                'address'=>$request->address,
                'phone1'=>$request->phone1,
                'phone2'=>$request->phone2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'twiter'=>$request->twiter,
                'inst'=>$request->inst,
                'youtube'=>$request->youtube
            ]);

            return redirect()->back()->with('message','Save Setting Successfully');
        }
    }
}
