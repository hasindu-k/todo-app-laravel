<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', \App\Http\Controllers\TaskController::class);
Route::resource('tags', \App\Http\Controllers\TagController::class);


/*
Resource Routes Details
Using Route::resource automatically creates the following routes:

For TaskController:

GET /tasks - index method
GET /tasks/create - create method
POST /tasks - store method
GET /tasks/{task} - show method
GET /tasks/{task}/edit - edit method
PUT/PATCH /tasks/{task} - update method
DELETE /tasks/{task} - destroy method

For TagController:

GET /tags - index method
GET /tags/create - create method
POST /tags - store method
GET /tags/{tag} - show method
GET /tags/{tag}/edit - edit method
PUT/PATCH /tags/{tag} - update method
DELETE /tags/{tag} - destroy method
*/
