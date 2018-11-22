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

use App\Development;
use App\Lot;
use App\Stage;

Route::get('/', function () {
    $developments = Development::all();
    return view('lots.create', compact('developments'));
//    return view('welcome');
});

Route::get('/test', function() {
    $toast = [
        'title'=> 'Testing',
        'body' => 'This is a test message to test the toast messages',
        'type' => 'success',
        'timeout' => 3000
    ];
   return redirect('/')->with('toast', $toast);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/api/developments', function() {
    return Development::all();
});
Route::get('/api/developments/{development}/stages', function(Development $development) {
   return $development->stages;
});

Route::get('/api/stages/{stage}/lots', function(Stage $stage) {
   return $stage->lots;
});

Route::get('/api/lots/{lot}/land-detail', function (Lot $lot) {
   return $lot->land_detail;
});