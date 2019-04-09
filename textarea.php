<form action="textarea.php" method="post">
	<textarea name="bio"></textarea>

<input type="submit" name="submit"/></form>


	<?php 
	error_reporting(0);
	$a = $_POST["bio"];
	echo $a ;
	?>