<?php

use App\Mail\WelcomeToLaracast;
use Illuminate\Support\Facades\Mail;

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

Route::get('users', function() {
    return view('users', ['users'=>App\User::paginate(4)]);
});

Route::get('send', function() {
    $email = new WelcomeToLaracast(App\User::find(10));
    Mail::to('sbjsw@qq.com')->send($email);
    echo 'done';
});

Route::get('fools', function() {
    $fools = collect(['taylor', 'matth', 'jeffery'])->map(function ($name) {
        return new App\User(['name'=>$name]);
    });
    
    return view('fools', compact('fools'));
});
