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

Route::get('/', function () {
    return view('welcome');
});

function getContacts(){
    return [
        1 => ['name' => 'Name 1', 'phone' => '1234567890'],
        2 => ['name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['name' => 'Name 3', 'phone' => '3456789012'],
    ];
};

Route::get('/contacts', function () {
    $contacts =getContacts();
    $companies = [
        1 => ['name' => 'Company One', 'contacts' => 3],
        2 => ['name' => 'Company Two', 'contacts' => 5],
    ];
    //return view('contacts.index',['contacts'=>$contacts]);
    return view('contacts.index',compact('contacts','companies')); //same thing as above just less keywords
})->name('contacts.index');

Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}', function ($id) {
    $contacts = getContacts();
    abort_if(!isset($contacts[$id]),404);
    $contact = $contacts[$id];
    return view('contacts.show')->with('contact',$contact);
})->name('contacts.show');

Route::fallback(function (){
   return "<h1>Sorry the page does not exists</h1>";
});

//Route::get('/companies/{name?}', function ($name = null) {
//    if ($name) {
//        return "Company" . " " . $name;
//    } else {
//        return "All Companies";
//    }
//});
