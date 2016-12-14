<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
interface BarInterface{}

class Bar implements BarInterface{}

//App::bind to bind inside container
App::bind('BarInterface', 'Bar');
*/

/*App::bind('BarInterface', function(){
	return new Bar;
});*/

// App::bind('bar', function(){
// 	return new Bar(new Baz);
// })

/*
Route::get('bar', function(BarInterface $bar){
	//laravel in backend made a bar instance for me
	//App::make resolving out of container
	$bar = App::make('BarInterface');

	dd($bar);
	//dd($bar);
});
*/

Route::get('foo', 'FooController@foo');

Route::get('/', 'ArticlesController@index');

Route::get('about', 'PagesController@about'); 

Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// Route::get('articles/{id}', 'ArticlesController@show');
// Route::post('articles', 'ArticlesController@store');
// Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::get('tags/{tags}', 'TagsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
Route::get('foo', ['middleware' => 'manager', function(){
	return 'this page may only be viewed by managers';
}]);*/
