<?php

/**
 * Index routes.
 *
 */
Route::group(['prefix' => '/', 'middleware' => 'acl'], function()
{
	Route::get('/', 'IndexController@index');
	Route::get('deny', 'IndexController@deny');
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);
});

/**
 * Administration routes.
 *
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'acl']], function()
{
	Route::get('/', ['uses' => 'Admin\IndexController@getIndex', 'as' => 'admin.index.index']);
	Route::controller('index', 'Admin\IndexController');
	Route::resource('articles', 'Admin\ArticlesController', ['except' => 'show']);
	Route::resource('users', 'Admin\UsersController', ['except' => 'show']);
	Route::resource('roles', 'Admin\RolesController', ['except' => 'show']);
	Route::resource('roles.permissions', 'Admin\RolesPermissionsController', ['only' => ['index', 'store']]);
	Route::resource('categories', 'Admin\CategoriesController', ['except' => 'show']);
	Route::resource('tags', 'Admin\TagsController', ['except' => 'show']);
});