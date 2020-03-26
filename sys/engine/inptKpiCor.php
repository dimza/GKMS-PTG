<?PHP 	

ob_start();
	
	require('../db_con/db.php');

    $today = date("d-m-Y");
    $yr= date("Y");

    $psc=$_POST['pspc'];
    $tk=$_POST['tk'];
    $dscr=$_POST['dscr'];
    $tgs=$_POST['tgs'];
    $usr=$_POST['usr'];

    //mengisi nilai kosong
    $null='0';
		
        //mencari nilai code untuk perpective yang di pilih
        $nc= mysql_query("select * from `kpicat` where idCat='$psc'") or die(mysql_error());
        $cde= mysql_result($nc, 0, 'code'); 

        //mencari nilai terakhir pada tabel catnocom dan kemudian ditambahakn satu untuk setiap nilai yang di input
        $kdc= "select * from `catnocom` where idCat='$q' order by code desc limit 1";
        $kdc2= mysql_query($kdc) or die(mysql_error());
        $kdc3= mysql_fetch_array($kdc2);
        $kdc4= $kdc3['code']+'1';
        $kdc5=str_pad($kdc4, 2, '0', STR_PAD_LEFT); // kode judul perspective contoh: 01

        //memasukan nilai ke tabel catnocom sebagai judul awal kpi
		$qCNC= "INSERT INTO catnocom (idCatNoCom, idCat, code, title, descr) VALUES (NULL, '$psc', '$kdc5', '$tk', '$dscr')";	
		$rCNC = mysql_query($qCNC) or die(mysql_error());

        //mencari nilai id terakhir catnocom tabel
        $qCNC2= mysql_query("select * from `catnocom` order by idCatNoCom desc limit 1") or die(mysql_error());
        $idCNC= mysql_result($qCNC2, 0, 'idCatNoCom');

        //memasukan nilai ke tabel kpidetcom
		$sql= "INSERT INTO kpidetcom (idKpiDetCom, idCat, idCatNoCom, idSubNoCom, tags, year, vis, mDate, mUser) 	
						VALUES 	 (NULL, '$psc', '$idCNC', '$null', '$tgs', '$yr', '$null', '$today', '$usr')";	
		$result = mysql_query($sql) or die(mysql_error());				
 
		//mengambil nilai quote no 
		header("Location: ../../_scrc.php");

												

mysql_close($bd);

ob_end_flush(); ?>


	