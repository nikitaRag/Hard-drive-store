<html>
<head>
<meta content=text/html; charset="UTF-8" http-equiv="content type">
<title>Регистрация</title>
</head>
<body bgcolor="#FFFF56">
<center><font size="15" color="#333333" >Жесткие диски</font></center>
<center><hl>Регистрация</hl></center>
<form method = "post">
<p align=center>Введите логин: <input type="text" name="newlogin" required/></p>
<p align=center>Введите пароль:<input type="text" name="newpassword" required/></p>
<p align=center><input type="submit" name="pass" type="submit" value="Зарегестрироваться"></p>
<p align=center><input type="button" value="Вернуться назад" onClick='location.href="index.php"' ></p>
</form>
<?php
if (isset ($_POST['newlogin']) && ($_POST['newpassword']))
{
	$baza = mysqli_connect(/*'localhost','root','','users'*/'mysql.hostinger.co.uk','u321872113_user','123456789','u321872113_users') or die("Ошибка соединения!");
	$login = mysqli_real_escape_string($baza,strip_tags(trim($_POST['newlogin'])));
	$proverka = mysqli_query($baza,"SELECT login FROM users") or die(mysqli_error($baza));
	$arr = mysqli_fetch_array($proverka);
	$flag = true;
	do
	{
		if ($login == $arr['login'])
		{
			echo "<p align=center>Такой логин уже существует. Выберете другой логин</p>";
			$flag = false;
			break;
		}
	}while ($arr = mysqli_fetch_array($proverka));
	function GenerateSalt($n=5)
{
    $key='';
    $pattern='1234567890abcdefghijklmnopqrstuvwxyz.,*_-=+';
    $counter = strlen($pattern)-1;
    for ($i=0; $i<$n; $i++)
    {
        $key .= $pattern{rand(0,$counter)};
    }
    return $key;
}
if ($flag==true)
{
	$salt = GenerateSalt();
	$hash_password = md5(md5($_POST['newpassword']). $salt);
	$zapros = mysqli_query($baza,"INSERT users(login,password,salt) VALUES ('$login','$hash_password','$salt')") or die(mysqli_error($baza));
	echo "<p align=center>Регистрация прошла успешно!</p>";
}
}
?>
</body>
</html>