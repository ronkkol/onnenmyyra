<?php

session_start();
if (!isset($_SESSION["user"])) {

	echo ('Kirjaudu sisään ennen tämän sivun katselemista!');
	header("Location: login.php");

}

$connect = mysql_connect('localhost' , 'käyttäjä' , 'salasana');

if (!$connect) {

	die ('Yhteyden muodostus epäonnistui!');
	
}
else {

	if ($_POST["date"] && $_POST["ohjelma"]) {
		
		$date = mysql_real_escape_string($_POST["date"]);
		$ohjelma = mysql_real_escape_string($_POST["ohjelma"]);
		
		echo ("$date <br><br>");
		echo ("$ohjelma <br><br>");
		
		$db_selected = mysql_select_db('ohjelma' , $connect);
		
		if (!$db_selected) {
		
			die ("Tietokanna valinta epäonnistui!");
		
		}
		else {
		
			$query = mysql_query("INSERT INTO content VALUES ('' , '$date' , '$ohjelma')");
			
			if ($query) {
			
				echo ("Onnistui! <a href='../yllapito.php'>takaisin</a>");
			
			}
			else die (mysql_error());
		
		}
	}
	else die ('Täytä molemmat kentät!');

}

?>