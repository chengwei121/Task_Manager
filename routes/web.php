<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

Route::get('/', [TaskController::class, 'fetchAllTasks'])->name('tasks.index');

Route::get('/create', [TaskController::class, 'createTask'])->name('tasks.create');

Route::post('/addTask', [TaskController::class,'addTask'])->name('tasks.addTask');

Route::post('/tasks/done/{id}', [TaskController::class, 'doneTask'])->name('tasks.done');

Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

