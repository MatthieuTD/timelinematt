<?php
/*
$db_host = "matthieuentholot.mysql.db";
$db_name = "matthieuentholot";
$db_user = "matthieuentholot";
$db_pass = "Td3112199M";
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

*/

$db_host = "localhost";
$db_name = "BDD_timeline";
$db_user = "root";
$db_pass = "root";
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>