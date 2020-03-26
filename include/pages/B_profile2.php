<?PHP

    $today = date("Y-m-d");
    $yr= date("Y");
	  
      //call Query Table Users
	    $qUsr= mysql_query("select * from users where idUser='$ie'");
	    $dtUsr = mysql_fetch_array($qUsr);

      //call Query Table Emp
	    $qEmp= mysql_query("select * from emp where idUser='$ie'");
	    $dtEmp = mysql_fetch_array($qEmp);

        $fname = $dtEmp['fName'];
        $lname = $dtEmp['lName'];
        $ava = $dtEmp['avatar'];
        $idep = $dtEmp['idDep'];
        $ipos = $dtEmp['idPos'];
        $idiv = $dtEmp['idDiv'];
        $ispv = $dtEmp['idSpv'];
        $idv = $dtEmp['idDiv'];
	
      $qDep= mysql_query("select * from empdep where idDep='$idep'");
	    $dtDep = mysql_fetch_array($qDep);
	  
	    $dscDep = $dtDep['code'];

      $qPos= mysql_query("select * from emppos where idPos='$ipos'");
	    $dtPos = mysql_fetch_array($qPos);
	  
	    $dscPos = $dtPos['descr'];

      $qDiv= mysql_query("select * from empdiv where idDiv='$idiv'");
	    $dtDiv = mysql_fetch_array($qDiv);
	  
	    $dscDiv = $dtDiv['code'];

      $qSpv= mysql_query("select * from empspv where idSpv='$ispv'");
	    $dtSpv = mysql_fetch_array($qSpv);
	  
	    $dscSpv = $dtSpv['desc'];

?>

