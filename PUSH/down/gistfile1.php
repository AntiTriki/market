<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyBBh4ddPa96rQQNxqiq_qQj7sq1JdsNQUQ' );


//$registrationIds = array( $_GET['id'] );
$registrationIds = array( 'f9nhMzwEKZk:APA91bHnJFmhJAdkQKXSWfaHA4tPGkte6j2lCQdHTnf8du5t60JVPWCMzXoKDOgVNQ-TDNhosP3KYhX4gkFtuPj23rMa1x5qHdu04zlhpsWcJs4BWhVJXOlw-tBGFrHp4sfzLtysSJWu','fVmYrwA0J0A:APA91bETGzfUVacLlI8j59g-dB1-e_7m-OwifrpkLzwRcxPyqaBvHz9yeTC6aEavP1GJfGnl04RwaeHoo3GrBx3dItTzIobzTZgYHbGN_r1NN0F1-vDJkWMJ-oBhgC8PjswAlmX0_7Mv' );
// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json',
	   
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;