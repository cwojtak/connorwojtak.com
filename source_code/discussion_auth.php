<?php
session_start();
require_once 'lib/swift_required.php';
require_once '/home/connorwo/protected/password_protector.php';

$e_message = null;
$_SESSION["error2"] = null;
$_SESSION["error3"] = null;

$username = $_POST["username"];
$text = $_POST["text"];
$page = $_POST["page"];

if($username == null or $text == null){
    $_SESSION["error2"] = "You did not input a message.";
    header("Location: " . $page . ".php");
    return;
}

if (strpos($text, '<script>') != false) {
    $_SESSION["error4"] = "You are not allowed to insert script elements!";
    header("Location: " . $page . ".php");
    return;
}

if (strpos($text, '</script>') != false) {
    $_SESSION["error4"] = "You are not allowed to insert script elements!";
    header("Location: " . $page . ".php");
    return;
}

$servername = "localhost";
$dbname = "connorwo_logoninfo";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", "connorwo_info", getPassword());
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $dbh->exec("INSERT INTO Posts (username, message, page, date)
    VALUES ('".$username."', '".$text."', '".$page."', '".date('m-d-y')."')");
}
catch(PDOException $e){
    $_SESSION["error3"] = "An error occured, please try again later.";
    $e_message = Swift_Message::newInstance();
    $e_message->setContentType('text/html');
    $e_message->setSubject('FATAL ERROR')->setFrom(array('info@connorwojtak.com' => 'Info'))
    ->setTo(array("connor.wojtak@gmail.com" => "Connor"))->setBody("<p>An error occured:</p> <p>Username: " . $username
    . "</p> <p>Text: " . $text . "</p> <p>Page: " . $page . "</p> <p> Error Log: " . $sql . "<br>" . $e->getMessage() . "</p>");
}

if($e_message != null){
    $transport = Swift_SmtpTransport::newInstance('connorwojtak.com', 587)
    ->setUsername('info@connorwojtak.com')->setPassword(getPassword());
    $mailer = Swift_Mailer::newInstance($transport);
    $result = $mailer->send($e_message);
}

header("Location: " . $page . ".php");

$conn = null;
