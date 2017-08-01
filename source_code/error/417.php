<?php session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css" />
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>ERROR 417: Expectation Failed</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>

            <h2>ERROR 417: Expectation Failed</h2>
            <p>Please try again, or use another link to the right.</p>
        </body>
</html>
