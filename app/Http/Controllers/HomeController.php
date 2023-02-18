<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;

class HomeController extends Controller
{
    //
    public function check()
    {
        if(Auth::user()->role_as=='1')
        {
            return redirect()->action( [DashboardController::class, 'index']);
        }

        else
        return view('dashboard');

    }
}
