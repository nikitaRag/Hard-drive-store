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
<meta content=text/html; charset="UTF-8" http-equiv="content type">
<link type="text/css" rel="stylesheet" href="css1.css">
<title>Заказы</title>
</head>
<body>
<table class="tb1">
<tr>
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
<td class="d2" valign="top">
<table class="tb2">
<tr bgcolor="#e8eaed"><th>Имя</th> <th>Фамилия</th> <th>Товар</th> <th>Дата</th></tr>
<?php
$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения "); 
$zapros=mysqli_query($baza,"SELECT * FROM purchase ORDER BY pur_date") or die(mysqli_error($baza));
while ($r = mysqli_fetch_object($zapros))
{
	echo '<tr class="row"><td>'. $r->client_name."</td><td>". $r->client_surname."</td><td>". $r->hd_name."</td><td>". $r->pur_date. "</td></tr>";
}
?>
</table>
</td>
</table>
</body>
</html>