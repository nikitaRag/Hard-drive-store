<?php
session_start();
    if (!isset($_SESSION['Name']))
    {
        echo 'ВЫ НЕ АВТОРИЗОВАНЫ!<br><a href="index.php">Авторизация</a>';
        exit;
    }
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css1.css">
<meta content=text/html; charset="UTF-8" http-equiv="content type">
<title>Добавить диск</title>
</head>
<body>
<table class="tb1">
<td class="d1">
<div class="dv">
<a href="clients.php"><div class="knopka">Клиeнты</div></a>
<a href="diski.php"><div class="knopka">Диски</div></a>
<a href="orders.php"><div class="knopka">Заказы</div></a>
<a href="addclient.php"><div class="knopka">Добавить клиента</div></a>
<a href="adddisk.php"><div class="knopka">Добавить диск</div></a>
<a href="addorder.php"><div class="knopka">Добавить заказ</div></a>
<a href="deletedisk.php"><div class="knopka">Удалить диск</div></a>
</div>
<a href="logout.php" class="ref"><div class="knopka">Выйти</div></a>
</td>
<td class="d2">
<div class="forma" align="right">
<form  method="post">
Название диска :<input type="text" name="hdname" pattern="^[a-zA-Z\s]+$" required><br>
Тип :<input type="text" name="type" pattern="^[a-zA-Z]+$" required><br>
Формфактор(дюйм) :<input type="text" name="formfactor" pattern="\d+(\.\d{1})?" required><br>
Размер(ГБ) :<input type="text" name="size" pattern="^[0-9]+$" required><br>
Скорость(МБ/с) :<input type="text" name="speed" pattern="^[0-9]+$" required><br>
RPM :<input type="text" name="rpm" pattern="^[0-9]+$" required><br>
Цена:<input type="text" name="price" pattern="^[0-9]+$" required><br><br>
<input type="submit" value="Добавить" class="formbutton">
</form>
</div>
<?php
$hdname = "hdname";
$type = "type";
$form = "formfactor";
$size = "size";
$speed = "speed";
$rpm = "rpm";
$price="price";
if (isset($_POST['hdname'],$_POST['type'],$_POST['formfactor'],$_POST['size'],$_POST['speed'],$_POST['rpm'],$_POST['price']))
{
$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения "); 
$hd_name = mysqli_real_escape_string($baza,strip_tags(trim($_POST['hdname'])));
$hd_type = mysqli_real_escape_string($baza,strip_tags(trim($_POST['type'])));
$hd_form = mysqli_real_escape_string($baza,strip_tags(trim($_POST['formfactor'])));
$hd_size = mysqli_real_escape_string($baza,strip_tags(trim($_POST['size'])));
$hd_speed = mysqli_real_escape_string($baza,strip_tags(trim($_POST['speed'])));
$hd_rpm = mysqli_real_escape_string($baza,strip_tags(trim($_POST['rpm'])));
$hd_price = mysqli_real_escape_string($baza,strip_tags(trim($_POST['price'])));

	
	if (is_numeric($_POST['size']) && is_numeric($_POST['speed']) && is_numeric($_POST['rpm']) && is_numeric($_POST['price']))
	{
		
		$zapros=mysqli_query($baza,"INSERT INTO hd ($hdname, $type, $form, $size, $speed, $rpm, $price) VALUES ('$hd_name','$hd_type','$hd_form',$hd_size,$hd_speed,$hd_rpm,$hd_price)") or die(mysqli_error($baza));

	}
	else
		echo "Введите правильные данные";
}
?>
</td>
</table>
</body>
</html>