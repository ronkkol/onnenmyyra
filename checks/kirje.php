<?php

session_start();
if (!isset($_SESSION["user"])) {

	echo ('Kirjaudu sisään ennen tämän sivun katselemista!');
	header("Location: login.php");

}

include('../includes/config.php');
$connect = mysql_connect($config['host'], $config['user'], $config['passwd']);

if (!$connect) {
	die ('Yhteyden muodostus epäonnistui!');
}
else {

	if ($_POST["title"] && $_POST["kirje"]) {
		
		$title = mysql_real_escape_string($_POST["title"]);
		$kirje = mysql_real_escape_string($_POST["kirje"]);
		
		echo ("$title <br><br>");
		echo ("$kirje <br><br>");
		
		$db_selected = mysql_select_db($config['db'] , $connect);
		
		if (!$db_selected) {
            if ($config['debug']) {
                die (mysql_error());
            } else {
                die ("Tietokannan valinta epäonnistui!");
            }
        }
		else {
			$query = mysql_query("INSERT INTO content (title, kirje, updated) VALUES ('".$title."' , '".$kirje."', NOW())");
			
			if ($query) {
			
				echo ("Onnistui! <a href='../yllapito.php'>takaisin</a>");
			
			}
			else die (mysql_error());
		
		}
	}
	else die ('Täytä molemmat kentät!');

}

