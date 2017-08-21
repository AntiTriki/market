<?php
include_once('conexion.php');
$cxn = new mysqli($mysql_host, $mysql_user, $mysql_password, $my_database);


echo "INICIO  </br>";
$device1 = $_GET['d1'];
$device2 = $_GET['d2'];

echo "a.- $device1, $device2, $id_usuario </br>";
if ($device1 == NULL)
{
	$query_user = sprintf('DELETE FROM users WHERE gcm_registration_id = "'.$device2.'"');

echo "b.- $delete_device </br>";
$result_user = mysqli_query($cxn,$query_user) or die("Error usuario:".mysqli_error($cxn));
echo 'Notificaciones deshabilitadas.';
}
elseif (!empty($device1) && !empty($device2))
{
$query_user = sprintf('INSERT into users (gcm_registration_id) values ("'.$device1.'")');
echo "c.- $insert_device </br>";
$result_user = mysqli_query($cxn,$query_user) or die("Error usuario:".mysqli_error($cxn));
echo 'Notificaciones habilitadas.';
}


$cxn->close();
?>
