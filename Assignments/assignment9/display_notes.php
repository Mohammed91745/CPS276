<?php
require_once 'Date_time.php';
$dt = new Date_time();
$notes = $dt->getNotes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #dee2e6;
        }
        th {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-3">Display Notes</h1>
    <a href="add_note.php" class="btn btn-link mb-3">Add Note</a>
    <form method="POST" class="border p-4 rounded mb-4">
        <?php if (is_string($notes) && !empty($notes)) : ?>
            <div class="alert alert-info"><?php echo $notes; ?></div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="begDate" class="form-label">Beginning Date</label>
            <input type="date" class="form-control" id="begDate" name="begDate">
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">Ending Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>
        <button type="submit" class="btn btn-primary">Get Notes</button>
    </form>
    <?php if (is_array($notes) && !empty($notes)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Date and Time</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td><?php echo date('m/d/Y h:i A', strtotime($note['date_time'])); ?></td>
                        <td><?php echo htmlspecialchars($note['note']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (is_string($notes)) : ?>
        <p><?php echo $notes; ?></p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
