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

Route::get('/sendMessage', 'TelegramController@notifyUser')->name('notify');

################## Dashboard Route ######################
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

################## login Route ######################
Auth::routes(['register' => false]);

############## Error Validation Request ############
Route::get('/errors/403', function () {
    return view('errors.403');
});

############### User Route #########################
Route::middleware('can:users-manger')->group(function (){
    Route::resource('users','UsersController')->except([
        'show'
    ]);
    Route::get('addUser', 'UsersController@addUser')->name('addUser');
    Route::post('registerUser','UsersController@registerUser')->name('registerUser');

});


############### Task Route #########################
Route::middleware('can:users-manger')->group(function (){
    Route::resource('tasks','TasksController')->except([
        'show'
    ]);
});