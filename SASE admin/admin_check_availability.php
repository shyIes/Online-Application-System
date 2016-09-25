<?php
$username= mysql_real_escape_string($_REQUEST["username"]);
$con = mysql_connect('localhost','root','root');

if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

else
{
    $db_selected = mysql_select_db("sase_admin", $con);
    if (!$db_selected) {
        die ('Can\'t use DB : ' . mysql_error());
    }
    $query = "SELECT email FROM admin WHERE email = '" . $username . "'";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    $num = mysql_num_rows($result);
    echo $num;
}
mysql_close();
?>
