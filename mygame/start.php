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

<?php
    
require_once('database.php');
    
$user = $_POST['username'];

$insert = "INSERT INTO player (username, score, id) VALUES ('$user', '0', DEFAULT)";
mysqli_query($connection, $insert);


$sQuery = "SELECT score FROM player WHERE username = '$user'";
$sSet = mysqli_query($connection, $sQuery);
$scoring = mysqli_fetch_assoc($sSet);

?>

<div id="userboard">

    <div class="user">

    <?php
        echo $user;
    ?>

    </div>

    <div class="score">
    <?php

        echo $scoring['score'];
    ?>

    </div>

</div>
    <div class="startDiv">
     <form action="game.php" method="post">
            <input name=begin type=hidden value="<?php echo $user; ?>">
            <input type="submit" name="start" id="start" value="START">
     </form>
    </div>

    <?php
        $bQuery = "SELECT * FROM player ORDER BY score DESC";
        $board_set = mysqli_query($connection, $bQuery);
    ?>

    <div id="scoreBoard">
    <h2>HIGH SCORES</h2>
    <?php
		while ($board = mysqli_fetch_assoc($board_set)) {
			echo $board['username'] . ":" . "<br />";
			echo $board['score'] . "<br />" . "<br />";
			}
	?>

    </div>


</body>
</html>

