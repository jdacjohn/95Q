<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//include("../include/validate_email.php");
	
		/* Function to validate email addresses as being:
			1.  In the proper format
			2.  on a Valid Domain
			3.  an actual mailbox on the domain.
		 Taken from John Coggeshall's article on Zend.com's Spotlight
	*/
	function validateMail($Email) {
  	//	Step 1:  Initialize Variables
		global $HTTP_HOST;
		$result = array();

		//	Step 2:  Use a regular expression to determine if the e-mail address 
		//	is properly formatted. If the e-mail address is not valid, return an error.
		print("Validating format of email address.<br />");
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $Email)) {
			$result[0]=false;
      $result[1]="$Email is not properly formatted";
      return $result;
		}

		//	Step 3 -- Find the address of the mail server
		//	Split apart the e-mail address and use the domain name to search for a mail server you can use 
		//	to further check the e-mail address. If no mail server is found, you'll just use the 
		//	domain address as a mail server address:
		//
		//	Note: In the event that the optional step 4 is not followed, the else portion of this step must 
		//	return in error in order for the script to function properly.
		list ( $Username, $Domain ) = split ("@",$Email);
		
		print("Username = " . $Username . "<br />");
		print("Domain = " . $Domain . "<br />");
		
		if (getmxrr($Domain, $MXHost))  {
			$ConnectAddress =  $MXHost[0];
    } else {
			$ConnectAddress = $Domain;
    } 		
		print("Connect address = " . $ConnectAddress . "<br />");
		
		//	Step 4 -- Connect to mail server and check e-mail address (OPTIONAL)
		//	Finally, once you have the best guess at a mail server, it's time to open a connection and talk to the server. 
		//	As I stated earlier, this step is optional. After every command you send, you'll need to read a kilobyte (1024 bytes) 
		//	of data from the server. It should be more than enough to receive the complete response from the server for that command.
		//
		//	Note that you'll store the output from the server in three separate variables: $To, $From and $Out. This is done so you 
		//	can check the responses after you close the connection, to see if you actually have a real e-mail address or not.
		//
		//	If the script cannot connect at all, or the e-mail address wasn't valid, set the $result array to the proper values:

		$Connect = fsockopen($ConnectAddress,25,&$errno,&$errstr,30);
		print("Connect var = " . $Connect . "<br />");
		
		if ($Connect) {
			print("Inside if(connect)...<br />");
			if (ereg("^220", $Out = fgets($Connect, 1024))) {

			 fputs ($Connect, "HELO $HTTP_HOST\r\n");
			 $Out = fgets ( $Connect, 1024 );
			 fputs ($Connect, "MAIL FROM: <{$Email}>\r\n");
			 $From = fgets ( $Connect, 1024 );
			 fputs ($Connect, "RCPT TO: <{$Email}>\r\n");
			 $To = fgets ($Connect, 1024);
			 fputs ($Connect, "QUIT\r\n");
			 fclose($Connect);

				if (!ereg ("^250", $From) || !ereg ( "^250", $To )) {
					$result[0]=false;
					$result[1]="Server rejected address";
					return $result;
				} // end if(!ereg...)
					
			} else {
				$result[0] = false;
				$result[1] = "No response from server";
				return $result;
			} // End if (ereg....)
				
    } else {
			$result[0]=false;
			$result[1]="Can not connect to E-Mail server:  $ConnectAddress";
			$result[2] = "Error No:  " . $errno;
			$result[3] = "Error String:  " . $errstr;
			return $result;
    } // End if ($Connect...)

//		if (!mail($Email,"Validation","Online Vote Email Address Validation","From: jarnold@2k3technologies.com")) {
//			$result[0] = false;
//			$result[1] = "Mail Not Accepted for Delivery.";
//			return $result;
//		}

		//	Step 5 -- Return the results
    $result[0]=true;
    $result[1]="$Email appears to be valid.";
		
    return $result;
	} // end of function

	$email = 	trim(utf8_decode($_POST['emailaddy']));
	$results = validateMail($email);
	print("Result Value:  " . $results[0] . "<br />\n");
	print("Result Message:  " . $results[1] . "<br />\n");
	print("Result Error No:  " . $results[2] . "<br />\n");
	print("Result Error Message:  " . $results[3] . "<br />\n");
?>
</body>
</html>
