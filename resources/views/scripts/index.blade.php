<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script Writer | StoryStudio</title>
    <style>
        body {
            margin: 0;
            padding: 35px;
            background: #10131c;
            color: #f1f5f9;
            font-family: Arial, sans-serif;
        }
        .container { max-width: 900px; margin: auto; }
        .muted { color: #aab4c8; }
        .panel {
            background: #1b2030;
            border: 1px solid #30384b;
            border-radius: 12px;
            padding: 25px;
            margin-top: 25px;
        }
        label { display: block; margin: 18px 0 8px; }
        input, select, textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            background: #10131c;
            color: #f1f5f9;
            border: 1px solid #39445b;
            border-radius: 7px;
            font: inherit;
        }
        textarea { min-height: 120px; resize: vertical; }
        button {
            margin-top: 20px;
            padding: 12px 20px;
            border: 0;
            border-radius: 8px;
            background: #7857ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .notice {
            background: #252b40;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <p class="muted"><a href="/" style="color:#aab4c8">← Dashboard</a></p>

    <h1>Script Writer</h1>
    <p class="muted">Plan a story script for narration, dialogue, and scenes.</p>

   <div class="panel">
        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="notice">
                <strong>Please correct these items:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('scripts.store') }}">
            @csrf

        <h2>Script Brief</h2>

        <label for="title">Script Title</label>
        <input id="title" name="title" value="{{ old('title') }}" placeholder="Enter a title for your script" required>

        <label for="genre">Genre</label>
       <select id="genre" name="genre" required>
            <option>Adventure</option>
            <option>Animation</option>
            <option>Comedy</option>
            <option>Adult Humor</option>
            <option>Drama</option>
            <option>Fantasy</option>
            <option>Science Fiction</option>
            <option>Children</option>
            <option>Horror</option>
        </select>

        <label for="audience">Target Audience</label>
       <select id="audience" name="audience" required>
            <option>General Audience</option>
            <option>Children</option>
            <option>Teenagers</option>
            <option>Adults</option>
        </select>

        <label for="idea">Story Idea</label>
        <textarea id="idea" name="idea" required placeholder="Describe what happens in your story...">{{ old('idea') }}</textarea>

        <label for="length">Desired Length</label>
       <select id="length" name="length" required>
            <option>Short scene (1–3 minutes)</option>
            <option>Short video (3–5 minutes)</option>
            <option>Episode (5–10 minutes)</option>
            <option>Long episode (10–20 minutes)</option>
        </select>

        <button type="submit">
            Draft Script
        </button>

        <div class="notice">
            <strong>Next development step</strong>
            <p class="muted">We will connect this form to save script briefs and build the script-generation workflow. The Draft Script button is not generating AI scripts yet.</p>
        </div>
        </form>
    </div>



<div class="panel">
    <h2>Saved Script Briefs</h2>
    <p class="muted">Your saved script ideas appear here.</p>

    @forelse ($scripts as $script)
        <div class="notice">
            <h3>{{ $script->title }}</h3>
            <p class="muted">
                {{ $script->genre }} · {{ $script->audience }}
            </p>
            <p>{{ $script->idea }}</p>
            <small class="muted">
                Length: {{ $script->length }} · Status: {{ ucfirst($script->status) }}
            </small>
        </div>
    @empty
        <p class="muted">No script briefs saved yet.</p>
    @endforelse
</div>


    
</div>
</body>
</html>