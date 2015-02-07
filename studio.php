<?php

$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="registracija"; // Table name


session_start();
$con=mysqli_connect("$host","$username","$password","$db_name");


$id = $_SESSION['ID'];
$pass = $_SESSION['mypassword'];
$user = $_SESSION['myusername'];
$name = "";

$rez = mysqli_query($con,"SELECT * FROM $tbl_name WHERE username='$user'");
while($row = mysqli_fetch_array($rez))
  {
	  $name = $row['ime'];
  }
if(isset($_POST['button3'])) {
session_destroy();
redirect("index.html");
exit;
}

if(isset($_POST['button4'])) {
	if($pass== $_POST['password'])
	{
		$pass2=$_POST['password2'];
		$q2 = mysqli_query($con,"UPDATE $tbl_name SET password='$pass2' WHERE username='$user'");
		echo '<script>alert("Успешно променета лозинка")</script>';
	}
	else
	{
		echo '<script>alert("Грешка")</script>';
	}

}

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script>
$(document).ready(function() {
	var studio = $("#studio").text().split(" ");
	
	$("#clear").click(function() {
		$(this).next().remove();
	});
	
    $(".ne").click(function() {
		var element = $(this).parent("div");
		element = element.children().first();
		var ime = element.text();
		element = element.next();
		var prezime = element.text();
		element = element.next();
		var mail = element.text();
		element = element.next();
		var tel = element.text();
		element = element.next();
		var usluga = element.text();
		element = element.next();
		var datum = element.text();
		element = element.next();
		var sat = element.text();
		element = element.next();
		var kod = element.text();
		alert("Резервацијата на " + ime + " " + prezime + " со код " + kod + " е одбиена!");
		$.ajax({
                url: "delete.php",
                type: 'POST',
                dataType: "json",
                data: {
                    ime: ime,
                    prezime: prezime,
                    mail: mail,
					kod : kod,
                    studio : studio[1],
					flag: "ne"
                },
                success: function (data) {
                    console(data);
                }
            });
		$(this).parent("div").hide();
	});
	
	$(".da").click(function() {
		var element = $(this).parent("div");
		element = element.children().first();
		var ime = element.text();
		element = element.next();
		var prezime = element.text();
		element = element.next();
		var mail = element.text();
		element = element.next();
		var tel = element.text();
		element = element.next();
		var usluga = element.text();
		element = element.next();
		var datum = element.text();
		element = element.next();
		var sat = element.text();
		element = element.next();
		var kod = element.text();
		$("#odobreni").append("<p>Резервацијата на " + ime + " " + prezime + " со код " + kod + " е одобрена! <br> Тел: " + tel + "<br> Маил: " + mail + " <br> Услуга: " + usluga + " <br> Датум: " + datum + " <br> Сат: " + sat + "</p>");
		$.ajax({
                url: "delete.php",
                type: 'POST',
                dataType: "json",
                data: {
                    ime: ime,
                    prezime: prezime,
                    mail: mail,
					kod : kod,
                    studio : studio[1],
					flag : "da"
                },
                success: function (data) {
                    console(data);
                }
            });
		$(this).parent("div").hide();
	});
	
});
</script>
</head>

<body>
	<h1 id="studio">ДОБРЕДОЈДОВТЕ <?php echo $name ?></h1>
    <h2 class="margina50">Промени ја лозинката</h2>
    <form name="form" method="post" class="margina50">
    	<input type="password" name="password" placeholder="Стара лозинка"/>
        <input type="password" name="password2" placeholder="Нова лозинка"/> <br />
		<input type="submit" name="button4" value="Промени" class="kopce margina15" />
	</form>    
    
    <form name="form" method="post">

		<input type="submit" name="button3" value="Одјави се" class="kopce odjavise" />
	</form> 
    <h2>Одобрени резервации</h2>
    <div id="odobreni">
    	<button id="clear">Избриши следен</button>
    </div>
    <h2>Резервации</h2>
	<?php
		$tbl_name2="rezervacija"; // Table name

		mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
		$con2=mysqli_connect("$host","$username","$password","$db_name");
		

		$result2 = mysqli_query($con2,"SELECT * FROM $tbl_name2");
		$i2=1;

		echo "<div>";
		while($row2 = mysqli_fetch_array($result2))
		{
			if($row2['studio'] == $name)
			{
				echo "<div>" . "<p class='ime'>" . $row2['ime'] . "</p><p class='prezime'>" . $row2['prezime'] . "</p><p 	class='mail'>" . $row2['mail'] . "</p><p class='tel'>" . $row2['telefon'] . "</p><p class='usluga'>" . $row2['usluga'] . "</p><p class='datum'>" . $row2['datum'] . "</p><p class='sat'>" . $row2['sat'] . "</p><p class='kod'>" . $row2['kod'] . "</p>";
				echo "<button class='da'>ДА</button><button class='ne'>НЕ</button><button class='pristigna' style='display:none'>Пристигна</button></div>";
				$i2++;
			}
		}
		echo "</div>";
	?>
    
</div>

</div>

</body>
</html>