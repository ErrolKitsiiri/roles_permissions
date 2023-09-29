<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin;
use App\Livewire\Admin\Testimonials\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
});

Route::prefix('admin')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->group(function (){
    //dashboard
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    //testimonials
    Route::prefix('testimonials')->group(function (){
        // Route::get('/', Admin\Testimonials\Index::class)->name('admin.testimonials.index');
        // Route::get('/create', Admin\Testimonials\Create::class)->name('admin.testimonials.create');
        // Route::get('/{id}/edit', Admin\Testimonials\Edit::class)->name('admin.testimonials.edit');
        Route::get('/admn', Index::class)->name('index');
    });

    // Route::get('/admin/registered/designers', ViewRegisteredDesignersComponent::class)->name('admin.designers');
});
