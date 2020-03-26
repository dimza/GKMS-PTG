<?PHP

    date_default_timezone_set('Asia/Jakarta');
    $today = date('l, jS \of F Y - h:i:s A');
    $yr= date("Y");
    $y= date("y");

      //call Seession put into variabel 
	  $np=$_SESSION['SESS_ID'];
      $usr=$_SESSION['SESS_USERNAME'];

    //call Query Table Users
    $qUsr= mysql_query("select * from users where idUser='$np'");
    $dtUsr = mysql_fetch_array($qUsr);

    //put Variable from Qry Tbl Users to variabel role	  
    $rlUsr = $dtUsr['role'];
    $rlGtd = $dtUsr['granted'];
    $key = $dtUsr['key'];

    //call Query Table Emp
    $qEmp= mysql_query("select * from emp where idUser='$np'");
    $dtEmp = mysql_fetch_array($qEmp);

    $fname = $dtEmp['fName'];
    $lname = $dtEmp['lName'];
    $ispv = $dtEmp['ispv'];
    $lvl = $dtEmp['level'];
    $idv = $dtEmp['idDiv'];
    $idp = $dtEmp['idDep'];
    $ids = $dtEmp['idSec'];
    $avt = $dtEmp['avatar'];

    if ($key=='1') {$dsb="";} else {$dsb="disabled";}

?>