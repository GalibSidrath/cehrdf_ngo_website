<?php
// ============================================================
// HANDLER: Image Upload for Text Editor
// Receives image file and saves to dynamic folder
// ============================================================

header('Content-Type: application/json');

// Get folder name from request (notices/news/programs etc.)
$folder = $_POST['folder'] ?? 'general';
$folder = preg_replace('/[^a-zA-Z0-9_-]/', '', $folder); // Sanitize

// Upload directory
$uploadDir = '../uploads/' . $folder . '/';

// Create folder if not exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$response = ['success' => false];

// Check file
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
    $response['error'] = 'No file uploaded or upload error.';
    echo json_encode($response);
    exit;
}

$file = $_FILES['image'];
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

// Allowed types
$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
if (!in_array($ext, $allowed)) {
    $response['error'] = 'Invalid file type. Allowed: JPG, PNG, GIF, WEBP.';
    echo json_encode($response);
    exit;
}

// Unique filename
$filename = uniqid('img_') . '_' . time() . '.' . $ext;
$targetPath = $uploadDir . $filename;

// Move file
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    $response['success'] = true;
    // Return relative URL for editor
    $response['file_url'] = '../uploads/' . $folder . '/' . $filename;
    // Return filename for database storage
    $response['filename'] = $filename;
} else {
    $response['error'] = 'Failed to save file.';
}

echo json_encode($response);
?>