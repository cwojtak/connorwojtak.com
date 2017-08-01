<?php session_start();
require_once '/home/connorwo/protected/password_protector.php';
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="/css/style.css"/>
            <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
            <title>Connor's Website: Deep Hurting Button</title>
	</head>
	<body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h2>Unofficial MST3K Deep Hurting Button</h2>
            <p>Remember when Dr. Forrester and TV's Frank's taunting was just limited to sandstorms? Now you can let the Mads from Deep 13 give voice to the pain of you
            and your friends in this easy to use button -- anywhere, at any time.
            This product is a widget that can be placed anywhere on your home screen. It is recommended that you have 2x2 grid space available on your home screen.</p>
            <p><a href="https://play.google.com/store/apps/details?id=com.connorwojtak.deephurtingbutton&hl=en">Get it now!</a></p>
            <p>If you have any questions or problems, please email me at connor.wojtak@gmail.com! I would love to know your problems and try to fix them if possible.</p>
            <p>Also, please note that even though the Google Play Store may say that the widget is not available for your phone, it may still work, however, your phone MUST be Android
            version 4.4 and up to work.</p>
        </div>
        <?php
        $content->displayDisscussion("/source_code/deephurting");
        ?>
    </body>
</html>
