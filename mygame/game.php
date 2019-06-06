<?php
    
require_once('database.php');
    
$user = $_POST['begin'];


        $sQuery = "SELECT score FROM player WHERE username = '$user'";
        $sSet = mysqli_query($connection, $sQuery);
        $scoring = mysqli_fetch_assoc($sSet);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div id="userboard">

    <div class="user">
        <?php
            echo $user;
        ?>
    </div>

    <div class="score">
        <?php
            echo "score: " . $scoring['score'];
        ?>
    </div>

</div>

    <p class="instruct">Guess a number between 1-10</p>
<div class="alignGame">
    <div id="generator">
        <h2>bot:</h2>
        <div id="randomINT">

            <?php
                $rand =  rand(1, 10);
               
                if (isset($_POST["entry"]) && !empty($_POST["entry"])) {
                    echo $rand . "<br />";    
                } else {
                    echo "¯\_(ツ)_/¯";
                }
            ?>
        </div>
     </div>

    
        <div class="guessInput">
            <h2 class="player"><?php echo $user; ?>:</h2>
            <form action="game.php" method="post">
                 <input type="text" name="entry" id="entry">
                 <input name=begin type=hidden value="<?php echo $user; ?>">
                 <input type="submit" name="submission" id="guessed" value="Predict">
            </form>          
        </div>
     </div>

     <div id="result">
            <?php
                if (isset($_POST["entry"]) && ($_POST["entry"]) == $rand) {
                    echo "TRUE";
                    $scored = "UPDATE player SET score = score + 1 WHERE username = '$user'";
                    mysqli_query($connection, $scored);
                } else {
                    echo "FALSE";
                }

            ?>
    

        </div>
       
        <div id="backBut">
            <a class="back" href="index.php">Return to front page</a>  
        </div>
        

</body>
</html>