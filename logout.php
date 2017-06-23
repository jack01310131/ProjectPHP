<?php

session_start();
session_unset($_SESSION['code']);
header('Location: log.php');
exit;

?>