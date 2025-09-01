<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Quote;

class InteractionController extends Controller
{
    // Show all comments for a book
    public function comments($bookId)
    {
        $book = Book::with('comments.member')->findOrFail($bookId);
        return view('comments', compact('book'));
    }

    // Store new comment
    public function storeComment(Request $request, $bookId)
    {
        $request->validate(['comment' => 'required|string']);

        // Check if user is logged in
        if (!session('member_id')) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        Comment::create([
            'book_id' => $bookId,
            'member_id' => session('member_id'),
            'comment' => $request->comment,
        ]);

        // Redirect back to comments page with success message
        return redirect()->route('book.comments', $bookId)->with('success', 'Comment added!');
    }

    // Show all quotes for a book
    public function quotes($bookId)
    {
        $book = Book::with('quotes.member')->findOrFail($bookId);
        return view('quotes', compact('book'));
    }

    // Store new quote
    public function storeQuote(Request $request, $bookId)
    {
        $request->validate(['quote' => 'required|string']);

        if (!session('member_id')) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        Quote::create([
            'book_id' => $bookId,
            'member_id' => session('member_id'),
            'quote' => $request->quote,
        ]);

        return redirect()->route('book.quotes', $bookId)->with('success', 'Quote added!');
    }
}