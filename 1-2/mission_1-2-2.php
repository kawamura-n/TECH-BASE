<?php

$message = "HELLO,JAPAN";
$filename = "mission_1-2-2.txt";

$fp = fopen($filename ,"w");
fwrite( $fp ,  $message );
fclose( $fp );

?>