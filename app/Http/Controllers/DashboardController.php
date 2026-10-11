<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $storyCount = Story::count();
        $recentStories = Story::latest()->take(3)->get();

        return view('dashboard.index', compact('storyCount', 'recentStories'));
    }
}
