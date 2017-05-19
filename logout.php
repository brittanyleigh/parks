<?php
require 'pdo.php';
session_start();
logout();
header('Location:index.php');
exit();
?>