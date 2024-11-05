<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-3">
    <h1>File Upload</h1>
    <a href="list_files.php">Show File List</a>
    <br><br>
    <?php
    require 'fileUploadProc.php';
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="filename">File Name</label>
            <input type="text" name="filename" id="filename" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file">Choose File</label>
            <input type="file" name="file" id="file" class="form-control-file" required>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">Upload File</button>
    </form>
</body>
</html>
