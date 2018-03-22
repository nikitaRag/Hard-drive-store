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
<title>Заказать</title>
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
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
Имя клиента :
<select name="client_id">
<option disabled selected>Выберите клиента</option>
				<?php
				$baza = mysqli_connect(/*'localhost','root','','harddrives'*/"mysql.hostinger.co.uk","u321872113_nekit","123456789","u321872113_hd") OR DIE("Ошибка соединения ");
				$result3 = mysqli_query($baza,"SELECT * FROM client");
				while ($row3 = mysqli_fetch_object($result3))
				{
					echo '<option value="'. $row3->client_id . '">'. $row3->name .' '. $row3->surname .'</option>';
				}?>
</select><br>
Диск :
<select name="hd_idd">
<option disabled selected>Выберите диск</option>
				<?php
				$result = mysqli_query($baza,"SELECT * FROM hd");
				while ($row = mysqli_fetch_object($result)) 
					{
						echo '<option value="'.  $row->hd_id . '">' .$row->hdname . '</option>';
					}	
				?> 
</select><br>
Дата покупки :<input type="date" name="pur_date"><br>
<input type="submit" value="Добавить" class="formbutton">
</form>
</div>
<font size=5>
<?php
$client_id = "client_id";
$hd_id = "hd_id";
$client_name = "client_name";
$client_surname = "client_surname";
$hd_name = "hd_name";
$pur_date = "pur_date";
if (isset($_POST['pur_date']))
{
$id_cl = $_POST['client_id'];
$id_hd = $_POST['hd_idd'];
$result2 = mysqli_query($baza,"SELECT hdname FROM hd WHERE hd_id = '$id_hd'");
while ( $row2 = mysqli_fetch_object($result2))
	{
		$name_hd = $row2->hdname;
	}
$result4 = mysqli_query($baza,"SELECT name, surname FROM client WHERE client_id = '$id_cl'");
while ( $row4 = mysqli_fetch_object($result4))
{
	$cl_name = $row4->name;
	$cl_surname =$row4->surname;
}
$date = $_POST['pur_date'];

	
	if (isset($_POST['client_id']) && is_numeric($_POST['client_id']))
	{
		$zapros=mysqli_query($baza,"INSERT INTO purchase ($client_id, $hd_id, $client_name, $client_surname, $hd_name, $pur_date) VALUES ($id_cl,$id_hd,'$cl_name','$cl_surname','$name_hd','$date')") or die(mysqli_error($baza));
	}
	else
		echo "Введите правильные данные";
}
?>
</font>
</td>
</table>
</body>
</html>