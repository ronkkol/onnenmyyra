<?php

$connect = mysql_connect("localhost","root","leevi637e");

if ($connect) {
	echo("Connected!");
} else {
	die("Failed to connect!");
}

?>