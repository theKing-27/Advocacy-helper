<?php include "include/settings.php"; ?>
<?php
session_destroy();
header('location:guest/login.php');
?>
