<?php
$dsn = "mysql:host=tkck4yllxdrw0bhi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=epvb41dt1c7vwit9";
$username = 'agv597ik8396y83q';
$password = 'djvybmxnhu3q9fvl';

try {
$db = new PDO($dsn, $username, $password);

} catch (PDOException $e){
$error_message = "Database Error: ";
$error_message .= $e->getMessage();
include('view/error.php');
exit();
}
