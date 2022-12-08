<?php

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

//Front (client)
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\Front\HomeController::class, 'indexContact']);
Route::get('/favorite', [App\Http\Controllers\Front\HomeController::class, 'favoriteProducts']);

Route::prefix('shop')->group(function () {
  Route::get('product/{id}', [App\Http\Controllers\Front\ShopController::class, 'show']);
  Route::post('product/{id}', [App\Http\Controllers\Front\ShopController::class, 'postComment']);
  Route::get('', [App\Http\Controllers\Front\ShopController::class, 'index']);
  Route::get('category/{categoryName}', [App\Http\Controllers\Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
  Route::get('add', [App\Http\Controllers\Front\CartController::class, 'add']);
  Route::get('/', [App\Http\Controllers\Front\CartController::class, 'index']);
  Route::get('delete', [App\Http\Controllers\Front\CartController::class, 'delete']);
  Route::get('destroy', [App\Http\Controllers\Front\CartController::class, 'destroy']);
  Route::get('update', [App\Http\Controllers\Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function () {
  Route::get('', [App\Http\Controllers\Front\CheckOutController::class, 'index']);
  Route::post('/', [App\Http\Controllers\Front\CheckOutController::class, 'addOrder']);
  Route::get('/result', [App\Http\Controllers\Front\CheckOutController::class, 'result']);

  Route::get('/vnPayCheck', [App\Http\Controllers\Front\CheckOutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
  Route::get('login', [App\Http\Controllers\Front\AccountController::class, 'login']);
  Route::post('login', [App\Http\Controllers\Front\AccountController::class, 'checkLogin']);

  Route::get('logout', [App\Http\Controllers\Front\AccountController::class, 'logout']);

  Route::get('register', [App\Http\Controllers\Front\AccountController::class, 'register']);
  Route::post('register', [App\Http\Controllers\Front\AccountController::class, 'postRegister']);

  Route::get('forgotpassword', [App\Http\Controllers\Front\AccountController::class, 'forgotpassword']);
  Route::post('send-email', [App\Http\Controllers\Front\AccountController::class, 'sendemail']);
  Route::get('update_newpass', [App\Http\Controllers\Front\AccountController::class, 'updatenewpass']);
  Route::post('reset_newpass', [App\Http\Controllers\Front\AccountController::class, 'resetnewpass']);

  Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\AccountController::class, 'myOrderIndex']);
    Route::get('{id}', [App\Http\Controllers\Front\AccountController::class, 'myOrderShow']);
  });

  Route::prefix('my-contact')->middleware('CheckMemberLogin')->group(function () {
    Route::resource('contactuser', App\Http\Controllers\Front\ContactUserController::class);
  });
});

//Dashboard (Admin)
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
  Route::redirect('', 'admin/user');

  Route::resource('user', App\Http\Controllers\Admin\UserController::class);
  Route::resource('category', App\Http\Controllers\Admin\ProductCategoryController::class);
  Route::resource('trademark', App\Http\Controllers\Admin\TrademarksController::class);
  Route::resource('product/{product_id}/image', App\Http\Controllers\Admin\ProductImageController::class);
  Route::resource('product/{product_id}/detail', App\Http\Controllers\Admin\ProductDetailController::class);
  Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
  Route::resource('order', App\Http\Controllers\Admin\OrderController::class);
  Route::resource('revenu_day', App\Http\Controllers\Admin\RevenusDayController::class);
  Route::resource('revenu_month', App\Http\Controllers\Admin\RevenusMonthController::class);
  // Route::resource('revenu_filter_day', App\Http\Controllers\Admin\RevenusFilterDayController::class);
  // Route::post('revenu_filter_day/filter_by_date', [App\Http\Controllers\Admin\RevenusFilterDayController::class], 'filter_by_date');
  Route::prefix('revenu_filter_day')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\RevenusFilterDayController::class, 'index']);
  });

  // Route::post('order_{{id}}', [App\Http\Controllers\Admin\OrderController::class, 'Confirmed']);

  Route::prefix('login')->group(function () {
    Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
    Route::post('', [App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
  });

  Route::get('logout', [App\Http\Controllers\Admin\HomeController::class, 'logout']);
});

