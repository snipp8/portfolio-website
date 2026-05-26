# Syahin Bahar — Portfolio

A personal portfolio website built with HTML, CSS, PHP, and Bootstrap 5.

## Project Structure

```
portfolio/
├── assets/
│   ├── images/          # Profile photos, logos
│   └── docs/            # Resume and downloadable documents
├── includes/            # Shared PHP partials
│   ├── header.php       # <!DOCTYPE>, <head>, <header>, and <nav>
│   └── footer.php       # <footer>, Bootstrap JS, custom JS
├── contact/
│   ├── index.php        # Contact page with form
│   └── contactform.php  # Form handler (sends email via PHP mail)
├── project/
│   └── index.php        # Projects showcase page
├── css/
│   └── style.css        # Custom styles (organized by section)
├── js/
│   └── script.js        # Navigation active-state logic
├── index.php            # Homepage / About page
├── .gitignore
└── README.md
```

## Setup

This site requires a **PHP-capable web server** to run locally.

### Using XAMPP
1. Copy this folder into `htdocs/portfolio/`
2. Start Apache from the XAMPP control panel
3. Open `http://localhost/portfolio/` in your browser

### Using PHP's built-in server
```bash
php -S localhost:8000
```
Then open `http://localhost:8000` in your browser.

## Pages

| Page | Path | Description |
|------|------|-------------|
| About / Home | `/` | Introduction and profile section |
| Projects | `/project/` | Showcase of work and projects |
| Contact | `/contact/` | Contact form (sends email via PHP `mail()`) |

## Tech Stack
- HTML5 & CSS3
- PHP 8+
- Bootstrap 5.3
- Vanilla JavaScript
