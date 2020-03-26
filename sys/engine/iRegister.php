<?php

    //Include database connection details
    require('../db_con/db2.php');

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

    $lvl2=$_POST['lvl']; //level employee
    $fn2=$_POST['fn']; //first name employee
    $ln2=$_POST['ln']; //last name employee
    $lvl2=$_POST['lvl']; //level employee
    $ide2=$_POST['ide']; //id employee
    $fp2=md5($_POST['fp']); //passw employech
    $cp2==md5($_POST['cp']); //passw conf employee
    $eml2=$_POST['eml']; //email employee
    $pos2=$_POST['pos']; //job title employee
    $bod2=$_POST['bod']; //Director level employee
    $div2=$_POST['div']; //Division level employee
    $dep2=$_POST['dep']; //Dep level employee
    $sec2=$_POST['sec']; //Section level employee
    $spv2=$_POST['spv']; //Superior level employee
    $phn2=$_POST['phn']; //ext employee
    $mbl2=$_POST['mbl']; //mbl level employee

    $fp3=$_POST['fp']; //passw employee
    $cp3=$_POST['cp']; //passw conf employee


    /* check connection */
    if (mysqli_connect_errno($con)) { echo "Failed to connect to DataBase: " . mysqli_connect_error(); } else {
    
    $qid="SELECT * FROM emp WHERE idUser='$ide2'";
    $rid=mysqli_query($con, $qid) or die(mysqli_error($con));

        if(!$rid || mysqli_num_rows($rid) > 0) { header("Location: ../../_register.php?al=1&&id=$ide2"); } else 
    
        {

            if($fp3==$cp3) 
            
            { 
                //upload file directory
                define("UPLOAD_DIR", "../../assets/img/avatars/");

                //if jika foto tidak upload
                if (!empty($_FILES["nama_file"])) 
            
                {    
                    $nama_file= $_FILES["nama_file"];
                    
                        if ($nama_file["error"] !== UPLOAD_ERR_OK) {

                            $qiu= "INSERT INTO users (`idUser`, `idDiv`, `uName`, `pWordHash`, `role`, `status`, `granted`, `lastLog`)
                                        VALUES ('$ide2', '$div2', '$eml2', '$fp2', 111, '$lvl2', 1, '$dt')";  mysqli_query($con, $qiu);
                        
                            $qie= "INSERT INTO emp (`idEmp`, `idSpv`, `idSec`, `idDep`, `idDiv`, `idPos`, `idUser`, `level`, `fName`, `lName`, `email`, `phone`, `mobile`, `mDate`)
                                        VALUES (NULL, '$spv2', '$sec2', '$dep2', '$div2', '$pos2', '$ide2', '$lvl2', '$fn2', '$ln2', '$eml2', '$phn2', '$mbl2', '$dt')";
                               
                                if (mysqli_query($con, $qie)) { header("Location: ../../_register.php?al=3&&id=$ide2"); } 
                                else { echo "Error: " . $qie . "<br>" . mysqli_error($con); }

                        }


                // if foto upload and ensure a safe filename
                $nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

                // dont overwirte an existising file
                $i= 0;
                $parts= pathinfo($nama_baru); while (file_exists(UPLOAD_DIR . $nama_baru))    { $i++; $nama_baru = $parts["filename"] . "-" . $i . "." . $parts["extension"]; }

                // preserve file from temporary directory
                $success= move_uploaded_file($nama_file["tmp_name"], UPLOAD_DIR . $nama_baru);

                if (!$success) { echo "<p>Unable to save file.</p>"; exit; }

                // set proper permission on the new file
                chmod(UPLOAD_DIR . $nama_baru, 0644);
        
                }
                
                        $qiu= "INSERT INTO users (`idUser`, `idDiv`, `uName`, `pWordHash`, `role`, `status`, `granted`, `lastLog`)
                                        VALUES ('$ide2', '$div2', '$eml2', '$fp2', 111, '$lvl2', 1, '$dt')";  mysqli_query($con, $qiu);

                        $qie= "INSERT INTO emp (`idEmp`, `idSpv`, `idSec`, `idDep`, `idDiv`, `idPos`, `idUser`, `level`, `fName`, `lName`, `email`, `phone`, `mobile`, `avatar`, `mDate`)
                                        VALUES (NULL, '$spv2', '$sec2', '$dep2', '$div2', '$pos2', '$ide2', '$lvl2', '$fn2', '$ln2', '$eml2', '$phn2', '$mbl2', '$nama_baru', '$dt')";
                               
                            if (mysqli_query($con, $qie)) { header("Location: ../../_register.php?al=3&&id=$ide2"); } 
                            else { echo "Error: " . $qie . "<br>" . mysqli_error($con); }
            
            } else { header("Location: ../../_register.php?al=2"); }
        
        }
 
    } mysqli_close($con); ?>