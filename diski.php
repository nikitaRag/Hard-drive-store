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
<title>Диски</title>
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
<tr bgcolor="#e8eaed"><th>№</th> <th>Наименование</th> <th>Тип</th> <th>Форм-фактор(дюйм)</th><th>Размер(ГБ)</th><th>Скорость(МБ/с)</th><th>RPM</th><th>Цена</th></tr>
<?php
$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения "); 
$zapros=mysqli_query($baza,"SELECT * FROM hd") or die(mysqli_error($baza));
while ($r = mysqli_fetch_object($zapros))
{
	echo '<tr class="row"><td>'. $r->hd_id ."</td><td>". $r->hdname ."</td><td>". $r->type ."</td><td>". $r->formfactor ."</td><td>". $r->size ."</td><td>". $r->speed ."</td><td>". $r->rpm ."</td><td>". $r->price . "</td></tr>";
}
?>
</table>
</td>
</table>
</body>

</html>