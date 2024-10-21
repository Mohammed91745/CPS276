<?php
require_once 'Directories.php';

// Initialize the directory path
$pathMessage = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $folderName = $_POST['folder_name'] ?? '';
    $fileContent = $_POST['file_content'] ?? '';

    // Create an instance of Directories class
    $dirObj = new Directories();

    // Call the method to create directory and file
    $result = $dirObj->createDirectoryAndFile($folderName, $fileContent);

    // Set the appropriate message
    if ($result === 'exists') {
        $pathMessage = 'A directory already exists with that name.';
    } elseif ($result === 'error') {
        $pathMessage = 'Error: Unable to create directory or file.';
    } elseif ($result === 'success') {
        $pathMessage = "<a href='directories/$folderName/readme.txt' target='_blank'>Path where file is located</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File and Directory Assignment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>File and Directory Assignment</h1>
    <p>Enter a folder name and the contents of a file. Folder names should contain alpha-numeric characters only.</p>

    <!-- Display messages -->
    <p class="message"><?php echo $pathMessage; ?></p>

    <form action="" method="POST">
        <label for="folder_name">Folder Name</label>
        <input type="text" name="folder_name" id="folder_name" required>
        
        <label for="file_content">File Content</label>
        <textarea name="file_content" id="file_content" rows="5" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
