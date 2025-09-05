<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pub\pubController;
use App\Http\Controllers\auth\authController;


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [authController::class, 'dashboard'])->name('auth.dashboard');
    Route::get('/auth/task', [authController::class, 'task'])->name('auth.task');
    Route::get('/auth/logout', [authController::class, 'logout'])->name('auth.logout');
    Route::get('/auth/completed/tasks/{id}', [authController::class, 'completedTasks'])->name('auth.completed.tasks');
    Route::get('/auth/edit/task/{id}', [authController::class, 'editTask'])->name('auth.edit.task');
    Route::get('/auth/delete/task/{id}', [authController::class, 'deleteTask'])->name('auth.delete.task');

    Route::post('/auth/create/task', [authController::class, 'createTask'])->name('auth.create.task');
    Route::post('/auth/update/task', [authController::class, 'updateTask'])->name('auth.update.task');
    Route::post('/auth/dragDrop', [authController::class, 'dragDrop'])->name('auth.dragdrop');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [pubController::class, 'home'])->name('login');
    Route::post('/', [pubController::class, 'login'])->name('post.login');
});


