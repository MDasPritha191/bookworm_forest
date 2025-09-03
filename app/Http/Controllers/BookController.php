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
            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'quote' => 'nullable|string',
        ]);

        $book = Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'genre' => $request->genre,
            'rating' => $request->rating,
             'member_id' => session('member_id'), // ✅ use session
            //'member_id' => auth()->id(), // user who posted
        ]);

        // ✅ Save initial comment if provided
        if ($request->comment) {
            $book->comments()->create([
                'member_id' => session('member_id'), // ✅ use session
                'comment' => $request->comment,
            ]);
        }

        // ✅ Save initial quote if provided
        if ($request->quote) {
            $book->quotes()->create([
                'member_id' => session('member_id'), // ✅ use session
                'quote' => $request->quote,
            ]);
        }

        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function allBooks()
    {
            // Load books with their poster (member), comments, and quotes
            $books = \App\Models\Book::with([
            'member',
            'comments.member',
            'quotes.member'
            ])->latest()->get();

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
     public function index(Request $request)
    {
        $genres = [
            'Fantasy',
            'Sci-Fi',
            'Romance',
            'Mystery',
            'Thriller',
            'Non-fiction',
            'Slice of Life',
            'Psychology',
        ];

        $books = Book::query()
            ->when($request->genre, function ($query, $genre) {
                return $query->where('genre', $genre);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->with(['member', 'comments', 'quotes'])
            ->get();

        return view('home', compact('books', 'genres'));
    }
}