<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Student;

Auth::routes();



Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('student', 'App\Http\Controllers\StudentController');
    Route::resource('teacher', 'App\Http\Controllers\TeacherController');
    Route::resource('admin', 'App\Http\Controllers\AdminController');
    Route::resource('role', 'App\Http\Controllers\RoleController');
    Route::resource('level', 'App\Http\Controllers\LevelController');
    Route::resource('subject', 'App\Http\Controllers\SubjectController');
});

Route::middleware(['auth', 'role:1,2'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('grade', 'App\Http\Controllers\GradeController');

    Route::resource('group', 'App\Http\Controllers\GroupController');

    Route::resource('announcement', 'App\Http\Controllers\AnnouncementController');

    Route::get('/getstudents/{group_id}', [GradeController::class, 'getStudentFromGroupName']);

    Route::get('/teachergrades', [TeacherController::class, 'teachergrades'])->name('teachergrades');

    Route::get('/teachergrades/{group_id}', [TeacherController::class, 'teachergradesbygroupid']);

    Route::get('/teachergrades/{group_id}/{student_id}', [TeacherController::class, 'student_view_grade_by_group_id']);
});


Route::middleware('auth')->group(function () {

    Route::get('/student-homepage', [StudentController::class, 'student_homepage'])->name('student-homepage');

    Route::resource('user', 'App\Http\Controllers\UserController');

    Route::get('/getgradesbysemester/{semester}', [GradeController::class, 'getgradesbysemester']);

    Route::get('/student-grades', [StudentController::class, 'student_view_grades'])->name('student_view_grades');

    Route::get('/student-announcements', [StudentController::class, 'student_view_announcements'])->name('student_view_announcements');

    Route::get('/student-groups', [StudentController::class, 'student_view_groups'])->name('student_view_groups');

    Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');

    Route::get('/profile/{user}', [UserController::class, 'profile'])->name('user.profile.show');

    Route::get('/contact', [ContactController::class, 'contact'])->name('user.contact');

    Route::post('/contact/send', [ContactController::class, 'contactSend'])->name('user.contact.send');
});
