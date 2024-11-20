<?php
require_once 'Date_time.php';
$dt = new Date_time();
$message = $dt->addNote();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-3">Add Note</h1>
    <a href="display_notes.php" class="btn btn-link mb-3">Display Notes</a>
    <form method="POST" class="border p-4 rounded">
        <?php if (!empty($message)) : ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="dateTime" class="form-label">Date and Time</label>
            <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" id="note" name="note" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
