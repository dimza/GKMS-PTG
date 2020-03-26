<!-- Start #content -->
<div id=content style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-6 -->
            <div class="page-header">
                <i class="fa-table s21" style="margin-bottom:0px;"></i>
                <h4>Log login users to GKMS Software</h4>
            </div>
        </div>
      </div>
      <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->         
        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title>LOG USERS</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead> 
                    <tr> 
                        <th>IP Address
                        <th>Username
                        <th>Status
                        <th>Last Modified
                        <th class="text-center"><i class="im-cog s16"></i>
                <tbody>
                    <?PHP 
                        
                        $logQ= mysql_query("SELECT * FROM userslog ORDER BY idUserLog ASC");
		
						      While ($logQ2= mysql_fetch_assoc($logQ)) 
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td>'.$logQ2['ipAddr'];
				    echo '<td>'.$logQ2['uName'];
                                echo '<td>'.$logQ2['tError'];
                                echo '<td>'.$logQ2['mDate'];
                                echo '<td class="text-center"><a href="editKpi.php?kd='.$logQ2["idUserLog"].'" target="_Blank"><i class="fa-edit s16"></i></a> | <a href="sys/engine/delKpi.php?kd='.$logQ2["idUserLog"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$logQ2["idUserLog"].'&&swch=1" onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
							
                              }
					?>                        
              </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->              
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