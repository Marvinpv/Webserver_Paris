<!DOCTYPE html>
<html>
<meta charset="utf-8">
		<link rel='stylesheet' type='text/css' href='css/style.php' />
<head>
<title>Upload the TOP SECRET here, it's safe</title>
</head>
<body>
		<?php
			session_start();
			$_SESSION['isactive'] = "files";
			if($_SESSION['isadmin']=="t"){
				include("menu_admin.php");
			}else{
				include("menu.php");
			}
		?>

<form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="the_file" id="the_file" onchange="loadFile(event)">
  <input type="submit" value="Upload Image" name="submit">
</form>
<div class="topsecret">
<?php

	// open this directory 
	$myDirectory = opendir("uploads");

	// get each entry
	while($entryName = readdir($myDirectory)) {
		$dirArray[] = $entryName;
	}

	// close directory
	closedir($myDirectory);

	//	count elements in array
	$indexCount	= count($dirArray);

	?>

	<ul>

		<?php
		// loop through the array of files and print them all in a list
		for($index=0; $index < $indexCount; $index++) {
			$extension = substr($dirArray[$index], -3);
			if ($extension == 'jpg'){ // list only jpgs
				echo '<figure>
				<img src="uploads/' . $dirArray[$index] . '" alt="Image" />
				<figcaption>'. $dirArray[$index] .'</figcaption></figure>';
			}	
		}
		?>
		</div>
</body>
</html>