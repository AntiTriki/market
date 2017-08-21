<?php
$regId="eyiUvzKEr08:APA91bEt0FK1JuymzHRpfSN6WhXsS6n1stlYrJ58gEDGhXCyNA8iEZcyTYy_rTr9Ld8wsnaNAJTUR4CJISxMUAAb_1Cjm482fowLM4iQcIzLiH72Pug4JChdUhF53y3HdIcZNlP7b4Wp";
$msg="Notificaciones Silvana";
$message = array("message" => $msg);
$regArray[]=$regId;
//$url = 'https://android.googleapis.com/gcm/send';
$url = "https://fcm.googleapis.com/fcm/send/";

$fields = array('registration_ids' => $regArray, 'data' => $message,);
$headers = array( 'Authorization:key=AIzaSyBNNo-vzF2rWbGSZS2nZTNbbTHPJpzSlPY','Content-Type: application/json');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

$result=curl_exec($ch);
echo $result; 
if($result==FALSE)
{
    die('Curl Failed');
}
curl_close($ch);

/*
include_once("../../l_cxn/config.php");
$link = mysql_connect($server,$dbuser,$dbpass);
mysql_select_db($database);
//define( 'API_ACCESS_KEY','AIzaSyDIv0TBMTPrpOPJfLagVOEnTvwCyT0rGyA');
//define( 'API_ACCESS_KEY','AIzaSyCiuXqn-wW_mdpoRivfzOgMTyogChANW9E');
define( 'API_ACCESS_KEY','AIzaSyBBh4ddPa96rQQNxqiq_qQj7sq1JdsNQUQ');
//TEMPORAL
$cons = "SELECT   gcm.deviceID,gcm.id_usuario,p.id_publicidad
				  FROM gcm_users gcm,member m, empresas_favoritas ef, publicidad p,departamento d
				  WHERE gcm.id_usuario = m.member_id
				  AND m.member_id = ef.id_usuario
				  AND ef.id_empresa = p.id_empresa
                  AND d.id_departamento = m.id_ciudad_residencia
				  AND p.fecha_inicio = DATE_FORMAT(NOW(),'%Y-%m-%d')
                  AND (DATE_FORMAT(NOW(),'%Y') - m.ano_nacimiento) between p.rango_1 and p.rango_2
                  AND p.perfil LIKE CONCAT('%',m.perfil, '%')
                  AND p.sentimental LIKE CONCAT('%',m.estado_sentimental, '%')
                  AND p.array_ciudades LIKE CONCAT('%',d.departamento, '%')
                  AND p.aprobado = 1
                  AND p.activo = 1
				  AND DATE_FORMAT(p.hora_inicio,'%H:%i') = DATE_FORMAT(NOW(),'%H:%i')
				  
				  ";

$result = mysql_query($cons,$link) or die("Error en consulta <br>MySQL dice: ".mysql_error());
$totalRows_consulta = mysql_num_rows($result);

if ($totalRows_consulta > 0)
{
			
			$registrationIds = array();
			while($row = mysql_fetch_array($result))
			{
			$ins_ofer = "INSERT INTO mis_ofertas (id_usuario,id_publicidad) VALUES (".$row['id_usuario'].",".$row['id_publicidad'].")";
			mysql_query($ins_ofer,$link) or die("Error en consulta <br>MySQL dice: ".mysql_error());
			
			
			$registrationIds[] = ''.$row['deviceID'].'';
			//Edited - added semicolon at the End of line.1st and 4th(prev) line
			}
 
			
			 // prep the bundle
			$msg = array
			(
				'score' 	=> '5x1',
				'time'		=> '15:10'
			);
			
			$fields = array
			(
				//'registration_ids' 	=> $registrationIds
				'registration_ids' 	=> $registrationIds
			);
			 
			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json',
				
				  
			);
			
			$url = "https://fcm.googleapis.com/fcm/send/".$row['deviceID'];
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, $url );
			//curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send'  );
			//curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			
			echo $result;
}
else
{
echo 'no hay mensajes a quien enviar. Hora lectura: '.date('H:i:s');
}
if( gettype($link) == "resource") {mysql_close($link);}
*/
?>