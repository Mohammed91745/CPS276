<?php
require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "TRUNCATE TABLE names";
$result = $pdo->otherNotBinded($sql);

$response = new stdClass();
$response->masterstatus = $result === 'error' ? 'error' : 'success';
$response->msg = $result === 'error' ? "There was an error deleting the names." : "All names were deleted.";

echo json_encode($response);
?>
