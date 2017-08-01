<?php
session_start();
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
        <title>Connor's Website: Search</title>
    </head>
    <body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <h2>Search</h2>
        <p>Type in something to search.</p>
        <form  method="post" action="search_auth.php?go"  id="searchform">
	       <input  type="text" name="name">
           <input  type="submit" name="submit" value="Search">
	    </form>
    </body>
</html>
