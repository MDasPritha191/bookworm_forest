<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function create()
    {
        if (!session('member_id')) {
            return redirect('/login');
        }

        $genres = ['Family', 'Slice of Life', 'Comedy', 'Action', 'Thriller', 'Romance', 'Psychology', 'Adventure', 'Time Travel', 'Sci-Fi', 'Tragedy', 'Light Novel', 'Comic'];

        return view('add-book', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'quote' => 'nullable|string|max:255',
        ]);

        Book::create([
            'member_id' => session('member_id'),
            'name' => $request->name,
            'author' => $request->author,
            'genre' => $request->genre,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'quote' => $request->quote,
        ]);

        return redirect()->route('profile')->with('success', 'Book added successfully!');
    }

    public function allBooks()
    {
        $books = \App\Models\Book::with('member')->latest()->get();
        return view('home', compact('books'));
    }

    public function edit(Book $book)
    {
        // must be logged in
        if (!session('member_id')) {
            return redirect('/login');
        }

        // authorize: only the owner can edit
        if ($book->member_id !== session('member_id')) {
            abort(403, 'Unauthorized');
        }

        $genres = [
            'Family', 'Slice of Life', 'Comedy', 'Action', 'Thriller', 'Romance',
            'Psychology', 'Adventure', 'Time Travel', 'Sci-Fi', 'Tragedy',
            'Light Novel', 'Comic'
        ];

        return view('edit-book', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        if (!session('member_id')) {
            return redirect('/login');
        }

        if ($book->member_id !== session('member_id')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name'   => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre'  => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment'=> 'nullable|string',
            'quote'  => 'nullable|string|max:255',
        ]);

        $book->update([
            'name'    => $request->name,
            'author'  => $request->author,
            'genre'   => $request->genre,
            'rating'  => $request->rating,
            'comment' => $request->comment,
            'quote'   => $request->quote,
        ]);

        return redirect()->route('profile')->with('success', 'Book updated successfully!');
    }


    public function destroy(\App\Models\Book $book)
    {
        // Must be logged in
        if (! session('member_id')) {
            return redirect('/login');
        }

        // Only owner can delete
        if ($book->member_id !== session('member_id')) {
            abort(403, 'Unauthorized');
        }

        // Delete the book
        $book->delete();

        // Redirect back to profile with message
        return redirect()->route('profile')->with('success', 'Book deleted successfully!');
    }

}