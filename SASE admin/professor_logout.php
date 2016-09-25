<?php
session_start();
session_destroy();
header("Location:professor_login.php");
exit;
?>