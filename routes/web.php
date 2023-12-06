<?php

use Illuminate\Support\Facades\Route;

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

Route::get('users/{name}', function($name) {
    echo $name;
});

Route::get("greetings", function() {
    return view('greetings', ['name' => 'alex']);
});

Route::get("home", function() {
    return view("home");
});


Route::get('test', function () {
    return response('hellow word', 200)->header('Content-Type', 'application/json');
});