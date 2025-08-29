<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('category', [FrontendController::class, 'category'])->name('categories');
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('view-category/{cate_slug}/{prod_meta_description}', [FrontendController::class, 'productview']);
Route::get('view-product/{product_id}', [FrontendController::class, 'productview']);
// Route::get('login', [LoginController::class, 'login']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);
Route::get('cart', [CartController::class, 'viewcart'])->name('cart');

Route::get('checkout',[CheckoutController::class, 'index']);

Route::get('/cart/count', function () {
    $cartCount = 0;
    if (Auth::check()) {
        $cartCount = \App\Models\Cart::where('user_id', Auth::id())->sum('prod_qty');
    }
    return response()->json(['count' => $cartCount]);
})->name('cart.count');



Route::middleware(['auth'])->group(function () {
    //Route::get('cart', [CartController::class, 'viewcart']  );
    //Route::get('checkout',[CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('orders', [FrontendController::class, 'my_orders'])->name('my.orders');
    Route::get('view_order/{id}', [FrontendController::class, 'view_order']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard',[AdminFrontendController::class, 'index'])->name('dashboard');

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('add-category', [CategoryController::class, 'add'])->name('add.category');

    Route::post('insert-category', [CategoryController::class, 'insert'] )->name('new.category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete.category');

    Route::get('products', [ProductController::class,'index' ])->name('admin.products');
    Route::get('add-products', [ProductController::class,'add' ])->name('add.product');
    Route::post('insert-product', [ProductController::class, 'insert'])->name('new.product');

    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('update-product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('delete-product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
});
?>
