
<?php
$serverName = "10.0.1.65\DEV"; 
$connectionInfo = array( "Database"=>"SIMKatmawa", "UID"=>"simkatmawa", "PWD"=>"lpka#umy#2020");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}?>