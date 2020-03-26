<?PHP $today = date("Y-m-d"); $yr= date("Y"); $tab="Register Employee";   require('sys/db_con/db.php'); require('include/_layout/headMeta.php'); ?>

<body>
<!--  Start #header -->
<div id="header">
  <div class="container-fluid">
    <div class="navbar">
      <div class="navbar-header">
        <a class="navbar-brand" style="width:450px;" href=index.php>
          <!-- <i class="im-stack text-logo-element animated bounceIn"></i> -->
          <img style="margin: 5px 5px 10px 20px;" width="30" height="30" src=assets/img/ico/ico3.png>
            <span class=text-logo style="-webkit-text-stroke: 1px black; -webkit-text-stroke-width: 2px; color: white; text-shadow: 2px 2px 0 rgb(118, 131, 153);}">
              Gunanusa KPI Management System
            </span><span class=text-slogan></span></a>
      </div>
      <nav class="top-nav" role="navigation">
        <ul class="nav navbar-nav pull-left">                  
                  <li><a href=# id="toggle-header-area"><i class=ec-download></i></a></li>        
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li class=dropdown>
            <a href=index.php><img class=user-avatar src=assets/img/avatars/pp4.png style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4;"> Sign In!</a>
            <ul class="dropdown-menu right" role=menu>
              <li><a href=../profile.php><i class=st-settings></i> Setting</a></li>
              <li><a href=../index.php?&&online=0&&user=<?PHP echo $np; ?>&&msg=201><i class=im-exit></i> Logout</a></li>
            </ul>
          </li>
            <?PHP list($offline)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users where online='1'")); ?>    
          <!--<li id="toggle-right-sidebar-li"><a href=index.php><i class="fa-signout"></i></a></li>-->
        </ul>
      </nav>
    </div>
    <!-- Start #header-area -->
    <div id="header-area" class="fadeInDown">
      <div class="header-area-inner">
        <ul class="list-unstyled list-inline">
          <li><div class=shortcut-button><a href=#myModal role=button data-toggle=modal>
              <img src="assets/img/ico/JOB.png" width="60" height="60" style="margin-bottom:15px;"> <span>JOB TITLE</span></a></div></li>
          <li><div class=shortcut-button><a href=#myModal2 role=button data-toggle=modal>
              <img src="assets/img/ico/section.png" width="60" height="60" style="margin-bottom:15px;"> <span>SECTION</span></a></div></li>
          <li><div class=shortcut-button><a href=#myModal3 role=button data-toggle=modal>
              <img src="assets/img/ico/spv.png" width="60" height="60" style="margin-bottom:15px;"> <span>SUPERIOR</span></a></div></li>    
        </ul>
      </div>
    </div> 
    <!-- End #header-area -->  
  </div>  
  <!-- Start .header-inner --> 
</div>
<!-- End #header -->

