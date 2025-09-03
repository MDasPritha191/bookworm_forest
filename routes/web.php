<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;


// Login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'log_in'])->name('login.submit');

// Profile page (after successful login)
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

// Home
Route::get('/home', [BookController::class, 'index'])->name('home');

// Edit form
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');

// Delete a book
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');

// Update submit
Route::post('/book/{book}/edit', [BookController::class, 'update'])->name('book.update');

Route::get('/', function () {
    return view('welcome');
});

// Registration
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Logout
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

// ✅ Reports (accessible to logged-in members)
//Route::middleware('Member')->group(function () {
    Route::get('/books/{book}/report', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/books/{book}/report', [ReportController::class, 'store'])->name('reports.store');
//});



// ✅ Admin Routes — only accessible to admins
//Route::middleware('admin')->group(function () {
    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Delete a book
    Route::delete('/admin/book/{book}', [AdminController::class, 'deleteBook'])->name('admin.deleteBook');

    // Delete a user
    Route::delete('/admin/user/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // View reported items
   Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
//});
