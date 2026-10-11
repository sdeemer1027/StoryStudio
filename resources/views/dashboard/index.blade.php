
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoryStudio | AI Production</title>
    <style>
        :root {
            --bg: #0c0e14;
            --panel: #141721;
            --panel2: #191d29;
            --border: #292e3d;
            --text: #f1f3fa;
            --muted: #9299ae;
            --purple: #9b83ff;
            --green: #54d6a0;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        button { font: inherit; cursor: pointer; }

        .layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: #10121a;
            border-right: 1px solid var(--border);
            padding: 25px 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 10px 30px;
            font-size: 20px;
            font-weight: 750;
            letter-spacing: -.6px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #a58aff, #6852dc);
            border-radius: 12px;
            font-size: 21px;
        }

        .brand span { color: var(--purple); }

        .nav-label {
            color: #747c92;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.6px;
            padding: 17px 12px 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin: 3px 0;
            color: #a8aec1;
            border-radius: 9px;
            text-decoration: none;
        }

        .nav-item:hover, .nav-item.active {
            color: white;
            background: #252139;
        }

        .nav-item.active {
            box-shadow: inset 3px 0 var(--purple);
        }

        .nav-icon { width: 21px; text-align: center; font-size: 17px; }

        .nav-count {
            margin-left: auto;
            font-size: 11px;
            background: #30294b;
            color: #c8baff;
            padding: 3px 7px;
            border-radius: 6px;
        }

        .sidebar-bottom {
            margin: 35px 4px 0;
            padding: 16px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .sidebar-bottom p { color: var(--muted); font-size: 12px; line-height: 1.6; }

        .main { flex: 1; min-width: 0; }

        .topbar {
            min-height: 76px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 32px;
            gap: 15px;
        }

        .breadcrumb { color: var(--muted); font-size: 13px; }
        .breadcrumb strong { color: var(--text); }

        .top-actions { display: flex; align-items: center; gap: 12px; }

        .status {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #a9b5c8;
            font-size: 12px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
            display: inline-block;
        }

        .avatar {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #393051;
            color: #d9cbff;
            font-weight: 700;
        }

        .content { padding: 32px; max-width: 1600px; margin: auto; }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        h1 { font-size: 29px; margin: 0 0 9px; letter-spacing: -.8px; }
        .subtitle { margin: 0; color: var(--muted); line-height: 1.6; }

        .button {
            border: 1px solid var(--border);
            color: var(--text);
            background: var(--panel2);
            border-radius: 9px;
            padding: 11px 16px;
            font-weight: 600;
            white-space: nowrap;
        }

        .button:hover { border-color: var(--purple); }
        .button-primary {
            background: #8870ed;
            border-color: #8870ed;
            color: white;
        }

        .button-primary:hover { background: #9a85ff; }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 27px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 21px;
            min-width: 0;
        }

        .stat-top { display: flex; justify-content: space-between; align-items: center; }
        .stat-label { color: var(--muted); font-size: 12px; }
        .stat-icon {
            display: grid;
            place-items: center;
            width: 37px;
            height: 37px;
            background: #27223b;
            border-radius: 10px;
            font-size: 18px;
        }

        .stat-number { font-size: 29px; font-weight: 750; margin: 15px 0 7px; }
        .stat-foot { font-size: 11px; color: var(--muted); }
        .positive { color: var(--green); }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 30px 0 16px;
        }

        h2 { font-size: 17px; margin: 0; }
        .text-link { color: #b4a2ff; text-decoration: none; font-size: 12px; }
        .text-link:hover { text-decoration: underline; }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .quick-card {
            background: linear-gradient(145deg, #191a2a, #141721 75%);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 21px;
        }

        .quick-card:hover { border-color: #65568e; }

        .quick-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 21px;
            background: #292440;
            margin-bottom: 17px;
        }

        .quick-card h3 { font-size: 15px; margin: 0 0 8px; }
        .quick-card p { font-size: 12px; line-height: 1.7; color: var(--muted); min-height: 40px; margin: 0 0 18px; }
        .quick-card .text-link { font-weight: 650; }

        .lower-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(270px, 1fr);
            gap: 16px;
            align-items: start;
        }

        .story-row {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
        }

        .story-row:last-child { border-bottom: 0; padding-bottom: 0; }

        .story-cover {
            flex-shrink: 0;
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            font-size: 25px;
            background: linear-gradient(135deg, #42345c, #242b43);
        }

        .story-info { min-width: 0; flex: 1; }
        .story-info strong { display: block; font-size: 13px; margin-bottom: 6px; }
        .story-info small { color: var(--muted); font-size: 11px; }
        .tag { font-size: 10px; border-radius: 6px; padding: 5px 8px; white-space: nowrap; }
        .tag-draft { color: #c4b7ff; background: #2d2745; }
        .tag-progress { color: #8fe6c1; background: #19372f; }
        .tag-ready { color: #9dc9ff; background: #1d2f47; }

        .pipeline-step {
            display: flex;
            gap: 13px;
            align-items: flex-start;
            padding: 5px 0 19px;
        }

        .pipeline-step:last-child { padding-bottom: 0; }

        .step-icon {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 9px;
            background: #292440;
            flex-shrink: 0;
        }

        .step-info { flex: 1; }
        .step-info strong { font-size: 12px; display: block; margin: 2px 0 6px; }
        .step-info small { color: var(--muted); font-size: 11px; line-height: 1.5; }
        .step-status { color: var(--green); font-size: 10px; white-space: nowrap; padding-top: 3px; }

        .notice {
            margin-top: 16px;
            padding: 15px;
            background: #211d34;
            border: 1px solid #393050;
            border-radius: 11px;
            color: #c8bfeb;
            font-size: 12px;
            line-height: 1.7;
        }

        footer { color: #71798e; text-align: center; font-size: 11px; padding: 30px 0 5px; }

        @media (max-width: 1050px) {
            .sidebar { width: 205px; }
            .content { padding: 24px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lower-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 680px) {
            .layout { display: block; }
            .sidebar { width: 100%; padding: 12px; border-right: 0; border-bottom: 1px solid var(--border); }
            .brand { padding: 4px 8px 13px; }
            .sidebar nav { display: flex; overflow-x: auto; gap: 5px; }
            .nav-label, .sidebar-bottom { display: none; }
            .nav-item { white-space: nowrap; padding: 10px; font-size: 12px; }
            .topbar { padding: 14px 18px; }
            .status { display: none; }
            .content { padding: 22px 16px; }
            .welcome { align-items: flex-start; flex-direction: column; }
            h1 { font-size: 25px; }
            .quick-grid { grid-template-columns: 1fr; }
            .quick-card p { min-height: 0; }
            .story-row { gap: 9px; }
            .story-cover { width: 43px; height: 43px; font-size: 20px; }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">▶</div>
            <div>Story<span>Studio</span></div>
        </div>

        <nav>
            <div class="nav-label">WORKSPACE</div>
            <a class="nav-item active" href="#"><span class="nav-icon">▦</span> Dashboard</a>
            <a class="nav-item" href="{{ route('stories.index') }}"><span class="nav-icon">▤</span> Story Library <span class="nav-count">{{ $storyCount }}</span></a>
            <a class="nav-item" href="#"><span class="nav-icon">✎</span> Script Writer</a>
            <a class="nav-item" href="#"><span class="nav-icon">♙</span> Characters</a>
            <a class="nav-item" href="#"><span class="nav-icon">▧</span> Scene Builder</a>

            <div class="nav-label">PRODUCTION</div>
            <a class="nav-item" href="#"><span class="nav-icon">◉</span> Video Studio</a>
            <a class="nav-item" href="#"><span class="nav-icon">♫</span> Voice & Audio</a>
            <a class="nav-item" href="#"><span class="nav-icon">☷</span> Production Queue</a>

            <div class="nav-label">PUBLISHING</div>
            <a class="nav-item" href="#"><span class="nav-icon">▷</span> YouTube Studio</a>
            <a class="nav-item" href="#"><span class="nav-icon">▤</span> Content Calendar</a>

            <div class="nav-label">SYSTEM</div>
            <a class="nav-item" href="#"><span class="nav-icon">⚙</span> Settings</a>
        </nav>

        <div class="sidebar-bottom">
            <strong>✦ AI Production</strong>
            <p>Your creative workspace for developing stories and planning faceless video production.</p>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="breadcrumb">Workspace / <strong>Dashboard</strong></div>
            <div class="top-actions">
                <div class="status"><span class="dot"></span> Studio Online</div>
                <div class="avatar">M</div>
            </div>
        </header>

        <div class="content">
            <section class="welcome">
                <div>
                    <h1>Welcome to StoryStudio ✦</h1>
                    <p class="subtitle">Your stories. Your vision. AI-powered production.</p>
                </div>
                <a class="button button-primary" href="{{ route('stories.create') }}">＋ New Story</a>
            </section>

            <section class="stats">
                <div class="card">
                    <div class="stat-top"><span class="stat-label">Total Stories</span><span class="stat-icon">📚</span></div>
                    <div class="stat-number">{{ $storyCount }}</div>
                    <div class="stat-foot">Stories in your library</div>
                </div>
                <div class="card">
                    <div class="stat-top"><span class="stat-label">Scripts Created</span><span class="stat-icon">✍️</span></div>
                    <div class="stat-number">0</div>
                    <div class="stat-foot">Ready for development</div>
                </div>
                <div class="card">
                    <div class="stat-top"><span class="stat-label">Videos In Production</span><span class="stat-icon">🎬</span></div>
                    <div class="stat-number">0</div>
                    <div class="stat-foot">Currently in the pipeline</div>
                </div>
                <div class="card">
                    <div class="stat-top"><span class="stat-label">Published Videos</span><span class="stat-icon">📺</span></div>
                    <div class="stat-number">0</div>
                    <div class="stat-foot">Videos published to YouTube</div>
                </div>
            </section>

            <div class="section-heading">
                <h2>Quick Actions</h2>
                <span class="text-link">YOUR WORKSPACE</span>
            </div>

            <section class="quick-grid">
                <div class="quick-card">
                    <div class="quick-icon">📖</div>
                    <h3>Build a Story</h3>
                    <p>Create a new story, develop characters, and plan episodes for your channel.</p>
                    <a href="{{ route('stories.create') }}" class="text-link">Create a story →</a>
                </div>
                <div class="quick-card">
                    <div class="quick-icon">✦</div>
                    <h3>Write an AI Script</h3>
                    <p>Turn a story idea into narration, dialogue, and a structured scene-by-scene script.</p>
                    <a href="{{ route('scripts.index') }}" class="text-link">Open script writer →</a>
                </div>
                <div class="quick-card">
                    <div class="quick-icon">🎥</div>
                    <h3>Plan a Video</h3>
                    <p>Prepare visual prompts, voice-over instructions, and a production checklist.</p>
                    <a href="#" class="text-link" onclick="alert('Video production tools are coming in a future development step.'); return false;">Start production →</a>
                </div>
            </section>

            <div class="section-heading">
                <h2>Production Workspace</h2>
                <a href="{{ route('stories.index') }}" class="text-link">View all →</a>
            </div>

            <section class="lower-grid">
                <div class="card">
                    <div class="section-heading" style="margin-top:0">
                        <h2>Recent Stories</h2>
                        
<span class="tag tag-draft">{{ $storyCount }} STORIES</span>

@forelse ($recentStories as $story)
    <div class="story-row">
        <div class="story-cover">📕</div>
        <div class="story-info">
            <strong>{{ $story->title }}</strong>
            <small>{{ $story->description ?: ($story->genre ?: 'Story saved in your library.') }}</small>
        </div>
        <span class="tag tag-draft">{{ strtoupper($story->status) }}</span>
    </div>
@empty
    <div class="story-row">
        <div class="story-cover">📖</div>
        <div class="story-info">
            <strong>No stories yet</strong>
            <small>Create your first story to begin building your library.</small>
        </div>
    </div>
@endforelse

                    </div>
                    <div class="story-row">
                        <div class="story-cover">📕</div>
                        <div class="story-info">
                            <strong>Your first story starts here</strong>
                            <small>Create a story to begin building your library.</small>
                        </div>
                        <span class="tag tag-draft">EMPTY</span>
                    </div>
                    <div class="story-row">
                        <div class="story-cover">🎭</div>
                        <div class="story-info">
                            <strong>Character development</strong>
                            <small>Keep character descriptions consistent across episodes.</small>
                        </div>
                        <span class="tag tag-ready">PLANNED</span>
                    </div>
                    <div class="story-row">
                        <div class="story-cover">🎞️</div>
                        <div class="story-info">
                            <strong>First video project</strong>
                            <small>Scripts, scenes, audio, and final video.</small>
                        </div>
                        <span class="tag tag-progress">PLANNED</span>
                    </div>
                </div>

                <div class="card">
                    <div class="section-heading" style="margin-top:0">
                        <h2>Production Pipeline</h2>
                    </div>
                    <div class="pipeline-step">
                        <div class="step-icon">📖</div>
                        <div class="step-info"><strong>1. Story & Script</strong><small>Develop the story and prepare the script.</small></div>
                        <span class="step-status">READY TO START</span>
                    </div>
                    <div class="pipeline-step">
                        <div class="step-icon">🖼️</div>
                        <div class="step-info"><strong>2. Scenes & Visuals</strong><small>Plan scenes and generate visual assets.</small></div>
                        <span class="step-status">UP NEXT</span>
                    </div>
                    <div class="pipeline-step">
                        <div class="step-icon">🎙️</div>
                        <div class="step-info"><strong>3. Voice & Assembly</strong><small>Combine narration, clips, music, and captions.</small></div>
                        <span class="step-status">UP NEXT</span>
                    </div>
                    <div class="pipeline-step">
                        <div class="step-icon">▶</div>
                        <div class="step-info"><strong>4. YouTube Publishing</strong><small>Review, prepare metadata, and publish.</small></div>
                        <span class="step-status">UP NEXT</span>
                    </div>
                </div>
            </section>

            <div class="notice">
                <strong>✦ Production principle</strong><br>
                Every video begins with a story. We will build the workflow one stage at a time, with manager approval before moving projects into production and publishing.
            </div>

            <footer>StoryStudio · AI-Assisted Video Production · Your creative workspace</footer>
        </div>
    </main>
</div>
</body>
</html>
