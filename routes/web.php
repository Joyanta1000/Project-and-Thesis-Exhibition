<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UniversityController;
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