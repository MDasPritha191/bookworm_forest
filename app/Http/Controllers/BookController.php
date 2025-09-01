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
    'genre' => 'required|string',
    'rating' => 'required|integer|min:1|max:5',
    'comment' => 'nullable|string',
    'quote' => 'nullable|string|max:255',
]);

Book::create([
    'member_id' => session('member_id'),
    'name' => $request->name,
    'genre' => $request->genre,
    'rating' => $request->rating,
    'comment' => $request->comment,
    'quote' => $request->quote,
]);


        return redirect()->route('profile')->with('success', 'Book added successfully!');
    }
}
