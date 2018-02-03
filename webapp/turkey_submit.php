<?php
	// Grab the vars from the form
	$name = trim(utf8_decode($_POST['ename']));
	$hphone = trim(utf8_decode($_POST['hphone']));
	$work = trim(utf8_decode($_POST['work']));
	$wphone = trim(utf8_decode($_POST['wphone']));
	$addr1 = stripslashes(trim(utf8_decode($_POST['addr1'])));
	$addr2 = stripslashes(trim(utf8_decode($_POST['addr2'])));
	$csz = trim(utf8_decode($_POST['csz']));
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
	
	if ($n_name == '' || $n_age == '' || $n_phone == '' || $reason == '' || t_name == '' || t_age == '' || t_phone == '') {
		header("Location:http:./turkey_error.html");
	} else {
		$msg = "Entrant Information:\n" .
			"Person Nominating the Turkey:  $n_name \n" .
			"Nominator Phone:  $n_phone \n" .
			"Nominator Age:  $n_age \n" .
			"Turkey's Name:  $t_name \n" .
			"Turkey's Phone:  $t_phone \n" .
			"Turkey's Age:  $t_age \n" .
			"\nReason for Nominating this Person:\n$reason";
		
	
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
	
		header("Location:http:./contest_confirm.html");
	}
	
?>