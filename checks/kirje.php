<?php

$connect = mysql_connect('localhost' , 'root' , 'leevi637e');

if (!$connect) {

	die ('Yhteyden muodostus epäonnistui!');
	
}
else {

	if ($_POST["title"] && $_POST["kirje"]) {
		
		$title = $_POST["title"];
		$kirje = $_POST["kirje"];
		
		echo ("$title <br><br>");
		echo ("$kirje <br><br>");
		
		$db_selected = mysql_select_db('kk' , $connect);
		
		if (!$db_selected) {
		
			die ("Tietokannan valinta epäonnistui!");
		
		}
		else {
		
			$query = mysql_query("INSERT INTO content VALUES ('' , '$title' , '$kirje')");
			
			if ($query) {
			
				echo ("Onnistui! <a href='../yllapito.php'>takaisin</a>");
			
			}
			else die (mysql_error());
		
		}
	}
	else die ('Täytä molemmat kentät!');

}

?>