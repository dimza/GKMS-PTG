<div class="col-lg-12 col-md-12">
    <!-- col-lg-12 start here -->
    <div class="panel panel-mod2 toggle">
        <!-- Start .panel -->
        <div class="panel-heading panel-color-ip">
            <h4 class="panel-title color-white"><i class=en>
                <img class=user-avatar src=assets/img/gauges/speedo.png ></i> INTERNAL PROCESS<Br> Code:<b> P</b></h4>
        </div>
        <div class="panel-body panel-color-ip">
			<?PHP 

				$qsm= mysql_query("SELECT * FROM sm WHERE idCat=3 AND idSm<=8 LIMIT 4");
        
                    While ($qsm2= mysql_fetch_assoc($qsm)) { 

                        echo '<div class="col-lg-3 col-md-3 col-xs-3">';
                        echo '<div class="tile-stats b brall mb25"><a href="_viewTheme.php?kd='.$qsm2['idSm'].'" target="_Blank">';
                        echo '<div class=tile-stats-icon><i class="fa-bullseye color-green2"></i></div>';
                        echo '<div class=tile-stats-content>';
                        echo '<div class="tile-stats-text color-white">'.$qsm2['idCode'].' '.$qsm2['description'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';
                    } 
            ?>
		</div>
		<div class="panel-body panel-color-ip">
            <?PHP 

            	$qsm= mysql_query("SELECT * FROM sm WHERE idCat=3 AND idSm>8 LIMIT 3");
        
                    While ($qsm2= mysql_fetch_assoc($qsm)) { 

                        echo '<div class="col-lg-4 col-md-4 col-xs-4">';
                        echo '<div class="tile-stats b brall mb25"><a href="_viewTheme.php?kd='.$qsm2['idSm'].'" target="_Blank">';
                        echo '<div class=tile-stats-icon><i class="fa-bullseye color-green2"></i></div>';
                        echo '<div class=tile-stats-content>';
                        echo '<div class="tile-stats-text color-white">'.$qsm2['idCode'].' '.$qsm2['description'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';

                    } 
            ?>
    	</div>
	</div>
	<!-- End .panel -->   
