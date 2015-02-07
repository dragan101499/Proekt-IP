<?php

$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="registracija"; // Table name

// Connect to server and select databse.
session_start();
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$con=mysqli_connect("$host","$username","$password","$db_name");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$con=mysqli_connect("$host","$username","$password","$db_name");
$rez2 = mysqli_query($con,"SELECT ID FROM $tbl_name WHERE username='$myusername' and password='$mypassword'");
while($row2 = mysqli_fetch_array($rez2))
  {
  settype($row2['ID'], "int");
  $id = $row2['ID'];
  }
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $_POST['myusername'];
$_SESSION['mypassword'] = $_POST['mypassword'];
$_SESSION['ID'] = $id;

header("location: studio.php");
	
}
else {
	echo "<script>alert('Wrong username or password')</script>";
	redirect("index.html");
}

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

?>