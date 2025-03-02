<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\OrganisationsController;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('welcome'))->name('home');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('dashboard', fn () => Inertia::render('dashboard'))->name('dashboard');
    Route::get('organisations', [OrganisationsController::class, 'index'])->name('organisations');
    Route::get('organisations/{id}', [OrganisationsController::class, 'show'])->name('organisation');
});

Route::webhooks('webhooks');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
