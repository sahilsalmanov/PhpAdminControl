<?php
include("connect.php");
session_start();

if($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["istifadeci"] != "sahil") {
    header("Location: exit.php");
}


if($_POST) {
    $aciqlama = $_POST["aciqlama"];
    $sorgu = $connectToSql -> query("delete from projectlerimiz");
    $sorgu = $connectToSql -> query("insert into projectlerimiz (aciqlama) values ('$aciqlama')");
    if($sorgu) {
        echo "<script> window.location.href = 'projects.php';</script>";
    }
    else {
        echo "<script> alert('HATA: Kayit yapilamadi!');
        window.location.href = 'projects.php';
        </script>";
    }

}
    
    
$sorgu = $connectToSql -> query("select * from projectlerimiz");
$satir = $sorgu -> fetch_object();
$sorgu -> free_result();
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

<form action="" method = "post">
<b> Movzu: </b> <br><br>
<textarea style="height: 200px" name="aciqlama">
    <?php echo $satir ? $satir->aciqlama : ''; ?>
</textarea><br><br>
<br><br>

<input type = "submit" value="Yadda saxla">

</form>

    
</body>
</html>