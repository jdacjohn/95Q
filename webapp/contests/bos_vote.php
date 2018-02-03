<?php
	// Grab the vars from the form
	$bosVote = trim(utf8_decode($_POST['bosVote']));
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
	
	if ($bosVote == '' ) {
		header("Location:http:./band_vote_error.html");
	} else {
		$msg = "Entry: $bosVote\n\n" .
			"Entry received by $local_addr from remote client IP $remote_addr at $ts \n\n";
		
	
		mail($recipient,$subject,$msg,"From: 95Q.FM");
		$name = '';
		$hphone = '';
		$work = '';
		$wphone = '';
		$addr1 = '';
		$addr2 = '';
		$csz = '';
		$email = '';
		$comments = '';
	
		header("Location:http:./band_vote_confirm.html");
	}
	
?>