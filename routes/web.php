<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\TypeController;
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