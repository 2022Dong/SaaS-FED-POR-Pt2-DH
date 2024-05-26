<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPages;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('welcome', [StaticPages::class, 'welcome'])->name('welcome');

Route::get('/', [StaticPages::class, 'welcome'])->name('home');

Route::get('/about', [StaticPages::class, 'about'])->name('about');
Route::get('/contact-us', [StaticPages::class, 'contact'])->name('contact');
Route::get('/pricing', [StaticPages::class, 'pricing'])->name('pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class); // This adds the following users CRUD routes automatically.

    Route::get('users/{user}/delete', [UserController::class, 'delete'])->name('user.delete');
    // Trashed (Soft Deleted) users
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash'); // Showing all users in the trash
    Route::get('users/trash/recover', [UserController::class, 'recover'])->name('users.recover'); // Recover All users
    Route::get('users/trash/{id}/recover', [UserController::class, 'recover'])->name('user.recover'); // Recover a user from trash
    Route::get('users/trash/empty', [UserController::class, 'empty'])->name('users.empty'); // Emptying the trash
    Route::get('users/trash{id}/empty', [UserController::class, 'empty'])->name('user.empty'); // Removing a SINGLE user from trash
});

require __DIR__ . '/auth.php';
