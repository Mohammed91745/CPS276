<?php
$mainItems = 3;
$subItems = 2;
$list = "<ul>";
for ($i = 1; $i <= $mainItems; $i++) {
    $list .= "<li>Main Item $i<ul>";
    for ($j = 1; $j <= $subItems; $j++) {
        $list .= "<li>Sub Item $j</li>";
    }
    $list .= "</ul></li>";
}
$list .= "</ul>";
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php echo $list; ?>
</body>
</html>
