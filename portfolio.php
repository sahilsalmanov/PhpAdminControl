<?php
include("connect.php");
session_start();

if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["istifadeci"] != "sahil") {
    header("Location: exit.php");
    exit; // Eklediğimiz çıkış işlemi
}

$islem = isset($_GET["islem"]) ? $_GET["islem"] : null; // $islem kontrolü düzeltildi

if ($islem == "sil") {
    $id = isset($_GET["id"]) ? $_GET["id"] : null; // $_GET kontrolü düzeltildi
    $sorgu = $connectToSql->query("delete from portfolio where id = '$id'"); // SQL sorgusu güvenliği kontrol edilmeli
    echo "<script> window.location.href = 'portfolio.php';</script>";
    exit; // Eklediğimiz çıkış işlemi
}

if ($islem == "ekle") {
    if ($_POST) {
        $basliq = $_POST["basliq"];
        $resim = "img/" . $_FILES["resim"]["name"];
        move_uploaded_file($_FILES["resim"]["tmp_name"], $resim);
        $sorgu = $connectToSql->query("insert into portfolio (basliq, resim) values ('$basliq', '$resim')");
        echo "<script> window.location.href = 'portfolio.php';</script>";
        exit; // Eklediğimiz çıkış işlemi
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

<div style="text-align: center;">
    <a href="home.php">Home</a> -
    <a href="portfolio.php">Portfolio</a> - 
    <a href="about.php">About</a> -
    <a href="serves.php">Serves</a> -
    <a href="projects.php">Projects</a> -
    <a href="exit.php" onclick="if(!confirm('Do you want to exit?')) return false;">Exit</a>
</div>

<table width="100%" border="1">

<tr>
    <th>S.No</th>
    <th>Basliq</th>
    <th>Resim</th>
</tr>
<?php
$siraNo = 0;
$sorgu = $connectToSql->query("select * from portfolio");
while ($satir = $sorgu->fetch_object()) {
    $siraNo++;
    echo "<tr align='center'>
     <td>$siraNo</td>
     <td>$satir->basliq</td>
     <td><a href='portfolio.php?islem=sil&id=$satir->id'>Sil</a></td>
      </tr>";
}

?>
</table>

<form action="portfolio.php?islem=ekle" enctype="multipart/form-data" method="post">
    <b>Basliq: </b><input type="text" size="20" name="basliq"> <br> <br>
    <b>Resim: </b><input type="file" name="resim"> <br> <br>

    <input type="submit" value="Yadda saxla">

</form>

</body>
</html>
