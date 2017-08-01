<?php session_start();
require_once '/home/connorwo/protected/password_protector.php';
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
        <title>CON</title>
    </head>
    <body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h1>CON</h1>
            <p>CON is a language designed for beginner coders to understand programming logic and basic object-oriented programming,
            and is planned to also be used as a language that has practical purposes
            (think <a href="https://www.lua.org/">Lua</a> and <a href="https://www.python.org/">Python</a>.
            Since CON is currently in development, Visual Studio project files, test files, and other junk will be included with these current updates.
            CON is also not currently usable at this point. Visit the <a href="https://github.com/cwojtak/CON">Github</a> page to download the files.
            We don't know how long the project will take, due to it being so early, but it will not be finished for a very long time (think maybe mid-2018).</p>
        </div>
        <?php
        $content->displayDisscussion("/source_code/con_lang");
        ?>
    </body>
</html>
