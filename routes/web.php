<?php

use Illuminate\Support\Facades\Route;
// se usa un componente livewire como controlador cuando toda una vista necesita ser reactiva
use App\Http\Livewire\ShowPosts;


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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'  
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // coders free 
    Route::get('/prueba/{name}', ShowPosts::class);
});

// usamos el componente livewire como controlador
//Route::get('/dashboard', ShowPosts::class)->name('dashboard');

