<?php


///Projects endPoints
Route::resource('projects', 'ProjectController');
Route::put('update/{id}','GeneryController@update');
Route::delete('delete/{id}','GeneryController@delete');
Route::get('addPro','GeneryController@ShowPro');

//Product endPoints
Route::post('addProducts','ProductsController@save');
Route::delete('updateProducts/{id}','ProductsController@update');
Route::get('editProducts/{sku}','ProductsController@edit');
Route::get('addProd/','ProductsController@ShowProd');


//Order endPoints
Route::get('showOrder','OrderController@showOrder');
Route::get('order','OrderController@saveorder');


Route::post('login','UserController@validateUser');
Route::post('register','UserController@registerUser');

Route::get('register','UserController@ShowRegister');
Route::get('login','UserController@ShowLogin');








