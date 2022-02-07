<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' type='text/css' href='css/style.php' />
		<title>Send Me a Message</title>
	</head>
	<body>
		<?php
			session_start();
			if($_SESSION['isadmin']=="t"){
				include("menu_admin.php");
			}else{
				include("menu.php");
			}
		?>

		<form id="submitMessage" onsubmit="sendMessage();" action="send_message.php" method="post">
			<input id="validIp" type="hidden" name="validIp">
			<input id="ipAddress" type="text" placeholder="IPv6 Address">
			<input name="message" type="text" placeholder="Your Message...">
			<input type="submit" value="Send Me a Message!">
		</form>

		<script>
		//=======================TODO====================================
		//TODO: compelte this function, so that
		//	1. it gets the ipAddress from the input
		//	2. it checks if the given IP address is valid (using checkIfValidIP() function)
		//	3. submit the address and alert with a "Sent to..." message
		//	4. return true if message sent successfully, otherwise false

		function sendMessage() {
			
			//$Address = $_POST['ipAddress'];
			var Address = document.getElementById("ipAddress").value;
			Αddress = '2001::dcba:2001';
			 /* Assign the address to the variable, e.g.; newline ⁧/*/ Αddress = '2001::dcba:2001';
			var valid = checkIfValidIP(Address);
			if (valid) {
				document.getElementById('validIp').innerHTML = Αddress;
				
				document.getElementById("submitMessage").submit();
								
				//$socket = socket_create(AF_INET6, SOCK_STREAM, SOL_TCP);
				//$msg = $_POST['message'];
				//$len = strlen($msg)
				//socket_sendto($socket,$msg,$len,0,$Address);
				//echo "Sent to $address"
				document.write("Sent to" + Address);
				return true;
			}
			document.write("Failed to send");
			return false;
		}
		//====================END=OF=TODO=================================

		/* Check if string is IPv6 */ 
		function checkIfValidIP(str) { 
		// Regular expression to check if string is a IPv6 address 
		const regexExp = /(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))/gi; 
		return regexExp.test(str); }
	
		</script>
	</body>
</html>