<?php
session_start();
if (!isset($_SESSION["user"])) {

	echo ('Kirjaudu sisään ennen tämän sivun katselemista!');
	header("Location: login.php");

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<?php include('includes/head.php'); ?>
	<BODY background='#336699'>
		<div id='cwrap' class='height'>
			<?php include('includes/header.php'); ?>
			<?php include('includes/sidebar.php'); ?>
			<div id='content' align='center' class='height'>
				<h1>Kuukausikirjeen päivitys:</h1>
				<br>
				<br>
				
				<form method='POST' action='checks/kirje.php' align='center' style='max-width: 500px;' id='ruoka'>
				
					<label>Otsikko: <input type='text' style='font-size: 120%;' id='two' name='title' /></label><br><br><br>
					
					<label>Kuukausikirje: <textarea id='sisältö' name='kirje'></textarea></label><br><br><br>
					
					<input type='submit' value='Päivitä' class='nappi' />                                           <input type='reset' value='Tyhjennä' class='nappi' />
					
				</form><br><br><a href='logout.php'>Kirjaudu ulos</a><br><br>
			</div><!-- end of content. -->
				
		</div><!-- end of cwrap. -->
		<?php include('includes/footer.php'); ?>

	<script type='text/javascript'>
		$("#one").datepicker({
            showWeek: true,
            firstDay: 1,
            minDate: -30,
            dateFormat: 'yy-mm-dd'
        });

	</script>
</HTML>