<!-- Start #content -->
<div id="content" style="margin-left:0px; padding-top: 15px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <!-- End .row -->
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
	<Br>
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-4 start here -->
          <div class="panel panel-default plain">
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title"></h4>               
            </div>
            <aside id="profile">
              <?PHP 
                if($ava=="") { echo '<img class=user-avatar src=assets/img/avatars/bb.jpg style="margin-top:5px; overflow: hidden;">';}
                else { echo '<img class=user-avatar src="assets/img/avatars/'.$ava.'" style="margin-top:5px; overflow: hidden;">'; }
              ?>             
                <h2><?php echo $fname.' '.$lname; ?></h2>
                <p><?php echo $dscPos; ?></p>
                <i class="im-star3 s16 color-yellow"></i><i class="im-star3 s16 color-yellow"></i><i class="im-star2 s16 color-yellow"></i><i class="im-star s16 color-yellow"></i>
                <br><br>
                <!-- <a class="btn">Ask me!</a> -->
            </aside>
          </div>
          <!-- End .panel -->                          
        </div>

        <div class="col-lg-8 col-md-8">
          <!-- Start col-lg-12 -->
          <div class="panel panel-default">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class=panel-title></h4>
            </div>
            <div class=panel-body style="border-top: 1px solid #e4e9eb;"><br>
              <form class="form-horizontal" role=form action="sys/engine/pass_reset.php" enctype="multipart/form-data" method="post" id="validate">
                <div class="form-group">
                  <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
                    <input type=password class=form-control required placeholder="Type your old password" name="oword">
                    </div>
                </div>
                <!-- End .form-group  -->                             
                <div class="form-group">
                  <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
                    <input id=password-metter type=password class=form-control required placeholder="Type your new password" name="pword">
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
                    <input type=password class=form-control required placeholder="Re-type your new password" name="pword2">
                    <input type=hidden class=form-control readonly value="<?PHP echo $dtEmp['email']; ?>" name="eml">
                    <input type=hidden class=form-control readonly value="<?PHP echo $np ?>" name="np">
                        <span class="help-block mt10">
                        <a href=# id=generate-password class="btn btn-default">Generate</a> 
                        <a href=# id=show-password class="btn btn-default">Show password</a> 
                        <span id=output-message class="badge p10 ml15">Enter some password</span></span>                      
                  </div>
                </div>
                <!-- End .form-group  -->
                  <div class=page-header><h4><small></small></h4></div>
                  
                <div class=form-group>
                  <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8" style="text-align: right !important;">
                    <button type=submit class="btn btn-primary">RESET PASSWORD</button>
          
                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>
          </div>
          <!-- End .panel -->
        </div>
      </div>
      <!-- End .row -->

          <?PHP $alrt = @$_GET['al']; switch ($alrt) { case "1":?>
          <div class="alert alert-danger fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Oh snap!</strong> Your old password wrong or new password dont match with confirm new password. Please try again.</div>
          <?PHP break; case "2": ?>
          <div class="alert alert-danger fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Oh snap!</strong> Change a few things up and try submitting again.</div> 
          <?PHP break; case "3": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully updated your password.</div>
          <?PHP break; case "4": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully updated your profile details.</div>  
          <?PHP break; default: }?>

      <div class="row">
        <!-- Start .row -->      
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-6 -->
            <div class="page-header">
                <i class="st-user s21" style="margin-bottom:0px;"></i>
                <h4>Manage User Profile</h4>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-12 -->            
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title></h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role="form" action="sys/engine/uProfile.php" method="post" enctype="multipart/form-data" id=validate>
                <div class="form-group">
                  <label class="col-sm-2 text-left" style="margin-bottom:3px;">Id. Employee</label>
                  <label class="col-sm-2 text-left" style="margin-bottom:3px;">Gender</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">First Name</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Last Name</label>
                  <div class="col-lg-2 col-sm-2">
                    <input class=form-control name="ide" value="<?PHP echo $np; ?>">
                  </div>
                  <div class="col-lg-2 col-sm-2">
                    <select class="form-control select2" name="prf">
                      <option value="0">SELECT</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>                  
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required value="<?PHP echo $fname; ?>" name="fn">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required value="<?PHP echo $lname; ?>" name="ln">
                  </div>
                </div>
                <!-- End .form-group  -->
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Granted</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Level</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Email</label>    
                  <div class="col-lg-4 col-sm-4">
                    <select class="form-control select2" name="">
                      <option value="0">SELECT</option>
                      <option value="0">User</option>
                      <option value="1">Administrator</option>
                      <option value="2">Super User</option>       
                      </select>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <select class="form-control select2" name="">
                      <option value="10">SELECT</option>
                      <option value="0">Staff</option>
                      <option value="1">Manager</option>
                      <option value="2">Vice President</option>
                      <option value="3">Director of</option>
                      <option value="4">BOC</option>       
                      </select>
                  </div>                    
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required value="<?PHP echo $dtEmp['email']; ?>" name="eml">
                  </div>
                </div>
                <!-- End .form-group  -->
                <hr>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Job Title</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">BOC Group</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Director Group</label>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qep= mysql_query("SELECT * FROM emppos ORDER BY descr ASC");
            
                            echo '<select class="form-control select2" name="pos">';
                            echo '<option value="0">'.$dscPos;
                  
                              While($qep2= mysql_fetch_assoc($qep)) { echo '<option value="'.$qep2['idPos'].'">'.$qep2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>                      
                  </div>                                 
                  <div class="col-lg-4 col-sm-4">
                    <select class="form-control select2" name="">
                      <option value="0">SELECT</option>
                      <option value="1">President Director</option>
                      <option value="2">Deputy President Director</option>
                      <option value="0">None</option>
                    </select>                    
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <select class="form-control select2" name="">
                      <option value="0">SELECT</option>
                      <option value="1">COMMERCIAL, BUSINESS DEVELOPMENT & PROJECT</option>
                      <option value="2">FINANCE</option>
                      <option value="0">None</option>
                    </select>
                  </div>
                  
                </div>
                <!-- End .form-group  -->
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Division Group</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Department Group</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Section Group</label>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qdv= mysql_query("select * from empdiv where vis=0 AND idEmp=0 ORDER BY code ASC");
            
                            echo '<select class="form-control select2" name="div">';
                            echo '<option value=>'.$dscDiv;
                  
                              While($qdv2= mysql_fetch_assoc($qdv)) { echo '<option value="'.$qdv2['idDiv'].'">'.$qdv2['code'].' - '.$qdv2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>                      
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("SELECT * FROM empdep WHERE vis=0 ORDER BY code ASC");
            
                            echo '<select class="form-control select2" name="dep">';
                            echo '<option value=>'.$dscDep;
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idDep'].'">'.$qcat2['code'].'</option>'; }
                                        
                            echo '</select>';
                    ?>                                        
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("select * from empsec where vis=0 order by descr asc");
            
                            echo '<select class="form-control select2" name="sec">';
                            echo '<option value=>-'.$dscSec;
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idSec'].'">'.$qcat2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>                      
                  </div>
                  
                </div>
                <!-- End .form-group  -->
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Acknowledge</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Phone Extention</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Phone Mobile</label>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("select * from kpicat order by idCat asc");
            
                            echo '<select class="form-control select2" name="spv">';
                            echo '<option value=>'.$dscSpv;
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idCat'].'">'.$qcat2['desc'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required value="<?PHP echo $phn; ?>" name="phn">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required value="<?PHP echo $mob; ?>" name="mob">
                  </div>
                </div>
                <!-- End .form-group  -->

                <hr>
				    <div class=form-group>
                  <label class="col-lg-8 col-md-8 col-sm-12 control-label">Upload Photo</label>
                  <div class="col-lg-4 col-md-4">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control value="<?PHP echo $np ?>" name="npg">
                    <input type=hidden class=form-control value="<?PHP echo $ava ?>" name="ft">
                  </div>
            </div>
            <!-- End .form-group  -->
            <hr>                          
            <div class=form-group>
              <label class="col-lg-8 col-md-8 col-sm-12 control-label"></label>
                <div class="col-lg-2 col-md-2">
                    <button type=reset class="btn btn-primary">RESET</button>
                    <button type=submit class="btn btn-primary">UPDATE</button>
                </div>
            </div>
                <!-- End .form-group  -->
              </form>
            </div>
          </div>
          <!-- End .panel -->            
        </div>
        <!-- End col-lg-12 --> 
      </div>
      <!-- End .row -->

      <!-- Page End here -->   
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
   
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src="assets/js/jquery-ui.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
   

