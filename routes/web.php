<?php

use App\Http\Controllers\ContactController;
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
    return view('welcome');
});

Route::controller(ContactController::class)->name('contacts.')->group(function (){   //grouping routes for same controller
    Route::get('/contacts','index')->name('index');

    Route::get('/contacts/create','create')->name('create');

    Route::get('/contacts/{id}','show')->name('show');
});

//Route::get('/contacts',[ContactController::class,'index'])->name('contacts.index');
//
//Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');
//
//Route::get('/contacts/{id}',[ContactController::class,'show'])->name('contacts.show');

Route::fallback(function (){ return "<h1>Sorry the page does not exists</h1>";});

//Route::get('/companies/{name?}', function ($name = null) {
//    if ($name) {
//        return "Company" . " " . $name;
//    } else {
//        return "All Companies";
//    }
//});
