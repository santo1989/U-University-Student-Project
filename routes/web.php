<?php


use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MarkInputController;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('backend.home');
    })->name('home');

    //Role

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


    // User


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

   

    //Teacher

    Route::get('/teachers/trashed_teachers', [TeacherController::class, 'trash'])
        ->name('teachers.trashed');
    Route::get('/teachers/trashed_teachers/{teacher}/restore', [TeacherController::class, 'restore'])->name('teachers.restore');
    Route::delete('/teachers/trashed_teachers/{teacher}/delete', [TeacherController::class, 'delete'])->name('teachers.delete');

    Route::resource('/teachers', TeacherController::class);

    //course

    Route::resource('/course', CourseController::class);

    // Result
    
    Route::resource('/result', ResultController::class);

    //Year

    Route::resource('/year', YearController::class);


    //student

    Route::resource('/student', StudentController::class);


    //markinput
    Route::resource('/markinput', MarkInputController::class);

    //exam
    Route::resource('/exam', ExamController::class);
    //fileupload

    Route::get('/fileupload/trashed-fileupload', [FileUploadController::class, 'trash'])
        ->name('fileupload.trashed');
    Route::get('/fileupload/trashed-fileupload/{fileupload}/restore', [FileUploadController::class, 'restore'])->name('fileupload.restore');
    Route::delete('/fileupload/trashed-fileupload/{fileupload}/delete', [FileUploadController::class, 'delete'])->name('fileupload.delete');

    // Route::resource('/fileupload', FileUploadController::class);
    Route::get('/fileupload', [FileUploadController::class, 'index'])->name('fileupload.index');
    Route::get('/fileupload/create', [FileUploadController::class, 'create'])->name('fileupload.create');
    Route::post('/fileupload', [FileUploadController::class, 'store'])->name('fileupload.store');
    Route::get('/fileupload/{fileupload}', [FileUploadController::class, 'show'])->name('fileupload.show');
    Route::get('/fileupload/{fileupload}/edit', [FileUploadController::class, 'edit'])->name('fileupload.edit');
    Route::put('/fileupload/{fileupload}', [FileUploadController::class, 'update'])->name('fileupload.update');
    Route::delete('/fileupload/{fileupload}', [FileUploadController::class, 'destroy'])->name('fileupload.destroy');
});

Route::resource('/message', MessageController::class);
Route::get('/notification/{message}/{notification}', [NotificationController::class, 'showForUpdating'])->name("/message.show");




require __DIR__ . '/auth.php';
