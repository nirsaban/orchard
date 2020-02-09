<?php


///Projects endPoints
Route::resource('projects', 'ProjectController');
Route::put('update/{id}','GeneryController@update');
Route::delete('delete/{id}','GeneryController@delete');


//Product endPoints
Route::post('addProducts','ProductsController@save');
Route::delete('updateProducts/{id}','ProductsController@update');
Route::get('editProducts/{sku}','ProductsController@edit');



//Order endPoints
Route::get('showOrder','OrderController@showOrder');



Route::post('login','UserController@validateUser');
Route::post('register','UserController@registerUser');










