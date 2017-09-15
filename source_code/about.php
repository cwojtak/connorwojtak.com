<?php session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
        <title>Connor's Website: About Me</title>
    </head>
    <body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <div id="body">
            <h2>Hello!</h2>
            <p>I'm Connor, the programmer of this website. The sole purpose of this
            website is to be a test of what I can do with HTML, etc. I also work on
            other things like the game I'm writing in Lua now. Most of these projects
            are posted on <a href="https://github.com/cwojtak">GitHub</a>, so you can
            check them out if you want. The majority of the website is also on Github
            to see. Try checking out the most painful Javascript experience I
            have ever had with my number guessing game under Games.</p>
            <hr id="styleline1">
            <img src="../files/connor.jpg" alt="Picture of me" id="conimage" width=30% height=30%>
        </div>
    </body>
</html>
