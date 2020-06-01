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

use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Notification;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notify', function () {
    $users = User::all();
    //$user->notify(new TestNotification(999));
    Notification::send($users, new TestNotification(1000));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
