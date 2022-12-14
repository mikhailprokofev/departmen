<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::middleware(['prettyjson'])->group(function () {

    Route::resource('department', DepartmentController::class, ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);
    Route::resource('jobtitle', JobTitleController::class, ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);
    Route::resource('employee', EmployeeController::class, ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);

});
