<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['resume_file']) && $_FILES['resume_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['resume_file']['tmp_name'];
        $fileName = $_FILES['resume_file']['name'];
        $fileSize = $_FILES['resume_file']['size'];
        $fileType = $_FILES['resume_file']['type'];
        
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        if ($fileExtension === 'pdf' || $fileType === 'application/pdf') {
            $uploadFileDir = '../assets/docs/';
            $dest_path = $uploadFileDir . 'resume.pdf';
            
            // Ensure directory exists
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                header('Location: settings.php?resume_uploaded=1');
                exit;
            } else {
                header('Location: settings.php?error=upload_failed');
                exit;
            }
        } else {
            header('Location: settings.php?error=invalid_file');
            exit;
        }
    } else {
        header('Location: settings.php?error=no_file');
        exit;
    }
} else {
    header('Location: settings.php');
    exit;
}
