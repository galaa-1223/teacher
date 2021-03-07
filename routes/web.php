<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\TeacherAuthController;

use App\Http\Controllers\Teacher\TeacherController;

use App\Http\Controllers\Teacher\TeachersController;
use App\Http\Controllers\Teacher\StudentsController;
use App\Http\Controllers\Teacher\AngiController;
use App\Http\Controllers\Teacher\HicheelController;
use App\Http\Controllers\Teacher\HuvaariController;
use App\Http\Controllers\Teacher\MergejilController;
use App\Http\Controllers\Teacher\MergejilBagshController;
use App\Http\Controllers\Teacher\TenhimController;
use App\Http\Controllers\Teacher\SettingsController;
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

Auth::routes();

/****************************************************************************/
/********************************** TEACHER *********************************/
/****************************************************************************/

// Teacher Login
Route::get('teacher', [TeacherAuthController::class, 'teacherGet'])->name('teacherLogin');
Route::get('teacher/login', [TeacherAuthController::class, 'teacherGetLogin'])->name('teacherLogin');
Route::post('teacher/login', [TeacherAuthController::class, 'teacherLogin'])->name('teacherLoginPost');
Route::get('teacher/logout', [TeacherAuthController::class, 'teacherLogout'])->name('logout');

Route::group(['prefix' => 'teacher','middleware' => 'teacherauth'], function () {
	// teacher Dashboard
	Route::get('dashboard',[TeacherController::class, 'dashboard'])->name('teacher-dashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersController::class, 'index'])->name('teacher-teachers');
	Route::get('teachers/add',[TeachersController::class, 'add'])->name('teacher-teachers-add');
	Route::get('teachers/edit/{id}',[TeachersController::class, 'edit'])->name('teachers-edit');

	Route::post('teachers/add',[TeachersController::class, 'store'])->name('teacher-teachers-save');
	Route::post('teachers/edit/{id}',[TeachersController::class, 'update'])->name('teacher-teachers-edit');
	Route::post('teachers/delete/',[TeachersController::class, 'delete'])->name('teacher-teachers-delete-ajax');

	Route::delete('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('teacher-teachers-delete');

	// Angi
	Route::get('angi',[AngiController::class, 'index'])->name('teacher-angi');
	Route::get('angi/add',[AngiController::class, 'add'])->name('teacher-angi-add');
	Route::get('angi/edit/{id}',[AngiController::class, 'edit'])->name('angi-edit');

	Route::post('angi/add',[AngiController::class, 'store'])->name('teacher-angi-save');
	Route::post('angi/edit/{id}',[AngiController::class, 'update'])->name('teacher-angi-edit');

	Route::delete('angi/delete/{id}',[AngiController::class, 'destroy'])->name('teacher-angi-delete');

	// Mergejil
	Route::get('mergejil',[MergejilController::class, 'index'])->name('teacher-mergejil');
	Route::get('mergejil/add',[MergejilController::class, 'add'])->name('teacher-mergejil-add');
	Route::get('mergejil/edit/{id}',[MergejilController::class, 'edit'])->name('mergejil-edit');

	Route::post('mergejil/add',[MergejilController::class, 'store'])->name('teacher-mergejil-save');
	Route::post('mergejil/edit/{id}',[MergejilController::class, 'update'])->name('teacher-mergejil-edit');
	Route::post('mergejil/delete/',[MergejilController::class, 'delete'])->name('teacher-mergejil-delete-ajax');

	Route::delete('mergejil/delete/{id}',[MergejilController::class, 'destroy'])->name('teacher-mergejil-delete');

	// Mergejil Bagsh
	Route::get('mergejil_bagsh',[MergejilBagshController::class, 'index'])->name('teacher-mergejil_bagsh');
	Route::get('mergejil_bagsh/add',[MergejilBagshController::class, 'add'])->name('teacher-mergejil_bagsh-add');
	Route::get('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'edit'])->name('mergejil_bagsh-edit');

	Route::post('mergejil_bagsh/add',[MergejilBagshController::class, 'store'])->name('teacher-mergejil_bagsh-save');
	Route::post('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'update'])->name('teacher-mergejil_bagsh-edit');

	Route::delete('mergejil_bagsh/delete/{id}',[MergejilBagshController::class, 'destroy'])->name('teacher-mergejil_bagsh-delete');

	// Tenhim
	Route::get('tenhim',[TenhimController::class, 'index'])->name('teacher-tenhim');
	Route::get('tenhim/add',[TenhimController::class, 'add'])->name('teacher-tenhim-add');
	Route::get('tenhim/edit/{id}',[TenhimController::class, 'edit'])->name('tenhim-edit');

	Route::post('tenhim/add',[TenhimController::class, 'store'])->name('teacher-tenhim-save');
	Route::post('tenhim/edit/{id}',[TenhimController::class, 'update'])->name('teacher-tenhim-edit');
	Route::post('tenhim/delete/',[TenhimController::class, 'delete'])->name('teacher-tenhim-delete-ajax');

	Route::delete('tenhim/delete/{id}',[TenhimController::class, 'destroy'])->name('teacher-tenhim-delete');

	// Hicheel
	Route::get('hicheel',[HicheelController::class, 'index'])->name('teacher-hicheel');
	Route::get('hicheel/add',[HicheelController::class, 'add'])->name('teacher-hicheel-add');
	Route::get('hicheel/edit/{id}',[HicheelController::class, 'edit'])->name('hicheel-edit');

	Route::post('hicheel/add',[HicheelController::class, 'store'])->name('teacher-hicheel-save');
	Route::post('hicheel/edit/{id}',[HicheelController::class, 'update'])->name('teacher-hicheel-edit');
	Route::post('hicheel/delete/',[HicheelController::class, 'delete'])->name('teacher-hicheel-delete-ajax');

	Route::delete('hicheel/delete/{id}',[HicheelController::class, 'destroy'])->name('teacher-hicheel-delete');

	// Huvaari
	Route::get('huvaari',[HuvaariController::class, 'index'])->name('teacher-huvaari');
	Route::get('huvaari/bagsh/{bagshId}',[HuvaariController::class, 'bagsh'])->name('teacher-huvaari-bagsh');

	// Students
	Route::get('students',[StudentsController::class, 'index'])->name('teacher-students');
	Route::get('students/add',[StudentsController::class, 'add'])->name('teacher-students-add');
	Route::get('students/edit/{id}',[StudentsController::class, 'edit'])->name('students-edit');

	Route::post('students/add',[StudentsController::class, 'store'])->name('teacher-students-save');
	Route::post('students/edit/{id}',[StudentsController::class, 'update'])->name('teacher-students-edit');
	Route::post('students/delete/',[StudentsController::class, 'delete'])->name('teacher-students-delete-ajax');

	// Settings
	Route::get('settings',[SettingsController::class, 'index'])->name('teacher-settings');
	Route::get('settings/password',[SettingsController::class, 'password'])->name('teacher-settings-password');
	Route::get('settings/huvaari',[SettingsController::class, 'huvaari'])->name('teacher-settings-huvaari');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
