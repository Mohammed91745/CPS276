<?php
require '../classes/Pdo_methods.php';

function formatName($name) {
    $nameParts = explode(' ', $name);
    return $nameParts[1] . ', ' . $nameParts[0];
}

$data = json_decode($_POST["data"]);
$formattedName = formatName($data->name);

$pdo = new PdoMethods();
$sql = "INSERT INTO names (name) VALUES (:name)";
$bindings = [[':name', $formattedName, 'str']];

$result = $pdo->otherBinded($sql, $bindings);

$response = new stdClass();
$response->masterstatus = $result === 'error' ? 'error' : 'success';
$response->msg = $result === 'error' ? "There was an error adding the name." : "Name has been added.";

echo json_encode($response);
?>
