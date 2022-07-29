<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);

Route::get('/detail/{id}', [PageController::class, 'getDetail']);


Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/about', [PageController::class, 'getAbout']);
// ----------------- TRANG ADMIN ---------------
Route::get('/formAdd', [PageController::class, 'getAdminpage'])->name('admin');
Route::post('/formAdd', [PageController::class, 'postAdminAdd'])->name('add-product');
Route::get('/showadmin', [PageController::class, 'getIndexAdmin']);

Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit']);
Route::post('/admin-edit', [PageController::class, 'postAdminEdit']);
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);

//---------------- CART ---------------
Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');

//------------------------- Login, Logout, Register ---------------------------------//
Route::get('/register', function () {
    return view('users.register');
});

Route::post('/register', [UserController::class, 'Register']);

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/logout', [UserController::class, 'Logout']);
Route::post('/login', [UserController::class, 'Login']);

//-----------------checkout----------------------
Route::get('check-out', [PageController::class, 'getCheckout'])->name('dathang');
Route::post('check-out', [PageController::class, 'postCheckout'])->name('dathang');


Route::get('/admin-export', [PageController::class, 'exportAdminProduct'])->name('export');
//------------------VNpay-------------------------

Route::get('/vnpay-index',function(){
    return view('page.vnpay-index');
    });
//Route xử lý nút Xác nhận thanh toán trên trang checkout.blade.php
Route::post('/vnpay/create_payment',[PageController::class,'createPayment'])->name('postCreatePayment');
//Route để gán cho key "vnp_ReturnUrl" ở bước 6
Route::get('/vnpay_return',[PageController::class,'vnpayReturn'])->name('vnpayReturn');


// Route xử lý email
Route::get('/input-email',function(){
    return view('emails.input-email');
});

Route::post('/input-email',[PageController::class,'postInputEmail'])->name('postInputEmail');


//------------------------- Wishlist ---------------------------------//
Route::prefix('wishlist')->group(function () {
    Route::get('/add/{id}', [WishlistController::class, 'AddWishlist']);
    Route::get('/delete/{id}', [WishlistController::class, 'DeleteWishlist']);

    Route::get('/order', [WishlistController::class, 'OrderWishlist']);
});

//------------------------- Comment ---------------------------------//
Route::post('/comment/{id}', [CommentController::class, 'AddComment']);