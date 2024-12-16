<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('home.index');

Route::get('/issues/create', [IssueController::class, 'create'])->name('home.create');

Route::post('/issues', [IssueController::class, 'store'])->name('home.store');

Route::get('/issues/{id}', [IssueController::class, 'show'])->name('home.show');

Route::get('/issues/edit/{id}', [IssueController::class, 'edit'])->name('home.edit');

Route::put('/issues/{id}', [IssueController::class, 'update'])->name('home.update');

Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('home.destroy');