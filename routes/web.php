<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\LoginController::class, "index"]);
Route::post('backend/register', [\App\Http\Controllers\BackendController::class, "register"]);
Route::post('backend/login', [\App\Http\Controllers\BackendController::class, "login"]);
Route::post('/backend/creategroup', [\App\Http\Controllers\BackendController::class, "creategroup"]);
Route::get('/dashborad', [\App\Http\Controllers\ForntendController::class, "dashborad"]);
Route::get('/studentinfo', [\App\Http\Controllers\ForntendController::class, "studentinfo"]);
Route::get('/signout', [\App\Http\Controllers\BackendController::class, "signout"]);
Route::get('/grouplearn', [\App\Http\Controllers\ForntendController::class, "grouplearn"]);
Route::post('/group/update', [\App\Http\Controllers\BackendController::class, "groupupdate"]);
Route::get('/group/work/{id}', [\App\Http\Controllers\BackendController::class, "groupwork"]);
Route::post('/group/postwork', [\App\Http\Controllers\BackendController::class, "grouppostwork"]);
Route::post('/groupwork/update', [\App\Http\Controllers\BackendController::class, "groupworkupdate"]);
Route::post('/joingroup', [\App\Http\Controllers\BackendController::class, "joingroup"]);
Route::get('/detail/work/{id}', [\App\Http\Controllers\BackendController::class, "detailwork"]);
Route::get('/studentingroup/{id}', [\App\Http\Controllers\ForntendController::class, "studentingroup"]);
Route::get('/workinfo/{id}', [\App\Http\Controllers\ForntendController::class, "workinfo"]);
Route::get('/learningpost/{id}', [\App\Http\Controllers\BackendController::class, "learningpost"]);
Route::post('/student/postwork', [\App\Http\Controllers\BackendController::class, "studentpostwork"]);

