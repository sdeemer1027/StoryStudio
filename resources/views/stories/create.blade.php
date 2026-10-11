
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Story | StoryStudio</title>
    <style>
        body {
            margin: 0;
            padding: 35px;
            background: #10131c;
            color: #f1f5f9;
            font-family: Arial, sans-serif;
        }
        .container { max-width: 800px; margin: auto; }
        .muted { color: #aab4c8; }
        form {
            background: #1b2030;
            border: 1px solid #30384b;
            border-radius: 12px;
            padding: 25px;
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
        textarea { min-height: 130px; resize: vertical; }
        button {
            margin-top: 22px;
            padding: 12px 20px;
            border: 0;
            border-radius: 8px;
            background: #7857ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .errors {
            background: #4b2028;
            padding: 12px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <p class="muted"><a href="{{ route('stories.index') }}" style="color:#aab4c8">← Back to Story Library</a></p>
    <h1>Create a New Story</h1>
    <p class="muted">Save your story ideas and scripts in your library.</p>

    @if ($errors->any())
        <div class="errors">
            <strong>Please correct the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('stories.store') }}">
        @csrf

        <label for="title">Story Title *</label>
        <input id="title" name="title" value="{{ old('title') }}" required maxlength="255" placeholder="Enter your story title">

        <label for="genre">Genre</label>
        <select id="genre" name="genre">
            <option value="">Choose a genre</option>
            @foreach (['Adventure', 'Animation', 'Comedy', 'Drama', 'Fantasy', 'Horror', 'Romance', 'Science Fiction', 'Children', 'Adult Humor', 'Other'] as $genre)
                <option value="{{ $genre }}" @selected(old('genre') === $genre)>{{ $genre }}</option>
            @endforeach
        </select>

        <label for="description">Short Description</label>
        <textarea id="description" name="description" placeholder="What is this story about?">{{ old('description') }}</textarea>

        <label for="content">Story Content or Script</label>
        <textarea id="content" name="content" style="min-height:250px" placeholder="Write or paste your story here...">{{ old('content') }}</textarea>

        <button type="submit">Save Story</button>
    </form>
</div>
</body>
</html>
