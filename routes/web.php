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
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    if (!file_exists($caminho = __DIR__."/../resources/posts/{$slug}.html")) {
        abort(404);
    }

    $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($caminho));

    return view('post', compact('post'));

})->where('post', '[A-z_\-]+');
