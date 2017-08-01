<?php session_start();
require_once '/home/connorwo/protected/password_protector.php';
require_once '/home/connorwo/public_html/source_code/page_content_provider.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="shortcut icon" href="https://connorwojtak.com/files/icon.png"/>
        <title>Connor's Number Guessing Game</title>
        <script>
            var playingGame = false;
            var number = Math.floor((Math.random() * 100) + 1);
            var number_of_guesses = 1;

            function startGame(){
                playingGame = true;

                document.getElementById("numberheader").innerHTML = "Hello, I'm Connor, I\'m thinking of a number 1 through 100; you have eight tries to guess it!";
                var myBtn = document.getElementById("startbutton"),
                mySpan = document.createElement("span");
                mySpan.innerHTML = "";
                myBtn.parentNode.replaceChild(mySpan, myBtn);

                var span = document.createElement('span');
                span.innerHTML = '<button onclick="onClicked()">Submit</button>';
                document.getElementById("submitdiv").appendChild(span);

                var span2 = document.createElement('span');
                span2.innerHTML = '<input id="numberinput" name="numberinput" type="text">';
                document.getElementById("inputdiv").appendChild(span2);
            }

            function onClicked(){
                if(playingGame == true && number_of_guesses != 9){
                    var input = document.getElementById("numberinput");
                    var value = input.value;

                    try {
                        Number(value);
                    }
                    catch(e) {
                        alert("A error has occured, maybe you typed in a non-number character! Try again please.");
                        console.log(e);
                        return;
                    }

                    if(value < number){
                        var toolow = document.createElement('span');
                        toolow.innerHTML = '<p>Your guess for guess number ' + number_of_guesses +  ' was '+ value + '. It was too low. ';
                        document.getElementById("results").appendChild(toolow);
                    }

                    if(value > number){
                        var toohigh = document.createElement('span');
                        toohigh.innerHTML = '<p>Your guess for guess number ' + number_of_guesses + ' was ' + value + '. It was too high. ';
                        document.getElementById("results").appendChild(toohigh);
                    }

                    if(value == number){
                        var justright = document.createElement('span');
                        justright.innerHTML = '<p>Your guess for guess number ' + number_of_guesses + ' was ' + value + '. It was just right, congratulations! ';
                        document.getElementById("results").appendChild(justright);
                        refreshButton();
                    }
                    number_of_guesses += 1;
                }
                if(number_of_guesses >= 9 && value !== number){
                    alert("Sorry, the number was " + number + ".");
                    refreshButton();
                }
                return;
            }

            function refreshButton(){
                var refreshbutton = document.createElement('span');
                refreshbutton.innerHTML = '<button onclick="location.reload(true)">Click to play again</button>';
                document.getElementById("results").appendChild(refreshbutton);
            }
        </script>
    </head>
    <body>
        <?php
        $content = new PageContentProvider("regular");
        ?>
        <h2>Guess a number, any number!</h2>
        <div>
            <button id="startbutton" onclick="startGame()">Click to start</button>
        </div>

        <p id="numberheader"></p>

        <div id="inputdiv">
        </div>

        <div id="submitdiv">
        </div>

        <div id="results">
        </div>
        <?php
        $content->path_to_auth = "../discussion_auth.php";
        $content->path_to_delauth = "../discussion_delauth.php";
        $content->displayDisscussion("/source_code/games/numberguessing");
        ?>
    </body>
</html>
