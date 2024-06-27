<?php


use App\Http\Controllers\PageHomeController;
use App\Http\Middleware\SiteSettingMidlleware;
use Illuminate\Support\Facades\Route;



Route::middleware([SiteSettingMidlleware::class])->group(function () {
    Route::get('/', [PageHomeController::class, "HomePage"])->name('indexTemplate');
    Route::get('/about', [PageHomeController::class, "AboutPage"])->name('about');
    Route::get('/contact', [PageHomeController::class, "ContactPage"])->name('contact');
    Route::get('/products/{catagory?}', [PageHomeController::class, "ProductsPage"])->name('products');
    Route::get('/product/{slug}', [PageHomeController::class, "SingleProductsPage"])->name('single-products');
    Route::get('/men/{slug?}', [PageHomeController::class, "ProductsPage"])->name('men');
    Route::get('/women{slug?}', [PageHomeController::class, "ProductsPage"])->name('women');
    Route::get('/kid{slug?}', [PageHomeController::class, "ProductsPage"])->name('kid');
    Route::get('/cart', [PageHomeController::class, 'CartIndexPage'])->name('CartIndex');

    Route::post('/contact/save', [PageHomeController::class, "ContactMailPost"])->name('contactMail');
    Route::post('/cart/add', [PageHomeController::class, "CartAdd"])->name('cartAdd');
    Route::post('/cart/remove', [PageHomeController::class, "CartRemove"])->name('cartRemove');
    Route::post('/cart/update', [PageHomeController::class, "CartUpdate"])->name('cartUpdate');
});
