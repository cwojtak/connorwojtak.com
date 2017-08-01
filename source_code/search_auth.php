<?php
session_start();
require_once '/home/connorwo/protected/password_protector.php';
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

        echo "<h2>Results for " . $_POST['name'] . ":</h2>";

        if(isset($_POST['name'])){
            if(isset($_GET['go']) and $_POST['name'] != NULL){
                $search = strtolower($_POST['name']);
                try {
                    $servername = "localhost";
                    $dbname = "connorwo_search";
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", "connorwo_info", getPassword());
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $statement = $dbh->query("SELECT * FROM Search");
                    $attrs = $statement->fetchAll();
                    $shouldPrint = true;
                    $print = "<ul>";
                    $page_name = "";
                    if($attrs != null){
                        foreach($attrs as $attrs2){
                            $i = 1;
                            foreach($attrs2 as $var_name => $var){
                                if($i == 1){
                                    $tester = strpos($var, $search);
                                    if(!is_numeric($tester)){
                                        if(is_bool($tester) or $var != $search){
                                            break;
                                        }
                                    }
                                    $page_name = $var;
                                }
                                if($i == 3){
                                    $print .= "<li><p><a href='https://connorwojtak.com" . $var . "'>" . ucfirst($page_name) . "</a></p></li>";
                                }
                                $i++;
                            }
                        }
                    }

                    echo $print . "</ul>";

                    if($print == "<ul>"){
                        echo "<p>There were no results matching your search.</p>";
                    }
                }
                catch(PDOException $e){
                    $e_message = Swift_Message::newInstance();
                    $e_message->setContentType('text/html');
                    $e_message->setSubject('FATAL ERROR')->setFrom(array('info@connorwojtak.com' => 'Info'))
                    ->setTo(array("connorwo@connorwojtak.com" => "Connor"))->setBody("<p>An error occured: </p>" . $_POST['name'] . "<br>" . $e->getMessage());
                }
            }
            else {
                echo "<p>An error has occured, please try again later.";
            }
        }
        else{
            echo  "<p>Please enter a search query!</p>";
        }
        ?>
        <p>Didn't find what you were looking for? Try again below!</p>
        <form  method="post" action="search_auth.php?go"  id="searchform">
	       <input  type="text" name="name">
           <input  type="submit" name="submit" value="Search">
	    </form>
    </body>
</html>
