<html>
<?php
	
	session_destroy();

	if(isset($_SESSION["user"]))
	unset($_SESSION["user"]);

	header("location:index.html");

?>
</html>
