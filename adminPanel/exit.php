<?php
session_destroy();
setcookie("istifadeci", "", time()-1);
echo "<script> window.location.href = 'index.php'; </script>";

?> 