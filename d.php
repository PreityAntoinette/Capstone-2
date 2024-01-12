<?php
 $ch = curl_init();
 $message = "Hello , a customer set a schedule. ";
 

 $parameters = array(
     'apikey' => '83786e0699022b9f6163e96e81c154ca', //Your API KEY
     'number' => '9271234570',
     'message' => $message,
 );
 curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
 curl_setopt( $ch, CURLOPT_POST, 1 );

 curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

 // enable this if using localhost, if hosting then comment out
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


 curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
 curl_exec( $ch );
 ?>