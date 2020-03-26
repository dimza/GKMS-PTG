<?php

header('Content-Type: application/json');

//Include database connection details
require('../db_con/db2.php');

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    
    $q= $_GET["id"];

    $data_points = array();

    $result = mysqli_query($con, "SELECT * FROM monthkpimontindv WHERE idKpiDetIndv='$q'");

    while($row = mysqli_fetch_array($result))
    {
        $mtr2=$row['idMtr'];
        
        $mtr = $con->query("SELECT description FROM monitoring WHERE idMtr='$mtr2'");
        $row2 = mysqli_fetch_assoc($mtr);
        
        $point = array("label" => $row2['description'], "y" => $row['target']);

        array_push($data_points, $point);        
    }

    echo json_encode($data_points);
}
mysqli_close($con);

?>