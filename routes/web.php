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

// Accueil
Route::get('/welcome', 'accueilController@accueil');

Route::view('/welcome', 'welcomeOffline');

Auth::routes();

// online
Route::group(['prefix' => 'user'], function () {

    Route::view('/welcome', 'welcomeOnline')->middleware('auth');

    Route::get('/films-{page}','FilmController@afficherToutLesFilms')->middleware('auth')->name('films');

    Route::get('/lefilm-{id}-{page}-{name}', 'FilmController@afficherOne')->middleware('auth');

    Route::post('/lefilm-{id}-{page}-{likes}', 'FilmController@afficherOne')->middleware('auth');

    //Route::post('/films-{page}', 'FilmController@trier')->middleware('auth');

    Route::post('/resultat', 'SearchController@postResultat')->middleware('auth');

    Route::view('/mon-compte', 'mon-compte')->middleware('auth');

    Route::post('/mon-compte', 'passwordController@changerPassword')->middleware('auth');

    Route::post('/addPageFilms-{numero}', 'pageFilmsController@getPage')->middleware('auth');

});

//page inscription
Route::get('/create', '\App\Http\Controllers\formulaire\fromController@create' );

Route::post('/create', '\App\Http\Controllers\formulaire\fromController@store');


//page de login

Route::get('/login', '\App\Http\Controllers\formulaire\authenController@afficher')->name('login');

Route::post('/login', '\App\Http\Controllers\formulaire\authenController@traitement');

Route::get('/login-MDPO', 'loginMDPOController@MDPOdemander');

Route::post('/login-MDPO', 'loginMDPOController@MDPOchanger');

Route::get('/login-MDPO-new-{email}', 'loginMDPOController@MDPO_new');

Route::post('/login-MDPO-new-{email}', 'loginMDPOController@MDPO_traitement');


//off connection

Route::get('/', 'AccueilController@off');

