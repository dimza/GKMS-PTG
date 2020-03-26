<div class="col-lg-8 col-md-8">
	<!-- col-lg-8 start here -->
    <div class="panel panel-mod toggle">
        <!-- Start .panel -->
        <div class="panel-heading panel-color-stk">
            <h4 class="panel-title color-white"><i class=en>
                <img class=user-avatar src=assets/img/gauges/speedo.png ></i> STAKEHOLDERS<Br> Code:<b> S</b></h4>
        </div>
        <div class="panel-body panel-color-stk">
        	<?PHP 

				$qsm= mysql_query("SELECT * FROM sm WHERE idCat=2");
        
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
</div>