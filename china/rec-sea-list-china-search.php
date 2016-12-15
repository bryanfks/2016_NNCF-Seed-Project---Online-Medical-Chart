<?
session_start();

include 'db.php';

$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];

if( (!empty($seid)) && (!empty($sepwd)) ){

		$courses = $_POST['courses']; //選擇療程科別
		$srhType = $_POST["srhType"];
		$srhValue = $_POST["srhValue"];
		
		if((!empty($srhValue))){
			$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE `name` LIKE '".$srhValue."' OR `idno` LIKE '".$srhValue."' OR `MedicalRecordNumber` LIKE '".$srhValue."'"; 
			//屬廣泛搜尋法 ％：表示分配字元
			@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
			@$rows = mysql_num_rows($queryChinaPatientinfo);

			//echo $selChinaPatientinfo."<br>".$rows."<br>";
		}

			//echo "Courses: ".$courses."<br>srhType: ".$srhType."<br>srhValue: ".$srhValue."<br>";
			//echo $selChinaPatientinfo."<br>";

		

		/*
		if($srhType == "chkID"){
			$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE idno='".$srhValue."' ORDER BY `idno` DESC";
			@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
			@$rows = mysql_num_rows($queryChinaPatientinfo);
		}else if($srhType == "chkNAME"){
			$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE name='".$srhValue."' ORDER BY `name` DESC";
			@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
			@$rows = mysql_num_rows($queryChinaPatientinfo);
		}else if($srhType == "chkPATNO"){
			$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE MedicalRecordNumber ='".$srhValue."' ORDER BY `MedicalRecordNumber` DESC";
			@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
			@$rows = mysql_num_rows($queryChinaPatientinfo);
			//echo $selChinaPatientinfo."<br>";
		}else{
			echo "<Script Language='JavaScript'>";
			echo "\n alert('查无符合资料！请按下“直接新增补助申请表”新增补助申请表');";
			echo " </Script>";
		}
		*/
		/*
		@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		@$rows = mysql_num_rows($queryChinaPatientinfo);
		*/
		if(empty($rows)){
			echo "<Script Language='JavaScript'>";
			//echo "alert('查无符合资料！请按下“直接新增补助申请表”新增补助申请表');";
			echo "alert('查无符合资料！请按下”确定”直接新增补助申请表');";
			if($courses == "ps"){
				echo "location.href = 'for-pla-add-china-cgmh.php'";
			}elseif ($courses == "po") {
				echo "location.href = 'china-addpat-po.php'";
			}elseif ($courses == "st") {
				echo "location.href = 'cn-lang-add.php'";
			}
			echo " </Script>";
		}
		
		?>
		<html>

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
			<meta name="ProgId" content="FrontPage.Editor.Document">
			<title>NCF -- Patient Record Online Management System</title>
			<SCRIPT LANGUAGE="javascript">
				
				function fetch_Data(num){
					
					var courses = document.getElementById('courses').value;
					//alert(courses);
					if((courses == "ps") || (courses == "po")){
						location.href = "for-pla-add-china-cgmh-view_new.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>&courses="+courses;
					}else if(courses == "st"){
						location.href = "cn-lang-add-2nd.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>&courses="+courses;
						//alert("cn-lang-add-2nd.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>&courses="+courses);
					}
					
				}
				function addData(){
					var courses = document.getElementById('courses').value;
					//var NCFMedicalNum = document.getElementById('NCFMedicalNum').value;
					if (courses == "ps"){
						location.href = "for-pla-add-china-cgmh.php?c="+courses;
					}else if (courses == "po"){
						location.href = "china-addpat-po.php?c="+courses;
					}else if (courses == "st"){
						location.href = "cn-lang-add.php?c="+courses;
					}					
				}
				function turnback(){
					location.href = "for-pla-add-china-cgmh.php";
				}
			</SCRIPT>
		</head>

<body topmargin="2">
	<form name="myForm" enctype="multipart/form-data" method="get" >
		<div align="center">
			<center>
				<table border="0" cellpadding="0" cellspacing="0" width="760">
					<tr>
						<td width="100%">
							<div align="center">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
									<tr>
										<td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../china/top.php"); ?></font></td>
									</tr>
									<tr>
										<td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../china/select.php"); ?></font></td>
									</tr>

									<tr>
										<td width="100%" height="100%" align="center">
											<div align="center">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="100%">
															<div align="left">
																<table border="0" cellpadding="0" cellspacing="0" width="100%">
																	<tr>
																		<td width="20%"></td>
																		<td width="20%"></td>
																		<td width="20%"></td>
																		<td width="20%"></td>
																		<td width="20%"></td>
																	</tr>
																</table>
															</div>
														</td>
													</tr>
													<center>
														<tr>
															<td width="100%" align="center" bgcolor="#F7EBC6">
																<font size="2">　</font>
																<div align="center">
																	<table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
																		<tr>
																			<td width="100%">
																				<p align="center"><i>
																					<font face="Arial" color="#FFFFFF" size="3"><b>Search   
																						Patient</b></font></i></td>   
																					</tr>
																				</table>
																			</div>

																			<p style="line-height: 200%" align="left"><font color="#666666" size="2">　</font></td>
																			</tr>
																			<tr>
																				<td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
																					<div align="center">
																						<center>
																							<table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
																								<tr>
																									<td width="100%" style="border-top: 1px solid #C0C0C0; " height="19">
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
																											<p style="line-height: 150%">个案编号</td>  
																												<td width="16%" align="center" height="19" valign="middle">
																													<p style="line-height: 150%">身份证号</td>
																														<td width="17%" align="center" height="19" valign="middle">
																															<p style="line-height: 150%">个案姓名</td>
																																<td width="17%" align="center" height="19" valign="middle">
																																	<p style="line-height: 150%">医院名称</td>
																																		<td width="17%" align="center" height="19" valign="middle">
																																			<p style="line-height: 150%">医院病历号码</td>
																																				<td width="17%" align="center" valign="middle">　</td>
																																			</tr>
																																			<?PHP
																																			$i = 1;
																																			if(empty($rows)){
																																				echo "<br>";
																																			}else{
																																			while($resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo)){
																																				echo "<tr>";
																																				echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFID"]."</td>";
																																				echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["idno"]."</td>";
																																				echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["name"]."</td>";
																																				echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["school"]."</td>";
																																				echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["MedicalRecordNumber"]."</td>";
																																				$values = $resultChinaPatientinfo['num'];
																																				echo "<input type='hidden' id='' name='' value='<?PHP echo $srhValue; ?>''>";
																																				echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values.")'></font></td>";
																																				echo "</tr>";
																																				$i++;
																																			}}
																																			?>
																																		</table>
																																	</center>
																																</div>
																																<p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
																																<p><input type="button" name="addNewRecord" value="直接新增补助申请" onClick="return addData()"></p>
																																<p><input type="hidden" id="courses" name="courses" value="<?PHP echo $courses;?>" onClick="return addData(<?PHP echo $courses;?>)"></p>
																															　</td>
																														</tr>
																													</table>
																												</div>
																											</td>
																										</tr>
																										<tr>
																											<td width="100%" height="1" align="center">
																												<hr size="1" color="#C0C0C0" width="98%">
																												<p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;           
																													Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：           
																												</font><font face="Arial"><font color="#999999">Internet&nbsp;           
																												Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;           
																												Resolution<br>
																												Copyright © 2008&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;          
																												Craniofacial&nbsp; Foundation<br>         
																												<br>
																											</font></a></font></font></i></td>
																										</tr>
																									</table>
																								</div>

																							</td>
																						</tr>
																					</table>
																				</div>

																				<input type="hidden" id="srhType" name="srhType" value="<?PHP echo $srhType; ?>">
																				<input type="hidden" id="srhValue" name="srhValue" value="<?PHP echo $srhValue; ?>">
																			</form>
																		</body>
																		</html>
																		<?PHP
																	}else{
																		echo "<html>";
																		echo "<head>";
																		echo "<Script Language='JavaScript'>";
																		echo "<!--";
																		echo "alert('抱歉您现在无权限读取,请先登入')\;";
																		echo "\n";
																		echo " location.href='login.php';\n";
																		echo "//-->";
																		echo " </Script>";
																		echo "</head>";
																		echo "</html>";
																	}
																	?>