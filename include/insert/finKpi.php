					<?PHP 
                    
                        $yr= date("Y");
                        
                        $fnc= mysql_query("select * from kpidetails where vis='0' and year='$yr' order by idKpiDetails asc");
		
						      While($fnc2= mysql_fetch_assoc($fnc)) {
                                  
                                  $ic = $fnc2['idCatagory'];
                                  $im = $fnc2['idMonitoring'];
                                  $iu = $fnc2['idUnit'];
                                  $ie = $fnc2['idEmp'];
                                  $ikc = $fnc2['idKpiComponent'];

                                        $ictg= mysql_query("select * from `kpicatagory` where idKpiCatagory='$ic'") or die(mysql_error());
                                        $ictg2= mysql_result($ictg, 0, 'code');
                                  
                                        $imt= mysql_query("select * from `kpimonitoring` where idKpiMonitoring='$im'") or die(mysql_error());
                                        $imt2= mysql_result($imt, 0, 'code');
                                  
                                        $imt= mysql_query("select * from `kpiunit` where idKpiUnit='$iu'") or die(mysql_error());
                                        $imt2= mysql_result($imt, 0, 'code');                                  
                                  
								echo '<td>'.$mu2['noreg_cost'];
								echo '<td>'.$mu2['description'];

                          $cmpy=$mu2['kode_company'];
                          $cmpy2= mysql_query("select * from `company` where kode_company='$cmpy'") or die(mysql_error());
                          $cmpy3= mysql_result($cmpy2, 0, 'nama_company');

                echo '<td>'.$cmpy3;
                // echo '<td>'.$mu2['mod_user'];
                echo '<td>'.$mu2['mod_date'];
                echo '<td class="text-center"><a href="edit_costcode.php?kd='.$mu2["id_costcode"].'" target="_Blank"><i class="en-pencil"></i></a> | ';                
								echo '<a href="sys/engine/del_costcode.php?kd='.$mu2["id_costcode"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$mu2["noreg_cost"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';								
							}
					?>

<?PHP 
                    
                        $today = date("Y-m-d");
                        $yr= date("Y");
                        
                        $kc= mysql_query("SELECT * FROM kpicomponent WHERE idCatagory='1' AND year='2016' AND vis='0' order by idKpiComponent ASC");
		
						      While ($kc2= mysql_fetch_assoc($kc)) 
                              
                              {
                                  
                                  $ic = $kc2['idCatagory'];
                                  $iu = $kc2['idKpiUnit'];

                                    $ictg= mysql_query("select * from `kpicatagory` where idKpiCatagory='$ic'") or die(mysql_error());
                                    $ictg2= mysql_result($ictg, 0, 'code');
                                  
                                    $imt= mysql_query("select * from `kpiunit` where idKpiUnit='$iu'") or die(mysql_error());
                                    $imt2= mysql_result($imt, 0, 'code');                                  
                                  
                                echo '<td>'.$kc2['codeKpi'];
								echo '<td><a href="viewKpi.php?kd='.$kc2["idKpiComponent"].'" target="_Blank">'.$kc2['titleKpi'].'</a>';
                                echo '<td>'.$imt2;
                                echo '<td>'.$kc2['target'];
                                echo '<td>';
                                echo '<td>';
                                echo '<td><img class=user-avatar src=assets/img/trendup.png >';
                                
                                echo '<td class="text-center">';
                                echo '<a href="editKpi.php?kd='.$kc2["idKpiComponent"];
                                echo '" target="_Blank"><i class="en-pencil"></i></a> | ';                
								echo '<a href="sys/engine/delKpi.php?'>;
                                echo 'kd='.$kc2["idKpiComponent"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["codeKpi"].'&&swch=1"';
                                echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash"></i></a>';								
							}
					?>