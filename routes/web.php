<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Student;

Auth::routes();

Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('grade', 'App\Http\Controllers\GradeController');
    Route::resource('student', 'App\Http\Controllers\StudentController');
    Route::resource('teacher', 'App\Http\Controllers\TeacherController');
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('role', 'App\Http\Controllers\RoleController');
    Route::resource('level', 'App\Http\Controllers\LevelController');
    Route::resource('subject', 'App\Http\Controllers\SubjectController');
});

Route::middleware(['auth', 'role:1,2'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('group', 'App\Http\Controllers\GroupController');

    Route::resource('announcement', 'App\Http\Controllers\AnnouncementController');

    Route::get('/getstudents/{group_id}', [GradeController::class, 'getStudentFromGroupName']);

    Route::get('/user/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');

    Route::get('/teachergrades', [TeacherController::class, 'teachergrades'])->name('teachergrades');

    Route::get('/teachergrades/{group_id}', [TeacherController::class, 'teachergradesbygroupid']);

    Route::get('/teachergrades/{group_id}/{student_id}', [TeacherController::class, 'student_view_grade_by_group_id']);
});


Route::middleware('auth')->group(function () {
    Route::get('/getgradesbysemester/{semester}', [GradeController::class, 'getgradesbysemester']);

    Route::get('/student_view_grades', [StudentController::class, 'student_view_grades'])->name('student_view_grades');

    Route::get('/student_view_announcements', [StudentController::class, 'student_view_announcements'])->name('student_view_announcements');

    Route::get('/student_view_groups', [StudentController::class, 'student_view_groups'])->name('student_view_groups');
});
