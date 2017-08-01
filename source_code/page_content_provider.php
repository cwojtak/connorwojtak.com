<?php
    require_once '/home/connorwo/public_html/source_code/lib/swift_required.php';
    require_once '/home/connorwo/protected/password_protector.php';
    class PageContentProvider {

        public $path_to_auth = "discussion_auth.php";
        public $path_to_delauth = "discussion_delauth.php";

        function __construct($type) {
            if($type == "secret"){
                $this->displaySecret();
            }
            else {
                $this->displayRegular();
            }
        }

        function displaySecret(){
            echo '
            <div id="header">
                <img src="/files/logo4.png" alt="Logo" style="width:200px;height:200px">
            </div>
            <div id="sidebar">
                <h2>Index</h2>
                <p><?php if($_SESSION["username"] != null){ echo "You are signed in, " . $_SESSION["username"] . "."; }?></p>
                <ul>
                    <li><p><a href="../search.php">Search</a></p></li>
                    <li><p><a href="../index.php">Home</a></p></li>
                    <li><p><a href="../code.php">Programs</a></p></li>
                    <li><p><a href="../about.php">About Me</a></p></li>
                    <li><p><a href="../games.php">Games</a></p></li>
                </ul>
                <h3>Account</h3>
                    <ul>
                        <li><p><a href="../login/login.php">Login</a></p></li>
                        <li><p><a href="../login/signup.php">Signup</a></p></li>
                        <li><p><a href="../login/logout.php">Logout</a></p></li>
                    </ul>
                <h3>Secret</h3>
                <ul>
                    <li><p><a href="private_index.php">Home</a></p></li>
                    <li><p><a href="private_download.php">Downloads</a></p></li>
                    <li><p><a href="discussion.php">Discussion</a></p></li>
                </ul>
            </div>
            ';
        }

        function displayRegular(){
            echo '
            <div id="header">
                <img src="/files/logo4.png" alt="Logo" style="width:200px;height:200px">
            </div>

            <div id="sidebar">
                <h3>Index</h3>
                <p> ';
                if($_SESSION["username"] != null){ echo "You are signed in, " . $_SESSION["username"] . "."; }
                echo '</p>
                <ul>
                    <li><p><a href="/source_code/search.php">Search</a></p></li>
                    <li><p><a href="/source_code/index.php">Home</a></p></li>
                    <li><p><a href="/source_code/code.php">Programs</a></p></li>
                    <li><p><a href="/source_code/about.php">About Me</a></p></li>
                    <li><p><a href="/source_code/games.php">Games</a></p></li>
                </ul>
                <h3>Account</h3>
                <ul>
                    <li><p><a href="/source_code/login/login.php">Login</a></p></li>
                    <li><p><a href="/source_code/login/signup.php">Signup</a></p></li>
                    <li><p><a href="/source_code/login/logout.php">Logout</a></p></li>
                </ul>
                <h3>Secret</h3>
                <ul>
                    <li><p><a href="/source_code/protected/auth.php">Secret Area</a></p></li>
                </ul>
            </div>
            ';
        }

        function displayDisscussion($page){
            echo "
            <h2>Comments</h2>
            <div class='discussion-container'> ";
                if($_SESSION['error2'] != null){
                    echo $_SESSION['error2'];
                }
                if($_SESSION['error3'] != null){
                    echo $_SESSION['error3'];
                }
                if($_SESSION['error4'] != null){
                    echo $_SESSION['error4'];
                }
                echo " <div class='comment-container'>
                    <form action='".$this->path_to_auth."' method='POST'> ";
                    if($_SESSION['username'] != null){
                    echo
                    'Comment
                    <input type="hidden" name="username" value='.$_SESSION["username"].'><br/>
                    <textarea id="msgbox" onclick="removeText()" rows="4" cols="50" name="text"></textarea><br/>
                    <input type="hidden" name="page" value="'.$page.'"/>
                    <input type="submit" value="Submit"/>';
                    }
                    if($_SESSION["username"] == null){
                        echo "<p>You are not signed in!</p>";
                    }
                echo '
                    </form>
                </div>
                <div class="post-container"> ';
                $servername = "localhost";
                $dbname = "connorwo_logoninfo";
                try {
                    $post = null;
                    $candelete = false;
                    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", "connorwo_info", getPassword());
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $statement = $dbh->query("SELECT * FROM Posts WHERE '$page'=page");
                    $attrs = $statement->fetchAll();
                    if($attrs != null){
                        foreach($attrs as $attrs2){
                            $i = 1;
                            foreach($attrs2 as $var_name => $var){
                                if($i == 1){
                                    echo "<div class='subpost-container'>Post by: " . $var . "<br>";
                                    if ($var == $_SESSION["username"]){
                                        $candelete = true;
                                    }
                                }
                                if($i == 3){
                                    echo $var . "<br>";
                                    $post = $var;
                                }
                                if($i == 9){
                                    echo "<i>Posted on: " . $var . "</i>";
                                }

                                $i++;
                            }
                            if($candelete == true){
                                echo '
                                <form action="'.$this->path_to_delauth.'" method="POST">
                                    <input type="hidden" name="username" value='.$_SESSION["username"].'>
                                    <input type="hidden" name="text" value='.$post.'>
                                    <input type="hidden" name="page" value="'.$page.'"/>
                                    <input type="submit" value="Delete Post"/>
                                </form>
                                </div>
                                ';
                            }
                        }
                    }
                }
                catch (Exception $ex) {
                    $e_message = Swift_Message::newInstance();
                    $e_message->setContentType('text/html');
                    $e_message->setSubject('FATAL ERROR')->setFrom(array('info@connorwojtak.com' => 'Info'))
                    ->setTo(array("connorwo@connorwojtak.com" => "Connor"))->setBody("<p>An error occured: </p>" . $sql . "<br>" . $ex->getMessage());
                }
            echo "
                </div>
            </div> ";
        }
    }
?>
