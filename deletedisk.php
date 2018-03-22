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
<title>Удалить диск</title>
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
<td class="d2" valign="top">
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
<select name="i[]" multiple="multiple" size=10>
<?php 
$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения ");
$zapros= mysqli_query($baza,"SELECT * FROM hd");
while ($r = mysqli_fetch_object($zapros))
{
		echo '<option value="'.  $r->hd_id . '">'. $r->hdname .' '. $r->type .' '. $r->formfactor .' '. $r->size .' '. $r->speed .' '. $r->rpm .' '. $r->price .'</option>';
	}
echo '</select><br><input type="submit" value="Удалить" class="formbutton"/><INPUT TYPE="button" onClick="history.go(0)" VALUE="Обновить" class="formbutton"><br>';
if (isset ($_POST['i']))
{
	$i = $_POST['i'];
	foreach ($i as $t)
	{
		mysqli_query($baza,"DELETE FROM hd WHERE hd_id=$t") or die(mysqli_error($baza)); 
	}
}
?>
</td>
</table>
</body>
</html>