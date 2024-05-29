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
    Route::get('users/{user}/delete', [UserController::class, 'delete'])->name('user.delete');
    // Trashed (Soft Deleted) users
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash'); // Showing all users in the trash
    Route::post('users/trash/recover', [UserController::class, 'recover'])->name('users.trash-recover'); // Recover All users
    Route::get('users/trash/{id}/restore', [UserController::class, 'restore'])->name('users.trash-restore'); // Recover a user from trash
    Route::delete('users/trash/empty', [UserController::class, 'empty'])->name('users.trash-empty'); // Emptying the trash
    Route::delete('users/trash{id}/remove', [UserController::class, 'remove'])->name('users.trash-remove'); // Removing a SINGLE user from trash

    // This below line of code needs to be after 'trash'.
    Route::resource('users', UserController::class); // This adds the following users CRUD routes automatically.
});

require __DIR__ . '/auth.php';
