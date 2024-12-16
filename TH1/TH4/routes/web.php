<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;

Route::get('/', [IssuesController::class, 'index'])->name('home.index');

Route::get('/issues/create', [IssuesController::class, 'create'])->name('home.create');

Route::post('/issues', [IssuesController::class, 'store'])->name('home.store');

Route::get('/issues/{id}', [IssuesController::class, 'show'])->name('home.show');

Route::get('/issues/edit/{id}', [IssuesController::class, 'edit'])->name('home.edit');

Route::put('/issues/{id}', [IssuesController::class, 'update'])->name('home.update');

Route::delete('/issues/{id}', [IssuesController::class, 'destroy'])->name('home.destroy');