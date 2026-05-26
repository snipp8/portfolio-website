<?php
require_once '../config/database.php';

if (isset($_POST['send'])) {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $emailFrom = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    // Validate email format
    if (!filter_var($emailFrom, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalid_email");
        exit();
    }

    // Validate that required fields are not empty
    if (empty($name) || empty($subject) || empty($message)) {
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Save to Database
    try {
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $emailFrom, $subject, $message]);
        
        // Success redirect
        header("Location: index.php?mailsend");
    } catch (PDOException $e) {
        // Log error if needed, redirect with error
        header("Location: index.php?error=db_error");
    }
    
    exit();
}

// If accessed directly without POST, redirect to contact page
header("Location: index.php");
exit();