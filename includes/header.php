<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Syahin Bahar's portfolio — web designer and programmer.">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/style.css?v=1.0.2">
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark-mode');
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            }
        })();
    </script>
</head>

<body>
<?php 
    if (!isset($activePage)) {
        $activePage = '';
    }
?>
    <header>
        <div class="logo-toggle-container">
            <a href="<?php echo $basePath; ?>"><img class="nav-logo" src="<?php echo $basePath; ?>assets/images/Itear.jpg"
                    alt="Syahin Logo"></a>
            <button id="theme-toggle" class="theme-toggle-btn" aria-label="Toggle dark mode">
                <svg class="sun-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"></path>
                </svg>
                <svg class="moon-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                </svg>
            </button>
        </div>
        <nav>
            <ul>
                <li class="<?php echo ($activePage == 'about') ? 'active' : ''; ?>">
                    <a href="<?php echo $basePath; ?>">About</a>
                </li>
                <li class="<?php echo ($activePage == 'projects') ? 'active' : ''; ?>">
                    <a href="<?php echo $basePath; ?>project/">Projects</a>
                </li>
                <li class="<?php echo ($activePage == 'contact') ? 'active' : ''; ?>">
                    <a href="<?php echo $basePath; ?>contact/">Contact</a>
                </li>
            </ul>
        </nav>
    </header>