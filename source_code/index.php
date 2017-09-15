<?php session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
require_once '/home/connorwo/protected/password_protector.php';
?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css"/>
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>Connor's Website</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h2>Welcome!</h2>
            <p>Hello, I am Connor, and welcome to my website! This is where I
               work on all sorts of projects in HTML, PHP, Javascript, and CSS!
               Feel free to navigate on the side to find more about me or look at
               some of my projects, and leave comments on what you think or of problems you find. </p>
            <h2>Quick Links</h2>
            <h4>CON: A programming language</h4>
            <p><a href="con_lang.php">CON</a></p>
        </div>
        <?php
        $content->displayDisscussion("/source_code/index");
        ?>
    </body>
</html>
