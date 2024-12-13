<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController; 
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;    

Route::get('/', function () {
    return Inertia::render('FrontEnd/Landing', [
        'laravelVersion' => Application::VERSION, // versi Laravel
        'phpVersion' => PHP_VERSION, // versi PHP
    ]);
})->name('landing');

Route::get('/grade', function () {
    return Inertia::render('FrontEnd/GradePage');
})->name('grade');

Route::get('/about', function () {
    return Inertia::render('FrontEnd/AboutPage');
})->name('about');

Route::get('/', [MitraController::class, 'landing'])->name('landing');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('DashboardView');
    })->name('dashboard');

    Route::get('/mitra',[MitraController::class,'index'])->name('mitra.index');
    Route::post('/mitra',[MitraController::class,'store'])->name('mitra.store');
    Route::delete('/mitra/{mitra}',[MitraController::class,'destroy'])->name('mitra.destroy');
    Route::post('/mitra/{mitra}', [MitraController::class, 'update'])->name('mitra.update');

    Route::get('/supplier',[SupplierController::class,'index'])->name('supplier.index');
    Route::post('/api/supplier', [SupplierController::class, 'store']);
    Route::post('/supplier',[SupplierController::class,'store'])->name('supplier.store');
    Route::delete('/supplier/{supplier}',[SupplierController::class,'destroy'])->name('supplier.destroy');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/tes', [SupplierController::class, 'tes']);

    Route::get('/kriteria',[KriteriaController::class,'index'])->name('kriteria.index');

    Route::get('/jenis',[JenisController::class,'index'])->name('jenis.index');
    Route::post('/jenis',[JenisController::class,'store'])->name('jenis.store');
    Route::delete('/jenis/{jenis}',[JenisController::class,'destroy'])->name('jenis.destroy');
    Route::put('/jenis/{jenis}', [JenisController::class, 'update'])->name('jenis.update');

    Route::get('/harga',[HargaController::class,'index'])->name('harga.index');
    Route::post('/harga',[HargaController::class,'store'])->name('harga.store');
    Route::delete('/harga/{harga}',[HargaController::class,'destroy'])->name('harga.destroy');
    Route::put('/harga/{harga}', [HargaController::class, 'update'])->name('harga.update');

    Route::get('/ketersediaan',[KetersediaanController::class,'index'])->name('ketersediaan.index');
    Route::post('/ketersediaan',[KetersediaanController::class,'store'])->name('ketersediaan.store');
    Route::delete('/ketersediaan/{ketersediaan}',[KetersediaanController::class,'destroy'])->name('ketersediaan.destroy');
    Route::put('/ketersediaan/{ketersediaan}', [KetersediaanController::class, 'update'])->name('ketersediaan.update');

    Route::get('/api/harga', [HargaController::class, 'indexJson']);
    Route::get('/api/jenis', [JenisController::class, 'indexJson']);
    Route::get('/api/ketersediaan', [KetersediaanController::class, 'indexJson']);
});

// User routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/landing', function () {
        return Inertia::render('FrontEnd/Landing');
    })->name('landingpage');
    Route::get('/user/grade', function () {
        return Inertia::render('FrontEnd/GradePage');
    })->name('grade.index');
});

Route::controller(GradeController::class)->group(function () {
    Route::get('/grade', 'index')->name('grade.index');
    Route::get('/grade/{id}', 'show')->name('grade.show');
});



// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout.destroy');

Route::get('/kriteria', function () {
    return Inertia::render('kriteria', [
        'title' => 'kriteria'
    ]);
});

// Route::get('/register', [RegisteredUserController::class, 'create']);
// Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__.'/auth.php';
