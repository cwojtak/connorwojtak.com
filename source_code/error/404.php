<?php session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css" />
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>ERROR 404: Page Not Found</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>

            <h2>ERROR 404: Page not found</h2>
            <p>We are sorry, but the page you were looking for was not found.</p>
        </body>
</html>
