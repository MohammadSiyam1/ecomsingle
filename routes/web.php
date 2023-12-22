<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserTemplateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});

Route::controller(UserTemplateController::class)->group(function(){
    Route::get('/category/{id}/{slug}','CategoryPage')->name('CategoryPage');
    Route::get('/single-product/{id}','SingleProduct')->name('SingleProduct');
    Route::get('/new-release','NewRelease')->name('NewRelease');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','role:admin', 'verified'])->name('dashboard');

Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(UserTemplateController::class)->group(function(){
        Route::get('/cart','CartPage')->name('CartPage');
        Route::get('/cart/delete-item/{id}','deleteCartItem')->name('deleteCartItem');
        Route::post('/add-to-cart','AddToCart')->name('AddToCart');
        Route::get('/shipping-address','ShippingAddress')->name('ShippingAddress');
        Route::post('/store-shipping-address','StoreShippingAddress')->name('StoreShippingAddress');
        Route::post('/place-order','placeOrder')->name('placeOrder');
        Route::get('/checkout','CheckOut')->name('CheckOut');
        Route::get('/user-dashboard','UserDashboard')->name('UserDashboard');
        Route::get('/user-dashboard/pending-orders','PendingOrders')->name('PendingOrders');
        Route::get('/user-dashboard/history','History')->name('History');
        Route::get('/todays-deal','TodaysDeal')->name('TodaysDeal');
        Route::get('/customer-service','CustomerService')->name('CustomerService');
    });
});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('admin/dashboard','profile')->name('admin.dashboard');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/all-category','index')->name('admin.allcategory');
        Route::get('admin/add-category','addCategory')->name('admin.addcategory');
        Route::post('admin/store-category','storeCategory')->name('admin.storeCategory');
        Route::get('admin/edit-category/{id}','editCategory')->name('admin.editCategory');
        Route::PUT('admin/update-category/{id}','updateCategory')->name('admin.updateCategory');
        Route::get('admin/delete-category/{id}','deleteCategory')->name('admin.deleteCategory');

    });

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('admin/all-subcategory','index')->name('admin.allsubcategory');
        Route::get('admin/add-subcategory','addSubCategory')->name('admin.addsubcategory');
        Route::post('admin/store-subcategory','storeSubCategory')->name('admin.storeSubCategory');
        Route::get('admin/edit-sub-category/{id}','editSubCategory')->name('admin.editSubCategory');
        Route::put('admin/update-sub-category/{id}','updateSubCategory')->name('admin.updateSubCategory');
        Route::get('admin/delete-sub-category/{id}','deleteSubCategory')->name('admin.deleteSubCategory');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('admin/all-product','index')->name('admin.allproduct');
        Route::get('admin/add-product','addProduct')->name('admin.addproduct');
        Route::post('admin/store-product','storeProduct')->name('admin.storeProduct');
        Route::get('admin/edit-product/{id}','editProduct')->name('admin.editProduct');
        Route::put('admin/update-product/{id}','updateProduct')->name('admin.updateProduct');
        Route::get('admin/delete-product/{id}','deleteProduct')->name('admin.deleteProduct');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('admin/pending-order','pendingOrder')->name('admin.pendingorder');
        Route::post('admin/store-to-confirmed-order/{id}','storeToConfirmOrder')->name('admin.storeToConfirmOrder');
        Route::get('admin/confirmed-orders','confirmedOrders')->name('admin.confirmedOrders');
        Route::get('admin/cancel-orders/{id}','cancelOrder')->name('admin.cancelOrder');
    });
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
