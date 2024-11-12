<?php
require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "SELECT name FROM names ORDER BY name";
$result = $pdo->selectNotBinded($sql);

$output = "";
if ($result !== 'error') {
    foreach ($result as $name) {
        $output .= "<p>" . $name['name'] . "</p>";
    }
    $response = (object) ['masterstatus' => 'success', 'names' => $output];
} else {
    $response = (object) ['masterstatus' => 'error', 'msg' => "There was an error displaying the names."];
}

echo json_encode($response);
?>
