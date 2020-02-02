<?php

Route::get('/', function () {
    return view('welcome');
});


//Route::resource('projects', 'ProjectController');


Route::put('update/{id}','GeneryController@update');
Route::delete('delete/{id}','GeneryController@delete');
