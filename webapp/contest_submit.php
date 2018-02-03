<?php
	// Grab the vars from the form
	$name = trim(utf8_decode($_POST['ename']));
	$hphone = trim(utf8_decode($_POST['hphone']));
	$work = trim(utf8_decode($_POST['work']));
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
	
	if ($name == '' || $hphone == '' || $wphone == '' || $email == '' || $dob == '') {
		header("Location:http:./contest_error.html");
	} else {
		$msg = "Entrant Information:\n" .
			"Name:  $name \n" .
			"Home Phone:  $hphone \n" .
			"Work Phone:  $wphone \n" .
			"Work:  $work \n" .
			"Address 1:  $addr1 \n" .
			"Address 2:  $addr2 \n" .
			"City, State, Zip:  $csz \n" .
			"Date of Birth: $dob \n" .
			"Email:  $email\n\nComments:\n$comments";
		
	
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