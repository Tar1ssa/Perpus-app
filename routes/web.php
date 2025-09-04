<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\MemberControllers;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\transactionController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [\App\Http\Controllers\loginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\loginController::class, 'actionLogin'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeControllers::class, 'index'])->name('dashboard');
    Route::post('logout', [\App\Http\Controllers\loginController::class, 'logout'])->name('logout');
    Route::resource('members', \App\Http\Controllers\MemberControllers::class);
    Route::delete('softdelete/{id}', [MemberControllers::class, 'softdelete'])->name('member.softdelete');
    Route::get('restores', [MemberControllers::class, 'indexrestore'])->name('member.restores');
    Route::get('restored/{id}', [MemberControllers::class, 'restore'])->name('member.restored');

    // Location
    Route::get('location/index', [locationController::class, 'index'])->name('location.index');

    Route::get('location/create', [locationController::class, 'create'])->name('location.create');
    Route::post('location/store', [locationController::class, 'store'])->name('location.store');

    Route::get('location/edit/{id}', [locationController::class, 'edit'])->name('location.edit');
    Route::put('location/update/{id}', [locationController::class, 'update'])->name('location.update');
    Route::delete('location/delete/{id}', [locationController::class, 'destroy'])->name('location.delete');
    // End Location

    // Categories
    Route::get('categories.index', [categoryController::class, 'index'])->name('categories.index');

    Route::get('categories.create', [categoryController::class, 'create'])->name('categories.create');
    Route::post('categories.store', [categoryController::class, 'store'])->name('categories.store');

    Route::get('categories.edit.{id}', [categoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories.update.{id}', [categoryController::class, 'update'])->name('categories.update');
    Route::delete('categories.delete.{id}', [categoryController::class, 'destroy'])->name('categories.delete');
    // End Categories

    // Books
    Route::resource('books', bookController::class);
    // End Books

    // transaksi
    Route::resource('transactions', transactionController::class);
    Route::get('get-buku/{id}', [transactionController::class, 'getBukuByIdCategory']);
    Route::get('print-borrowed/{id}', [transactionController::class, 'print'])->name('print-borrowed');

    // end transaksi
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
