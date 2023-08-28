<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DelManController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;



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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('/welcome');
 });

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/onclick/{pID}', [OrderController::class, 'onclick'])->name('onclick');
Route::get('/category/{pdCat}', [OrderController::class, 'category'])->name('category');


Route::get('/checkout/{oID}', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/checklist/', [OrderController::class, 'checklist'])->name('checklist');

Route::get('/cart', [OrderController::class, 'cart'])->name('carts');
Route::get('/cart-details', [OrderController::class, 'cout'])->name('check.out');



Route::get('add-to-cart/{pID}', [OrderController::class, 'addToCart'])->name('add.to.cart');

Route::get('/delete/{pID}', [OrderController::class, 'delete'])->name('delete');
Route::get('myproducts/{oID}', [OrderController::class, 'destroy']);
Route::get('myproductsDeleteAll', [OrderController::class, 'deleteAll']);
Route::get('/Removefromtable', [OrderController::class, 'Removefromtable'])->name('Removefromtable');


Route::put('/checkout/{oID}', [OrderController::class, 'placeorder'])->name('placeorder');
Route::get('/orderlist', [OrderController::class, 'orderlist'])->name('orderlist');

Route::get('/review/{oID}', [ReviewController::class, 'review'])->name('review');

Route::get('load-chat-data', [OrderController::class, 'chatcount'])->name('chatcount');

Route::get('load-cart-data', [OrderController::class, 'cartcount'])->name('cartcount');
Route::get('load-cout-data', [OrderController::class, 'coutcount'])->name('coutcount');
Route::get('load-total-data', [OrderController::class, 'total'])->name('total');

Route::get('cart-detail', [OrderController::class, 'detailproduct'])->name('detailproduct');

//MESSAGE 

Route::get('/message', [MessageController::class, 'message'])->name('message');
Route::get('/load-read-data', [MessageController::class, 'message_update']);
Route::get('/message/{id}', [MessageController::class, 'user_message']);


 

// BUYER

Route::resource('/settings', BuyerController::class);

Route::put('/user_update/{id}', [BuyerController::class, 'update']);

Route::post('/settings', [BuyerController::class,'update_image'])->name('update.image');

Route::get('/switch_to_buyer/{id}', [BuyerController::class, 'switch_to_buyer']);

Route::get('/switch_to_seller/{id}', [BuyerController::class, 'switch_to_seller']);

Route::get('/switch_to_delman/{id}', [BuyerController::class, 'switch_to_delman']);

Route::get('/shop/{id}', [BuyerController::class, 'view_shop']);

// SEARCH PRODUCTS



 Route::get('/search_products', [ProductController::class, 'index']);
 Route::get('/viewproducts', [ProductController::class, 'viewproducts']);
 Route::get('/search_details',  [ProductController::class, 'category']);
 Route::GET('/search_filter/', [ProductController::class, 'get_sub_category']);
 Route::get('/search_filter_byPopularity', [ProductController::class, 'byPopularity']);
 Route::get('/search_filter_byPrice', [ProductController::class, 'byPrice']);

// SELLER

Route::resource('/seller_details', SellerController::class);

Route::put('/details_update/{id}', [SellerController::class, 'update']);

Route::put('/add_def/{id}', [SellerController::class, 'add_def']);

Route::post('/seller_details', [SellerController::class,'update_image'])->name('update_image');

Route::get('/become_seller', [SellerController::class, 'sel_reg'])->name('become_seller');

Route::post('/become_seller', [SellerController::class, 'user_to_seller'])->name('user.to.seller');

Route::get('/seller_products', [SellerController::class, 'products']);

Route::get('/babies_and_kids', [SellerController::class, 'c1']);

Route::get('/cameras', [SellerController::class, 'c2']);

Route::get('/gaming', [SellerController::class, 'c3']);

Route::get('/groceries', [SellerController::class, 'c4']);

Route::get('/hobbies_and_stationery', [SellerController::class, 'c5']);

Route::get('/home_and_living', [SellerController::class, 'c6']);

Route::get('/home_appliances', [SellerController::class, 'c7']);

Route::get('/home_entertainment', [SellerController::class, 'c8']);

Route::get('/laptops', [SellerController::class, 'c9']);

Route::get('/makeup_and_fragrances', [SellerController::class, 'c10']);

Route::get('/men_accessories', [SellerController::class, 'c11']);

Route::get('/men_apparel', [SellerController::class, 'c12']);

Route::get('/men_shoes', [SellerController::class, 'c13']);

Route::get('/mobile_accesories', [SellerController::class, 'c14']);

Route::get('/motors', [SellerController::class, 'c15']);

Route::get('/personal_care', [SellerController::class, 'c16']);

Route::get('/pet_care', [SellerController::class, 'c17']);

Route::get('/sports', [SellerController::class, 'c18']);

Route::get('/women_shoes', [SellerController::class, 'c19']);

Route::get('/toys_games_and_collectibles', [SellerController::class, 'c20']);

Route::get('/women_accessories', [SellerController::class, 'c21']);

Route::get('/women_apparel', [SellerController::class, 'c22']);

Route::get('/women_bags', [SellerController::class, 'c23']);

Route::get('/women_shoes', [SellerController::class, 'c24']);

Route::get('/view_product/{pID}', [SellerController::class, 'view_product']);

Route::put('/update_product/{pID}', [SellerController::class, 'update_product']);

Route::put('/delete_product/{pID}', [SellerController::class,'delete_product']);

// Route::get('/{store_name}/{id}', [SellerController::class, 'seller_store']);

// DELIVERY MAN

Route::resource('/delman_details', DelManController::class);

Route::put('/del_update/{id}', [DelManController::class, 'update']);

Route::get('/become_delivery_man', [DelManController::class, 'del_reg'])->name('become_delivery_man');

Route::post('/become_delivery_man', [DelManController::class, 'user_to_delman'])->name('user.to.delman');

Route::get('/request_list', [DelManController::class, 'request_list']);

Route::get('/delivery_history', [DelManController::class, 'del_history']);

Route::get('/view/{oID}', [DelManController::class, 'view_request']);

Route::put('/accept_req/{oID}', [DelManController::class, 'accept_req']);

Route::put('/decline_req/{oID}', [DelManController::class, 'decline_req']);

Route::put('/delivered/{oID}', [DelManController::class, 'delivered']);

Route::get('/delivery_report', [DelManController::class, 'delman_report']);

Route::get('/view_return/{oID}', [DelManController::class, 'view_return_request']);

Route::put('/accept_rf_req/{oID}', [DelManController::class, 'accept_rf_req']);

Route::put('/item_picked_up/{oID}', [DelManController::class, 'item_picked_up']);

// ORDER

Route::get('/profile', [OrderController::class, 'profile'])->name('profile');

Route::get('/view_parcel/{oID}', [OrderController::class, 'view_parcel_buyer']);

Route::get('/history', [OrderController::class, 'sel_history']);

Route::get('/view_order/{oID}', [OrderController::class, 'view_order']);

Route::put('/confirm_order/{oID}', [OrderController::class, 'confirm_order']);

Route::put('/request_order/{oID}', [OrderController::class, 'request_order']);

Route::put('/pick_up/{oID}', [OrderController::class, 'pick_up']);

Route::get('/received/{oID}', [OrderController::class, 'order_received'])->name('order_received');

Route::put('/cancelled/{oID}', [OrderController::class, 'cancel_order']);

Route::put('/cancel_req/{oID}', [OrderController::class, 'cancel_req']);

Route::get('/seller_report', [OrderController::class, 'sel_report']);

Route::put('/return/{oID}', [OrderController::class, 'return_product']);

Route::get('/return_refund', [OrderController::class, 'return_refund_list']);

Route::get('/return/{id}', [OrderController::class, 'view_return']);

Route::put('/accept_return/{oID}', [OrderController::class, 'accept_return']);

Route::put('/decline_return/{oID}', [OrderController::class, 'decline_return']);

Route::put('/send_return_request/{oID}', [OrderController::class, 'send_return_request']);

Route::put('/cancel_rf_req/{oID}', [OrderController::class, 'cancel_rf_req']);

Route::put('/item_received/{oID}', [OrderController::class, 'item_received']);

// ADMIN

Route::resource('/details', AdminController::class);

Route::post('/details', [AdminController::class,'update_image'])->name('update_image');

Route::put('/ad_update/{id}', [AdminController::class, 'update']);

Route::get('/add', [AdminController::class, 'ad_register']);

Route::post('/add', [AdminController::class, 'create'])->name('ad.register');

Route::get('/admin_report', [AdminController::class, 'ad_report']);

Route::get('/admin_message', [AdminController::class, 'ad_message']);

Route::get('/admin_message/{id}', [MessageController::class, 'ad_mess']);





Route::put('/users_activate/{id}', [AdminController::class, 'activate_user']);

Route::put('/users_deactivate/{id}', [AdminController::class, 'deactivate_user']);

Route::get('/view_user/{id}', [AdminController::class, 'view_user']);

Route::put('/update_user_scope/{id}', [AdminController::class, 'update_user_scope']);

Route::put('/ban_product/{pID}', [AdminController::class, 'ban_product']);

// EMPLOYEES

Route::get('/verification', [AdminController::class, 'app_dec']);

Route::get('/view_request/{id}', [AdminController::class, 'view']);

Route::put('/view_approve_seller/{id}', [AdminController::class,'seller_approve_req']);

Route::put('/view_decline_seller/{id}', [AdminController::class,'seller_decline_req']);

Route::put('/view_approve_delman/{id}', [AdminController::class,'delman_approve_req']);

Route::put('/view_decline_delman/{id}', [AdminController::class,'delman_decline_req']);

Route::get('/shop/{id}', [AdminController::class, 'view_shop']);

Route::get('/employee_report', [AdminController::class, 'emp_report']);



// EMP-2

Route::get('/all_accounts', [AdminController::class, 'seller_delman']);

Route::get('/emp1_details', [AdminController::class, 'emp1_details']);

Route::post('/emp1_details', [AdminController::class,'emp1_update_image'])->name('emp1_update_image');

Route::put('/emp1_details/{id}', [AdminController::class, 'emp1_update']);



// // CS

Route::get('/cs_details', [AdminController::class, 'cs_details']);

Route::post('/cs_details', [AdminController::class,'cs_update_image'])->name('cs_update_image');

Route::put('/cs_update/{id}', [AdminController::class, 'cs_update']);



// Route::get('/home', [AdminController::class,'countUsers']);

// Route::get('/pending_orders/{id}', [ProductController::class, 'confirm_order']);

// Route::post('/verification', [AdminController::class,'decline_delman'])->name('decline.delman');