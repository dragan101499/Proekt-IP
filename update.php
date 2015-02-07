<?php

$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="registracija"; // Table name


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$con=mysqli_connect("$host","$username","$password","$db_name");

$studio=$_POST['studio'];

$studio = stripslashes($studio);
$studio = mysql_real_escape_string($studio);

$result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE ime='$studio'");
while($row = mysqli_fetch_array($result))
{
	$name = $row['ime'];
	$address = $row['adresa'];
	$telefon = $row['telefon'];
	$eMail = $row['mail'];
	$workTime = $row['workTime'];
}
$out = "$name,$address,$telefon,$eMail,$workTime";
echo json_encode ($out);

?>