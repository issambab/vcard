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



Auth::routes();


Route::get('/getinfocandida/{id}', 'FrontController@getinfocandida')->name('getinfocad');


Route::get('/editprofile', 'HomeController@editprofile')->name('editprofile');
Route::get('/vcardsProfile', 'HomeController@vcards')->name('vcardsProfile');

Route::get('/vcards/{id}', 'HomeController@vcards')->name('vcards');


Route::get('/stat', 'HomeController@statecol')->name('stat');
Route::get('/password', 'HomeController@password')->name('password');

Route::get('/search', 'HomeController@search')->name('search');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/inscription', 'HomeController@inscription')->name('inscription');
Route::post('/creation','HomeController@creation')->name('creation');
Route::post('imageFileUpload', 'HomeController@ImageFileUpload')->name('Request.ImageFileUpload');
Route::post('/GetInfoSalon', 'HomeController@GetInfoSalon')->name('GetInfoSalon');

Route::get('/importCsv', 'HomeController@importCsv')->name('importCsv');

Route::get('/importCsvUser', 'FrontController@importCsvUser')->name('importCsvUser');

Route::get('/loginprint', 'HomeController@loginprint')->name('loginprint');
Route::post('/frontlogin', 'HomeController@FrontLogin')->name('frontlogin');

Route::get('/imprimant', 'FrontController@imprimant')->name('imprimant');
Route::get('/carteimprime', 'FrontController@carteimprime')->name('carteimprime');

Route::get('/carteimprimein', 'FrontController@carteimprimein')->name('carteimprimein');

Route::post('/getinfo', 'FrontController@getinfo')->name('getinfo');

Route::post('/saveinfo', 'FrontController@saveinfo')->name('saveinfo');



Route::post('/changecopie', 'FrontController@changecopie')->name('changecopie');
Route::post('/changenfc', 'FrontController@changenfc')->name('changenfc');
Route::post('/changeimp', 'FrontController@changeimp')->name('changeimp');
Route::post('/changesmsclient', 'FrontController@changesmsclient')->name('changesmsclient');
Route::post('/changelivclient', 'FrontController@changelivclient')->name('changelivclient');

Route::get('/codeGenere', 'FrontController@codeGenere')->name('codeGenere');
Route::get('/test', 'FrontController@test')->name('test');

/*
Route::get('/boutiques-ooredoo', 'HomeController@boutiquesooredoo')->name('boutiques-ooredoo');

Route::get('/listabonne/{id}', 'FrontController@listabonne')->name('/listabonne/{id}');
Route::get('/listabonneby/{id}', 'FrontController@listabonneby')->name('/listabonneby/{id}');

Route::post('/submitabon', 'FrontController@submitabon')->name('submitabon');

Route::post('/cin', 'FrontController@testcin')->name('cin');
Route::get('/importCsv', 'FrontController@importCsv')->name('importCsv');



*/



