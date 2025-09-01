<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Profile page (after successful login)
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

// ✅ Give this route a name: register.store
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');


// Show edit form
Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');

// Handle update
Route::post('/profile/edit', [AuthController::class, 'update'])->name('profile.update');




// Show add book form
Route::get('/book/add', [BookController::class, 'create'])->name('book.create');

// Handle form submission
Route::post('/book/add', [BookController::class, 'store'])->name('book.store');
