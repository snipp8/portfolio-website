<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="container-fluid admin-wrapper p-0">
        <div class="row g-0 flex-nowrap h-100">
            <!-- Sidebar -->
            <nav class="sidebar-fixed p-3 flex-shrink-0">
                <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">Admin Panel</span>
                </a>
                <hr class="text-white">
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="messages.php" class="nav-link">
                            Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="projects.php" class="nav-link">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link">
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <hr class="text-white">
                    </li>
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">
                            Back to Site
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a href="logout.php" class="nav-link text-danger">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Main Content -->
            <main class="col p-4 bg-light">
