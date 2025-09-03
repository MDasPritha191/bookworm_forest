<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    // Dashboard (basic page for now)
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // View all reports
    public function reports()
    {
        // Load reports with book + member relations
        $reports = Report::with('book', 'member')->latest()->get();

        return view('admin.reports', compact('reports'));
    }
}
