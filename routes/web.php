<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\cart;
use App\Http\Controllers\CartController;
use App\Http\Controllers\search;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('welcome');

});


// ->middleware('Auth');

Route::get('logoout', [App\Http\Controllers\HomeController::class, 'logoout'])->name('login');
Route::get('about', [App\Http\Controllers\AboutController::class, 'about'])->name('about');
Route::get('contacts', [App\Http\Controllers\AboutController::class, 'contact'])->name('Contacts');



Auth::routes();
Route::post('register-user', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register-user');

Route::get('get_invoice_details', [App\Http\Controllers\InvoicesController::class, 'getInvoiceDetails']);

Route::post('insert_roles', [App\Http\Controllers\UserController::class, 'Roles']);

Route::group(
    ['middleware' => ['auth:sanctum']],
    function () {
        Route::get('redirects',[RoleController::class, 'roles']);
        Route::get('home/',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        // Route::get('home', [App\Http\Controllers\HomeController::class, 'outstock'])->name('dashboard');
        Route::get('Stock', [App\Http\Controllers\stock::class, 'index'])->name('Stock');
        // Route::get('Items', [App\Http\Controllers\stock::class, 'Item'])->name('Item');
        Route::get('Items', [App\Http\Controllers\stock::class, 'Itemin'])->name('Item');
        Route::get('materials', [App\Http\Controllers\stock::class, 'Materials'])->name('Item');
        Route::get('Admin', [App\Http\Controllers\AdminController::class, 'Admin'])->name('Stock');
        Route::post('materials_in', [App\Http\Controllers\stock::class, 'materials_in']);
        Route::get('users', [App\Http\Controllers\UserController::class, 'Users'])->name('users');
        // Route::post('insert_roles', [App\Http\Controllers\UserController::class, 'Roles']);
        Route::get('settings', [App\Http\Controllers\UserController::class, 'set'])->name('Manage_user');
        Route::get('emp', [App\Http\Controllers\UserController::class, 'set2'])->name('get');
        Route::get('permisions/', [App\Http\Controllers\UserController::class, 'permission'])->name('permisions');
        Route::post('permisions/{id}', [App\Http\Controllers\UserController::class, 'permission2']);
        Route::get('permisions/{id}', [App\Http\Controllers\UserController::class, 'permissionedit']);

        Route::get('users/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('destroy');
        Route::get('materials_edit{id}', [App\Http\Controllers\stock::class, 'edit']);
        Route::post('materials2{id}', [App\Http\Controllers\stock::class, 'update']);
        Route::post('materials3{id}', [App\Http\Controllers\stock::class, 'updateOut']);
        Route::get('stock_history{id}', [App\Http\Controllers\stock::class, 'getStockHistory']);
        Route::get('meatcategory', [App\Http\Controllers\stock::class, 'category']);
        Route::post('Proccessed_stock', [App\Http\Controllers\processed_Controller::class, 'proccessed'])->name('insert');
        Route::post('Proccessed_stock2', [App\Http\Controllers\processed_Controller::class, 'process']);
        Route::get('Suppliers', [App\Http\Controllers\SupplierController::class, 'index']);
        Route::get('Customers', [App\Http\Controllers\CustomersController::class, 'view'])->name('Customers');
        Route::get('Invoices', [App\Http\Controllers\InvoicesController::class, 'invo']);
        Route::get('Invoices/{id}', [App\Http\Controllers\InvoicesController::class, 'find']);
        Route::get('Invoiceview/{id}', [App\Http\Controllers\InvoicesController::class, 'show']);
        Route::post('Supin', [App\Http\Controllers\SupplierController::class, 'Supin']);
        Route::any('Cusin', [App\Http\Controllers\CustomersController::class, 'Cusin']);
        Route::post('invo', [App\Http\Controllers\InvoicesController::class, 'store']);
        Route::get('Items', [App\Http\Controllers\ItemsController::class, 'item']);
        Route::any('items2', [App\Http\Controllers\ItemsController::class, 'itemin']);
        Route::get('cart', [App\Http\Controllers\ItemsController::class, 'show'])->name('cart');
        Route::get('stock_after', [App\Http\Controllers\ItemsController::class, 'after'])->name('stock_after');
        Route::get('category', [App\Http\Controllers\CategoryController::class, 'category'])->name('category');
        Route::post('category_in', [App\Http\Controllers\CategoryController::class, 'category_insert'])->name('category_in');
        Route::get('/destroy{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);


        Route::get('lowstock', [App\Http\Controllers\ItemsController::class, 'alert'])->name('stock_after');
        Route::any('today', [App\Http\Controllers\ReportController::class, 'today']);
        Route::any('month', [App\Http\Controllers\ReportController::class, 'monthly']);
        Route::any('year', [App\Http\Controllers\ReportController::class, 'yearly']);
        Route::any('week', [App\Http\Controllers\ReportController::class, 'weekly']);
        Route::post('stock_after/{id}', [App\Http\Controllers\ItemsController::class, 'update1']);

        Route::get('updatestock/{id}', [App\Http\Controllers\ItemsController::class, 'updatestock1']);
        Route::any('store_cart', [App\Http\Controllers\ItemsController::class, 'storeCart']);
        Route::get('sales', [CartController::class, 'sales'])->name('sales');
        Route::get('Invoices/{id}', [App\Http\Controllers\InvoicesController::class, 'pay'])->name('Paid');

        //  Route::get('stock_after', [cart::class, 'update'])->name('sales');
        Route::get('updatestock', [ItemsController::class, 'updatestock'])->name('updatestock');
        // Route::get('delivery_note', [App\Http\Controllers\DeliveryController::class, 'showd'])->name('delivery_note');
        Route::get('delivery_note/{id}', [App\Http\Controllers\DeliveryController::class, 'showd2'])->name('delivery_notes');

        //cart
        Route::get('cart.list', [CartController::class, 'cartList'])->name('cart.list');
        Route::post('cart.store', [CartController::class, 'addToCart'])->name('cart.store');
        Route::post('cart.update', [CartController::class, 'updateCart'])->name('cart.update');
        Route::post('cart.remove', [CartController::class, 'removeCart'])->name('cart.remove');
        Route::post('cart.clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
        Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

        //search
        Route::get('search', [search::class, 'search'])->name('search');
    }
);
