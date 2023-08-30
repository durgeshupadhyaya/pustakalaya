<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookRequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryChargeController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OurteamController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PaymentgatewayController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Route;

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
// Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes(['register' => false]);
});

//CMS routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'isAdmin'], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::post('/product/featured-image/{product}', [ProductController::class, 'featuredImage'])->name('featured.image');
    Route::post('/product/gallery/{product}', [ProductController::class, 'gallery'])->name('gallery');
    Route::get('/product/image/delete/{id}/{type}', [ProductController::class, 'imageDelete'])->name('image.delete');

    // orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.delete');
    Route::get('/orders/{order}', [OrderController::class, 'orderItems'])->name('orders.items');
    Route::post('order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('order.status');

    Route::resource('users', UserController::class);
    Route::resource('coupons', CouponController::class);

    Route::resource('blogs', BlogController::class);
    Route::resource('ourteams', OurteamController::class);
    Route::resource('partners', PartnerController::class);

    Route::resource('testimonials', TestimonialController::class);
    Route::resource('pages', PageController::class);
    Route::resource('socialmedias', SocialmediaController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('banners', BannerController::class);

    Route::resource('downloads', DownloadController::class);
    Route::resource('payments', PaymentgatewayController::class);
    Route::resource('delivery', DeliveryChargeController::class);

    Route::get('change-password', [AuthController::class, 'index'])->name('profile');
    Route::post('change-password', [AuthController::class, 'store'])->name('change.password');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('inquirypersons', [InquiryController::class, 'index'])->name('inquirypersons.index');
    Route::delete('inquirypersons/{inquiryperson}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

    Route::get('bookrequestinquiry', [BookRequestController::class, 'index'])->name('bookrequestinquiry.index');
    Route::delete('bookrequestinquiry/{bookrequest}', [BookRequestController::class, 'destroy'])->name('bookrequestinquiry.destroy');

    Route::get('excelexport', [OrderController::class, 'excelExport'])->name('excel.export');
});

Route::get('/invoice', [OrderController::class, 'invoice'])->name('invoice');
