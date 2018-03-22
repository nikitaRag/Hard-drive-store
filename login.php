<?php
session_start();
?>
<html>
<head>
<meta content=text/html; charset="UTF-8" http-equiv="content type">
<title>Вход в систему</title>
</head>
<body bgcolor="#FFFF56">
<center><font size="15" color="#333333" >Жесткие диски</font></center>
<center><hl>ВХОД</hl></center>
<form method = "post">
<p align=center>Логин: <input type="text" name="login"/></p>
<p align=center>Пароль:<input type="password" name="password"/></p>
<p align=center><input type="submit" name="pass" type="submit" value="Войти"></p>
</form>
<?php
if (isset ($_POST['login']))
{
	$baza = mysqli_connect('mysql.hostinger.co.uk','u321872113_user','123456789','u321872113_users') or die("Соединение не установлено!");
	$zapros = mysqli_query($baza,"SELECT login, password FROM users GROUP BY id") or die(mysqli_error($baza));
	$ar = mysqli_fetch_array($zapros);
	do 
	{
		$a=true;
		if ($_POST['login'] == $ar['login'] && $_POST['password'] == $ar['password'])
		{
			header('location: main.php');
		    $a=false;
			$_SESSION['Name'] = $_POST['login'];
		}
	}while($ar = mysqli_fetch_array($zapros));
If ($a = True) 
{
	echo "Неверный логин или пароль (или и то и другое) - введите данные повторно ";
}
}
?>
<form>
<p align=center><input type="button" value="Зарегестрироваться" onClick='location.href="registration.php"'> </p>
</form>
</body>
</html>