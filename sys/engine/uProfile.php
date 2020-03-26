<?php

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

//Include database connection details
require('../db_con/db2.php');

// Check connection
if (mysqli_connect_errno($con))

{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();

}   else

{
    
    $npg=$_POST['npg']; //npg
    $sex=$_POST['sex']; //sex
    $fn=$_POST['fn']; //fn
    $ln=$_POST['ln']; //ln
    $eml=$_POST['eml']; //eml
    $phn=$_POST['phn']; //phn
    $mob=$_POST['mob']; //mob


        define("UPLOAD_DIR", "../../assets/img/avatars/");

        if (!empty($_FILES["nama_file"])) {

            $nama_file= $_FILES["nama_file"];

                if ($nama_file["error"] !== UPLOAD_ERR_OK) {

                        $qemp= "UPDATE emp SET fName='$fn', lname='$ln', sex='$sex', email='$eml', phone='$phn', mobile='$mob', mDate='$dt' WHERE idUser='$npg'";                       
         
                if (mysqli_query($con, $qemp)) { header("Location: ../../profile.php?al=4"); } 
                else { echo "Error: " . $qemp . "<br>" . mysqli_error($con); }

}


            // ensure a safe filename
            $nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

            // dont overwirte an existising file
            $i= 0;
            $parts= pathinfo($nama_baru);
            while (file_exists(UPLOAD_DIR . $nama_baru))    {
                $i++;
                $nama_baru = $parts["filename"] . "-" . $i . "." . $parts["extension"];
                
                }

            // preserve file from temporary directory
            $success= move_uploaded_file($nama_file["tmp_name"], UPLOAD_DIR . $nama_baru);

            if (!$success) {
                echo "<p>Unable to save file.</p>";
                exit;
                }

            // set proper permission on the new file
            chmod(UPLOAD_DIR . $nama_baru, 0644);
        
            }                   

                        $qemp= "UPDATE emp SET fName='$fn', lname='$ln', sex='$sex', email='$eml',  phone='$phn', mobile='$mob', avatar='$nama_baru', mDate='$dt' WHERE idUser='$npg'";                        

                if (mysqli_query($con, $qemp)) { header("Location: ../../profile.php?al=4"); } 
                else { echo "Error: " . $qemp . "<br>" . mysqli_error($con); }

}

mysqli_close($con);

?>