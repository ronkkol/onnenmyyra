<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<?php include('includes/head.php'); ?>
	<BODY>
		<form method='POST' action='login.php'>
			<label>Käyttäjänimi: <input type='text' name='user' /></label><br>
			<label>Salasana: <input type='password' name='pass' /></label><br>
			<input type='submit' value='Kirjaudu' name='submit' />
		</form>
		<?php
		if (isset($_POST["submit"])) {
			$user = $_POST["user"];
			$pass = md5($_POST["pass"]);
			if ($user && $pass) {
				include('includes/config.php');
				$connect = mysql_connect("$config['db']" , "$config['user']" , "$config['passwd']");
				if(!$connect) {
					die ('Tietokantaan yhdistäminen epäonnistui!');
				}
				else {
					$user = mysql_real_escape_string($user);
					$pass = mysql_real_escape_string($pass);
					$db = mysql_select_db("$config['admin-db']" , $connect);
					if (!$db) {
						die ('Tietokannan valitseminen epäonnistui!');
					}
					else {
						$query = mysql_query("SELECT * FROM kayttajat WHERE kayttaja='$user' AND salasana='$pass'");
						if ($query) {
							mysql_fetch_array($query);
							$numrows = mysql_num_rows($query);
							if ($numrows > 0) {
								$_SESSION["user"] = 1;
								header('Location: yllapito.php');
							}
							else echo ('Väärä käyttäjänimi tai salasana!');
						}
						else die ('??');
					}
				}
			}
			else echo ('Täytä molemmat kentät!');
		}
		?>
	</BODY>
</HTML>