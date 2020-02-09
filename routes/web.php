<?php


///Projects endPoints
Route::resource('projects', 'ProjectController');
Route::put('update/{id}','GeneryController@update');
Route::delete('delete/{id}','GeneryController@delete');


//Product endPoints
Route::post('addProducts','ProductsController@save');




//Order endPoints
Route::get('showOrder','OrderController@showOrder');
Route::delete('updateProducts/{id}','OrderController@update');
Route::get('editProducts/{sku}','OrderController@edit');


Route::post('login','UserController@validateUser');
Route::post('register','UserController@registerUser');










