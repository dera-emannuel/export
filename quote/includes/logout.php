<?php
session_start();
session_unset();
session_destroy();

header("Location: ../public/admin/auth/login/login.php");
?>