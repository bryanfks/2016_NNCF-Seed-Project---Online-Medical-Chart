<?PHP
session_cache_limiter("none");
session_start();

include 'db.php';

$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];

	
if(!empty($seid) && !empty($sepwd)){
		
		
	
?>
		<html>

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
			<meta name="ProgId" content="FrontPage.Editor.Document">
			<title>NCF -- Patient Record Online Management System</title>
			<SCRIPT LANGUAGE="javascript">
				<!--
				function searchData(){
					var courses = document.getElementById('courses').value;
					/* var srhType = document.getElementById('srhType').value; */

					if((courses == "none")){
						alert ("请选择疗程科别");
						return false;
					}else{
						document.china_medical.submit();
					}
				}
				//-->
			</SCRIPT> 
		</head>

<body topmargin="2">
	<form name="china_medical" enctype="multipart/form-data" method="post" action="rec-sea-list-china-search.php">
		<div align="center">
			<center>
				<table border="0" cellpadding="0" cellspacing="0" width="760">
					<tr>
						<td width="100%">
							<div align="center">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="346">
									<tr>
										<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/china/top.php"); ?></font></td>
									</tr>
									<tr>
										<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/china/select.php"); ?></font></td>
									</tr>
									<tr>
										<td width="100%" height="261" align="center" bgcolor="#FFF3DE"><font size="3">
											
											<div align="center">

												<center>

													<table border="0" cellpadding="0" cellspacing="0" width="780">

														<tr>

															<td align="left">

																<div align="center">

																	<table cellSpacing="0" cellPadding="0" width="100%" bgColor="#ff9966" border="1" height="40">

																		<tbody>

																			<tr>

																				<td>

																					<p align="center">

																						<span class closure_uid_qekr43="362" Kc="null" lang="zh-CN" id="result_box" c="4" a="undefined">

																							<b><i>

																								<font color="#000000" size="4">患者补助申请表</font></i></b></span>
																								<font size="5">
																								</font>  

																							</td>

																						</tr>

																					</tbody>

																				</table>

																			</div>

																			<br>

																			<div align="center">

																			<table border="0" cellspacing="1" width="780" align="center">
																				<tr>
																					<td width="100%" style="border-style: solid; border-width: 0;" align="center">
																						<select size="1" name="courses" id="courses" style="font-size: 1em;">
																							<option selected value="none">请选择疗程科别</option>
																							<option value="ps">整形外科</option>
																							<option value="po">术前正畸</option>
																							<option value="st">语言治疗</option>
																							<!--  
																								ps = 整形外科 = Plastic Surgery
																								po = 术前正畸 = Preoperative orthodontic
																								st = 语言治疗 = Speech Therapy
																							-->
																						</select>
																						<input id="coursesValue" type="hidden" value="" name="coursesValue">
																					</td>
																				</tr>
																				<tr>
																					<td width="100%" style="border-style: solid; border-width: 0;" align="center">
																						<br>请先输入「个案姓名」、「身份证号」或「医院病历号码」查询资料库内有无符合个案：<br><br>
																					</td>
																					<td width="100" style="border-style: solid; border-width: 0">&nbsp;</td>
																				</tr>
																			</table>
																			</div>
																					</td>
																				</tr>
																				<tr>
																					<td width="100" style="border-style: solid; border-width: 0;" align="center">
																									<!-- 2014/12/25 NCF改變搜尋方式，取消三個下拉式選單功能
																										<select size="1" name="srhType" id="srhType" style="font-size: 1em;">
																											<option selected value="none">请选择查询条件</option>
																											<option value="chkID">身份证号</option>
																											<option value="chkNAME">个案姓名</option>
																											<option value="chkPATNO">病历号码</option>
																										</select>
																									-->
																						<input id="searchpatient" type="text" value="" name="srhValue">
																					</td>
																				</tr>
																				<tr>
																					<td align="center">
																						<br><input id="search0" type="button" value="查询" name="search0" onClick="return searchData()">
																					</td>
																				</tr>
																			</table>
																		</div>
																		
																		
																	</td>
																</tr>

																</table>

															</div>
															
														</font></td>
													</tr>
													<tr>
														<td width="100%" height="1" align="center">
															<hr size="1" color="#C0C0C0" width="98%">
															<p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;   
																Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：   
															</font><font face="Arial"><font color="#999999">Internet&nbsp;   
															Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;   
															Resolution<br>
															Copyright c 2006~2012&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;   
															Craniofacial&nbsp; Foundation<br>  
															<br>
														</font></a></font></font></i></td>
													</tr>
												</table>
											</div>
										</td>
									</tr>
								</table>
							</center>
						</div>
						<input type="hidden" name="patientID" value="<? echo $seid; ?>">
						<input type="hidden" name="remark" value="">
						<input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
						<input type="hidden" name="NCFMedicalNumNow" value="<? echo $NCFMedicalNumNow; ?>">
						<input type="hidden" name="branch" value="1">
						<input type="hidden" name="serialcode" value="1">

					</form>
				</body>

				</html>
				<?PHP
			}else{
				echo "<Script Language='JavaScript'>";
				echo "alert('抱歉您现在无权限读取,请先登入')\;";
				echo " location.href=\'login.php\'\;";
				echo " </Script>";
			}
			?>
