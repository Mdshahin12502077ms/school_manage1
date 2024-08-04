<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\schoolSubcription;
use  App\Http\Controllers\Backend\settingController;
use  App\Http\Controllers\Backend\StudentController;
use  App\Http\Controllers\Backend\SessionController;
use  App\Http\Controllers\Backend\AuthController;
use  App\Http\Controllers\BranchController;
use  App\Http\Controllers\Backend\BranchSubsController;
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
  Route::get('branch/all',[BranchController::class,'all']);
  Route::get('add_branch',[BranchController::class,'Branch_add']);
  Route::post('branch/insert',[BranchController::class,'insert']);
  Route::get('Branch/edit/{id}',[BranchController::class,'edit']);
  Route::post('Branch/upate/{id}',[BranchController::class,'update']);
  Route::post('Branch/delete/{id}',[BranchController::class,'delete']);
  Route::get('Branch/info/{id}',[BranchController::class,'BranchInfo']);
  //branch subscription
  Route::post('branch/subscription/insert',[BranchSubsController::class,'Branch_subscription']);

  Route::prefix('School/subscription/')->group(function(){
    Route::get('list/all',[BranchSubsController::class,'allSubscription']);
    Route::get('subscription/edit/{id}',[BranchSubsController::class,'editsubscription']);
    Route::post('subscription/update/{id}',[BranchSubsController::class,'updatesubscription']);
    Route::post('subscription/delete/{id}',[BranchSubsController::class,'deletesubscription']);
    Route::get('Package/all',[schoolSubcription::class,'allPlan']);
    Route::get('Package/add',[schoolSubcription::class,'addPlan']);
    Route::post('Package/insert',[schoolSubcription::class,'insertPlan']);
    Route::get('Package/edit/{id}',[schoolSubcription::class,'editPlan']);
    Route::post('Package/update/{id}',[schoolSubcription::class,'updatePlan']);
    Route::post('Package/delete/{id}',[schoolSubcription::class,'deletePlan']);

  });


//course
  Route::prefix('course/')->group(function(){
    Route::get('all',[CourseController::class,'allCourse']);
    Route::get('add',[CourseController::class,'addCourse']);
    Route::post('insert',[CourseController::class,'insertCourse']);
    Route::get('edit/{id}',[CourseController::class,'editCourse']);
    Route::post('update/{id}',[CourseController::class,'updateCourse']);
    Route::post('delete/{id}',[CourseController::class,'deleteCourse']);
    Route::get('search',[CourseController::class,'searchCourse']);
  });



//session
  Route::prefix('Session/')->group(function(){
    Route::get('all',[SessionController::class,'allSession']);
    Route::get('add',[SessionController::class,'addSession']);
    Route::post('insert',[SessionController::class,'insertSession']);
    Route::get('edit/{id}',[SessionController::class,'editSession']);
    Route::post('update/{id}',[SessionController::class,'updateSession']);
    Route::post('delete/{id}',[SessionController::class,'deleteSession']);

  });
//All Student
Route::prefix('Student/')->group(function(){
    Route::get('all',[StudentController::class,'allStudent']);
    Route::get('addmission/form',[StudentController::class,'addmissionForm']);
    Route::post('insert',[StudentController::class,'insertStudent']);
    Route::get('edit/{id}',[StudentController::class,'editStudent']);
    Route::post('update/{id}',[StudentController::class,'updateStudent']);
    Route::post('delete/{id}',[StudentController::class,'deleteSession']);
    Route::get('info/{id}',[StudentController::class,'studentInfo']);

  });
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

  //authentication

  Route::prefix('Login/')->group(function(){
    Route::post('AuthCheck',[AuthController::class,'loginCheck']);
    Route::get('log',[AuthController::class,'login']);
  });
  Route::post('Logout',[AuthController::class,'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
