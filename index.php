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
<p align=center>Логин: <input type="text" name="login" required/></p>
<p align=center>Пароль:<input type="password" name="password" required/></p>
<p align=center><input type="submit" name="pass" type="submit" value="Войти"></p>
<p align=center><input type="button" value="Зарегестрироваться" onClick='location.href="registration.php"'></p>
</form>
<?php
if (!empty($_POST['login']))
{
	$baza = mysqli_connect(/*'localhost','root','','users'*/'mysql.hostinger.co.uk','u321872113_user','123456789','u321872113_users') or die("Соединение не установлено!");
	$login = mysqli_real_escape_string($baza,strip_tags(trim($_POST['login'])));
	$sql = mysqli_query($baza,"SELECT salt FROM users WHERE login = '{$login}'") or die(mysqli_error($baza));
	$zapros = mysqli_query($baza,"SELECT login, password FROM users") or die(mysqli_error($baza));
	$ar = mysqli_fetch_array($zapros);
	if (mysqli_num_rows($sql)==1)
	{
		$row = mysqli_fetch_assoc($sql);
		$salt = $row['salt'];
		$password = md5(md5($_POST['password']). $salt);
	do 
	{
		$a=true;
		if ($login == $ar['login'] && $password == $ar['password'])
		{
			header('location: main.php');
		    $a=false;
			$_SESSION['Name'] = $login;
		}
	}while($ar = mysqli_fetch_array($zapros));
If ($a = True) 
{
	echo "<p align=center>Неверный пароль, введите данные повторно</p>";
}
}else
	echo "<p align=center>Неверный логин</p>";
}
?>
</body>
</html>