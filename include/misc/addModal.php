    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal1" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details in FINANCE Perspective</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <?php
		
                            echo '<label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>';
                            echo '<div class="col-lg-10 col-md-10">';

			                     $sm= mysql_query("SELECT * FROM sm WHERE idCat=3");
            
                            echo '<select class="form-control select2" name="sm" onchange="showCD(this.value)">';
                            echo '<option value="">SELECT THEMES';
                  
                                While($sm2= mysql_fetch_assoc($sm)) {

                                    echo '<option value="'.$sm2['idSm'].'">';
                                    echo $sm2['idCode'].' '.$sm2['description'];
                                    echo '</option>';
                                
                                }
                                   
                            echo '</select></div>';
                        ?>
                    </div>
                    <!-- End .form-group  -->
                    <hr>                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD" class=form-control required name="cd" placeholder="ie. F01.1">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Description (optional)</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=2 name="dsc" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-8 col-md-8 control-label text-left">Calculation</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="clc" placeholder="ie. Measures accuracy registered document. A=Outstanding Doc. To Registered, B=Sum of document in the month, C=Target your KPI in each month, Result=(A/B)*C"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12"></label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Weight (left <?PHP echo $rwg3; ?>%)</label>                        
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Target</label>
                        <label class="col-lg-4 col-md-4 col-sm-12 control-label text-left">Unit</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="wgh" placeholder="1-100">
				            <input type=hidden class=form-control value="<?PHP $mnt=3; echo $mnt; ?>" name="mnt">
                            <input type=hidden class=form-control value="<?PHP $kc=1; echo $kc; ?>" name="cat">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
				            <input type=hidden class=form-control value="<?PHP echo $idp; ?>" name="dep">
				            <input type=hidden class=form-control value="<?PHP echo $ids; ?>" name="sec">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="tgt" placeholder="0-9999">
                        </div>
                        <div class="col-lg-4 col-md-4">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="ku">';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>                        
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
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
    <!-- End .modal FIN -->

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal2" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details in STAKEHOLDER Perspective</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <?php
		
                            echo '<label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>';
                            echo '<div class="col-lg-10 col-md-10">';

			                     $sm= mysql_query("SELECT * FROM sm WHERE idCat=3");
            
                            echo '<select class="form-control select2" name="sm" onchange="showCD2(this.value)">';
                            echo '<option value="">SELECT THEMES';
                  
                                While($sm2= mysql_fetch_assoc($sm)) {

                                    echo '<option value="'.$sm2['idSm'].'">';
                                    echo $sm2['idCode'].' '.$sm2['description'];
                                    echo '</option>';
                                
                                }
                                   
                            echo '</select></div>';
                        ?>
                    </div>
                    <!-- End .form-group  -->
                    <hr>                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD2" class=form-control required name="cd" placeholder="ie. F01.1">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Description (optional)</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=2 name="dsc" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-8 col-md-8 control-label text-left">Calculation</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="clc" placeholder="ie. Measures accuracy registered document. A=Outstanding Doc. To Registered, B=Sum of document in the month, C=Target your KPI in each month, Result=(A/B)*C"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12"></label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Weight (left <?PHP echo $rwg3; ?>%)</label>                        
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Target</label>
                        <label class="col-lg-4 col-md-4 col-sm-12 control-label text-left">Unit</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="wgh" placeholder="1-100">
				            <input type=hidden class=form-control value="<?PHP $mnt=3; echo $mnt; ?>" name="mnt">
                            <input type=hidden class=form-control value="<?PHP $kc=2; echo $kc; ?>" name="cat">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
				            <input type=hidden class=form-control value="<?PHP echo $idp; ?>" name="dep">
				            <input type=hidden class=form-control value="<?PHP echo $ids; ?>" name="sec">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="tgt" placeholder="0-9999">
                        </div>
                        <div class="col-lg-4 col-md-4">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="ku">';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>                        
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
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
    <!-- End .modal STK -->

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="add_IP_Modal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details in INTERNAL PROCESS Perspective</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <?php
		
                            echo '<label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>';
                            echo '<div class="col-lg-10 col-md-10">';

			                     $sm= mysql_query("SELECT * FROM sm WHERE idCat=3");
            
                            echo '<select class="form-control select2" name="sm" onchange="showCD3(this.value)">';
                            echo '<option value="">SELECT THEMES';
                  
                                While($sm2= mysql_fetch_assoc($sm)) {

                                    echo '<option value="'.$sm2['idSm'].'">';
                                    echo $sm2['idCode'].' '.$sm2['description'];
                                    echo '</option>';
                                
                                }
                                   
                            echo '</select></div>';
                        ?>
                    </div>
                    <!-- End .form-group  -->
                    <hr>                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD3" class=form-control required name="cd" placeholder="ie. F01.1">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Description (optional)</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=2 name="dsc" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-8 col-md-8 control-label text-left">Calculation</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="clc" placeholder="ie. Measures accuracy registered document. A=Outstanding Doc. To Registered, B=Sum of document in the month, C=Target your KPI in each month, Result=(A/B)*C"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12"></label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Weight (left <?PHP echo $rwg3; ?>%)</label>                        
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Target</label>
                        <label class="col-lg-4 col-md-4 col-sm-12 control-label text-left">Unit</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="wgh" placeholder="1-100">
				            <input type=hidden class=form-control value="<?PHP $mnt=3; echo $mnt; ?>" name="mnt">
                            <input type=hidden class=form-control value="<?PHP $kc=3; echo $kc; ?>" name="cat">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
				            <input type=hidden class=form-control value="<?PHP echo $idp; ?>" name="dep">
				            <input type=hidden class=form-control value="<?PHP echo $ids; ?>" name="sec">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="tgt" placeholder="0-9999">
                        </div>
                        <div class="col-lg-4 col-md-4">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="ku">';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>                        
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
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
    <!-- End .modal IP -->

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal4" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details in LEARNING GROWTH Perspective</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <?php
		
                            echo '<label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>';
                            echo '<div class="col-lg-10 col-md-10">';

			                     $sm= mysql_query("SELECT * FROM sm WHERE idCat=3");
            
                            echo '<select class="form-control select2" name="sm" onchange="showCD4(this.value)">';
                            echo '<option value="">SELECT THEMES';
                  
                                While($sm2= mysql_fetch_assoc($sm)) {

                                    echo '<option value="'.$sm2['idSm'].'">';
                                    echo $sm2['idCode'].' '.$sm2['description'];
                                    echo '</option>';
                                
                                }
                                   
                            echo '</select></div>';
                        ?>
                    </div>
                    <!-- End .form-group  -->
                    <hr>                   
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD4" class=form-control required name="cd" placeholder="ie. F01.1">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Description (optional)</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=2 name="dsc" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-8 col-md-8 control-label text-left">Calculation</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="clc" placeholder="ie. Measures accuracy registered document. A=Outstanding Doc. To Registered, B=Sum of document in the month, C=Target your KPI in each month, Result=(A/B)*C"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12"></label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Weight (left <?PHP echo $rwg3; ?>%)</label>                        
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Target</label>
                        <label class="col-lg-4 col-md-4 col-sm-12 control-label text-left">Unit</label>
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="wgh" placeholder="1-100">
				            <input type=hidden class=form-control value="<?PHP $mnt=3; echo $mnt; ?>" name="mnt">
                            <input type=hidden class=form-control value="<?PHP $kc=4; echo $kc; ?>" name="cat">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
				            <input type=hidden class=form-control value="<?PHP echo $idp; ?>" name="dep">
				            <input type=hidden class=form-control value="<?PHP echo $ids; ?>" name="sec">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="tgt" placeholder="0-9999">
                        </div>
                        <div class="col-lg-4 col-md-4">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="ku">';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>                        
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
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
    <!-- End .modal IP -->