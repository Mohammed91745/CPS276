<?php
if(count($_POST) > 0){ 
    require_once 'addNameProc.php'; 
    $addName = new AddNamesProc(); 
    $output = $addName->addClearNames(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Names</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Names</h1>
        <form method="POST">
            <div class="form-group">
                <button type="submit" name="add" class="btn btn-primary">Add Name</button>
                <button type="submit" name="clear" class="btn btn-primary">Clear Names</button>
            </div>
            <div class="form-group">
                <label for="name">Enter Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="namelist">List of Names</label>
                <textarea style="height: 200px;" class="form-control" id="namelist" name="namelist"><?php echo isset($output) ? $output : ''; ?></textarea>
            </div>
        </form>
    </div>
</body>
</html>
