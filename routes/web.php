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

Route::get('/completed', "PokemonController@saveApiData");
Route::get('/profile', "ProfileController@getProfiles");
Route::post('/getRequest', "ProfileController@pokemonKing");
Route::get('/', "ProfileController@profileTable");
// Route::get('/', function(){
//   return view('welcome');
// });
