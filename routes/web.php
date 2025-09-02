<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [\App\Http\Controllers\loginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\loginController::class, 'actionLogin'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeControllers::class, 'index'])->name('dashboard');
    Route::post('logout', [\App\Http\Controllers\loginController::class, 'logout'])->name('logout');
    Route::resource('members', \App\Http\Controllers\MemberControllers::class);
    Route::delete('softdelete/{id}', [\App\Http\Controllers\MemberControllers::class, 'softdelete'])->name('member.softdelete');
    Route::get('restores', [\App\Http\Controllers\MemberControllers::class, 'indexrestore'])->name('member.restores');
    Route::get('restored/{id}', [\App\Http\Controllers\MemberControllers::class, 'restore'])->name('member.restored');

    // Location
    Route::get('location/index', [\App\Http\Controllers\locationController::class, 'index'])->name('location.index');

    Route::get('location/create', [\App\Http\Controllers\locationController::class, 'create'])->name('location.create');
    Route::post('location/store', [\App\Http\Controllers\locationController::class, 'store'])->name('location.store');

    Route::get('location/edit/{id}', [\App\Http\Controllers\locationController::class, 'edit'])->name('location.edit');
    Route::put('location/update/{id}', [\App\Http\Controllers\locationController::class, 'update'])->name('location.update');
    Route::delete('location/delete/{id}', [\App\Http\Controllers\locationController::class, 'destroy'])->name('location.delete');
    // End Location

    // Categories
    Route::get('categories.index', [\App\Http\Controllers\categoryController::class, 'index'])->name('categories.index');

    Route::get('categories.create', [\App\Http\Controllers\categoryController::class, 'create'])->name('categories.create');
    Route::post('categories.store', [\App\Http\Controllers\categoryController::class, 'store'])->name('categories.store');

    Route::get('categories.edit.{id}', [categoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories.update.{id}', [\App\Http\Controllers\categoryController::class, 'update'])->name('categories.update');
    Route::delete('categories.delete.{id}', [\App\Http\Controllers\categoryController::class, 'destroy'])->name('categories.delete');
    // End Categories

    // Books
    Route::resource('books', bookController::class);
    // End Books
});




























Route::get('cal', [\App\Http\Controllers\CalControllers::class, 'index'])->name('cal');

Route::get('kubus', [\App\Http\Controllers\CalControllers::class, 'kubus'])->name('kubus');
Route::post('kubus', [\App\Http\Controllers\CalControllers::class, 'kubusAction'])->name('kubus');

Route::get('balok', [\App\Http\Controllers\CalControllers::class, 'balok'])->name('balok');
Route::post('balok', [\App\Http\Controllers\CalControllers::class, 'balokAction'])->name('balok');

Route::get('limas', [\App\Http\Controllers\CalControllers::class, 'limas'])->name('limas');
Route::post('limas', [\App\Http\Controllers\CalControllers::class, 'limasAction'])->name('limas');

Route::get('tabung', [\App\Http\Controllers\CalControllers::class, 'tabung'])->name('tabung');
Route::post('tabung', [\App\Http\Controllers\CalControllers::class, 'tabungAction'])->name('tabung');

Route::get('bola', [\App\Http\Controllers\CalControllers::class, 'bola'])->name('bola');
Route::post('bola', [\App\Http\Controllers\CalControllers::class, 'bolaAction'])->name('bola');
