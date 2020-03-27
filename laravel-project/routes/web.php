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

//Route::resource('posts', 'PostsController');
Route::resource('posts', 'PostsController')->middleware('auth');
Route::resource('posts.comments', 'PostCommentController');

Route::get('posts', function () {
//    $posts = App\Post::get();
//    $posts = App\Post::with('user')->get();
    // paging
    $posts = App\Post::with('user')->paginate(10);

    return view('posts.index', compact('posts'));
});
