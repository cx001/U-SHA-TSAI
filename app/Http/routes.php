<?php


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farm;

use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/', function (Request $request) {
    
    $farms = Farm::all();

     return view('welcome', [
         'farms' => $farms,
     ]);
  
});


Route::get('/farms', 'FarmController@index');

Route::post('/farm', 'FarmController@store');

Route::delete('/farm/{farm}', 'FarmController@destroy');



Route::get('/shop', function () {
    return view('shop');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/experiance', function () {
    return view('experiance');
});

Route::get('/contact', function () {
    return view('contact');
});
