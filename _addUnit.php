<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');	  
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111" and $key == "666" ) {

    $tab="Manage Users";    
  
    require('include/_layout/headMeta.php');

		$swch= intval($_GET['sw']);
        $ie= intval($_GET['kd']);

?>

<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_addUnit.php');
        
?>

<?PHP   }  else { header("Location: 404.php"); } ?>