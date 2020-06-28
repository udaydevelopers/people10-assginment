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
use App\Post;


Route::get('/', 'PostController@index')->name('posts.index');

Route::get('/notify', function () {
    $users = User::find(2);
    //$user->notify(new TestNotification(999));
    Notification::send($users, new TestNotification(700));
});

Route::Resource('posts', 'PostController');
Route::Resource('invoices', 'InvoiceController');

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');
Route::get('/email', 'PostController@sendemail')->name('email');
Route::get('/getemail', 'PostController@getmailgunmsg')->name('getemail');
Route::get('/mail-details', 'PostController@getmsgdetails')->name('getmsgdetails');


