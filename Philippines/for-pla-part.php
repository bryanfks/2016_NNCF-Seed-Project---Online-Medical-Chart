<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_Recordnum = $_SESSION["record_Num"];
	$patient_name = $_SESSION["patient_name"];
	//unset($_SESSION["record_Num"], $_SESSION["patient_name"]);
	$patient_id = $_GET["pat_id"];		// 病患代號，資料傳遞以此為主
	$branch = $_GET["branch"];
	if(!empty($seid) && !empty($sepwd)){
	$patient_Record = $_GET["patrec"];
	//$_SESSION["patient_id"] = $patient_id
	

		/*	以國外醫師的帳號、病患的代號，來調出病例資料*/
		
		if(!empty($patient_id)){
			$sel_record = "SELECT * FROM `patientmr` WHERE  patientid='".$patient_id."' ORDER BY `serialcode` DESC";
		} else if (!empty($patient_Record)) {
			$sel_record = "SELECT * FROM `patientmr` WHERE  patientid='".$patient_Record."' ORDER BY `serialcode` DESC";
		} else {
			$sel_record = "SELECT * FROM `patientmr` WHERE  record_num='".$patient_Record."' AND editor='".$seid."' ORDER BY `serialcode` DESC";
		}	
		$query_Record = mysql_query($sel_record);

		$sel_auth = "SELECT `authority` FROM `member` WHERE id='".$seid."'";
		$query_auth = mysql_query($sel_auth);
		$result_auth = mysql_fetch_array($query_auth);
		
		$sel_pat_rec = "SELECT * FROM `patientmr` WHERE patientid=\"".$rec_num."\" AND branch=\"".$rec_branch."\" AND serialcode=\"".$rec_serialcode."\"";
		$query_sel_pat_rec = mysql_query($sel_pat_rec);
		$res_pat_rec = mysql_fetch_array($query_sel_pat_rec);
?>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<title>NCF -- Patient Record Online Management System</title>
		<script language="javascript" type="text/javascript">
			<!--
				function addRecords(value){
					patien_id = document.myform.partner_value.value;
					result = document.myform.patientid.value;
					if (value == "p"){
						location.href = 'for-pla-add-cam-part.php?patid='+patien_id+'&branch='+<?PHP if (!empty($query_Record["branch"])) {echo $query_Record["branch"];} else {echo $branch;} ?>+'&patientid='+result;
					} else if (value == "c"){
						location.href = 'for-pla-add-cam-cgmh.php?patid='+patien_id+'&branch='+<?PHP if (!empty($query_Record["branch"])) {echo $query_Record["branch"];} else {echo $branch;} ?>+'&patientid='+result;
					} else if (value == "n") {
						location.href = 'for-pla-add-cam-ncf.php?patid='+patien_id+'&branch='+<?PHP if (!empty($query_Record["branch"])) {echo $query_Record["branch"];} else {echo $branch;} ?>+'&patientid='+result;
					} else if (value == "a") {
						location.href = 'for-pla-add-cam-admin.php?patid='+patien_id+'&branch='+<?PHP if (!empty($query_Record["branch"])) {echo $query_Record["branch"];} else {echo $branch;} ?>+'&patientid='+result;
					}
				}
		
				function fetch_Data(nums){
					auth = "<?PHP  echo $result_auth['authority'];  ?>";
					if (auth == "p") {
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-part.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "c"){
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-cgmh.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "n"){
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-ncf.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "a") {
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-admin.php?record_num='+result+'&patient_id='+patien_id;
					}
				}
		
				function fetch_Data2(nums){
					auth = "<?PHP  echo $result_auth['authority'];  ?>";
					if (auth == "p") {
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-view.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "c"){
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-cgmh.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "n"){
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-ncf.php?record_num='+result+'&patient_id='+patien_id;
					} else if (auth == "a") {
						result = document.myform.elements["record_num"+nums].value;
						patien_id = document.myform.partner_value.value;
						location.href = 'for-pla-add-cam-admin.php?record_num='+result+'&patient_id='+patien_id;
					}
				}
		
				function view_Data(nums){
					result = document.myform.elements["record_num"+nums].value;
					condition_num = document.myform.elements["condition_num"+nums].value;
					patien_id = document.myform.partner_value.value;
					//location.href = 'for-pla-add-cam-cgmh.php?record_num='+result+'&patient_id='+patien_id;
					location.href = 'for-pla-add-cam-view.php?record_num='+result+'&patient_id='+patien_id;
				}
		
				function checkPartner2(){
					patien_id = document.myform.partner_value.value;
					location.href = "rec-pat-inf.php?id="+patien_id;
				}
			//-->
		</script>
	</head>

	<body topmargin="2">
		<form name="myform" enctype="multipart/form-data" method="post" action="">
			<div align="center">
				<center>
					<table border="0" cellpadding="0" cellspacing="0" width="760">
						<tr>
      						<td width="100%">
						        <div align="center">
          							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
							            <tr>
     								        <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("top.php"); ?></font></td>
            							</tr>
							            <tr>
              								<td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("select.php"); ?></font></td>
							            </tr>
  				</center>
            							<tr>
              								<td width="100%" height="100%" align="center">
								            	<div align="center">
                  									<table border="0" cellpadding="0" cellspacing="0" width="100%">
									                    <tr>
											                <td width="100%">
	                      										<? if($result_auth['authority']  == 'p'){ ?>
										                        <div align="left">
										                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            										<tr>
										                            	<td width="20%">
																			<font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font>
																		</td>
                              											<td width="20%">
                              												<img border="0" src="images/label-22.gif" width="160" height="40"></td>
                              												<?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
																		<td width="20%"></td>
                              											<td width="20%"></td>
                              											<td width="20%"></td>
                            										</tr>
                          										</table>
                                                   				</div>
					  											<?  } elseif ($result_auth['authority']  == 'c') { ?>
                        										<div align="left">
										                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                            											<tr>
                              												<td width="20%">
                                                                            	<font size="3" face="Arial">
                                                                                	<a id="NCF_Partner" onClick="return checkPartner2()" href="#">
                                                                                    	<img border="0" src="images/label-11.gif" width="160" height="40">
                                                                                    </a>
                                                                                 </font>
                                                                            </td>
                              												<td width="20%"></td>
                              												<td width="20%">
                              													<img border="0" src="images/label-23.gif" width="160" height="40"></td>
												                            	<?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              												<td width="20%"></td>
                              												<td width="20%"></td>
                            											</tr>
                          											</table>
                        										</div>
										                        <?  } elseif ($result_auth['authority']  == 'n' || 'a') { ?>
                        										<div align="left">
											                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            											<tr>
                              												<td width="21%">
                                                                            	<font size="3" face="Arial">
                                                                                	<a id="NCF_Partner" onClick="return checkPartner2()" href="#">
                                                                                    	<img border="0" src="images/label-11.gif" width="160" height="40">
                                                                                     </a>
                                                                                </font>
                                                                            </td>
                              												<td width="19%"></td>
												                            <td width="21%"></td>
                              												<td width="21%">
                              													<img border="0" src="images/label-24.gif" width="160" height="40"></td>
												                              	<?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              												<td width="18%"></td>
											                            </tr>
                          											</table>
                        										</div>
                        									<? } ?>
                      									</td>
                    								</tr>
  												<center>
  													<tr>
                										<td width="103%" align="center" bgcolor="#F7EBC6">
              												<div align="center">
                												<table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  													<tr>
                    													<td width="100%">
                      														<p align="center">
                                                                            	<font face="Arial" color="#FFFFFF" size="3">
                                                                                	<i>
                                                                                    	<b>Record of Plastic &amp; Reconstructive Surgery</b>
                                                                                     </i>
                                                                                </font>
                                                                      </td>    
                  													</tr>
                												</table>
              												</div>
  												
                                                </center><p style="line-height: 200%" align="left" dir="rtl">&nbsp;</p>
                                                </td>
          									</tr>
          									<tr>
            									<td width="103%" align="center" bgcolor="#F7EBC6" valign="top">
              										<div align="center">
										                <center>
                											<table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  												<tr>
												                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="4" valign="top">
              															<div align="center">
                															<center>
                																<table border="0" cellpadding="0" cellspacing="0" width="90%" style="padding:0; font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  																	<tr>
                    																	<td width="100%" style="padding:0; " height="19">
                      																		<p style="line-height: 200%" align="center">
                    																	</td>
                  																	</tr>
                																</table>
                															</center>
              															</div>
              															<div align="center">
                															<center>
																                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  																	<tr>
															                            <td width="16%" align="center" height="19" valign="middle">
																                            <p style="line-height: 150%">Record number</p>
                                                                                        </td>  
															                            <td width="17%" align="center" height="19" valign="middle">
                              																<p style="line-height: 150%">ID of the editor</p>
                                                                                        </td>
																	                    <td width="17%" align="center" valign="middle">
																		                      <p style="line-height: 150%">Condition</p>
                            															</td>
                    																	<td width="17%" align="center" valign="middle">&nbsp;</td>
                  																	</tr>
                  																	<?PHP
																		 				$i=0;
																							while ($result_Records = mysql_fetch_array($query_Record)) {
																								$serialcode = $result_Records["serialcode"]; 		/* 1/20 update : 增加判斷式，若小於10則捕零   */
																								if ($serialcode < 10) {
																									$serialcodes = "0".$serialcode;
																								} else {
																									$serialcodes = $serialcode;
																								}
																								$medical_records = $result_Records["patientid"].$result_Records["branch"].$serialcodes;
								
																								echo "<tr>";
																								echo "<td width='16%' align='center' valign='middle'>".$medical_records."</td>";
        				    																	echo "<td width='17%' align='center' valign='middle'>".$result_Records["editor"]."</td>";
																							if(($result_Records["chkcode"] == "p") || ($result_Records["chkcode"] == "pe")){
																								echo "<td width='17%' align='center' valign='middle'>Pending.</td>";
																								$recode_number = $result_Records["patientid"].$result_Records["branch"].$result_Records["serialcode"];
																								echo "<input type='hidden' name='record_num".$i."' value='".$recode_number."'>";
																								echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='fetch_Data(".$i.")'></font></td></tr>";
																							} else if (($result_Records["chkcode"] == "pne") || ($result_Records["chkcode"] == "pn") || ($result_Records["chkcode"] == "pnce") || ($result_Records["chkcode"] == "pcne")|| ($result_Records["chkcode"] == "pce")) {
																								echo "<td width='17%' align='center' valign='middle'>Pending.</td>";
																								$recode_number = $result_Records["patientid"].$result_Records["branch"].$result_Records["serialcode"];
																								echo "<input type='hidden' name='record_num".$i."' value='".$recode_number."'>";
																								echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='fetch_Data2(".$i.")'></font></td></tr>";
																							} else if (($result_Records["chkcode"] == "pc") || ($result_Records["chkcode"] == "pcne")) {
																								echo "<td width='17%' align='center' valign='middle'>Finish.</td>";
																								$recode_number = $result_Records["patientid"].$result_Records["branch"].$result_Records["serialcode"];
																								echo "<input type='hidden' name='record_num".$i."' value='".$recode_number."'>";
																								echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='fetch_Data2(".$i.")'></font></td></tr>";
																							}else {
																								echo "<td width='17%' align='center' valign='middle'>Finish.</td>";
																								$recode_number = $result_Records["patientid"].$result_Records["branch"].$result_Records["serialcode"];
																								echo "<input type='hidden' name='record_num".$i."' value='".$recode_number."'>";
																								echo "<input type='hidden' name='condition_num".$i."' value='".$result_Records["condition"]."'>";
																								echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='view_Data(".$i.")'></font></td></tr>";
																							}
						  																	$i++;
																						}
				 																	?>
                 															</table>
                														</center>
              														</div>
              														<p align="center" style="line-height: 200%; margin-left: 10; margin-right: 10">
              														<font size="3">
              														<? 
																  		if(($result_auth['authority']  == 'p') || ($result_auth['authority']  == 'a')){ 
																	?>
												              			<input type='hidden' name='patientid' value='<? echo $patient_id; ?>'>
																		<input type='button' value='ADD RECORD' name='addRecord' onClick="return addRecords('<?PHP echo $result_auth['authority']; ?>')">
																	<?
                                                                    	} else {
																			echo "";	
																		}
			  														?>
														            </font>
                                                                    <p style="line-height: 200%" align="center">
                    											</td>
															</tr>
                  										</table>
                									</center>
              									</div>
              								<p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　							</td>
										</tr>
                    				</table>
                  					</div>
                				</td>
            				</tr>
            				<tr>
              					<td width="100%" height="1" align="center">
                					<hr size="1" color="#C0C0C0" width="98%">
                						<p align="center">
                                        	<i>
                                            	<font size="2">
                                                	<font face="Arial" color="#999999">The&nbsp;Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font>
                                                    <font color="#999999">：</font>
                                                    <font face="Arial">
                                                    <font color="#999999">Internet&nbsp;Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;Resolution<br>
                Copyright © 2008&nbsp; </font>
                									<a href="http://www.nncf.org/" target="_blank">
                                                    	<font color="#0066CC">Noordhoff&nbsp;Craniofacial&nbsp; Foundation<br>        
                										<br>
                										</font>
                                                    </a>
                                                   	</font>
                                               	</font>
											</i>
								</td>
            				</tr>
          				</table>
        				</div>
      				</td>
    			</tr>
  			</table>
			</div>
				<input type="hidden" name="patids" id="patids" value="<?PHP echo $patient_id; ?>">
		</form>
	</body>
</html>

<?PHP
	} else {
		echo "<html>";
		echo "<head>";
		echo "<Script Language='JavaScript'>";
		echo "<!--";
		echo "\n alert('Sorry, Access denied. Please Login first.');";
		echo "\n";
		echo " location.href='login.php';\n";
		echo "//-->";
		echo " </Script>";
		echo "</head>";
		echo "</html>";
	}
?>