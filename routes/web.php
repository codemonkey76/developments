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
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    $developments = Development::all();

    return view('lots.create', compact('developments'));
//    return view('welcome');
});

Route::get('/test', function () {
    $toast = [
        'title'   => 'Testing',
        'body'    => 'This is a test message to test the toast messages',
        'type'    => 'success',
        'timeout' => 3000
    ];

    return redirect('/')->with('toast', $toast);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/api/developments', function () {
    return Development::all();
});
Route::get('/api/developments/{development}/stages', function (Development $development) {
    return $development->stages;
});

Route::get('/api/stages/{stage}/lots', function (Stage $stage) {
    return $stage->lots;
});

Route::get('/api/lots/{lot}/land-detail', function (Lot $lot) {
    return $lot->land_detail;
});

Route::patch('/api/lots/{lot}/land-detail', function (Lot $lot) {
    $validated = request()->validate([
        'lot_area'                => 'numeric|nullable',
        'street_number'           => 'numeric|nullable',
        'street'                  => 'string|max:50|nullable',
        'suburb'                  => 'string|max:50|nullable',
        'postcode'                => 'string|max:4|nullable',
        'original_lot_number'     => 'numeric|nullable',
        'original_rpsp'           => 'string|max:50|nullable',
        'original_county'         => 'string|max:50|nullable',
        'original_parish'         => 'string|max:50|nullable',
        'registered_plan'         => 'date|nullable',
        'subdivided_rpsp'         => 'string|max:50|nullable',
        'subdivided_county'       => 'string|max:50|nullable',
        'subdivided_parish'       => 'string|max:50|nullable',
        'reconfigured_lot_number' => 'numeric|nullable',
        'reconfigured_rpsp'       => 'string|max:50|nullable',
        'reconfigured_county'     => 'string|max:50|nullable',
        'reconfigured_parish'     => 'string|max:50|nullable'
    ]);

    dump($validated);
    $lot->land_detail->update($validated);

    return response('Land Details updated successfully', 204);
//    $response = Response::json(['success' => 'Land Details updated successfully'], 204);
//    dump($response);
//    return $response;
});