<?php
require 'Db_conn.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $filename = $_POST['filename'];
    $file = $_FILES['file'];

    // Validate file type and size
    if ($file['type'] !== 'application/pdf') {
        $message = 'Please upload a PDF file';
    } elseif ($file['size'] > 100000) {
        $message = 'File is too big';
    } else {
        $targetDir = 'files/';
        $targetFilePath = $targetDir . basename($file['name']);

        // Ensure the target directory exists
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // Insert file data into the database
            $pdo = (new Db_conn())->connect();
            $sql = 'INSERT INTO uploaded_files (filename, filepath) VALUES (:filename, :filepath)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['filename' => $filename, 'filepath' => $targetFilePath]);

            $message = 'File has been added';
        } else {
            $message = 'There was an error uploading your file';
        }
    }
}
