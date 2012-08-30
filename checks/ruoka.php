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

	if ($_POST["date"] && $_POST["lista"]) {
		
		$date = mysql_real_escape_string($_POST["date"]);
		$lista = mysql_real_escape_string($_POST["lista"]);
		
		echo ("$date <br><br>");
		echo ("$lista <br><br>");
		
		$db_selected = mysql_select_db('ylläpito' , $connect);
		
		if (!$db_selected) {
		
			die ("Tietokanna valinta epäonnistui!");
		
		}
		else {
		
			$query = mysql_query("INSERT INTO ruoka VALUES ('' , '$date' , '$lista')");
			
			if ($query) {
			
				echo ("Onnistui! <br> <a href='../yllapito.php'>Takaisin<a>");
			
			}
			else die (mysql_error());
		
		}
	}
	else die ('Täytä molemmat kentät!');

}

?>