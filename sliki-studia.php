<?php 
$host="fdb6.awardspace.net"; // Host name
$username="1446598_studio"; // Mysql username
$password="riste86718671"; // Mysql password
$db_name="1446598_studio"; // Database name
$tbl_name="registracija"; // Table name


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$con=mysqli_connect("$host","$username","$password","$db_name");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>HD Monochrome by Bryant Smith</title>
<link type="text/css" rel="stylesheet" href="js/jquery-ui.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
		$("#studio2").change(function() {
			var studio = $("#studio2 :selected").text();
			if(studio != "Изберете студио") {
				$.ajax({
                url: "update.php",
                type: 'POST',
                dataType: "json",
                data: {
                    studio : studio
                },
                success: function (data) {
					var out =  data;
					out = out.split(",");
					$("#selectedStudio").text(out[0]);
					$("#selectedAdress").text(out[1]);
					$("#selectedTel").text(out[2]);
					$("#selectedMail").text(out[3]);
					$("#selectedWorkTime").text(out[4]);
                }
            });
			}
		});
    });

</script>
</head>

<body>
    <div id="page">
        <div class="topNaviagationLink" style="margin-left:-50px"><a href="index.html">Почетна</a></div>
        <div class="topNaviagationLink" style="margin-left:-40px"><a href="vtora.php">Резервирај</a></div>
        <div class="topNaviagationLink" style="margin-left:+40px"><a href="studios.php">Најави се како студио</a></div>
        <div class="topNaviagationLink" style="margin-left:+20px"><a href="sliki-studia.php">Погледни галерија</a></div>
	  
	</div>
    <div id="mainPicture">
    	<div class="picture">
        	<div id="headerTitle">Најди фризер</div>
            
        </div>
    </div>
	  <div class="contentBox">
      <div class="innerBox">
      	<h1>Дополнително инфо за одбрано студио</h1>
    <span>Студио</span>
        <select id="studio2">
        <option>Изберете студио</option>
        <?php
        	$result2 = mysqli_query($con,"SELECT * FROM registracija");
			while($row2 = mysqli_fetch_array($result2))
			{
				echo "<option value='" .$row2['ime'] . "'>" .$row2['ime'] . "</option>";
			}
		?>
        </select>
        
        <h1 id="selectedStudio">&nbsp;</h1>
        <span>Adresa: </span><p id="selectedAdress">&nbsp;</p>
        <span>Telefon: </span><p id="selectedTel">&nbsp;</p>
        <span>E-mail: </span><p id="selectedMail">&nbsp;</p>
        <span>Rabotno vreme: </span><p id="selectedWorkTime">&nbsp;</p>
      </div>
      </div>
	
</body>
</html>