<?php

use App\Http\Controllers\applyController;
use App\Http\Controllers\authController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\jobtypeController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//crud working
Route::post('/jobinsert',[jobtypeController::class,'insert']);
Route::get('/dataget',[jobtypeController::class,'fatch']);
Route::delete('/datadel/{id}',[jobtypeController::class,'delete']);
Route::put('/dataupdate/{id}',[jobtypeController::class,'update']);
//authentication
Route::post('/userregister',[authController::class,'register']);
Route::get('alluser',[authController::class,'fatch']);
Route::get('userbyid/{id}',[authController::class,'userbyid']);
Route::delete('userdel/{id}',[authController::class,'delete']);
Route::put('userupdate/{id}',[authController::class,'update']);
//login
Route::post('/login',[authController::class,'login']);
//job upload
Route::post('/jobupload',[jobController::class,'upload']);
Route::get('/job',[jobController::class,'alljob']);
Route::get('job_by_id/{id}',[jobController::class,'job_by_id']);
//job apply
Route::post('/apply/job',[applyController::class,'insert']);
Route::get('/get/applyjob',[applyController::class,'fatch']);