<?php
$rows = 15;
$cells = 5;
$table = "<table border='1'>";
for ($i = 1; $i <= $rows; $i++) {
    $table .= "<tr>";
    for ($j = 1; $j <= $cells; $j++) {
        $table .= "<td>Row $i Cell $j</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php echo $table; ?>
</body>
</html>
