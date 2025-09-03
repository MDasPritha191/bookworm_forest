<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show admin dashboard with all books and users.
     */
    public function dashboard()
    {
        $books = Book::with('member')->latest()->get();
        $users = Member::all(); // fetch all members

        return view('admin.dashboard', compact('books', 'users'));
    }

    /**
     * Delete a book.
     * Using Route Model Binding (Book $book) is cleaner.
     */
    public function deleteBook(Book $book) // <-- Route Model Binding
    {
        $book->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Book deleted!');
    }

    /**
     * Delete a user.
     * Using Route Model Binding (Member $user) is cleaner.
     */
    public function deleteUser(Member $user) // <-- Route Model Binding
    {
        // Prevent the currently logged-in admin from deleting themselves
        if ($user->id != auth()->id()) {
            $user->delete();
            return redirect()->route('admin.dashboard')->with('success', 'User deleted!');
        }
        
        return redirect()->route('admin.dashboard')->with('error', 'You cannot delete your own account.');
    }

    /**
     * View reports.
     */
    public function reports()
    {
        $reports = Report::with('book', 'member')->latest()->get();
        return view('admin.reports', compact('reports'));
    }
}