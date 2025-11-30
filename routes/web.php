<?php

use App\Livewire\Admin\Category;
use App\Livewire\Admin\Feedback;
use App\Livewire\Admin\Product;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\User;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Index;
use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('/products', Products::class)->name('products');

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/dashboard/products', Product::class)->name('dashboard.products');
        Route::get('/dashboard/categories', Category::class)->name('dashboard.categories');
        Route::get('/dashboard/profile', Profile::class)->name('dashboard.profile');
        Route::get('/dashboard/users', User::class)->name('dashboard.users');
        Route::get('/dashboard/feedbacks', Feedback::class)->name('dashboard.feedbacks');
    });
});


