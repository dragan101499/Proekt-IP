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
$kod=$_POST['kod'];
$studio=$_POST['studio'];
$flag=$_POST['flag'];

if($flag == "ne") {
	mail($mail,"Најди фризер","Вашата резервација е одбиена!");
} else {
	mail($mail,"Најди фризер","Вашата резервација е одобрена!");
}


$ime = stripslashes($ime);
$prezime = stripslashes($prezime);
$mail = stripslashes($mail);
$kod = stripslashes($kod);
$studio = stripslashes($studio);
$ime = mysql_real_escape_string($ime);
$prezime = mysql_real_escape_string($prezime);
$mail = mysql_real_escape_string($mail);
$kod = mysql_real_escape_string($kod);
$studio = mysql_real_escape_string($studio);

$sql="DELETE FROM $tbl_name WHERE ime='$ime' AND prezime='$prezime' AND mail='$mail' AND kod='$kod' AND studio='$studio'";
$result=mysql_query($sql);


mysqli_close($con);
?>