<?php
include("connect.php");
session_start();

if($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["istifadeci"] != "sahil") {
    header("Location: exit.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div style = "text-align: center;">
    <a href="home.php">Home</a> -
     <a href="portfolio.php">Portfolio</a> - 
    <a href="about.php">About</a> -
     <a href="serves.php">Serves</a> -
    <a href="projects.php">Projects</a> -
     <a href="exit.php" onclick = "if(!confirm('Do you want to exit?')) return false;" >Exit</a>

</div>

<h2 style = "text-align: center;">Choose your choice from menu</h2>

    
</body>
</html>