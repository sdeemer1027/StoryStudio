
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Library | StoryStudio</title>
    <style>
        body {
            margin: 0;
            padding: 35px;
            background: #10131c;
            color: #f1f5f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        a.button {
            display: inline-block;
            background: #7857ff;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            margin: 10px 0 25px;
        }
        .story {
            background: #1b2030;
            border: 1px solid #30384b;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
        }
        .muted { color: #aab4c8; }
        .success {
            background: #173d30;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <p class="muted"><a href="/" style="color:#aab4c8">← Dashboard</a></p>
    <h1>Story Library</h1>
    <p class="muted">Create, organize, and manage your stories.</p>

    <a class="button" href="{{ route('stories.create') }}">+ Create New Story</a>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @forelse ($stories as $story)
        <div class="story">
            <h2>{{ $story->title }}</h2>
            <p class="muted">
                Genre: {{ $story->genre ?: 'Not specified' }}
                · Status: {{ ucfirst($story->status) }}
            </p>
            @if ($story->description)
                <p>{{ $story->description }}</p>
            @endif
            <small class="muted">
                Created {{ $story->created_at->format('M j, Y') }}
            </small>
        </div>
    @empty
        <div class="story">
            <h2>Your library is ready</h2>
            <p class="muted">You haven't saved any stories yet. Create your first story to get started.</p>
        </div>
    @endforelse
</div>
</body>
</html>
