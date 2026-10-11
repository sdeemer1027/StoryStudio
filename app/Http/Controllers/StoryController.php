<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StoryController extends Controller
{
    public function index(): View
    {
        $stories = Story::latest()->get();

        return view('stories.index', compact('stories'));
    }

    public function create(): View
    {
        return view('stories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        Story::create($validated);

        return redirect()
            ->route('stories.index')
            ->with('success', 'Story saved successfully!');
    }
}
