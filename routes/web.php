<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/proba', 'FrontendController@proba');
Route::get('/oblast/{id}', 'FrontendController@oblastProjekata')->name('oblastProjekata');
Route::get('/katProj/{id}', 'FrontendController@kategorijaProjekata')->name('katProj');
Route::get('/kontakt', 'FrontendController@kontakt')->name('kontakt');

Route::get('/cv', 'FrontendController@cv')->name('cv');
//Obrisati na serveru i dati apsolutnu putanju na serveru
Route::get('/url/{url}', 'FrontendController@redirectToUrl')->name('url');

Route::get('/home','FrontendController@home')->name('frontHome');
Route::get("/single/{slug}",'FrontendController@single')->name('single');
Route::get("/search", "FrontendController@search")->name('pretraga');

Route::get('/loginUsera', 'HomeController@login')->name('home.login');
Route::resource('user','UserController');
Route::resource('profile', 'ProfilesController');

Route::group(['middleware' => ['admin'],'prefix' => 'admin'], function () {

Route::resource('owner', 'OwnerController');
Route::resource('skill', 'SkillController');
Route::resource('settings', 'SettingsController');
Route::resource('projekti', 'ProjektiController');
Route::resource('tagovi', 'TagController');
Route::resource('kategorije', 'CategoryController');
Route::resource('menu','MenuController');
Route::resource('oblast','OblastController');



//Rute za admine
    Route::get('user/admin/{id}',
        [
            'uses' => 'UserController@admin',
            'as' => 'user.admin'
        ]
    );
    Route::get('user/notAdmin/{id}',
        [
            'uses' => 'UserController@notAdmin',
            'as' => 'user.notAdmin'
        ]
    );

});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::get('register1', 'Auth\RegisterController@register1')->name('register1');
Route::get('forgot', 'Auth\ForgotPasswordController@forgot')->name('forgot');
