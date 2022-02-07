<?php 

$host = $_POST["validIp"];
$message = $_POST["message"];

if(!($sock = socket_create(AF_INET6, SOCK_STREAM, 0)))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

//Connect socket to remote server
if(!socket_connect($sock , $host , 5000))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not connect: [$errorcode] $errormsg \n");
}

echo "Connection established \n";
echo "<br>";

//Send the message to the server
if( ! socket_send ( $sock , $message , strlen($message) , 0))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not send data: [$errorcode] $errormsg \n");
}

echo "Message send successfully \n";
echo "<br>";
socket_close($sock);

header("Location: home.php");
exit();

?>
