<?php
$title = "My Web Page";
$heading = "My Web Page";
$name = "Muhammad Diab Thabata";
$footer = "My Web Page ©2018";
$paragraph = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat mollis dolor at bibendum. In congue maximus ligula, ut faucibus mi accumsan at. Vestibulum sagittis tortor eget dui ultricies, a vulputate lacus faucibus. Fusce aliquet bibendum erat, sed bibendum eros cursus eu. Nulla at neque rhoncus, ultricies odio at, accumsan elit. Proin in turpis eu leo dapibus pulvinar. Vivamus viverra massa ut enim fringilla ultricies. Donec in enim blandit, iaculis nulla quis, egestas elit. Nullam ut enim id erat bibendum finibus nec ac eros. Nulla malesuada ex facilisis ultrices rhoncus. Nullam in euismod nisl. Donec pulvinar ex sit amet aliquet egestas.";
$allParagraphs = "";
for ($i = 0; $i < 3; $i++) {
    $allParagraphs .= "<p>$paragraph</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.5; padding: 20px; }
        #wrapper { width: 800px; margin: 0 auto; border: 1px solid black; }
        header { background-color: green; padding: 20px; }
        header h1 { color: white; font-size: 2em; }
        main { padding: 20px; }
        main h2 { font-size: 1.5em; margin-bottom: 15px; }
        main p { margin-bottom: 15px; }
        footer { background-color: #eee; padding: 10px; text-align: center; }
        footer p { font-size: 0.8em; color: #555; }
    </style>
</head>
<body>

<div id="wrapper">
    <header>
        <h1><?php echo $heading; ?></h1>
    </header>
    <main>
        <h2>My name is <?php echo $name; ?></h2>
        <?php echo $allParagraphs; ?>
    </main>
    <footer>
        <p><?php echo $footer; ?></p>
    </footer>
</div>

</body>
</html>
