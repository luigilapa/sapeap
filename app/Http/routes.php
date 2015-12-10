<?php

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
Route::get('/', [
    'as' => '/',
    'uses' => function () {
        return view('welcome');
    }
]);

Route::get('about', [
    'as' => 'about',
    'uses' => function () {
        return view('info.about');
    }
]);

// Authentication routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin'  
    ]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout'  
    ]);

//Lawyer
Route::get('lawyer_create', [
    'as' => 'lawyer_create',
    'uses' => 'LawyerController@getCreate'
]);
Route::post('lawyer_create', 'LawyerController@postCreate' );

Route::get('lawyer_edit/{id}', [
    'as' => 'lawyer_edit',
    'uses' => 'LawyerController@getEdit'
]);
Route::post('lawyer_edit/{id}', 'LawyerController@postEdit' );

Route::post('lawyer_delete/{id}', 'LawyerController@deleteItem' );
Route::post('lawyer_restore/{id}', 'LawyerController@restoreItem' );

Route::get('lawyer_list/{num?}', [
    'as' => 'lawyer_list',
    'uses' => 'LawyerController@getAll'
]);
Route::get('lawyer_out', [
    'as' => 'lawyer_out',
    'uses' => 'LawyerController@getRemovedAll'
]);

//Contributions
Route::get('contribution_register', [
    'as' => 'contribution_register',
    'uses' => 'ContributionsController@getRegister'
]);
Route::post('contribution_register', 'ContributionsController@postRegister' );

Route::get('contribution_view', [
    'as' => 'contribution_view',
    'uses' => 'ContributionsController@getView'
]);
Route::post('contribution_view', 'ContributionsController@postView' );

Route::get('lawyer_search/{identification}', [
    'as' => 'lawyer_search',
    'uses' => 'ContributionsController@searchLawyer'
]);

Route::get('contribution_edit/{id?}', [
    'as' => 'contribution_edit',
    'uses' => 'ContributionsController@getEdit'
]);
Route::post('contribution_edit', 'ContributionsController@postEdit' );

//Reports
Route::get('reports', [
    'as' => 'reports',
    'uses' => 'ReportController@getReports'
]);
Route::post('reports', 'ReportController@postReports' );

Route::get('payments', [
    'as' => 'payments',
    'uses' => 'ReportController@getPayments'
]);
Route::post('payments', 'ReportController@postPayments' );



//User
Route::get('user_register', [
    'as' => 'user_register',
    'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('user_register',  'Auth\AuthController@postRegister' );

Route::get('user_list', [
    'as' => 'user_list',
    'uses' => 'Auth\AuthController@getListUsers'
]);

Route::get('user_reset', [
    'as' => 'user_reset',
    'uses' => 'PasswordController@getReset'
]);
Route::post('user_reset', 'PasswordController@postReset' );

Route::get('user_edit/{id?}', [
    'as' => 'user_edit',
    'uses' => 'Auth\AuthController@getEdit'
]);
Route::post('user_edit',  'Auth\AuthController@postEdit' );

Route::post('user_cancel/{id}', 'Auth\AuthController@postCancel' );

Route::post('user_restart/{id}', 'Auth\AuthController@postRestart' );

Route::get('user_out}', [
    'as' => 'user_out',
    'uses' => 'Auth\AuthController@getOutUser'
]);

Route::group(['middleware' => 'auth'], function (){

    Route::get('401', function()
    {
        return view('errors.401');
    });

    Route::get('home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
});
