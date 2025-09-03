<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Book;

class ReportController extends Controller
{
    public function create($bookId) {
        $book = Book::findOrFail($bookId);
        return view('reports.create', compact('book'));
    }

    public function store(Request $request, $bookId) {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        Report::create([
            'book_id' => $bookId,
            'member_id' => session('member_id'),
            'reason' => $request->reason,
        ]);

        return redirect()->route('home')->with('success', 'Report submitted to admin.');
    }
}
