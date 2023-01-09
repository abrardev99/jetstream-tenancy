<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
])->group(function () {
    Route::get('/tenant-welcome', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});

Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/{tenant}')
    ->group(function () {
        Route::get('/tenant-dashboard', function () {
            return view('dashboard');
        })->name('tenant.dashboard');
    });
