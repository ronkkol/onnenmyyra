<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<?php include('includes/head.php'); ?>
	<BODY bgcolor='#336699'>
			<div id='cwrap' class='height'>
				<?php include('includes/header.php'); ?>
				<?php include('includes/sidebar.php'); ?>
				<div id='content' align='center' class='height'>
					<h1><br><br><br>Kuukausikirje<br><br><br>
					<div id='kk'>
					<?php
					$connect = mysql_connect('localhost' , 'käyttäja' , 'salasana');
							if (!$connect) {
								echo ('Jokin meni vikaan tietokantaan yhdistämisessä!');
							}
							else {
								$db_selected = mysql_select_db('kk' , $connect);
								if (!$db_selected) {
									echo ("Jokin meni vikaan tietokannan löytämisessä!");
								}
								else {
									$query = mysql_query("Select * FROM content order by id DESC limit 1");
									if (!$query) {
										echo (mysql_error());
									}
									else {
										if (mysql_num_rows($query) < 1) {
											echo ('Ei tietoja tälle kuulle!');
										}
										else {
											$row = mysql_fetch_array($query);
											echo ('<h2>' .$row['title']. '</h2>');
											echo ('<h3>' .$row['kirje']. '</h3>');
										}
									}
								}
							}
						?>
						</h1>
						<form action='kk.php' method='POST'>
						<label>Päiväys: <input type='text' id='one' style='font-size: 120%;' class='datepick'  name='date' /></label>
						<input type='submit' value='Etsi' class='nappi' name='submit' />
					</form>
					<br><br>
					<div id='result' style='border-top: 1px solid gray; border-bottom: 1px solid gray; width: 600px;'>
						<?php
						if (isset($_POST["submit"])) {
						$submit = $_POST["submit"];
						if ($_POST["date"]) {
							$connect = mysql_connect('localhost' , 'root' , 'salasana');
							if (!$connect) {
								echo ('Jokin meni vikaan tietokantaan yhdistämisessä!');
							}
							else {
								$db_selected = mysql_select_db('ohjelma' , $connect);
								if (!$db_selected) {
									echo ("Jokin meni vikaan tietokannan löytämisessä!");
								}
								else {
									$date = mysql_real_escape_string($_POST["date"]);
									$query = mysql_query("SELECT * FROM content WHERE date='$date'");
									if (!$query) {
										echo (mysql_error());
									}
									else {
										if (mysql_num_rows($query) < 1) {
											echo ('Ei tietoja tälle päivälle!');
										}
										else {
											$row = mysql_fetch_array($query);
											echo ('<h2>' .$row['date']. '</h2>');
											echo ('<h3>' .$row['ohjelma']. '</h3>');
										}
									}
								}
							}
						}
						else echo ("Ilmoita päiväys!");
						}
						?>
					</div>
					<br><br><br><br><br><br><br><br><br><br>
				</div><!-- end of content. -->
			</div><!-- end of cwrap. -->
			<?php include('includes/footer.php'); ?>
			<script type='text/javascript'>
			$("#one").datepicker();
		</script>
	</BODY>
</HTML>