<?php
// Connecting, selecting database
$username = $_POST["registname"];
$pass = $_POST["registpass"];

$dbconn = pg_connect("host=localhost dbname=dbname user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

//Check if the registered user is the first one
   $sql = "SELECT * FROM users";
$exists = pg_query($dbconn, $sql) ;

   if($exists) {
	$first = "false";
   }else{
	echo "first user";
	$first = "true";
}

// Create table
   $sql =<<<EOF
      CREATE TABLE IF NOT EXISTS USERS
      (ID SERIAL PRIMARY KEY,
      USERNAME           TEXT    NOT NULL,
      PASSWORD           CHAR(10)     NOT NULL,
      ISADMIN        BOOLEAN,
	unique(username)
);
EOF;

   $ret = pg_query($dbconn, $sql);
   if(!$ret) {
      echo pg_last_error($dbconn);
   }


if(!(empty($username))){
//============================TODO============================
//TODO: implement this part to insert new assgined users into the table 'user'
	if($first) { //Admin
		$sql = "INSERT INTO USERS (USERNAME, PASSWORD, ISADMIN) 
		VALUES ('".$username"','".$pass"','".$first"')";
		
		
		if ($dbconn->query($sql) === TRUE) {
	  		echo "Registration succeded";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}else{ // Every other user
		$sql = "INSERT INTO USERS (USERNAME, PASSWORD, ISADMIN) 
		VALUES ('".$username"','".$pass"', '".$first"')
		ON CONFLICT (USERNAME) DO_NOTHING";
		
		if ($dbconn->query($sql) === TRUE) {
	  		echo "Registration succeded";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		 	
	}


//=========================END=OF=TODO============================
}

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
echo "<script> location.href='index.html'; </script>";

?>
