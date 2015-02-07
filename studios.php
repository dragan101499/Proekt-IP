
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
		$("#registration").click(function () {
            registrationFields();
        });
    });

    function validEmail(v) {
        var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
        return (v.match(r) == null) ? false : true;
    }
	
	function registrationFields() {
        var ime = $("#imeStudio").val();
        var adresa = $("#adresa").val();
		var grad = $("#grad").val();
        adresa = adresa + " - " + grad;
		var tel = $("#telefonStudio").val();
        var mail = $("#mailStudio").val();
		var from = $("#from").val();
		var to = $("#to").val();
        var workTime = from + "-" + to; 
		var username = $("#username").val();
		var password = $("#password").val();
        var check = true;
        if (username == '') {
            check = false;
        }
		if (password == '') {
            check = false;
        }
		if (ime == '') {
            check = false;
        }
        if (adresa == '') {
            check = false;
        }
        if (tel == '') {
            check = false;
        }
        if (mail == '') {
            check = false;
        }
		if (from == '') {
            check = false;
        }
        if (to == '') {
            check = false;
        }
		if (grad == '') {
            check = false;
        }
        if (check) {
            check = validEmail(mail);
            if (check) {
                alert("Вашата регистрација е успешна!\nНајавете се за работа со системот за резервации");
                singup();
            } else {
                alert("Внесовте невалиден е-маил!");
            }
        } else {
            alert("Пополнете ги сите полиња!");
        }

        function singup() {
            $.ajax({
                url: "singup.php",
                type: 'POST',
                dataType: "json",
                data: {
					username: username,
					password: password,
                    ime: ime,
                    adresa: adresa,
                    tel: tel,
                    mail: mail,
                    workTime: workTime
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
      <h1>Полиња за регистрација</h1>
    <form name='form2' method='post'  action='singup.php'>
		<input name='username' type='text' id='username' placeholder='Корисничко име'/> <br />
        <input name='password' type='password' id='password' placeholder='Лозинка'/> <br />
        <input name='imeStudio' type='text' id='imeStudio' placeholder='Студио'/> <br />
        <input name='adresa' type='text' id='adresa' placeholder='Адреса'/> <br />
        <input name='grad' type='text' id='grad' placeholder='Град'/> <br />
        <input name='telefon' type='tel' id='telefonStudio' placeholder='Телефон'/> <br />
        <input name='mail' type='text' id='mailStudio' placeholder='E-mail'/> <br />
        <span>Работно време</span><input type="text" id="from" placeholder="Од"/><span> - </span><input type="text" id="to" placeholder="До"/>
	</form>
    <button id='registration'>Регистрирај се</button>
    <h1>Полиња за најавување</h1>
    <form name="form1" method="post" action="checklogin.php">
		<span>Корисничко име</span><input name="myusername" type="text" id="myusername"> <br />
		<span>Лозинка</span><input name="mypassword" type="password" id="mypassword"> <br />
		<input type="submit" name="Submit" value="Најави се" class="kopce najavise">
	</form>
      </div>
      </div>
	
	
</body>
</html>