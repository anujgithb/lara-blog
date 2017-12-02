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

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('contact', function () {
    return view('pages.contact');
});

Route::post('contact','PagesController@post_contact');

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-_]+');

Route::get('blog',['uses'=>'BlogController@getArchive','as'=>'blog.index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',function(){ return false; });
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/posts','PostController');
Route::resource('/category', 'CategoryController',['except'=>['create']]);
Route::resource('/tags', 'TagController',['except' => ['create']]);

// comments 
Route::post('/comments/{post_id}',['uses'=> 'CommentsController@store', 'as'=> 'comments.store']);
Route::get('/comments/{id}/edit',['uses'=> 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('/comments/{id}', ['uses' => 'CommentsController@update', 'as'=> 'comments.update']);
Route::delete('/comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
