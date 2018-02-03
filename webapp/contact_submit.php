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
	
	$recipient = "richarddoud@doudmediagroup.com,kidcruzlive@gmail.com,jarnold@2k3technologies.com";
	//$recipient = "jarnold@2k3technologies.com";
	$subject = $_POST['subject'];
	
	if ($name == '' || $hphone == '' || $wphone == '' || $email == '') {
		header("Location:http:./contact_error.html");
	} else {
		$msg = "Entrant Information:\n" .
			"Name:  $name \n" .
			"Home Phone:  $hphone \n" .
			"Work Phone:  $wphone \n" .
			"Work:  $work \n" .
			"Address 1:  $addr1 \n" .
			"Address 2:  $addr2 \n" .
			"City, State, Zip:  $csz \n" .
			"Email:  $email \n\nComments:\n\n$comments";
	
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
		$msg = '';
		
	
		header("Location:http:./contact_confirm.html");
	}
	
?>