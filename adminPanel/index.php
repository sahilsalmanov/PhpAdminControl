<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $istifadeci = $_POST["istifadeci"];
    $sifre = $_POST["sifre"];

    // Güvenli bağlantı için prepared statement kullanımı
    $sorgu = $connectToSql->prepare("SELECT * FROM istifadeciler WHERE istifadeci = ? AND sifre = ?");
    $sorgu->bind_param("ss", $istifadeci, $sifre);
    $sorgu->execute();
    $result = $sorgu->get_result();
    $report = $result->num_rows;

    if ($report > 0) {
        setcookie("istifadeci", $istifadeci, time() + (60 * 60));
        session_start();
        $_SESSION["giris"] = sha1(md5("var")); // Burada sha1 ve md5 kullanımı örnek ama güvenli değil.
        echo "<script> window.location.href = 'home.php'; </script>";
    } else {
        echo "<script>
        alert('YANLIS ISTIFADECI MELUMATLARI!');
        window.location.href = 'index.php';
        </script>";
    }
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