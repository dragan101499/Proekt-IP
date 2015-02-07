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
		$("#datum").datepicker();
		$("#datum").datepicker( "option", "dateFormat", "dd/mm/yy");
		
        $("#reservation").click(function () {
            validateFealds();
        });
		
    });

    function validEmail(v) {
        var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
        return (v.match(r) == null) ? false : true;
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function validateFealds() {
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var mail = $("#mail").val();
        var tel = $("#telefon").val();
		var usluga = $("#usluga").val();
        var sat = $("#sat :selected").text();
        var datum = $("#datum").val();
		var studio = $("#studio :selected").text();
        var kod = getRandomInt(100000000, 999999999);
        var check = true;
        if (ime == '') {
            check = false;
        }
        if (prezime == '') {
            check = false;
        }
        if (mail == '') {
            check = false;
        }
        if (tel == '') {
            check = false;
        }
		if (usluga == '') {
            check = false;
        }
        if (sat == '') {
            check = false;
        }
        if (datum == '') {
            check = false;
        }
        if (check) {
            check = validEmail(mail);
            if (check) {
				alert("Вашата резервација е испратена!\nЧекајте одговор на е-маил!\nЗапишете го следниот код за потврда!\nКод: " + kod);
				dodadi();
				$("#ime").val() ="";
        		$("#prezime").val() ="";
        		$("#mail").val() ="";
        		$("#telefon").val() ="";
				$("#usluga").val() ="";
        		$("#datum").val() ="";
            } else {
                alert("Внесовте невалиден е-маил!");
            }
        } else {
            alert("Пополнете ги сите полиња!");
        }
		
        function dodadi() {
            $.ajax({
                url: "dodadi.php",
                type: 'POST',
                dataType: "json",
                data: {
                    ime: ime,
                    prezime: prezime,
                    mail: mail,
                    tel: tel,
					usluga: usluga,
                    sat: sat,
                    datum: datum,
                    kod: kod,
                    studio: studio
                },
                success: function (data) {
                    console(data);
                }
            });
        }

    }
	

    
	
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
    	<form name='form1' method='post'  action='dodadi.php'>
		<input name='ime' type='text' id='ime' placeholder='Име'/> <br />
        <input name='prezime' type='text' id='prezime' placeholder='Презиме'/> <br />
        <input name='mail' type='text' id='mail' placeholder='E-mail'/> <br />
        <input name='telefon' type='text' id='telefon' placeholder='Телефон'/> <br />
        <input name='usluga' type='text' id='usluga' placeholder='Услуга'/> <br />
        <input name='datum' type='text' id='datum' placeholder='Датум'/> <br />
        <span>Саат</span>
        <select id="sat">
        	<option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
        </select> <br />
        <span>Студио</span>
        <select id="studio">
        <?php
        	$result = mysqli_query($con,"SELECT * FROM registracija");
			while($row = mysqli_fetch_array($result))
			{
				echo "<option value='" .$row['ime'] . "'>" .$row['ime'] . "</option>";
			}
		?>
        </select>
	</form>
    <button id='reservation'>Резервирај</button>
	</div>
    </div>
	
</body>
</html>