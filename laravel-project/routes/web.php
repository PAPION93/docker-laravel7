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

Route::get('/home', 'ArticlesController@index')->name('home');

Route::get('test', function () {
    event(new App\Events\MyEvent('hello world'));
    return "success";
});

Route::get('pusher', function () {
    return view('pusher');
});

Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'PostCommentController');

Route::get('tags/{id}/articles', [
    'as' => 'tags.articles.index',
    'uses' => 'ArticlesController@index'
]);
Route::resource('articles', 'ArticlesController');
