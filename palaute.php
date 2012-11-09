<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
	<?php include('includes/head.php'); ?>
	<BODY bgcolor='#336699'>
		<div id='cwrap'>
			<?php include('includes/header.php'); ?>
				<?php include('includes/sidebar.php'); ?>
				<div id='content' align='center' class='height'>
					<br><br><br><h1>Palauteboxi</h1><br><br>
					<form method='POST' name='palaute' action='formHandler.php'>
						<label>
						Nimesi:
							<input type="text" name="name" class='field' /><br><br>
						</label>
						<label>
						Sähköpostisi:
							<input type="text" name="email" class='field' /><br><br>
						</label>
						<label>
						Viesti:<br>
							<textarea name="message"></textarea><br><br>
						</label>
						<input type="submit" value="Lähetä" class='nappi'>
					</form>
					<br><br>
				</div>
		</div><!-- end of cwrap. -->
		<?php include('includes/footer.php'); ?>
		<script language="JavaScript">
			var frmvalidator  = new Validator("palaute");
			frmvalidator.addValidation("name","req","Anna meille nimesi");
			frmvalidator.addValidation("email","req","Anna sähköpostiosoitteesi");
			frmvalidator.addValidation("email","email",
			"Anna oikea sähköpostoosoite");
		</script>
	</BODY>
</HTML>
