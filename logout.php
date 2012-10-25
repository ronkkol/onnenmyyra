<?php

session_start();
session_destroy();
unset($_COOKIE['user']);
header('Location: index.php');

?>