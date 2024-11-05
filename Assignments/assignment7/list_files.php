<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-3">
    <h1>File List</h1>
    <a href="index.php">Add File</a>
    <ul>
        <?php
        require 'Db_conn.php';

        $pdo = (new Db_conn())->connect();
        $sql = 'SELECT filename, filepath FROM uploaded_files';
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch()) {
            echo "<li><a target='_blank' href='{$row['filepath']}'>{$row['filename']}</a></li>";
        }
        ?>
    </ul>
</body>
</html>
