<?php

use App\Mail\WelcomeToLaracast;
use App\Notifications\LessonPublished;
use App\Notifications\PaymentReceived;
use App\Notifications\SubscriptionCanceled;
use Illuminate\Http\Request;
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


Route::get('favorite', function() {
    $user = App\User::first();
    $post = App\Post::first();
    $user->favorites()->attach($post); // 加入收藏
    $user->favorites()->deattach($post); // 移除收藏
    $user->favorites()->toggle($post); // toggle收藏
});


Route::get('lesson', function() {
    $user = App\User::first();
    $lesson = App\Lesson::first();
    $user->notify(new LessonPublished($lesson));
    dump('done');
});

Route::get('cancel', function() {
    Auth::loginUsingId(1);
    Auth::user()->notify(new SubscriptionCanceled);
    dump('done');
});

Route::get('notification', function() {
    Auth::loginUsingId(1);
    // return Auth::user()->notifications;
    // return Auth::user()->unreadNotifications;
    // return App\Notification::all();
    
    // $notify = Auth::user()->unreadNotifications;
    // foreach ($notify as $item) {
    //     dump($item->data); // 返回 toDatabase方法里面的东西
    //     //  $item->markAsRead();
    // }

    return view('notifications');
});

Route::delete('notification/{user}/read', function(App\User $user) {
    $user->notifications->map(function($n) {
        $n->markAsRead();
    });
    return back();
});

Route::get('slack', function() {
    $user = App\User::first();
    $user->notify(new PaymentReceived);
    dump('slack message send done');
});


// simple file upload
Route::get('avatar', function() {
    return view('avatar');
});

Route::post('avatar', function(Request $request) {
    // request()->file('avatar')->store('avatars');
    // $request->file('avatar')->store('avatars'); // save to storage/app/

    $file = $request->file('avatar');
    $ext = $file->extension();
    $user = App\User::first();
    $file->storeAs('public/avatars/'.$user->id, 'avatar.png');

    // blade template show image2
    // run: php artisan storage:link
    // <img src="{{ asset('storage/avatars/1/avatar.png') }}">

    return back();
});
