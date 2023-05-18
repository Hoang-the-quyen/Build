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
// home pages
Route::get('/','\App\Http\Controllers\HomeController@index');

Route::get('/category-detail/{category_id}','\App\Http\Controllers\CategoryController@category_detail');

Route::get('/supplier-detail/{supplier_id}','\App\Http\Controllers\SupplierController@supplier_detail');

Route::get('/product-detail/{product_id}','\App\Http\Controllers\ProductController@product_detail');




// * admin

Route::get('/admin','\App\Http\Controllers\AdminController@index');
// login

Route::get('/admin_login','\App\Http\Controllers\AdminLoginController@index');

Route::get('/admin_register','\App\Http\Controllers\AdminRegistrationController@index');

Route::post('/login','\App\Http\Controllers\AdminLoginController@login');

Route::get('/logout','\App\Http\Controllers\AdminLoginController@logout');

// category
Route::get('/add-category-product','\App\Http\Controllers\CategoryController@add_category');

Route::get('/edit-category-product/{category_product_id}','\App\Http\Controllers\CategoryController@edit_category_product');

Route::get('/delete-category-product/{category_product_id}','\App\Http\Controllers\CategoryController@delete_category_product');

Route::get('/all-category-product','\App\Http\Controllers\CategoryController@all_category');

Route::post('/save-category','\App\Http\Controllers\CategoryController@save_category');

Route::post('/update-category-product/{category_product_id}','\App\Http\Controllers\CategoryController@update_category_product');

Route::get  ('/active-category-product/{category_product_id}','\App\Http\Controllers\CategoryController@active_category_product');

Route::get  ('/unactive-category-product/{category_product_id}','\App\Http\Controllers\CategoryController@unactive_category_product');

// supplier (nhà cung cấp)

Route::get('/add-supplier','\App\Http\Controllers\SupplierController@add_supplier');

Route::post('/save-supplier','\App\Http\Controllers\SupplierController@save_supplier');

Route::get('/all-supplier','\App\Http\Controllers\SupplierController@all_supplier');

Route::get('/edit-supplier/{supplier_id}','\App\Http\Controllers\SupplierController@edit_supplier');

Route::get('/delete-supplier/{supplier_id}','\App\Http\Controllers\SupplierController@delete_supplier');

Route::post('/update-supplier/{supplier_id}','\App\Http\Controllers\SupplierController@update_supplier');

Route::get  ('/active-supplier/{supplier_id}','\App\Http\Controllers\SupplierController@active_supplier');

Route::get  ('/unactive-supplier/{supplier_id}','\App\Http\Controllers\SupplierController@unactive_supplier');

// product
Route::get('/add-product','\App\Http\Controllers\ProductController@add_product');

Route::post('/save-product','\App\Http\Controllers\ProductController@save_product');

Route::get('/all-product','\App\Http\Controllers\ProductController@all_product');

Route::get('/active-product/{product_id}','\App\Http\Controllers\ProductController@active_product');

Route::get('/unactive-product/{product_id}','\App\Http\Controllers\ProductController@unactive_product');

Route::get('/edit-product/{product_id}','\App\Http\Controllers\ProductController@edit_product');

Route::post('/update-product/{product_id}','\App\Http\Controllers\ProductController@update_product');

Route::get('/delete-product/{product_id}','\App\Http\Controllers\ProductController@delete_product');


// Cart

Route::post('/save_cart','\App\Http\Controllers\CartController@save_cart');

Route::get('/show_cart','\App\Http\Controllers\CartController@show_cart');

Route::get('/gio_hang','\App\Http\Controllers\CartController@gio_hang');

Route::get('/delete-to-cart/{rowId}','\App\Http\Controllers\CartController@delete_to_cart');

Route::post('/update-cart-quantity-add','\App\Http\Controllers\CartController@update_cart_quantity_add');

Route::post('/update-cart-quantity-minus','\App\Http\Controllers\CartController@update_cart_quantity_minus');

Route::post('/add-cart-ajax','\App\Http\Controllers\CartController@add_cart_ajax');

Route::get('/delete_cart_ajax/{session_id}','\App\Http\Controllers\CartController@delete_cart_ajax');

Route::post('/update_qty_ajax_plus/{session_id}','\App\Http\Controllers\CartController@update_qty_ajax_plus');

Route::post('/update_qty_ajax_minus/{session_id}','\App\Http\Controllers\CartController@update_qty_ajax_minus');


// checkout

Route::get('/login_checkout','\App\Http\Controllers\CheckoutController@login_checkout');

Route::get('/register_checkout','\App\Http\Controllers\CheckoutController@register_checkout');

Route::get('/checkout','\App\Http\Controllers\CheckoutController@checkout');

Route::post('/save_checkout_customer','\App\Http\Controllers\CheckoutController@save_checkout_customer');

Route::get('/payment','\App\Http\Controllers\CheckoutController@payment');

Route::post('/order_place','\App\Http\Controllers\CheckoutController@order_place');



// customer

Route::post('/add_customer','\App\Http\Controllers\CustomerController@add_customer');

Route::post('/login_customer','\App\Http\Controllers\CustomerController@login_customer');

Route::get('/logout_checkout','\App\Http\Controllers\CustomerController@logout_customer');


// order management

Route::get('/management_order','\App\Http\Controllers\ManagementOrderController@management_order');

Route::get('/management_order_detail/{order_id}','\App\Http\Controllers\ManagementOrderController@management_order_detail');


//coupon

Route::post('/check_coupon','\App\Http\Controllers\CartController@check_coupon');

Route::get('/insert_coupon','\App\Http\Controllers\CouponController@insert_coupon');

Route::post('/insert_coupon_code','\App\Http\Controllers\CouponController@insert_coupon_code');

Route::get('/list_coupon','\App\Http\Controllers\CouponController@list_coupon');

Route::get('/delete_coupon/{coupon_id}','\App\Http\Controllers\CouponController@delete_coupon');
