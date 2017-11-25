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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get()->middleware('auth')

Route::group(['middleware' => 'web'], function () {
  // Authentication Routes
  // Route::get('auth/login', 'Auth\AuthController@getLogin');
  // Route::post('auth/login', 'Auth\AuthController@postLogin');

  //
  // // Registration Route
  // Route::get('auth/register', 'Auth\AuthController@getRegister');
  // Route::post('auth/register', 'Auth\AuthController@postRegister');

  Route::get('post', 'SearchController@index');
  Route::get('category/{name}', ['as' => 'category.index','uses' => 'CategoryController@index']);
  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
  Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
  Route::get('photo', 'PagesController@getPhoto');
  // Route::get('moment/{slug}', ['as' => 'moment.single', 'uses' => 'MomentController@getSingle'])->where('slug', '[\w\d\-\_]+');
  Route::get('podcasts', 'PagesController@getPodcastIndex');
  Route::get('podcasts/{slug}', ['as' => 'pages.podcast', 'uses' => 'PagesController@getPodcastSingle'])->where('slug', '[\w\d\-\_]+');
  Route::get('contact', 'PagesController@getContact');
  Route::get('about', 'PagesController@getAbout');
  Route::get('/', 'PagesController@getIndex');
});


Route::group(['middleware' => 'auth'], function(){
  Route::resource('tags', 'TagController', ['except' => 'create']);
  Route::resource('categories', 'KategoriController', ['except' => 'create']);
  Route::resource('albums', 'AlbumController');
  Route::resource('carousels', 'CarouselsController');
  Route::resource('posts', 'PostController');
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
});
