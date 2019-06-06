<?php
    require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet"> 
    <title>My game</title>
</head>
<body>

    <div id="user">
        <h1>GAMBLE BOT</h1>
        <h2 id="regTitle">Enter your username to start</h2>
        <form action="start.php" method="post">
            <input type="text" name="username" id="name">
            <input type="submit" name="submission" id="submit" value="Submit">
        </form>
    </div>
  
</body>
</html>