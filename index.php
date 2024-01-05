<?php

include(connect.php)

if ($_POST) {
    $istifadeci = $_POST["istifadeci"];
    $sifre = $_POST["sifre"]

    $sorgu = $connect -> query("select * from istifadeci where (istifadeci = '$istifadeci' && sifre = '$sifre'")
      

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
    
<form action="" method = "post">
    <b>Istifadeci adi: </b> <br>
    <input type="text" name = "istifadeci" size = "30" required> <br> <br>
    <b> Sifre: </b><br>
    <input type="password" name= "sifre" size="30" required> <br> <br><br>
    <input type="submit" value="Giris">
</form>
</body>
</html>