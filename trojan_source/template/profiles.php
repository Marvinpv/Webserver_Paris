<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' type='text/css' href='css/style.php' />
		<title>Home</title>
	</head>
	<body>
		<?php
			session_start();
			$_SESSION['isactive'] = "contact";
			if($_SESSION['isadmin']=="t"){
				include("menu_admin.php");
			}else{
				include("menu.php");
			}
		?>
		
		<p>Send a message to:</p>
		<figure  class="hector">
			<a href="profile.php"><img src="images/hector.jpg" alt="hector"></a>
			<figcaption>Hector</figcaption>
		</figure>
		<figure class="helen">
			<a href="profile.php"><img src="images/helen.jpg" alt="helen"></a>
			<figcaption>Helen</figcaption>
		</figure>
		<figure class="priam">
				<a href="profile.php"><img src="images/priam.jpg" alt="priam"></a>
			<figcaption>Priam</figcaption>
		</figure>
	</body>
</html>