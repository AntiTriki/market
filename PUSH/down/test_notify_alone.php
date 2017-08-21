

<?php
$apiKey = 'AIzaSyBBh4ddPa96rQQNxqiq_qQj7sq1JdsNQUQ';
 
// Cabecera
$headers = array('Content-Type:application/json',
                 "Authorization:key=$apiKey");
 
// Datos
$payload = array('mensaje' => utf8_encode('Nueva oferta'),
                 'id' => '16044');
$registrationIdsArray = array('ezybrj4UKz8:APA91bHQn_BCJ3hqUigKU1FcUWu0evM5Ks_wCCYkFiw7XQBljLZ2nZXtzR-7mYVC4XtIeDZAbNd6rr1WgC1QQjJZOf1dNeW_70DjHAwPsV0Z2fZz9HzJOOSQ5tK6dP2N-BHqXkrvPkt0');
 
$data = array(
   'data' => $payload,
   'registration_ids' => $registrationIdsArray
);
 
// Petición
$ch = curl_init();
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send" );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));
 
// Conectamos y recuperamos la respuesta
$response = curl_exec($ch);
 
// Cerramos conexión
curl_close($ch);

?>