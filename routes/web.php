<?php

use Illuminate\Support\Facades\Route;
use VladNicu\RequestMailer\Mailer;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('testmail', function($email) {
    Mailer::sendMail(env('MAIL_API_URL'), [$email], 'You have been added to a group!', 'Hello');
});

