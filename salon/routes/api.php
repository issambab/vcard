<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cuisine', 'Api\ApiController@cuisine');
Route::post('/visiteur', 'Api\ApiController@visiteur');
Route::post('/imprimeur', 'Api\ApiController@imprimeur');
Route::post('/coching', 'Api\ApiController@coching');

Route::post('/candidat', 'Api\ApiController@candidat');
Route::post('/loginenterprises', 'Api\ApiController@loginenterprises');



Route::post('/candidatentretien', 'Api\ApiController@candidatentretien');
Route::post('/candidatcvdepo', 'Api\ApiController@candidatcvdepo');
Route::post('/candidatcvpreselection', 'Api\ApiController@candidatcvpreselection');
  
Route::post('/candidatnote', 'Api\ApiController@candidatnote');