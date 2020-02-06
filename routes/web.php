<?php

Route::get('/', function () {
    return view('welcome');
});

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


////user endpoints
//Route::prefix('user')->group(function () {
//    Route::get("logout", "userController@logOut");
//    Route::post("signin", "userController@validateUser");
//    Route::post("signup", "userController@validateNewUser");
//});
//
