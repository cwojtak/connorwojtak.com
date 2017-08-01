<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css" />
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>ERROR 410: Gone</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>

            <h2>ERROR 410: Gone</h2>
            <p>Please try again, or use another link to the right.</p>
        </body>
</html>
