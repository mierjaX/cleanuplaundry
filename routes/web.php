<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Testicont;
use App\Models\Testimoni;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});
Route::post('/pesan',[PesananController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [RegisterController::class, 'index'])->Middleware('guest');
Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/dashboard/tables', [PesananController::class, 'show'])->Middleware('auth');
Route::put('/dashboard/tables/{id}', [PesananController::class, 'adminInput'])->Middleware('auth');

Route::get('/dashboard/testi', function () {
    return view('tabletesti',[
        'testimoni' => Testimoni::all(),
    ]);
})->Middleware('auth');

Route::delete('/formtesti/{id}',[Testicont::class,'destroy']);

Route::get('/detail', function () {
    return view('detail');
});

Route::resource('/formtesti', Testicont::class);

Route::get('/testimoni', function () {
    return view('testimoni');
});