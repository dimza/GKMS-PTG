<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">

    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
        
      <div class="row">
        <!-- Start .row -->

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- col-lg-12 start here -->
              <div class=page-header>
                <h4>CORPORATE DASHBOARD</h4>
              </div>
          </div>
          <!-- End col-lg-12 -->

      </div>
      <!-- End .row -->              

      <div class="row">
        <!-- Start .row -->

          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title>Company Logo</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">
                      <img width="250" height="185" src=assets/img/PTG-5.png style="margin-top:45px;">
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-4 LOGO-->

          <div class="col-lg-6 col-md-6">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title></h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">            
                       <canvas width="220" height="220" data-type="canv-gauge" data-title="GUNANUSA" id="gauge2"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge2').setValue( Math.random() * 52);}, 2000);"></canvas>
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-4 PTG-->

          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title>Legend Indicators</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">
                      <img height="180" width="260" src=assets/img/meter.png style="margin-top:45px;">
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-4 LGN-->                   

      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->
          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title>FINANCE</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">
                      <canvas width="135" height="135"data-type="canv-gauge" data-title="FIN" id="gauge1" style="margin-right:0px;"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge1').setValue( Math.random() * 60);}, 1500);"></canvas>             
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-3 -->
          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title>STAKEHOLDERS</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">            
                      <canvas width="135" height="135"data-type="canv-gauge" data-title="STA" id="gauge3" style="margin-right:0px;"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge3').setValue( Math.random() * 82);}, 1000);"></canvas>
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-3 -->
          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg">
                    <h4 class=panel-title>INTERNAL PROCESS</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">
                      <canvas width="135" height="135"data-type="canv-gauge" data-title="INT" id="gauge4" style="margin-right:0px;"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge4').setValue( Math.random() * 82);}, 1000);"></canvas>
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-3 -->
          <div class="col-lg-3 col-md-3">
            <!-- Start col-lg-6 -->
              <div class="panel panel-default plain panelMove panelClose">
                <!-- Start .panel -->
                  <div class="panel-heading white-bg text-center">
                    <h4 class="panel-title">LEARNING & GROWTH</h4>
                  </div>
                  <div class=panel-body>
                    <div class="text-center">
                      <canvas width="135" height="135"data-type="canv-gauge" data-title="LG" id="gauge5"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge5').setValue( Math.random() * 82);}, 1000);"></canvas>
                    </div>
                  </div>
              </div>
              <!-- End .panel -->
          </div>
          <!-- End col-lg-3 -->
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->
          <?PHP $ed= mysql_query("SELECT * FROM empdiv WHERE vis=0 AND spc=3");
        
                  While ($ed2= mysql_fetch_assoc($ed)) { 

                        echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="" data-toggle=modal data-target=#myModal3>';
                        //echo '<div class="tile-stats b brall mb25"><a href="_viewEmp.php?kd='.$ed2['idEmp'].'">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img class=user-avatar src=assets/img/speedo.png style="margin-top:2px;"></div>';
                        //echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/dep.png>
                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$ed2['descr'].'</div>';
                        echo '<div class=tile-stats-text>'.$ed2['code'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';} ?>                                     
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- col-lg-12 start here -->
              <div class=page-header>
                <h4>BOD DASHBOARD</h4>
              </div>
          </div>
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->           
          <?PHP $ed= mysql_query("SELECT * FROM empdiv WHERE vis=0 AND spc=1");
        
                    While ($ed2= mysql_fetch_assoc($ed)) { 

                        echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_performBod.php?kd='.$ed2['idDiv'].'&&int='.$ed2['code2'].'">';
                        echo '<div class=tile-stats-icon style="width: 20%;">';
                        echo '<img class=user-avatar src=assets/img/speedo.png style="margin-top:2px;"></div>';
                        //echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/dep.png>
                        echo '<div class=tile-stats-content style="width: 80%;">';
                        echo '<div class=tile-stats-number>'.$ed2['code'].'</div>';
                        echo '<div class=tile-stats-text>'.$ed2['descr'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>'; } ?>
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- col-lg-12 start here -->
              <div class=page-header>
                <h4>VP DASHBOARD</h4>
              </div>
          </div>
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->          
          <?PHP $ed= mysql_query("SELECT * FROM empdiv WHERE vis=0 AND spc=0");
        
                    While ($ed2= mysql_fetch_assoc($ed)) { 

                        echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_performDiv.php?kd='.$ed2['idDiv'].'">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img class=user-avatar src=assets/img/speedo.png style="margin-top:2px;"></div>';
                        //echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/dep.png>
                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$ed2['code'].'</div>';
                        echo '<div class=tile-stats-text>'.$ed2['descr'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';} ?>

      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- col-lg-12 start here -->
              <div class=page-header>
                <h4>DIRECT DEPARTMENT DASHBOARD</h4>
              </div>
          </div>
      </div>
      <!-- End .row -->

      <div class="row">
        <!-- Start .row -->          
            <?PHP $ed= mysql_query("SELECT * FROM empdiv WHERE vis=1 AND spc=2");
        
                    While ($ed2= mysql_fetch_assoc($ed)) { 

                        echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_performDep.php?kd='.$ed2['idDep'].'">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img class=user-avatar src=assets/img/speedo.png style="margin-top:2px;"></div>';
                        //echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/dep.png>
                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$ed2['code'].'</div>';
                        echo '<div class=tile-stats-text>'.$ed2['descr'].'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';} ?>                    
          
      </div>        
      <!-- End .row -->
      </div>      
        
   <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->  