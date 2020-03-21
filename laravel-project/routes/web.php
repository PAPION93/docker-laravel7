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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'PostCommentController');

Route::get('auth', function () {
    $credentials = [
        'email' => 'sjun93@naver.com',
        'password' => '1q2w3e!!'
    ];

    if (!Auth::attempt($credentials)) {
        return 'Incorrect username and password combination';
    }

    return redirect('protected');
});

Route::get('auth/logout', function () {
    Auth::logout();

    return 'See you again~';
});

Route::get('protected', [
    'middleware' => 'auth',
    function () {
        return 'Welcome back, ' . Auth::user()->name;
    }
]);
