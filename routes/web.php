<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Crud;

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact',[Crud::class,'addToContact']);
Route::post('contact/store',[Crud::class,'contact_store']);
Route::get('contact/edit/{id}',[Crud::class,'addToContact']);
Route::post('contact/update',[Crud::class,'contact_update']);
Route::get('contact/delete/{id}',[Crud::class,'contact_delete']);


