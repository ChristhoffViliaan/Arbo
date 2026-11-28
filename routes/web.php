<?php

use App\Http\Controllers\Admin\CompanyValueController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login');

Route::prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::get('/', function (): RedirectResponse {
            return redirect()->route('admin.products.index');
        })->name('index');
        Route::resource('products', ProductController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('members', MemberController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('company-values', CompanyValueController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
            ->parameters(['company-values' => 'companyValue']);
        Route::resource('social-media', SocialMediaController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
            ->parameters(['social-media' => 'socialMedia']);
    });
