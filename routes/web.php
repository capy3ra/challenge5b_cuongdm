<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ChallengeController;

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

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'checkLogin'])->name('auth.check-login');

Route::get('logout',[AuthController::class, 'logout'])->middleware('user.login')->name('logout');
Route::get('', function (){
    return view('index');
})->middleware('user.login')->name('index');

Route::get('profile', [AuthController::class, 'profile'])->middleware('user.login')->name('profile.index');
Route::put('profile', [AuthController::class, 'updateProfile'])->middleware('user.login')->name('profile.update');

Route::get('changePassword', [AuthController::class, 'changePassword'])->middleware('user.login')->name('changePwd.index');
Route::post('changePassword', [AuthController::class, 'handleChangePassword'])->middleware('user.login')->name('changePwd.update');

Route::prefix('userList')->middleware('user.login')->group(function() {
    Route::get('', [UsersController::class, 'index'])->name('userList.index');
    Route::get('create', [UsersController::class, 'create'])->middleware('isteacher')->name('userList.create');
    Route::post('store', [UsersController::class, 'store'])->middleware('isteacher')->name('userList.store');
    Route::get('edit/{id}', [UsersController::class, 'edit'])->middleware('isteacher')->name('userList.edit');
    Route::put('update/{id}', [UsersController::class, 'update'])->middleware('isteacher')->name('userList.update');
    Route::get('delete/{id}', [UsersController::class, 'delete'])->middleware('isteacher')->name('userList.delete');
    Route::get('detail/{id}', [UsersController::class, 'detail'])->middleware('isteacher')->name('userList.detail');
});

Route::prefix('classroom')->middleware('user.login')->group(function(){
    Route::get('', [AssignmentController::class, 'index'])->name('classroom.index');
    Route::get('create', [AssignmentController::class, 'create'])->middleware('isteacher')->name('classroom.create');
    Route::post('store', [AssignmentController::class, 'store'])->middleware('isteacher')->name('classroom.store');
    Route::get('{id}/downloadAssignment', [AssignmentController::class, 'downloadAssignment'])->name('classroom.assignment.download');
    Route::get('detail/{id}', [SubmissionController::class, 'detail'])->middleware('isteacher')->name('classroom.assignment.detail');
    Route::get('submit/{id}', [SubmissionController::class, 'submit'])->middleware('isstudent')->name('classroom.assignment.submit');
    Route::post('handle_submit', [SubmissionController::class, 'handleSubmit'])->middleware('isstudent')->name('classroom.submission.submit');
    Route::get('{id}/downloadSubmission', [SubmissionController::class, 'downloadSubmission'])->middleware('isteacher')->name('classroom.submission.download');
});

Route::prefix('challenge')->middleware('user.login')->group(function(){
    Route::get('', [ChallengeController::class, 'index'])->name('challenge.index');
    Route::get('create', [ChallengeController::class, 'create'])->middleware('isteacher')->name('challenge.create');
    Route::post('store', [ChallengeController::class, 'store'])->middleware('isteacher')->name('challenge.store');
    Route::get('answer/{id}', [ChallengeController::class, 'answer'])->middleware('isstudent')->name('challenge.answer');
    Route::post('submit', [ChallengeController::class, 'submit'])->middleware('isstudent')->name('challenge.submit');


});