<!-- Start #content -->
<div id="content" style="margin-left:0px; padding-top: 15px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <!-- End .row -->
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
	<Br><Br><Br>

      <div class="row">
        <!-- Start .row -->
         <div class="col-lg-12 col-md-12">
          <?PHP $alrt = @$_GET['al']; $ide = @$_GET['id']; 
             
            $qem= mysql_query("select * from `emp` where idUser='$ide'");
             While ($qem_row= mysql_fetch_assoc($qem)) { $qem2 = $qem_row['code']; $qem3 = $qem_row['title']; }
             
             switch ($alrt) { case "1":?>
          <div class="alert alert-danger fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
              <strong>Sorry!</strong> Your Employee Id <b><?php echo $ide; ?></b> has been registered by <b><?php echo $qem2.' '.$qem3; ?></b>, 
              Please call our support in Ext. <b>318</b> / <b>323</b> or email us in <b>dhimas.yuli@gunanusa.co.id</b></div>
          <?PHP break; case "2": ?>
          <div class="alert alert-danger fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Oh snap!</strong> Your Password doesnt match with your confirm password, please try again.</div> 
          <?PHP break; case "3": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully added profile with your id Employee <b><?php echo $ide; ?></b>.</div>
          <?PHP break; case "4": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully added New Job Title.</div>
          <?PHP break; case "5": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully added New Section.</div>
          <?PHP break; case "6": ?>
          <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <i class="fa-ok alert-icon s24"></i> <strong>Well done!</strong> You successfully added New Superior.</div>
          <?PHP break; default: }?>
          </div> 
          
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-12 -->            
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title></h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role="form" action="sys/engine/iRegister.php" method="post" enctype="multipart/form-data" id=validate>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Level KPI</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">First Name</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Last Name</label>
                  <div class="col-lg-4 col-sm-4">
                    <select class="form-control select2" name="lvl">
                      <option value="10">SELECT</option>
                      <option value="0">Staff</option>
                      <option value="1">Manager</option>
                      <option value="2">Vice President</option>
                      <option value="3">Director of</option>
                      <option value="4">BOC</option>       
                    </select>
		      <span>*Level adalah tingkatan pada posisi anda.</span>
                  </div>                  
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required placeholder="Type your first name" name="fn">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required placeholder="Type your last name" name="ln">
                  </div>
                </div>
                  <br>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Id. Employee</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Password</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Confirm Password</label>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control name="ide" placeholder="0123456789">
                  </div>                  
                  <div class="col-lg-4 col-sm-4">
                    <input type="password" class=form-control required placeholder="Type your password" name="fp">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input type="password" class=form-control required placeholder="Type your password" name="cp">
                  </div>
                </div>
                <!-- End .form-group  -->                  
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Email</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Job Title</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Group Director</label>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required placeholder="your.name@gunanusa.co.id" name="eml" style="text-transform: lowercase;">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qep= mysql_query("SELECT * FROM emppos ORDER BY descr ASC");
            
                            echo '<select class="form-control select2" name="pos">';
                            echo '<option value="0">SELECT';
                  
                              While($qep2= mysql_fetch_assoc($qep)) { echo '<option value="'.$qep2['idPos'].'">'.$qep2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Tambahkan posisi jika tidak ada dalam daftar.</span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qep= mysql_query("SELECT * FROM empdiv WHERE spc=1 ORDER BY CODE asc");
            
                            echo '<select class="form-control select2" name="bod">';
                            echo '<option value="0">SELECT';
                  
                              While($qep2= mysql_fetch_assoc($qep)) { echo '<option value="'.$qep2['idDiv'].'">'.$qep2['code'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Pilih jika posisi jabatan terdapat dalam Grup.</span>
                  </div>
                </div>
                <!-- End .form-group  -->
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Group Division</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Group Department</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Group Section</label>
                    <div class="col-lg-4 col-sm-4">
                    <?PHP $qdv= mysql_query("select * from empdiv where vis=0 AND idEmp=0 ORDER BY code ASC");
            
                            echo '<select class="form-control select2" name="div">';
                            echo '<option value="0">SELECT';
                  
                              While($qdv2= mysql_fetch_assoc($qdv)) { echo '<option value="'.$qdv2['idDiv'].'">'.$qdv2['code'].' - '.$qdv2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Pilih jika posisi jabatan terdapat dalam Grup.</span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("SELECT * FROM empdep WHERE vis=0 ORDER BY code ASC");
            
                            echo '<select class="form-control select2" name="dep">';
                            echo '<option value="0">SELECT';
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idDep'].'">'.$qcat2['code'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Pilih jika posisi jabatan terdapat dalam Grup.</span>                    
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("select * from empsec where vis=0 order by descr asc");
            
                            echo '<select class="form-control select2" name="sec">';
                            echo '<option value="0">SELECT';
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idSec'].'">'.$qcat2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Tambahkan Grup Section jika tidak ada dalam daftar.</span>
                  </div>
                  
                </div>
                <!-- End .form-group  -->
                <br>
                <div class="form-group">
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Direct Superior</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Phone Extention</label>
                  <label class="col-sm-4 text-left" style="margin-bottom:3px;">Phone Mobile</label>
                  <div class="col-lg-4 col-sm-4">
                    <?PHP $qcat= mysql_query("select * from empspv order by descr asc");
            
                            echo '<select class="form-control select2" name="spv">';
                            echo '<option value="0">SELECT';
                  
                              While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idSpv'].'">'.$qcat2['descr'].'</option>'; }
                                        
                            echo '</select>';
                    ?>
			<span>*Tambahkan Atasan anda jika tidak ada dalam daftar.</span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required placeholder="123" name="phn">
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <input class=form-control required placeholder="0811223344" name="mbl">
                  </div>
                </div>
                <!-- End .form-group  -->

                <hr>
				    <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Upload Photo</label>
                  <div class="col-lg-4 col-md-4">
                    <input type=file name="nama_file">
			<span>*Pastikan foto anda terisi.</span>
                  </div>
            </div>
            <!-- End .form-group  -->
            <hr>                          
            <div class=form-group>
              <label class="col-lg-8 col-md-8 col-sm-12 control-label"></label>
                <div class="col-lg-2 col-md-2">
                    <button type=submit class="btn btn-primary">REGISTER</button>
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

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add New Job Title</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/iMisc.php method="post" enctype="multipart/form-data" id="validate">                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Job Title</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD" class=form-control required name="cdjt" placeholder="ie. CPE01">
                            <input type=hidden class=form-control readonly value="1" name="swh">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tkjt" placeholder="ie. Corporate Planning Engineer"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Job Description (optional)</label>                                                     
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="dsc" placeholder="ie. Develop Organisational Performance policies and procedures 
having regard to best practice to compliment the new model."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <Br>
                    <div class="">
                
                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=reset class="btn btn-default">Reset</button>
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
 
    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal2" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add New Section</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/iMisc.php method="post" enctype="multipart/form-data" id="validate">                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Department Name</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD" class=form-control required name="cds" placeholder="ie. WS01">
                            <input type=hidden class=form-control readonly value="2" name="swh">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <?PHP $qdep= mysql_query("SELECT * FROM empdep WHERE vis=0 ORDER BY descr ASC");
            
                                echo '<select class="form-control select2" name="deps" required>';
                                echo '<option value="0">SELECT';
                  
                                    While($qdep2= mysql_fetch_assoc($qdep)) { echo '<option value="'.$qdep2['idDep'].'">'.$qdep2['descr'].'</option>'; }
                                        
                                echo '</select>'; ?>                    
                  </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Title Section </label>                                                     
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="ts" placeholder="ie. Welding Section"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <Br>
                    <div class="">
                
                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=reset class="btn btn-default">Reset</button>
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

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal3" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add New Superior</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/iMisc.php method="post" enctype="multipart/form-data" id="validate">                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Id. Employee</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Supervisor Name</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD" class=form-control required name="cdie" placeholder="ie. 8516">
                            <input type=hidden class=form-control readonly value="3" name="swh">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tie" placeholder="ie. Rahadi Mujiono"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Remark (optional)</label>                                                     
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="dsc" placeholder="Type your remark here."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <Br>
                    <div class="">
                
                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=reset class="btn btn-default">Reset</button>
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
        
        
<!-- End #content -->
<!-- Javascripts -->
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<!-- <script src="assets/js/jquery-ui.js" type="text/javascript"></script> -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/jquery-ui.js></script>
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->