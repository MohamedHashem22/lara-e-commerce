<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//FrontEnd  WebSite

Route::controller(FrontendController::class)->group(function ()
{
    Route::get('/','index');
    Route::get('/collections','collection');
    Route::get('/collections/{slug_category}','products');
    Route::get('/collections/{slug_category}/{slug_product}','productview');
    Route::get('/new-arrival','newarrival');
    Route::get('/featured','featured');
    Route::get('search','search');
    Route::get('fashion','getFashion');
    Route::get('accessories','accessories');
});

//FrontEnd But For Users only Not Visitor
Route::middleware('auth')->group(function(){
    Route::get('/wishlist',[WishlistController::class,'index']);
    Route::get('/cart',[CartController::class,'index']);
    Route::get('/checkout',[CheckoutController::class,'index']);
    Route::get('orders',[OrderController::class,'index']);
    Route::get('/orders/{order_id}',[OrderController::class,'view']);
});


//For Accounts

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';

Route::get('/redirect',[HomeController::class,'check']);






//For Admin Dashboard

Route::prefix('admin')->middleware(['auth','isadmin'])->group(function () {

    Route::get('dashboard',[DashboardController::class,'index']);

    //Category Crud
    Route::controller(CategoryController::class)->group(function ()
    {
    Route::get('category','index');
    Route::get('category/createc','create');
    Route::post('category','store');
    Route::get('category/{category}/edit','edit');
    Route::put('category/{id}/update','update');
    Route::get('category/{id}/delete','delete');
    });
    //Brand Crud
    Route::get('brands',[BrandController::class,'index']);
    //Product Crud
    Route::controller(ProductController::class)->group(function ()
    {
        Route::get('product','index');
        Route::get('product/createp','create');
        Route::post('product/store','store');
        Route::get('product/{product}/edit','edit');
        Route::put('product/{id}/update','update');
        Route::get('product-image/{id}/delete','delete_image');
        Route::get('product/{id}/delete','delete');
    });
    //Slider Crud
    Route::controller(SliderController::class)->group(function()
    {
        Route::get('slider','index');
        Route::get('slider/creates','create');
        Route::post('slider','store');
        Route::get('slider/{slider}/edit','edit');
        Route::put('slider/{slider}/update','update');
    });
    //Order Manage
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('order','index');
        Route::get('orders/{id}','view');
        Route::post('orders/{id}','updateStatus');
        Route::get('downloadInvoice/{id}','download');
        Route::get('viewInvoice/{id}','viewInvoice');
    });

    //Setting
    Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function(){

    Route::get('setting','index');
    Route::post('setting','SaveSetting');
    });

});



