<?php
	// Grab the vars from the form
	$eid = trim(utf8_decode($_POST['entrant']));
	$status = trim(utf8_decode($_POST['newstatus']));
	
	include("../../db/conn95q.php");
	//connect to db server
	$dbconn=mysql_connect("$strServer","$strUser","$strPwd") or die("Could not connect to " . $strServer . "  " . mysql_error());
	if (!empty($dbconn)) {	

		// select the database
		$dbinst=mysql_select_db("$strDatabase",$dbconn) or die("Coud not connect to Database " . $strDatabase);
	
		if ($dbinst) {		
			$stmt = "update entrant set userdef_2 = $status where e_id = $eid";
			$qRes = mysql_query($stmt,$dbconn);
		}	
		mysql_close($dbconn);
	}
	header("Location:http:../roty_vote.php");
	
?>