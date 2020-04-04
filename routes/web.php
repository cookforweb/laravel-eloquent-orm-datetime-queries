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


//Auth::routes();

Route::group(['prefix' => 'query', 'namespace' => 'Queries'], function(){
    Route::get('/get-user-with-events', 'GetUserWithEvents@run');
    Route::get('/get-user-with-events-gt-date', 'GetUserWithEventsGtDate@run');
    Route::get('/get-users-with-events-between-dates', 'GetUsersWithEventsBetweenDates@run');
    Route::get('/get-users-having-events-in-date-range', 'GetUsersHavingEventsInRange@run');
    Route::get('/get-users-with-events-with-ranged-dates', 'GetUsersWithEventsWithRangedDates@run');
});
