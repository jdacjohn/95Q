<?php
	// Grab the vars from the form
	// Name, Address, etc.
	$lastName = trim(utf8_decode($_POST['lastName']));
	$firstName = trim(utf8_decode($_POST['firstName']));
	$middleName = trim(utf8_decode($_POST['middleName']));
	$address = trim(utf8_decode($_POST['address']));
	$aptNumber = stripslashes(trim(utf8_decode($_POST['aptNumber'])));
	$city = stripslashes(trim(utf8_decode($_POST['city'])));
	$state = trim(utf8_decode($_POST['state']));
	$zipCode = stripslashes(trim(utf8_decode($_POST['zipCode'])));
	$phone = stripslashes(trim(utf8_decode($_POST['phone'])));
	$cellPhone = stripslashes(trim(utf8_decode($_POST['cellPhone'])));
	$email = stripslashes(trim(utf8_decode($_POST['email'])));
	
	$dateAvailable = trim(utf8_decode($_POST['dateAvailable']));
	$salary = stripslashes(trim(utf8_decode($_POST['salary'])));
	$priorEmployed = stripslashes(trim(utf8_decode($_POST['priorEmployee'])));
	$priorEmployDate = trim(utf8_decode($_POST['priorEmployDate']));
	$citizen = stripslashes(trim(utf8_decode($_POST['citizen'])));
	$empType = stripslashes(trim(utf8_decode($_POST['empType'])));
	$convict = stripslashes(trim(utf8_decode($_POST['convict'])));
	$convictDetails = stripslashes(trim(utf8_decode($_POST['convictDetails'])));
	
	// Education
	$highSchool = stripslashes(trim(utf8_decode($_POST['highSchool'])));
	$highSchoolYears = stripslashes(trim(utf8_decode($_POST['highSchoolYears'])));
	$hsGrad = stripslashes(trim(utf8_decode($_POST['hsGrad'])));
	$hsGPA = stripslashes(trim(utf8_decode($_POST['hsGPA'])));
	$college = stripslashes(trim(utf8_decode($_POST['college'])));
	$collegeYears = stripslashes(trim(utf8_decode($_POST['collegeYears'])));
	$collegeGrad = stripslashes(trim(utf8_decode($_POST['collegeGrad'])));
	$collegeGPA = stripslashes(trim(utf8_decode($_POST['collegeGPA'])));
	$collegeMajor = stripslashes(trim(utf8_decode($_POST['collegeMajor'])));
	$otherSchool = stripslashes(trim(utf8_decode($_POST['otherSchool'])));
	$otherSchoolYears = stripslashes(trim(utf8_decode($_POST['otherSchoolYears'])));
	$otherGrad = stripslashes(trim(utf8_decode($_POST['otherGrad'])));
	$otherGPA = stripslashes(trim(utf8_decode($_POST['otherGPA'])));
	$otherMajor = stripslashes(trim(utf8_decode($_POST['otherMajor'])));
	
	// Employment
	$contactOK = trim(utf8_decode($_POST['contactOK']));
	$emp1FromMo = stripslashes(trim(utf8_decode($_POST['emp1FromMonth'])));
	$emp1FromDay = stripslashes(trim(utf8_decode($_POST['emp1FromDay'])));
	$emp1FromYear = stripslashes(trim(utf8_decode($_POST['emp1FromYear'])));
	$emp1ToMo = stripslashes(trim(utf8_decode($_POST['emp1ToMo'])));
	$emp1ToDay = stripslashes(trim(utf8_decode($_POST['emp1ToDay'])));
	$emp1ToYear = stripslashes(trim(utf8_decode($_POST['emp1ToYear'])));
	$emp1Pos = stripslashes(trim(utf8_decode($_POST['emp1Pos'])));
	$emp1 = stripslashes(trim(utf8_decode($_POST['emp1'])));
	$emp1AC = stripslashes(trim(utf8_decode($_POST['emp1AC'])));
	$emp1prefix = stripslashes(trim(utf8_decode($_POST['emp1prefix'])));
	$emp1num = stripslashes(trim(utf8_decode($_POST['emp1num'])));
	$emp1Supervisor = stripslashes(trim(utf8_decode($_POST['emp1Supervisor'])));
	$emp1Responsibilities = stripslashes(trim(utf8_decode($_POST['emp1Responsibilities'])));
	$emp1LeftBecause = stripslashes(trim(utf8_decode($_POST['emp1LeftBecause'])));

	$emp2FromMo = stripslashes(trim(utf8_decode($_POST['emp2FromMonth'])));
	$emp2FromDay = stripslashes(trim(utf8_decode($_POST['emp2FromDay'])));
	$emp2FromYear = stripslashes(trim(utf8_decode($_POST['emp2FromYear'])));
	$emp2ToMo = stripslashes(trim(utf8_decode($_POST['emp2ToMo'])));
	$emp2ToDay = stripslashes(trim(utf8_decode($_POST['emp2ToDay'])));
	$emp2ToYear = stripslashes(trim(utf8_decode($_POST['emp2ToYear'])));
	$emp2Pos = stripslashes(trim(utf8_decode($_POST['emp2Pos'])));
	$emp2 = stripslashes(trim(utf8_decode($_POST['emp2'])));
	$emp2AC = stripslashes(trim(utf8_decode($_POST['emp2AC'])));
	$emp2prefix = stripslashes(trim(utf8_decode($_POST['emp2prefix'])));
	$emp2num = stripslashes(trim(utf8_decode($_POST['emp1FromMo'])));
	$emp2Supervisor = stripslashes(trim(utf8_decode($_POST['emp2num'])));
	$emp2Responsibilities = stripslashes(trim(utf8_decode($_POST['emp2Responsibilities'])));
	$emp2LeftBecause = stripslashes(trim(utf8_decode($_POST['emp2LeftBecause'])));
		
	// References
	$ref1Name = stripslashes(trim(utf8_decode($_POST['ref1Name'])));
	$ref1AC = stripslashes(trim(utf8_decode($_POST['ref1AC'])));
	$ref1prefix = stripslashes(trim(utf8_decode($_POST['ref1prefix'])));
	$ref1num = stripslashes(trim(utf8_decode($_POST['ref1num'])));
	$ref1Street = stripslashes(trim(utf8_decode($_POST['ref1Street'])));
	$ref1City = stripslashes(trim(utf8_decode($_POST['ref1City'])));
	$ref1State = stripslashes(trim(utf8_decode($_POST['ref1State'])));
	$ref1Zip = stripslashes(trim(utf8_decode($_POST['ref1Zip'])));
	
	$ref2Name = stripslashes(trim(utf8_decode($_POST['ref2Name'])));
	$ref2AC = stripslashes(trim(utf8_decode($_POST['ref2AC'])));
	$ref2prefix = stripslashes(trim(utf8_decode($_POST['ref2prefix'])));
	$ref2num = stripslashes(trim(utf8_decode($_POST['ref2num'])));
	$ref2Street = stripslashes(trim(utf8_decode($_POST['ref2Street'])));
	$ref2City = stripslashes(trim(utf8_decode($_POST['ref2City'])));
	$ref2State = stripslashes(trim(utf8_decode($_POST['ref2State'])));
	$ref2Zip = stripslashes(trim(utf8_decode($_POST['ref2Zip'])));

	$agree = stripslashes(trim(utf8_decode($_POST['agree'])));
		
	$recipient = '';
	// Check for form-based mail recips
	if ($formTo == '') {
		$recipient = "richarddoud@doudmediagroup.com,jarnold@2k3technologies.com";
		//$recipient = "jarnold@2k3technologies.com";
	} else {
		$recipient = $formTo;
	}
		
	$subject = $_POST['subject'];
	$app_date = date("d/m/Y g:i a");
	$ts = date("r");
	$remote_addr = $_SERVER['REMOTE_ADDR'];
	$local_addr = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	if ($lastName == '' || $firstName == '' || $phone == '' ) {
		header("Location:http:./e_app_error.html");
	} else {
		$msg = "Applicant Information:\n\n" .
			"Application Date:  $app_date  \n\n" .
			"OK TO CONTACT CURRENT EMPLOYER:  $contactOK \n\n" .
			"APPLICANT DATA\n" .
			"LAST NAME:  $lastName     FIRST NAME:  $firstName     MIDDLE NAME:  $middleName\n" .
			"STREET:     $address     APT:  $aptNumber\n" .			
			"CITY:       $city     STATE:  $state     ZIP:  $zipCode\n" .
			"PHONE:      $phone     CELL:  $cellPhone     EMAIL:  $email\n\n" .
			"DATE AVAILABLE:  $dateAvailable     REQUESTED SALARY:  $salary\n\n" .
			"PREVIOUSLY EMPLOYED BY DOUD MEDIA:  $priorEmployed     WHEN:  $priorEmployDate\n\n" .
			"UNITED STATES CITIZEN:  $citizen     EMPLOYMENT TYPE DESIRED:  $empType\n\n" .
			"CRIMINAL CONVICTION(S):  $convict\n" .
			"DETAILS:\n" .
			"$convictDetails\n\n\n" .
			"EDUCATION\n" .
			"HIGH SCHOOL:  $highSchool     YEARS:  $highSchoolYears     GRADUATE:  $hsGrad     GPA:  $hsGPA\n\n" .
			"COLLEGE:      $college     YEARS:  $collegeYears     GRADUATE:  $collegeGrad     GPA:  $collegeGPA\n" .
			"MAJOR:        $collegeMajor \n\n" .
			"OTHER SCHOOL: $otherSchool     YEARS:  $otherSchoolYears     GRADUATE:  $otherGrad     GPA:  $otherGPA\n" .
			"MAJOR:        $otherMajor \n\n\n" .
			"EMPLOYMENT\n" .
			"CURRENT OR MOST RECENT\n" .
			"DATES OF EMPLOYMENT:  FROM $emp1FromMo/$emp1FromDay/$emp1FromYear TO $emp1ToMo/$emp1ToDay/$emp1ToYear \n" .
			"POSITION:  $emp1Pos \n" .
			"FIRM/COMPANY:  $emp1 \n" .
			"PHONE:  ($emp1AC) $emp1prefix-$emp1num     SUPERVISOR:  $emp1Supervisor \n" .
			"RESPONSIBILITIES:\n" .
			"$emp1Responsibilities \n\n" .
			"REASON FOR LEAVING:\n" .
			"$emp1LeftBecause \n\n\n" .    
			"PREVIOUS EMPLOYER\n" .
			"DATES OF EMPLOYMENT:  FROM $emp2FromMo/$emp2FromDay/$emp2FromYear TO $emp2ToMo/$emp2ToDay/$emp2ToYear \n" .
			"POSITION:  $emp2Pos \n" .
			"FIRM/COMPANY:  $emp2 \n" .
			"PHONE:  ($emp2AC) $emp2prefix-$emp2num     SUPERVISOR:  $emp2Supervisor \n" .
			"RESPONSIBILITIES:\n" .
			"$emp2Responsibilities \n\n" .
			"REASON FOR LEAVING:\n" .
			"$emp2LeftBecause \n\n\n" .    
			"REFERENCES\n" .
			"NAME:  $ref1Name     PHONE:  ($ref1AC) $ref1prefix-$ref1num \n" .
			"ADDRESS:  $ref1Street     CITY:  $ref1City  STATE:  $ref1State  ZIP:  $ref1Zip \n\n" .
			"NAME:  $ref2Name     PHONE:  ($ref2AC) $ref2prefix-$ref2num \n" .
			"ADDRESS:  $ref2Street     CITY:  $ref2City  STATE:  $ref2State  ZIP:  $ref2Zip \n\n\n" .
			"I certify that my answers are true and complete to the best of my knowledge. I authorize you to make such \n" .
			"investigations and inquiries of my personal, employment, financial, or medical history and other related matters \n" .
			"as may be necessary for an employment decision. I hereby release employers, schools or persons from all liability \n" .
			"in responding to inquiries in connection with my application.\n\n" .
 			"In the event I am employed, I understand that false or misleading information given in my application or interview(s) \n" .
			"may result in discharge.\n\n" .
 			"Check here to indicate your acceptance of this certification.  CHECKED:  $agree \n\n\n" .
			"Application received by $local_addr from remote client IP $remote_addr at $ts \n\n";

		mail($recipient,$subject,$msg,"From: $firstName $lastName <$email>");
		header("Location:http:./e_app_confirm.html");
	}
	
?>