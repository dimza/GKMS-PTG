<?php

		require('../db_con/db.php');

	$q= intval($_GET['q']);
		
        //echo '<label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>';
        echo '<br><div class="col-lg-8 col-md-8">';

			$sm= mysql_query("SELECT * FROM sm WHERE idCat='$q'");
            
                echo '<select class="form-control select2" name="sm" onchange="showCD(this.value)">';
                echo '<option value="">SELECT THEMES';
                  
                    While($sm2= mysql_fetch_assoc($sm)) {

                        echo '<option value="'.$sm2['idSm'].'">';
                        echo $sm2['idCode'].' '.$sm2['description'];
                        echo '</option>';
                                
                    }
                                   
                        echo '</select></div>';
                        	

mysql_close($bd);

?> 