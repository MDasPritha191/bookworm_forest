<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InteractionController;

// Login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Profile page (after successful login)
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

//home
Route::get('/home', [BookController::class, 'allBooks'])->name('home');

// Edit form
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');

//delete 
// Delete a book (RESTful: DELETE /book/{book})
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');

// Update submit (use POST for simplicity; you can use PUT if you prefer)
Route::post('/book/{book}/edit', [BookController::class, 'update'])->name('book.update');

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



// Comments
Route::get('/book/{id}/comments', [InteractionController::class, 'comments'])->name('book.comments');
Route::post('/book/{id}/comments', [InteractionController::class, 'storeComment'])->name('book.comments.store');

// Quotes
Route::get('/book/{id}/quotes', [InteractionController::class, 'quotes'])->name('book.quotes');
Route::post('/book/{id}/quotes', [InteractionController::class, 'storeQuote'])->name('book.quotes.store');


// Homepage with filter
Route::get('/home', [BookController::class, 'index'])->name('home');
