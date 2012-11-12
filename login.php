<?php
session_start();
session_regenerate_id(true);
 ?>
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
				$connect = mysql_connect($config['host'], $config['user'], $config['passwd']);
				if(!$connect) {
					die ('Tietokantaan yhdistäminen epäonnistui!');
				}
				else {
                    $db_selected = mysql_select_db($config['db'] , $connect);
                    if (!$db_selected) {
                        if ($config['debug']) {
                            die (mysql_error());
                        } else {
                            die ("Tietokannan valinta epäonnistui!");
                        }
                    }

					$user = mysql_real_escape_string($user);
					$pass = mysql_real_escape_string($pass);
                    $query = mysql_query("SELECT * FROM kayttajat WHERE kayttaja='$user' AND salasana='$pass'");
                    if ($query) {
                        mysql_fetch_array($query);
                        $numrows = mysql_num_rows($query);
                        if ($numrows > 0) {
                            $_SESSION["user"] = true;

                            header('Location: yllapito.php');
                        }
                        else echo ('Väärä käyttäjänimi tai salasana!');
                    }
                    else {
                        if ($config['debug']) {
                            die ('Invalid query: '.mysql_error());
                        } else {
                            die ("Tietokantavirhe!");
                        }
                    }

				}
			}
			else echo ('Täytä molemmat kentät!');
		}
		?>
	</BODY>
</HTML>
