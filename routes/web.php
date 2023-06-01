<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return redirect()->route('states.index');
})->name('dashboard');

Route::resource('states', StateController::class)
->only(['index', 'store', 'edit', 'update'])
->middleware('auth');


require __DIR__.'/auth.php';
