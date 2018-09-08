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

//routegroup maken front en back
//de backoffice route via nieuwe middelware


//front
Route::get('Wie', 'WhoController@index')->name('wie')->middleware('web');
route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function () {
        return redirect()->route('mijnstem');
    });

    Route::get('Hoe', 'HowController@index')->name('hoe');
    Route::get('Mijnstem', 'MyvoteController@index')->name('mijnstem');
    Route::post('Mijnstem', 'MyvoteController@store');
    Route::get('Verloop', 'ProgressController@index')->name('verloop');
    Route::get('Partijen', 'PartiesController@index')->name('partijen');
});

//back
route::group(['prefix' => 'admin'], function (){

    Route::get('/', 'Backoffice\AdminController@index')->name('admin.home');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/partijen', 'Backoffice\AdminPartiesController@index')->name('admin.partijen');
    //nieuwe partij
    Route::get('/partijen/nieuw', 'Backoffice\AdminPartiesController@create')->name('admin.partijen.nieuw');
    Route::post('/partijen/nieuw', 'Backoffice\AdminPartiesController@store')->name('admin.partijen.nieuw');
    //wijzigen partij
    Route::get('/partijen/wijzig/{id}', 'Backoffice\AdminPartiesController@edit')->name('admin.partijen.wijzig')->where(['id' => '[0-9]+']);
    Route::post('/partijen/wijzig/{id}', 'Backoffice\AdminPartiesController@update')->name('admin.partijen.wijzig')->where(['id' => '[0-9]+']);
    //partij verwijderen
    Route::get('/partijen/verwijder/{id}', 'Backoffice\AdminPartiesController@delete')->name('admin.partijen.verwijder')->where(['id' => '[0-9]+']);
    Route::post('/partijen/verwijder/{id}', 'Backoffice\AdminPartiesController@destroy')->name('admin.partijen.verwijder')->where(['id' => '[0-9]+']);
    Route::post('/partijen/softdelete/{id}', 'Backoffice\AdminPartiesController@softdelete')->name('admin.partijen.softdelete')->where(['id' => '[0-9]+']);

    //nieuwe kandidaat
    Route::get('/kandidaten/nieuw', 'Backoffice\AdminCandidatesController@create')->name('admin.kandidaten.nieuw');
    Route::post('/kandidaten/nieuw', 'Backoffice\AdminCandidatesController@store')->name('admin.kandidaten.nieuw');
    //wijzigen van kandidaat
    Route::get('/kandidaten/wijzig/{id}', 'Backoffice\AdminCandidatesController@edit')->name('admin.kandidaten.wijzig')->where(['id' => '[0-9]+']);
    Route::post('/kandidaten/wijzig/{id}', 'Backoffice\AdminCandidatesController@update')->name('admin.kandidaten.wijzig')->where(['id' => '[0-9]+']);

    //verwijderen candidaat
    Route::get('/kandidaten/verwijder/{id}', 'Backoffice\AdminCandidatesController@delete')->name('admin.kandidaten.verwijder')->where(['id' => '[0-9]+']);
    Route::post('/kandidaten/verwijder/{id}', 'Backoffice\AdminCandidatesController@destroy')->name('admin.kandidaten.verwijder')->where(['id' => '[0-9]+']);
    Route::post('/kandidaten/softdelete/{id}', 'Backoffice\AdminCandidatesController@softdelete')->name('admin.kandidaten.softdelete')->where(['id' => '[0-9]+']);


    //stemmer
    Route::get('/stemmers', 'Backoffice\AdminVotersController@index')->name('admin.stemmers');
    //stemmer toevoegen
    Route::get('stemmers/nieuw', 'Backoffice\AdminVotersController@create')->name('admin.stemmers.nieuw');
    Route::post('stemmers/nieuw', 'Backoffice\AdminVotersController@store')->name('admin.stemmers.nieuw');


    //overzicht
    Route::get('/overzicht', 'Backoffice\AdminOverviewController@index')->name('admin.overzicht');

    //login
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    //toevoegen admin
    Route::get('/administrator', 'Backoffice\AdminAdministratorController@index')->name('admin.administrator');
    Route::get('/administrator/nieuw', 'Backoffice\AdminAdministratorController@create')->name('admin.administrator.nieuw');
    Route::post('/administrator/nieuw', 'Backoffice\AdminAdministratorController@store')->name('admin.administrator.opslaan');
    Route::post('/administrator/{id}/verwijderen', 'Backoffice\AdminAdministratorController@destroy')->name('admin.administrator.verwijderen');


});


Auth::routes();


