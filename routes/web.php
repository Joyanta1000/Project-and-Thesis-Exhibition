<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/User_Login',[UserController::class, 'login']);

Route::post('/login',[LoginController::class, 'redirectTo']);

Route::middleware(['isUser'])->group(function () {
    
    Route::get('/admin',[LoginController::class, 'index']);

    Route::get('/add_types', function () {
        return view('admin.pages.add_types');
    });

    Route::post('/insert_type',[TypeController::class, 'insert_type']);

Route::get('/types',[TypeController::class, 'index']);

Route::get('/update_status/{id}',[TypeController::class, 'update_status']);

Route::get('/edit_type/{id}',[TypeController::class, 'edit_type']);

Route::post('/update_type/{id}',[TypeController::class, 'update_type']);

Route::get('/delete_types_information/{id}',[TypeController::class, 'delete_types_information']);

Route::get('/add_category', function () {
    return view('admin.pages.add_category');
});

Route::post('/insert_category',[CategoryController::class, 'insert_category']);

Route::get('/categories',[CategoryController::class, 'index']);

Route::get('/update_status_of_category/{id}',[CategoryController::class, 'update_status_of_category']);

Route::get('/edit_category/{id}',[CategoryController::class, 'edit_category']);

Route::post('/update_category/{id}',[CategoryController::class, 'update_category']);

Route::get('/delete_categories_information/{id}',[CategoryController::class, 'delete_categories_information']);

Route::get('/add_university', function () {
    return view('admin.pages.add_university');
});

Route::post('/insert_university',[UniversityController::class, 'insert_university']);

Route::get('/universities',[UniversityController::class, 'index']);

Route::get('/update_status_of_university/{id}',[UniversityController::class, 'update_status_of_university']);

Route::get('/edit_university/{id}',[UniversityController::class, 'edit_university']);

Route::post('/update_university/{id}',[UniversityController::class, 'update_university']);

Route::get('/delete_universities_information/{id}',[UniversityController::class, 'delete_universities_information']);

Route::get('/add_designation', function () {
    return view('admin.pages.add_designation');
});

Route::post('/insert_designation',[DesignationController::class, 'insert_designation']);

Route::get('/designations',[DesignationController::class, 'index']);

Route::get('/update_status_of_designation/{id}',[DesignationController::class, 'update_status_of_designation']);

Route::get('/edit_designations_info/{id}',[DesignationController::class, 'edit_designations_info']);

Route::post('/update_designations_information/{id}',[DesignationController::class, 'update_designations_information']);

Route::get('/delete_designations_information/{id}',[DesignationController::class, 'delete_designations_information']);

Route::get('/add_department', function () {
    return view('admin.pages.add_department');
});

Route::post('/insert_departments_information',[DepartmentController::class, 'insert_departments_information']);

Route::get('/departments',[DepartmentController::class, 'index']);

Route::get('/update_status_of_department/{id}',[DepartmentController::class, 'update_status_of_department']);

Route::get('/edit_departments_info/{id}',[DepartmentController::class, 'edit_departments_info']);

Route::post('/update_departments_information/{id}',[DepartmentController::class, 'update_departments_information']);

Route::get('/delete_departments_information/{id}',[DepartmentController::class, 'delete_departments_information']);

Route::get('/add_role', function () {
    return view('admin.pages.add_role');
});

Route::post('/insert_role',[RoleController::class, 'insert_roles_information']);

Route::get('/roles',[RoleController::class, 'index']);

Route::get('/update_status_of_role/{id}',[RoleController::class, 'update_status_of_role']);

Route::get('/edit_roles_info/{id}',[RoleController::class, 'edit_roles_info']);

Route::post('/update_roles_information/{id}',[RoleController::class, 'update_roles_information']);

Route::get('/delete_roles_information/{id}',[RoleController::class, 'delete_roles_information']);

Route::get('/add_achievement', function () {
    return view('admin.pages.add_achievement');
});

Route::post('/insert_achievement',[AchievementController::class, 'insert_achievements_information']);

Route::get('/achievements',[AchievementController::class, 'index']);

Route::get('/edit_achievements_info/{id}',[AchievementController::class, 'edit_achievements_info']);

Route::post('/update_achievements_information/{id}',[AchievementController::class, 'update_achievements_information']);

Route::get('/delete_achievements_information/{id}',[AchievementController::class, 'delete_achievements_information']);

  });
  

Route::get('student_register',[UserController::class, 'index']);

Route::post('/student_registration',[UserController::class, 'student_registration']);

Route::get('/emailverify',[UserController::class, 'verify']);

Route::get('/verification/{token}',[UserController::class, 'verified']);

Route::get('/authentication/verification_message',[UserController::class, 'verified']);

Route::get('/verification_message',[UserController::class, 'verification_message']);

Route::get('supervisor_register',[UserController::class, 'university_and_departments_info_for_supervisor_registration']);

Route::post('/supervisor_registration',[UserController::class, 'supervisor_registration']);

Route::middleware(['isStudent'])->group(function () {
    
Route::get('/student_dashboard', function () {
    return view('student.pages.index');
});

});

Route::middleware(['isSupervisor'])->group(function () {

Route::get('/supervisor_dashboard', function () {
    return view('supervisor.pages.index');
});

});

// Route::middleware(['student'])->group(function () {

// 	Route::get('/student_dashboard', function () {
//     return view('student.student_dashboard');
// });
    
// });


