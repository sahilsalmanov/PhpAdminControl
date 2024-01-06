<?php
include("adminPanel/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Portfolio</h2>
    <hr>
    <div class="temizle">
    <?php
    $sorgu = $connectToSql->query("select * from portfolio");
    while ($satir = $sorgu->fetch_object()) {
        $resim = $satir->resim; 
        echo "<div class='galeri'>
                <a href='img/$resim' class='resimler' rel='group2' title='$satir->basliq'><img src='img/$resim' alt='$satir->basliq'></a>
              </div>";
        
    }
    ?>
    </div>
</body>
</html>
