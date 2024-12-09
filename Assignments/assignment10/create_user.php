<?php
require_once "classes/Db_conn.php";

$db = new DatabaseConn();
$pdo = $db->dbOpen();

try {
    // Prepare hashed passwords
    $adminPassword = password_hash('password', PASSWORD_DEFAULT);
    $staffPassword = password_hash('password', PASSWORD_DEFAULT);

    // Check if the users already exist
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE email IN (?, ?)");
    $checkStmt->execute(['mdthabata@admin.com', 'mdthabata@staff.com']);
    $count = $checkStmt->fetchColumn();

    if ($count == 0) {
        // Insert the default users
        $insertStmt = $pdo->prepare("INSERT INTO admins (name, email, password, status) VALUES 
            ('Admin User', 'mdthabata@admin.com', :adminPassword, 'admin'),
            ('Staff User', 'mdthabata@staff.com', :staffPassword, 'staff')");
        $insertStmt->execute([
            ':adminPassword' => $adminPassword,
            ':staffPassword' => $staffPassword,
        ]);

        echo "Admin and Staff users created successfully!";
    } else {
        echo "Admin and Staff users already exist.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
