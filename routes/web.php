<?php

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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

//Gestisce da qui in poi le rotte di autenticazione (con il modello Auth)
Auth::routes();

// Gestire rotte sotto Auth

//Middleware: controlla se esiste la persona loggata che richiede la rotta
//Admin: fa partire tutta la logica dalla cartella Admin
Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function()
    {
        Route::get('/', 'HomeController@index')->name('index');
        //Controller che gestiscono CRUD
        Route::resource('/posts', PostController::class);
    });

// Gestire rotte senza Auth
Route::get('{any?}', function()
{
    return view('guest.home');
})->where("any", ".*");






