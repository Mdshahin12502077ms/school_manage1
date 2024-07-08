<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Backend\adminController;
use  App\Http\Controllers\Backend\settingController;
use  App\Http\Controllers\BranchController;
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

  Route::get('admin/dashboard',[adminController::class,'dashboard']);

  //branch all url
  Route::get('add_branch',[BranchController::class,'Branch_add']);

  //district all url
  Route::get('add_division',[settingController::class,'division_add']);
  Route::post('add_division/insert',[settingController::class,'division_insert']);
  Route::get('edit/division/{id}',[settingController::class,'division_edit']);
  Route::post('division/update/{id}',[settingController::class,'update_division']);
  Route::get('division/delete/{id}',[settingController::class,'Delete_division']);

  //subdistrict all url
  Route::get('add_district',[settingController::class,'add_district']);
  Route::post('add_district/insert',[settingController::class,'district_insert']);
  Route::get('edit/district/{id}',[settingController::class,'district_edit']);
  Route::post('district/update/{id}',[settingController::class,'update_district']);
  Route::get('district/delete/{id}',[settingController::class,'Delete_district']);

  //default settings
  Route::get('get_districts',[settingController::class,'getDistrictByDivision']);
