<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Modules\CatagoryController;
use App\Http\Controllers\Modules\MailController;
use App\Http\Controllers\Modules\PageController;
use App\Http\Controllers\Modules\ProductController;
use App\Http\Controllers\Modules\SiteSettings;
use App\Http\Controllers\Modules\SliderController;
use App\Http\Controllers\Modules\UserListController;
use App\Http\Middleware\PanelSettingsMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminPanelController::class, 'LoginPage'])->name('loginPage');
Route::get('/logout', [AdminPanelController::class, 'Logout'])->name('logout');
Route::post('/login/post', [AdminPanelController::class, 'LoginPost'])->name('loginPost');
Route::prefix('dashboard')->group(function () {
    Route::get('/', [AdminPanelController::class, 'DashboardPage'])->middleware([PanelSettingsMiddleware::class])->name('dashboardPage');
    Route::get('/slider', [SliderController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexSlider');
    Route::get('/pages', [PageController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexPages');
    Route::get('/categories', [CatagoryController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexCatagory');
    Route::get('/mails', [MailController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexMail');
    Route::get('/all-products', [ProductController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexProducts');
    Route::match(["get", "post"], '/site-settings', [SiteSettings::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexSiteSettings');
    Route::get('/user-list', [UserListController::class, 'index'])->middleware([PanelSettingsMiddleware::class])->name('indexUsers');
});

//Page Module
Route::match(["get", "post"], '/pages/create', [PageController::class, 'create'])->middleware([PanelSettingsMiddleware::class])->name('createPages');
Route::get('/pages/{id}', [PageController::class, 'show'])->middleware([PanelSettingsMiddleware::class])->name('subPages');
Route::get('/pages-edit/{id}', [PageController::class, 'edit'])->middleware([PanelSettingsMiddleware::class])->name('editPages');
Route::post('/pages-update/{id}', [PageController::class, 'update'])->middleware([PanelSettingsMiddleware::class])->name('updatePages');
Route::get('/pages/{id}/destroy', [PageController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deletePages');

//Slider Module
Route::match(["get", "post"], '/slider/create', [SliderController::class, 'create'])->middleware([PanelSettingsMiddleware::class])->name('createSlider');
Route::get('/slider/{id}', [SliderController::class, 'show'])->middleware([PanelSettingsMiddleware::class])->name('showSlider');
Route::post('/slider-edit/{id}', [SliderController::class, 'edit'])->middleware([PanelSettingsMiddleware::class])->name('editSlider');
Route::get('/slider/{id}/destroy', [SliderController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deleteSlider');

//Mail Module
Route::get('/mail/{id}', [MailController::class, 'show'])->middleware([PanelSettingsMiddleware::class])->name('detailMail');
Route::get('/mail/{id}/destroy', [MailController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deleteMail');

//Product Category Module
Route::match(["get", "post"], '/categories/create', [CatagoryController::class, 'create'])->middleware([PanelSettingsMiddleware::class])->name('createCategories');
Route::get('/categories/{id}', [CatagoryController::class, 'show'])->middleware([PanelSettingsMiddleware::class])->name('subCategories');
Route::get('/categories-edit/{id}', [CatagoryController::class, 'edit'])->middleware([PanelSettingsMiddleware::class])->name('editCategories');
Route::post('/categories-update/{id}', [CatagoryController::class, 'update'])->middleware([PanelSettingsMiddleware::class])->name('updateCategories');
Route::get('/categories/{id}/destroy', [CatagoryController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deleteCategories');

//Product Module
Route::match(["get", "post"], '/all-products/create', [ProductController::class, 'create'])->middleware([PanelSettingsMiddleware::class])->name('createProduct');
Route::get('/all-products-edit/{id}', [ProductController::class, 'edit'])->middleware([PanelSettingsMiddleware::class])->name('editProducts');
Route::post('/all-products-update/{id}', [ProductController::class, 'update'])->middleware([PanelSettingsMiddleware::class])->name('updateProducts');
Route::get('/all-products/{id}/destroy', [ProductController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deleteProducts');

//Users Module
Route::match(["get", "post"], '/user-list/create', [UserListController::class, 'create'])->middleware([PanelSettingsMiddleware::class])->name('createUser');
Route::get('/user-list-edit/{id}', [UserListController::class, 'edit'])->middleware([PanelSettingsMiddleware::class])->name('editUser');
Route::post('/user-list-update/{id}', [UserListController::class, 'update'])->middleware([PanelSettingsMiddleware::class])->name('updateUser');
Route::get('/user-list/{id}/destroy', [UserListController::class, 'destroy'])->middleware([PanelSettingsMiddleware::class])->name('deleteUser');
