<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "gkms";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 

or die("Opps some thing went wrong - cannot connect yo your database");

mysql_select_db($mysql_database, $bd) or die("DB cannot found");

//$db_pdo= new PDO('mysql:host=localhost;port=8889;dbname=kpi-sys', 'root', 'root');
//$statement= $db_pdo ->query

?>