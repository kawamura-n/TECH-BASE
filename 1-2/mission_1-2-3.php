<?php

$message = "HELLO,JAPAN";
$filename = "mission_1-2-3.txt";

$fp = fopen($filename ,"a");
fwrite( $fp ,  $message );
fclose( $fp );

?>