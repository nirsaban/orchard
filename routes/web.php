<?php

Route::get('/', function () {
    return view('welcome');
});


Route::resource('projects', 'ProjectController');

Route::put('update','GeneryController@update');
