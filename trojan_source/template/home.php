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
			$_SESSION['isactive'] = "home";
			if($_SESSION['isadmin']=="t"){
				include("menu_admin.php");
			}else{
				include("menu.php");
			}
		?>
	</body>
</html>