<?php

//Include database connection details
require('sys/db_con/db4.php');

$db_handle = new DBController();
$sql = "SELECT * from strategic where idKpiDetIndv=$q";
$faq = $db_handle->runQuery($sql);

$sql2 = "SELECT * from risk where idKpiDetIndv=$q";
$faq2 = $db_handle->runQuery($sql2);

?>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(assets/img/loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "sys/engine/updtStr.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
		<script>
		function showEdit2(editableObj2) {
			$(editableObj2).css("background","#FFF");
		} 
		
		function saveToDatabase2(editableObj2,column,id) {
			$(editableObj2).css("background","#FFF url(assets/img/loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "sys/engine/updtRsk.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj2.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj2).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
          <br>
        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panel-closed showControls">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
                <h4 class=panel-title><i class=en>
                    <?PHP   if ($cnt5 == 0) { $imgs="speedo.png";}
                            else if ($cnt5 <= 20 ) { $imgs="speedo1.png";}
                            else if ($cnt5 <= 35 ) { $imgs="speedo2.png";}
                            else if ($cnt5 <= 45 ) { $imgs="speedo3.png";}
                            else if ($cnt5 <= 50 ) { $imgs="speedo4.png";}
                            else if ($cnt5 <= 55 ) { $imgs="speedo5.png";}
                            else if ($cnt5 <= 65 ) { $imgs="speedo6.png";}
                            else if ($cnt5 <= 75 ) { $imgs="speedo7.png";}
                            else if ($cnt5 <= 85 ) { $imgs="speedo8.png";}
                            else if ($cnt5 <= 95 ) { $imgs="speedo9.png";}
                            else if ($cnt5 <= 1000 ) { $imgs="speedo10.png";}      
                    ?>                    
                    <img class="user-avatar" style="margin-left:10px;" src=assets/img/<?PHP echo $imgs; ?> ></i> 
                    <h5 style="margin-top:23px;"><?PHP echo $qki4.' '.$qki2; ?></h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr> 
                    <th class="text-center">No.  
                    <th>Date
                    <th>Target <?PHP echo $qku2; ?>
                    <th>Actual <?PHP echo $qku2; ?>
                    <th>Achievment
                    <th>File
                    <th>Remark
                    <!-- <th class="per7 text-center"><i class="im-cog s16"></i> -->
                <tbody>
                    <?PHP 
                    
                        $num = 1;
                        $mkmi= mysql_query("SELECT * FROM monitoring WHERE idMont='$qki9'");

                        $i=0;
    
                          While ($mkmi2= mysql_fetch_assoc($mkmi)) 
                              
                            { 
                                  
                              $mtr= $mkmi2['idMtr'];
                                  
                              $qmkmi= mysql_query("SELECT * FROM monthkpimontindv WHERE idKpiDetIndv='$q' AND idMtr='$mtr'") or die(mysql_error());
                              $qmkmi2= mysql_result($qmkmi, 0, 'target');  
                              $qmkmi3= mysql_result($qmkmi, 0, 'actual');
                              $qmkmi4= mysql_result($qmkmi, 0, 'achiev');
                              $qmkmi5= mysql_result($qmkmi, 0, 'mDate');
                              $qmkmi6= mysql_result($qmkmi, 0, 'remark');

                                if($i%2==0) $class = 'even'; else $class = 'odd';
                                  
                                echo '<tr class="'.$class.'">';
                                echo '<td class="text-center">'.$num;
                                echo '<td>'.$mkmi2['description'];
                                echo '<td>'.number_format($qmkmi2, 1).' '.$qku4;
                                echo '<td>';
                                echo '<span ';
                                // <-- remove this to activated edit target --> echo 'class= "xedit"';
                                echo 'id="'.$qmkmi6.'">'.number_format($qmkmi3, 1).'</span> '.$qku4;
                                echo '<td>'.number_format($qmkmi4, 1).' %';
                                echo '<td><a href=# data-toggle=modal data-target=#myModal3>DOC/PDF</a>';
                                echo '<td>'.$qmkmi6;
                                //echo '<td class="text-center"><a href=# data-toggle=modal data-target=#myModal3><i class="fa-edit s16"></i></a>';
                                
                                  
                              $num++;
                            }                                          
                    ?>                        
              </table>
              <a href="_editKpi.php?kd=<?PHP echo $q; ?>" type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> UPDATE</a>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->
      </div>
      <!-- End .row -->
      <div class="row">
        <!-- Start .row -->        
        <?PHP list($hide)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM monthkpimontindv where idKpiDetIndv='$q'")); if ($hide=="0") { } else {?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class="panel-title"><h5>Actual VS Target Chart</h5></h4>                
            </div>
            <div class="panel-body">
              <div id="11" style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->    
        </div>
        <!-- End col-lg-6 AVT CHART -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>Achievment Chart</h5></h4>
            </div>
            <div class=panel-body>
              <div id="22" style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->                      
        </div>
        <!-- End col-lg-6 ACH CHART -->       
      </div>
      <!-- End .row -->
      <div class="row">
        <!-- Start .row -->
         

        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>How to meet the KPI</h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable3">
                <thead>
                  <tr> 
                    <th class="text-center">No.
                    <th>Action Plan
                <tbody> 
		  <?php
			if (is_array($faq)) {

		  foreach($faq as $k=>$v) {
		  ?>
			  <tr>
				<td class="text-center"><?php echo $k+1; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'description','<?php echo $faq[$k]["idStra"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["description"]; ?></td>
			  </tr>
		<?php
		}}
		?>
 
              </table>
		      <a href=#myModal role=button data-toggle=modal target="_blank" type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>Challenges to meet KPI</h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable2">
                <thead>
                  <tr> 
                    <th class="text-center">No.
                    <th>Risk Items
                    <th>Mitigation
                <tbody> 
		  <?php
			
			if (is_array($faq2)) {
		  foreach($faq2 as $k=>$v) {
		  ?>
			  <tr>
				<td class="text-center"><?php echo $k+1; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase2(this,'description','<?php echo $faq2[$k]["idRisk"]; ?>')" onClick="showEdit2(this);"><?php echo $faq2[$k]["description"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase2(this,'mitigation','<?php echo $faq2[$k]["idRisk"]; ?>')" onClick="showEdit2(this);"><?php echo $faq2[$k]["mitigation"]; ?></td>                  
			  </tr>
		<?php
		}}
		?> 
              </table>
		      <a href=#myModal2 role=button data-toggle=modal target="_blank" type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->       
        <?PHP } ?>  
                                           
      </div>
      <!-- End .row -->            
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->            

<script type="text/javascript">
    
    var counter = 1;
    var limit = 5;

    function addInput(divName){ if (counter == limit)  { alert("You have reached the limit of adding " + counter + " inputs"); }

         else { var newdiv = document.createElement('div'); newdiv.className = 'form-group';

              newdiv.innerHTML = "<div class='col-lg-1 col-md-1'><input class='form-control' readonly value=" + (counter + 1) +"></div><div class='col-lg-11 col-md-11 col-sm-12'><input type='text' class='form-control' name='dsc" + (counter + 1) +"' required></div>";

              document.getElementById(divName).appendChild(newdiv);

              counter++;

         }

    }
</script>
<script type="text/javascript">
    
    var num = 1;
    var limit2 = 5;

    function addInput2(divName2){ if (num == limit2)  { alert("You have reached the limit of adding " + num + " inputs"); }

         else { var newdiv2 = document.createElement('div'); newdiv2.className = 'form-group';

              newdiv2.innerHTML = "<div class='col-lg-1 col-md-1 col-sm-12'><input class='form-control' readonly value=" + (num + 1) +"></div><div class='col-lg-6 col-md-6 col-sm-12'><input type='text' class='form-control' name='dsc" + (num + 1) +"' 'required'></div><div class='col-lg-5 col-md-5 col-sm-12'><input type='text' class='form-control' name='mtg" + (num + 1) +"' 'required'></div>";

              document.getElementById(divName2).appendChild(newdiv2);

              num++;

         }

    }    
</script>
              
    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add Items How to meet the KPI</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/iRisk.php method="post" enctype="multipart/form-data" id="dynamicInput">                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 control-label text-left"></label>
                        <label class="col-lg-11 col-md-11 col-sm-12 control-label text-left">KPI Title</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <div class="col-lg-1 col-md-1">
<!--                            <input class=form-control readonly value="<?PHP //echo $q; ?>">-->
                            <input type=hidden name="idk" value="<?PHP echo $q; ?>">
                            <input type=hidden name="idem" value="<?PHP echo $qki5; ?>">
                            <input type=hidden name="swh" value="1">
                        </div>                                         
                        <div class="col-lg-11 col-md-11 col-sm-12">
                            <input class=form-control readonly value="<?PHP echo $qki4.' - '.$qki2; ?>">
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-6 control-label" style="text-align:center">No.</label>
                        <label class="col-lg-11 col-md-11 col-sm-6 control-label text-left">Description Action Plan</label>                                                    
                    </div>
                    
                    <!-- End .form-group  -->
                    <div class="form-group" >
                        <div class="col-lg-1 col-md-1">
                            <input class=form-control readonly value="1">
                        </div>                                         
                        <div class="col-lg-11 col-md-11 col-sm-12">
                            <input type="text" class=form-control name="dsc" required>
                        </div>
                    </div>
                    <!-- End .form-group  -->    

                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=button class="btn btn-default" onClick="addInput('dynamicInput');">Add List</button>
                        <button type=submit class="btn btn-primary" style="margin-right:80px;">ADD</button>
                    </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      <!-- End .modal -->        
      </div>
      <!-- col-lg-12 Input Modal end here -->            
            
      <!-- Page End here -->
    </div>

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal2" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add Items Challenges to meet KPI</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/iRisk.php method="post" enctype="multipart/form-data" id="dynamicInput2">                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label" style="text-align:center"></label>
                        <label class="col-lg-11 col-md-11 col-sm-12 control-label text-left">Title of Key Performance Indicators</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <div class="col-lg-1 col-md-1 col-sm-12">
<!--                            <input class=form-control readonly value="<?PHP //echo $q; ?>">-->
                            <input type=hidden name="idk" value="<?PHP echo $q; ?>">
                            <input type=hidden name="idem" value="<?PHP echo $qki5; ?>">
                            <input type=hidden name="swh" value="2">
                        </div>                                         
                        <div class="col-lg-11 col-md-11 col-sm-12">
                            <input class=form-control readonly value="<?PHP echo $qki4.' - '.$qki2; ?>"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label" style="text-align:center">NO</label>
                        <label class="col-lg-6 col-md-6 col-sm-12 control-label text-left">Risk Items</label>
                        <label class="col-lg-5 col-md-5 col-sm-12 control-label text-left">Mitigation</label>
                    </div>                    
                    <!-- End .form-group  -->
                    <div class="form-group" >
                        <div class="col-lg-1 col-md-1 col-sm-12">
                            <input class=form-control readonly value="1">
                        </div>                                         
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" class=form-control name="dsc" required>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <input type="text" class=form-control name="mtg" required>
                        </div>
                    </div>
                    <!-- End .form-group  -->
                
                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=button class="btn btn-default" onClick="addInput2('dynamicInput2');">Add List</button>
                        <button type=submit class="btn btn-primary" style="margin-right:48px;">ADD</button>
                    </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      <!-- End .modal -->        
      </div>
      <!-- col-lg-12 Input Modal end here -->            
            
      <!-- Page End here -->
    </div>
