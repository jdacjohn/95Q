<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test to Hook 95Q to Contest DB</title>
</head>

<body>
<?php
// Contains DB Connect info.  Variables used below are declared in this file.
include("conn95q.php");
//connect to db server
$strDB=mysql_connect($strServer,$struser,$strPwd);
// select the database
$database=mysql_select_db("$strDatabase",$strDB);

// close db connection
mysql_close($strDB);
?>

</body>
</html>
