<?php

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
    return view('lots.create');
//    return view('welcome');
});

Route::get('/test', function() {
    $toast = [
        'title'=> 'Testing',
        'body' => 'This is a test message to test the toast messages',
        'type' => 'success',
        'timeout' => 3000
    ];
   return redirect('/')->with('toast', json_encode($toast));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
