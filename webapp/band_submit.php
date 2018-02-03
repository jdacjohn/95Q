<?php
	// Grab the vars from the form
	$bname = trim(utf8_decode($_POST['ename']));
	$hphone = trim(utf8_decode($_POST['hphone']));
	$cname = trim(utf8_decode($_POST['cname']));
	$wphone = trim(utf8_decode($_POST['wphone']));
	$addr1 = stripslashes(trim(utf8_decode($_POST['addr1'])));
	$addr2 = stripslashes(trim(utf8_decode($_POST['addr2'])));
	$csz = trim(utf8_decode($_POST['csz']));
	$dob = trim(utf8_decode($_POST['dob']));
	$email = stripslashes(trim(utf8_decode($_POST['email'])));
	$comments = stripslashes(trim(utf8_decode($_POST['comments'])));
	$formTo = $_POST['formTo'];
	
	$recipient = '';
	// Check for form-based mail recips
	if ($formTo == '') {
		$recipient = "richarddoud@doudmediagroup.com";
		//$recipient = "jarnold@2k3technologies.com";
	} else {
		$recipient = $formTo;
	}
		
	$subject = $_POST['subject'];
	$app_date = date("d/m/Y g:i a");
	$ts = date("r");
	$remote_addr = $_SERVER['REMOTE_ADDR'];
	$local_addr = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	
	if ($bname == '' || $cname == '' || $hphone == '' || $wphone == '' || $email == '' || $dob == '') {
		header("Location:http:./band_submit_error.html");
	} else {
		$msg = "Entrant Information:\n" .
			"Band Name:  $bname \n" .
			"Contact Name:  $cname \n" .
			"Work Phone:  $wphone \n" .
			"Home Phone:  $hphone \n" .
			"Address 1:  $addr1 \n" .
			"Address 2:  $addr2 \n" .
			"City, State, Zip:  $csz \n" .
			"Date of Birth: $dob \n" .
			"Email:  $email\n\nComments:\n$comments\n\n\n" .
			"Entry received by $local_addr from remote client IP $remote_addr at $ts \n\n";
		
	
		mail($recipient,$subject,$msg,"From: $name <$email>");
		$name = '';
		$hphone = '';
		$work = '';
		$wphone = '';
		$addr1 = '';
		$addr2 = '';
		$csz = '';
		$email = '';
		$comments = '';
	
		header("Location:http:./band_submit_confirm.html");
	}
	
?>