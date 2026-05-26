<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $image_url = $_POST['existing_image_url'] ?? '';
    
    // Handle file upload
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image_file']['tmp_name'];
        $fileName = $_FILES['image_file']['name'];
        
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExts)) {
            $newFileName = 'proj_' . uniqid() . '.' . $fileExtension;
            $uploadFileDir = '../assets/images/projects/';
            $dest_path = $uploadFileDir . $newFileName;
            
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $image_url = 'assets/images/projects/' . $newFileName;
            }
        }
    }

    $project_url = $_POST['project_url'] ?? '';
    $display_order = $_POST['display_order'] ?? 0;
    $is_visible = isset($_POST['is_visible']) ? 1 : 0;
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE projects SET title = ?, description = ?, image_url = ?, project_url = ?, display_order = ?, is_visible = ? WHERE id = ?");
        $stmt->execute([$title, $description, $image_url, $project_url, $display_order, $is_visible, $id]);
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO projects (title, description, image_url, project_url, display_order, is_visible) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $image_url, $project_url, $display_order, $is_visible]);
    }
}

header("Location: projects.php");
exit;
