<?php

	require('../db_con/db.php');
	

	$q= intval($_GET['q']);

        $nc2= mysql_query("select * from `kpicat` where idCat='$q'") or die(mysql_error());
        $cde= mysql_result($nc2, 0, 'code');

        $kdc= "select * from `catnocom` where idCat='$q' order by code desc limit 1";
        $kdc2= mysql_query($kdc) or die(mysql_error());
        $kdc3= mysql_fetch_array($kdc2);
        $kdc4= $kdc3['code']+'1';
        $kdc5=str_pad($kdc4, 2, '0', STR_PAD_LEFT);

        $kdc6= $cde.''.$kdc5;

        echo '<button type=button class="btn btn-alt btn-primary">';
        //echo $cde;
        echo $kdc6;
        echo '</button>';
        
    mysql_close($bd);

?> 