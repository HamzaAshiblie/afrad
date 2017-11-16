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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/signIn',[
    'uses' => 'UserController@signIn',
    'as' => 'signIn'
]);
Route::get('/dashboard',function () {
    return view('dashboard');
});
Route::get('/category',[
    'uses' => 'CategoryController@getCategory',
    'as' => 'category'
]);
Route::post('/addCategory',[
    'uses' => 'CategoryController@addCategory',
    'as' => 'addCategory'
]);
Route::post('/editCategory',[
    'uses' => 'CategoryController@editCategory',
    'as' => 'editCategory'
]);
Route::get('/statement/{cat_id}',[
    'uses' => 'StatementController@getStatementByCat',
    'as' => 'statement'
]);
/*Route::get('/statement',[
    'uses' => 'StatementController@getStatement',
    'as' => 'statement'
]);*/
