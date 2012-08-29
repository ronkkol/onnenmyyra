<?php

$connect = mysql_connect('localhost' , 'root' , 'leevi637e');

if (!$connect) {

	die ('Yhteyden muodostus epäonnistui!');
	
}
else {

	if ($_POST["date"] && $_POST["ohjelma"]) {
		
		$date = $_POST["date"];
		$ohjelma = $_POST["ohjelma"];
		
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