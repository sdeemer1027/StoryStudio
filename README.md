# StoryStudio

**An AI-assisted story development and video production workspace.**

StoryStudio is a web application designed to organize story ideas, develop scripts, and support the production of video content for platforms such as YouTube. The long-term goal is to bring story development, character planning, scene creation, audio, video production, and publishing workflows together in one workspace.

## Features

### Currently Implemented

- **Dashboard** — Overview of the project and story library.
- **Story Library** — Create and save stories with titles, genres, descriptions, and story content.
- **Script Writer** — Create and save script briefs containing a title, genre, target audience, story idea, and desired length.
- **MySQL Database** — Persistent storage for stories and script briefs.
- **Validation and feedback** — Required-field validation and success messages when saving records.

### Planned Features

- AI-powered script generation.
- Character profiles and character consistency tools.
- Scene-by-scene storyboards and visual prompts.
- Video production planning and tracking.
- Voice-over and audio tools.
- Production queue and content calendar.
- YouTube publishing and channel management.
- User authentication and account management.

*Planned features are not yet implemented and may require external APIs or services.*

## Technology Stack

- **Backend:** PHP and Laravel
- **Database:** MySQL
- **Frontend:** Blade templates, HTML, and CSS
- **Dependency management:** Composer
- **Frontend build tools:** Node.js and npm, as required by the installed frontend dependencies

## Server Requirements

For a typical production installation, use a server that meets these requirements:

| Component | Requirement |
|---|---|
| Operating system | Linux server recommended; Windows development environments are also supported |
| PHP | PHP 8.3 or newer, compatible with the project's Laravel version |
| Composer | Composer 2.x |
| Database | MySQL 8.0 or a compatible supported database |
| PHP extensions | PDO, PDO MySQL, Mbstring, OpenSSL, XML, Ctype, JSON, BCMath, Fileinfo, Tokenizer, and other extensions required by Laravel |
| Web server | Nginx or Apache configured for Laravel |
| Node.js and npm | Required when installing dependencies and building frontend assets that use Vite |
| HTTPS | Required for a publicly accessible production deployment |

Check the project's `composer.json`, `package.json`, and Laravel version before deploying to confirm the exact dependency requirements.

## Installation

### 1. Install the Prerequisites

Install PHP, Composer, MySQL, Git, and the other required dependencies on your development computer or server.

If the project uses Vite assets, also install Node.js and npm.

### 2. Clone the Repository

Replace `YOUR-USERNAME` with the GitHub account or organization that owns the repository.

```bash
git clone https://github.com/YOUR-USERNAME/StoryStudio.git
cd StoryStudio
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Configure the Environment

Create your local environment configuration file.

On Linux or macOS:

```bash
cp .env.example .env
```

On Windows Command Prompt:

```bat
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Create the Database

Create an empty MySQL database for StoryStudio, for example:

```sql
CREATE DATABASE story
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Update the database settings in your `.env` file:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=story
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Use the actual database credentials for your installation. Do not commit passwords or other secrets to GitHub.

### 6. Run Database Migrations

Create the required tables:

```bash
php artisan migrate
```

This creates the tables defined by the project's migrations, including the story and script storage tables.

### 7. Install and Build Frontend Assets

If the project includes a `package.json` and uses Vite, run:

```bash
npm install
npm run build
```

### 8. Start the Development Server

For local development, run:

```bash
php artisan serve
```

Open the address displayed by Laravel, usually:

http://127.0.0.1:8000

The StoryStudio dashboard should appear.

## Development Notes

- Keep your `.env` file private and never commit production credentials.
- Use a separate database for development and production.
- Run new database migrations after pulling changes that introduce migrations.
- Back up the database before making significant changes to stored data.
- Do not use Laravel's development server as a public production server.

## Production Deployment

For production, configure Apache or Nginx to serve the application's `public` directory. Configure PHP and the database, install dependencies, run migrations, enable HTTPS, and set appropriate file permissions.

Set the environment to production and disable detailed error display:

```dotenv
APP_ENV=production
APP_DEBUG=false
```

Use a secure application key and production database credentials. Configure logging, backups, queue workers, and scheduled tasks as required by the features enabled.

**Security note:** Authentication and authorization must be implemented and reviewed before making a multi-user deployment publicly accessible.

## Project Status

StoryStudio is under active development. Story creation, script brief storage, and the basic dashboard are implemented. AI generation, automated video creation, audio production, and YouTube publishing remain future development goals.

## License

Add your chosen open-source or proprietary license before distributing the project. Until a license is specified, do not assume that others have permission to reuse or redistribute the code.