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
<title>Добавление клиента</title>
</head>
<body>
<table  class="tb1">
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
Имя <input type="text" name="name" pattern="^[А-Яа-яЁё]+$" required><br><br>
Фамилия <input type="text" name="surname" pattern="^[А-Яа-яЁё]+$" required><br><br>
Номер <input type="text" name="number" placeholder="8-___-___-__-__" pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" maxlength='15' title="Формат ввода 8-xxx-xxx-xx-xx" required><br><br>
<input type="submit" value="Добавить" class="formbutton">
</form>
</div>
<?php
$name = "name";
$surname = "surname";
$number = "number";
if (isset($_POST['name']) && $_POST['name'] <> null)
{
$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения "); 
$cl_name = mysqli_real_escape_string($baza,strip_tags(trim($_POST['name']))) ;
$cl_surname = mysqli_real_escape_string($baza,strip_tags(trim($_POST['surname'])));
$cl_number = mysqli_real_escape_string($baza,strip_tags(trim($_POST['number'])));
 
$zapros=mysqli_query($baza,"INSERT INTO client ($name, $surname, $number) VALUES ('$cl_name','$cl_surname','$cl_number')") or die(mysqli_error($baza));
}
?>
</td>
</table>
</body>
</html>