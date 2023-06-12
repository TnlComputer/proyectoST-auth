<?php

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OcompraController;
use App\Http\Controllers\RemitokController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\ImputacionController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Route::get('/new', function(){
//     return 'new page';
// });

// Route::get('/', HomeController::class)->name('home');
// Route::get('home', HomeController::class);

Route::middleware('auth')->group(function () {

    Route::get('/reportes', function () {
        return view('/reportes/reportes');
    })->name('reportes');

    Route::get('/fondos/imputar', function(){
        return view('/fondos/imputar');
    })->name('imputar');

    Route::resource('ocompras', OcompraController::class);
    Route::resource('remitos', RemitokController::class);
    Route::resource('facturas', FacturaController::class);
    Route::resource('cheques', ChequeController::class);
    Route::resource('imputaciones', ImputacionController::class);
});

// require __DIR__ . '/auth.php';
