<?php session_start();
require_once '/home/connorwo/protected/password_protector.php';
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
        <title>Connor's Website: Code</title>
    </head>
    <body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h3>CON: A programming language</h3>
            <p><a href="con_lang.php">CON</a></p>
            <h3>Downloadable Number Guessing Game</h3>
            <p>This is a program powered by Python.</p>
            <p><a href="../files/NumberGame.zip">Number Guessing Game</a></p>
            <h3>Ore Galore</h3>
            <p>These mods require Minecraft Forge to work, get it at https://files.minecraftforge.net// This mod has originated from the Mega Mod Pack.</p>
            <p><a href="../files/og-1.5.6.jar">Ore Galore for Minecraft 1.11.2: Adds many new items and blocks into the game.</a></p>
        </div>
        <?php
        $content->displayDisscussion("/source_code/code");
        ?>
    </body>
</html>
