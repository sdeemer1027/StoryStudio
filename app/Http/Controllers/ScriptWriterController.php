<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScriptWriterController extends Controller
{
    public function index(): View
{
    $scripts = Script::latest()->get();

    return view('scripts.index', compact('scripts'));
}

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'audience' => 'required|string|max:100',
            'idea' => 'required|string',
            'length' => 'required|string|max:100',
        ]);

        Script::create($validated);

        return redirect()
            ->route('scripts.index')
            ->with('success', 'Script brief saved successfully!');
    }
}
