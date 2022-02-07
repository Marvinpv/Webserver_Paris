<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' type='text/css' href='css/style.php' />
	</head>
	<body>
		<div class="topnav">
  			<a class="<?php if($_SESSION["isactive"] == "home") echo "active"; ?>" href="home.php">Home</a>
  			<a class="<?php if($_SESSION["isactive"] == "contact") echo "active"; ?>" href="profiles.php">Contact</a>
  			<a class="<?php if($_SESSION["isactive"] == "files") echo "active"; ?>" href="fileupload.php">Files</a>
		</div>
	</body>
</html>