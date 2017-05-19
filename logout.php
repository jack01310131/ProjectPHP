<?php

session_start();
session_unset($_SESSION['code']);
// session_destroy();
header('Location: log.php');
exit;

?>