<?php
$con = mysql_connect('localhost','root','root');

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

else
{
	$db_selected = mysql_select_db("sase_student", $con);
}
if (!$db_selected) {
	die ('Can\'t use DB : ' . mysql_error());
}
?>