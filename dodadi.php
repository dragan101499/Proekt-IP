<?php

$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="rezervacija"; // Table name


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$con=mysqli_connect("$host","$username","$password","$db_name");


$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$usluga=$_POST['usluga'];
$sat=$_POST['sat'];
$datum=$_POST['datum'];
$kod=$_POST['kod'];
$studio=$_POST['studio'];


$ime = stripslashes($ime);
$prezime = stripslashes($prezime);
$mail = stripslashes($mail);
$tel = stripslashes($tel);
$usluga = stripslashes($usluga);
$sat = stripslashes($sat);
$datum = stripslashes($datum);
$kod = stripslashes($kod);
$studio = stripslashes($studio);
$ime = mysql_real_escape_string($ime);
$prezime = mysql_real_escape_string($prezime);
$mail = mysql_real_escape_string($mail);
$tel = mysql_real_escape_string($tel);
$usluga = mysql_real_escape_string($usluga);
$sat = mysql_real_escape_string($sat);
$datum = mysql_real_escape_string($datum);
$kod = mysql_real_escape_string($kod);
$studio = mysql_real_escape_string($studio);

$sql="INSERT INTO rezervacija (ime, prezime, mail, telefon, sat, datum, kod, studio, usluga)VALUES('$ime', '$prezime', '$mail','$tel','$sat','$datum','$kod','$studio','$usluga')";
$result=mysql_query($sql);

if($result){
	return true;
	} else {
	return false;
}


mysqli_close($con);
?>