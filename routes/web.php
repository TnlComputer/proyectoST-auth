<?php

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OcomprasController;
use App\Http\Controllers\RemitosKController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ChequesController;
use App\Http\Controllers\DepositosController;
use App\Http\Controllers\ImputacionesController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


// Route::get('/new', function(){
//     return 'new page';
// });



// Route::get('/', HomeController::class)->name('home');
// Route::get('home', HomeController::class);

Route::middleware('auth')->group(function () {

    // Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('/profile', function () {
    //     return view('profile');
    // })->name('profile');

    Route::get('/fondos/aplicar', function () {
        return view('/fondos/aplicar');
    })->name('aplicarFondos');

    Route::get('/cheques/imputar', function () {
        return view('/cheques/imputar');
    })->name('imputar');

    Route::get('/reportes', function () {
        return view('/reportes/reportes');
    })->name('reportes');

    // Route::get('/register-attendance', function(){
    //     return view('register-attendance');
    // })->name('register-attendance');

    Route::resource('ocompras', OcomprasController::class);
    Route::resource('remitos', RemitosKController::class);
    Route::resource('facturas', FacturasController::class);
    Route::resource('cheques', ChequesController::class);
    // Route::resource('depositos', DepositosController::class);
    Route::resource('imputaciones', ImputacionesController::class);
});

// require __DIR__ . '/auth.php';
