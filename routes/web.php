<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StripeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//all for admin
Route::get('/redirect', [HomeController::class, 'redirect']);


//for category
Route::get('/view_category', [AdminController::class, 'view_category']);

//to add category
// Route::post('/add_category', [AdminController::class, 'add_category']);

// Show the Add Category Page
Route::get('/add_category', [AdminController::class, 'view_category'])
     ->name('view_category');

// Handle form submission
Route::post('/add_category', [AdminController::class, 'add_category'])
     ->name('add_category');


//to delete category
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

//for product
Route::get('/view_product', [AdminController::class, 'view_product']);

//to add product
Route::post('/add_product', [AdminController::class, 'add_product']);

//to show product
Route::get('/show_product', [AdminController::class, 'show_product']);

//to edit product
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);

//to delete product
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

//to edit product confirm
Route::post('/edit_product_confirm/{id}', [AdminController::class, 'edit_product_confirm']);

//for order details
Route::get('/order', [AdminController::class, 'order']);

//for delivered
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

//for pdf
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

//for email
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

//for sending email
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

//for searching orders
Route::get('/search_orders', [AdminController::class, 'search_orders']);

//for charts
Route::get('/charts', [AdminController::class, 'charts'])->name('charts');









//all for users

Route::get('/product.details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

// Public products listing (home)
// Route::get('/home/show_product', [HomeController::class, 'show_product']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

//for cash on delivery
Route::get('/cash_order', [HomeController::class, 'cash_order']);

//for stripe payment
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

//for stripe payment form for line no 59 of stripe.blade.php
// Route::get('/stripe/{total}', [HomeController::class, 'stripe']);
// Route::post('/stripe', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/stripe/{total}', [HomeController::class, 'stripe'])->name('stripe');
Route::post('/stripe-intent', [HomeController::class, 'createPaymentIntent'])->name('stripe.intent');

//to show orders
Route::get('/show_order', [HomeController::class, 'show_order']);

//for cancel order
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

//for adding comment
Route::post('/add_comment', [HomeController::class, 'add_comment']);

//for adding reply
Route::post('/add_reply', [HomeController::class, 'add_reply']);

// Show edit form
Route::get('/edit_comment/{id}', [HomeController::class, 'edit_comment'])->name('edit_comment');

// Update comment
Route::post('/update_comment/{id}', [HomeController::class, 'update_comment'])->name('update_comment');
//delete comment
Route::get('/delete_comment/{id}', [HomeController::class, 'delete_comment'])->name('delete_comment');



//edit a reply and update that
// Replies
Route::get('/edit_reply/{id}', [HomeController::class, 'edit_reply'])->name('edit_reply');
Route::post('/update_reply/{id}', [HomeController::class, 'update_reply'])->name('update_reply');

//delete a reply by user
// Delete a reply

Route::get('/delete_reply/{id}', [HomeController::class, 'delete_reply'])->name('delete_reply');


//for search product
Route::get('/search_product', [HomeController::class, 'search_product']);

//for books listing
Route::get('/books', [HomeController::class, 'books']);




///for contact us
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//for search
Route::get('/search', [HomeController::class, 'search'])->name('search');










