<?php

//Include database connection details
require('../db_con/db4.php');


$db_handle = new DBController();
$result = mysql_query("UPDATE strategic set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  idStra=".$_POST["id"]);
?>