<?php

$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="registracija"; // Table name


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$con=mysqli_connect("$host","$username","$password","$db_name");


$username=$_POST['username'];
$password=$_POST['password'];
$ime=$_POST['ime'];
$adresa=$_POST['adresa'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$workTime=$_POST['workTime'];


$username = stripslashes($username);
$password = stripslashes($password);
$ime = stripslashes($ime);
$adresa = stripslashes($adresa);
$tel = stripslashes($tel);
$mail = stripslashes($mail);
$workTime = stripslashes($workTime);

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$ime = mysql_real_escape_string($ime);
$adresa = mysql_real_escape_string($adresa);
$tel = mysql_real_escape_string($tel);
$mail = mysql_real_escape_string($mail);
$workTime = mysql_real_escape_string($workTime);


$sql="INSERT INTO registracija (ime, adresa, telefon, mail, workTime, username, password)VALUES('$ime', '$adresa','$tel','$mail','$workTime','$username','$password')";
$result=mysql_query($sql);

if($result){
	return true;
	} else {
	return false;
}


mysqli_close($con);
?>