<?php session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css" />
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>Connor's Website: Games</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h2>Games</h2>
            <h4>Connor's Number Guessing Game</h4>
            <p>Guess a number 1 through 100!</p>
            <p><a href="/source_code/games/numberguessing.php">Click here to play!</a></p>
        </div>
    </body>
</html>
