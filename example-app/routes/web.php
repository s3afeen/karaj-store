<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserPageController;

Auth::routes();

Route::middleware(['auth' , 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('ratings', RatingController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/admin-profile', [AdminController::class, 'show'])->name('admin.profile');
});

Route::get('/', [UserPageController::class, 'LandingPage'])->name('landing');
Route::get('/home', [UserPageController::class, 'LandingPage'])->name('landing');
Route::get('/shop', [UserPageController::class, 'shop'])->name('shop');
Route::get('/contact', function () { return view('userSide.contact'); });
Route::get('/productDetails/{id}', [UserPageController::class, 'showProduct'])->name('product.details');




// في ملف routes/web.php
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
