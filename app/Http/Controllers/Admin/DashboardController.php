<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $products=Product::count();

        $category=Category::count();

        $totauser=User::count();
        $users=User::where('role_as','0')->count();
        $admins=User::where('role_as','1')->count();

        $brands=Brand::count();

        $totalorder=Order::count();

        $today=Carbon::now()->format('d m Y');
        $ordersintoday=Order::whereDate('created_at',$today)->count();

        $month=Carbon::now()->format('m');
        $orderinmonth=Order::whereMonth('created_at',$month)->count();

        $year=Carbon::now()->format('Y');
        $orderinyear=Order::whereYear('created_at',$year)->count();

        return view('admin.dashboard',compact('products','category', 'totauser','users','admins','brands','totalorder','today','ordersintoday',
        'orderinmonth',
        'orderinyear'));
    }
}
