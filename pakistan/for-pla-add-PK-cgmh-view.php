<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	//echo $seid."<br />";

	
	if(!empty($seid) && !empty($sepwd)){
		$CPIData = $_GET["cpi"];
		
		
		 
		 
		 //搜寻病患病例表
		//$NCFMedicalNums = $resultChinaPatientinfo['NCFID']."11";
		//$selChinaPatientRecord = "SELECT * FROM `chinapatientrecord` WHERE num='".$CPIData."'";
		$selChinaPatientRecord = "SELECT * FROM `PKpatientrecord` WHERE num='".$CPIData."'";
		$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
		$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
		 
		 
		// 搜寻病患资料
		//$selChinaPatientinfo = "SELECT * FROM `KHpatient` WHERE `NCFMedicalNum`='".$resultChinaPatientRecord['NCFMedicalNum']."'";
		$selChinaPatientinfo = "SELECT * FROM `PKpatient2` WHERE `NCFMedicalNum`='".$resultChinaPatientRecord['NCFMedicalNum']."'";
		$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		$resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo);
		
		//echo "<br/>".$CPIData."<br/>";
		//echo "<br/>".$selChinaPatientRecord."<br/>";
		//echo $selChinaPatientinfo."<br/>";
		
		
		
		
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NCF--Patient Subsidy Form</title>

	<script language="javascript">
			<!--
				function inputData(){
					//病患个人资料
					document.china_medical.caseYear.value = "<?php echo $resultChinaPatientinfo['caseYear'];  ?>";
					document.china_medical.caseMonth.value = "<?php echo $resultChinaPatientinfo['caseMonth'];  ?>";
					document.china_medical.caseDay.value = "<?php echo $resultChinaPatientinfo['caseDay'];  ?>";
					document.china_medical.surgeryDrName.value = "<?php echo $resultChinaPatientinfo['surgeryDrName'];  ?>";
					document.china_medical.languageTherapist.value = "<?php echo $resultChinaPatientinfo['languageTherapist'];  ?>";
					document.china_medical.orthodontics.value = "<?php echo $resultChinaPatientinfo['orthodontics'];  ?>";
					document.china_medical.MedicalRecordNumber.value = "<?php echo $resultChinaPatientinfo['MedicalRecordNumber'];  ?>";
					document.china_medical.idno.value = "<?php echo $resultChinaPatientinfo['idno'];  ?>";
					document.china_medical.name.value = "<?php echo $resultChinaPatientinfo['name'];  ?>";
					document.china_medical.birthYear.value = "<?php echo $resultChinaPatientinfo['birthYear'];  ?>";
					document.china_medical.birthMonth.value = "<?php echo $resultChinaPatientinfo['birthMonth'];  ?>";
					document.china_medical.birthDay.value = "<?php echo $resultChinaPatientinfo['birthDay'];  ?>";
					document.china_medical.profession.value = "<?php echo $resultChinaPatientinfo['profession'];  ?>";
					document.china_medical.tel.value = "<?php echo $resultChinaPatientinfo['tel'];  ?>";
					document.china_medical.education.value = "<?php echo $resultChinaPatientinfo['education'];  ?>";
					document.china_medical.address.value = "<?php echo $resultChinaPatientinfo['address'];  ?>";
					document.china_medical.contactperson.value = "<?php echo $resultChinaPatientinfo['contactperson'];  ?>";
					document.china_medical.relationship.value = "<?php echo $resultChinaPatientinfo['relationship'];  ?>";
					document.china_medical.phone.value = "<?php echo $resultChinaPatientinfo['phone'];  ?>";
					document.china_medical.height.value = "<?php echo $resultChinaPatientinfo['height'];  ?>";
					document.china_medical.weight.value = "<?php echo $resultChinaPatientinfo['weight'];  ?>";
					document.china_medical.Combined_with_other_craniofacial_disorders_text.value = "<?php echo $resultChinaPatientinfo['Combined_with_other_craniofacial_disorders_text'];  ?>";
					document.china_medical.beforeSurgery_other_reason.value = "<?php echo $resultChinaPatientinfo['beforeSurgery_other_reason'];  ?>";
					document.china_medical.familyMembers.value = "<?php echo $resultChinaPatientinfo['familyMembers'];  ?>";
					document.china_medical.live_together.value = "<?php echo $resultChinaPatientinfo['live_together'];  ?>";
					document.china_medical.fatherAge.value = "<?php echo $resultChinaPatientinfo['fatherAge'];  ?>";
					document.china_medical.fatherProfession_main.value = "<?php echo $resultChinaPatientinfo['fatherProfession_main'];  ?>"; 
					document.china_medical.motherAge.value = "<?php echo $resultChinaPatientinfo['motherAge'];  ?>";
					document.china_medical.motherProfession_main.value = "<?php echo $resultChinaPatientinfo['motherProfession_main'];  ?>";
<?
	$nums = $resultChinaPatientinfo["num"];
	$strS = $resultChinaPatientinfo['descriptionCaseFamily'];
	//$strS2 = nl2br($strS);
	$strS1 = preg_replace('/\s/'," ",$strS);
	//$strS4 = preg_replace("<br />"," ",$strS3);
?>
					document.china_medical.descriptionCaseFamily.value = "<?php echo $strS1;  ?>";
					
					document.china_medical.mainSourceofIncome.value = "<?php echo $resultChinaPatientinfo['mainSourceofIncome'];  ?>";
					document.china_medical.income.value = "<?php echo $resultChinaPatientinfo['income'];  ?>";
					document.china_medical.fixedExpenditure1.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure1'];  ?>";
					document.china_medical.fixedExpenditure2.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure2'];  ?>";
					document.china_medical.fixedExpenditure3.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure3'];  ?>";
					document.china_medical.fixedExpenditure4.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure4'];  ?>";
					document.china_medical.extimatedExpenditures.value = "<?php echo $resultChinaPatientinfo['extimatedExpenditures'];  ?>";				
					
					//病历表资料					
					document.china_medical.BIHosTimeYear.value = "<?php echo $resultChinaPatientRecord['BIHosTimeYear'];  ?>";
					document.china_medical.BIHosTimeMonth.value = "<?php echo $resultChinaPatientRecord['BIHosTimeMonth'];  ?>";
					document.china_medical.BIHosTimeDay.value = "<?php echo $resultChinaPatientRecord['BIHosTimeDay'];  ?>";
					document.china_medical.surgeryTimeYear.value = "<?php echo $resultChinaPatientRecord['surgeryTimeYear'];  ?>";
					document.china_medical.surgeryTimeMonth.value = "<?php echo $resultChinaPatientRecord['surgeryTimeMonth'];  ?>";
					document.china_medical.surgeryTimeDay.value = "<?php echo $resultChinaPatientRecord['surgeryTimeDay'];  ?>";
					document.china_medical.LHosTimeYear.value = "<?php echo $resultChinaPatientRecord['LHosTimeYear'];  ?>";
					document.china_medical.LHosTimeMonth.value = "<?php echo $resultChinaPatientRecord['LHosTimeMonth'];  ?>";
					document.china_medical.LHosTimeDay.value = "<?php echo $resultChinaPatientRecord['LHosTimeDay'];  ?>";
					
					
					document.china_medical.surgeon.value = "<?php echo $resultChinaPatientRecord['surgeon'];  ?>";
					document.china_medical.anesthesiologist.value = "<?php echo $resultChinaPatientRecord['anesthesiologist'];  ?>";
					document.china_medical.surgeryTypeOther_text.value = "<?php echo $resultChinaPatientRecord['surgeryTypeOther_text'];  ?>";
					document.china_medical.repairTypeUnilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeUnilateralcleftlip_text'];  ?>";
					document.china_medical.repairTypeBilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeBilateralcleftlip_text'];  ?>";
					document.china_medical.repairTypeCleftpalate_text.value = "<?php echo $resultChinaPatientRecord['repairTypeCleftpalate_text'];  ?>";
					
					document.china_medical.beforeSurgeryYear.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryYear'];  ?>";
					document.china_medical.beforeSurgeryMonth.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryMonth'];  ?>";
					document.china_medical.beforeSurgeryDay.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryDay'];  ?>";
					
					document.china_medical.afterSurgeryYear.value = "<?php echo $resultChinaPatientRecord['afterSurgeryYear'];  ?>";
					document.china_medical.afterSurgeryMonth.value = "<?php echo $resultChinaPatientRecord['afterSurgeryMonth'];  ?>";
					document.china_medical.afterSurgeryDay.value = "<?php echo $resultChinaPatientRecord['afterSurgeryDay'];  ?>";
					
					
					document.china_medical.MSitem.value = "<?php echo $resultChinaPatientinfo['MSitem'];  ?>";
					document.china_medical.MSOther_text.value = "<?php echo $resultChinaPatientinfo['MSOther_text'];  ?>";
					document.china_medical.LAunit.value = "<?php echo $resultChinaPatientinfo['LAunit'];  ?>";
					document.china_medical.LAitem.value = "<?php echo $resultChinaPatientinfo['LAitem'];  ?>";
					document.china_medical.OAunit.value = "<?php echo $resultChinaPatientinfo['OAunit'];  ?>";
					document.china_medical.OAitem.value = "<?php echo $resultChinaPatientinfo['OAitem'];  ?>";
					document.china_medical.TotalSFME.value = "<?php echo $resultChinaPatientRecord['TotalSFME'];  ?>";
					document.china_medical.NCFAllowance.value = "<?php echo $resultChinaPatientRecord['NCFAllowance'];  ?>";
					document.china_medical.NCFProportion.value = "<?php echo $resultChinaPatientRecord['NCFProportion'];  ?>";
					document.china_medical.PatientPay.value = "<?php echo $resultChinaPatientRecord['PatientPay'];  ?>";
					document.china_medical.PatientProportion.value = "<?php echo $resultChinaPatientRecord['PatientProportion'];  ?>";
					document.china_medical.NCFSOT.value = "<?php echo $resultChinaPatientRecord['NCFSOT'];  ?>";
					document.china_medical.PatientSOT.value = "<?php echo $resultChinaPatientRecord['PatientSOT'];  ?>";
					document.china_medical.NCFTotalSubsidies.value = "<?php echo $resultChinaPatientRecord['NCFTotalSubsidies'];  ?>";
					//OtherPay
					document.china_medical.OtherPay.value = "<?php echo $resultChinaPatientRecord['OtherPay'];  ?>";
					
				}
				
				function saveData(opt){
					if(opt == "save"){
						// 警示未填写必要输入项资料
						if(document.china_medical.caseYear.value == ""){
							alert ("Please Input Date of Intake - Year");
						}else if(document.china_medical.caseMonth.value == ""){
							alert ("Please Input Date of Intake - Month");
						}else if(document.china_medical.caseDay.value == ""){
							alert ("Please Input Date of Intake - Day");
						}else if(document.china_medical.MedicalRecordNumber.value == ""){
							alert ("Please Input Patient Record Number");
						}else if(document.china_medical.idno.value == ""){
							alert ("Please Input ID of Patient");
						}else if(document.china_medical.name.value == ""){
							alert ("Please Input Name");
						}else if(document.china_medical.gender.value == ""){
							alert ("Please Input Sex");
						}else if(document.china_medical.birthYear.value == ""){
							alert ("Please Input Date of Birth - Year");
						}else if(document.china_medical.birthMonth.value == ""){
							alert ("Please Input Date of Birth - Month");
						}else if(document.china_medical.birthDay.value == ""){
							alert ("Please Input Date of Birth - Day");
						}else if(document.china_medical.address.value == ""){
							alert ("Please Input Address");
						}else if(document.china_medical.height.value == ""){
							alert ("Please Input Height");
						}else if(document.china_medical.weight.value == ""){
							alert ("Please Input Weight");
						}else if(document.china_medical.BIHosTimeYear.value == ""){
							alert ("Please Input Date of Admission - Year");
						}else if(document.china_medical.BIHosTimeMonth.value == ""){
							alert ("Please Input Date of Admission - Month");
						}else if(document.china_medical.BIHosTimeDay.value == ""){
							alert ("Please Input Date of Admission - Day");
						}else if(document.china_medical.surgeryTimeYear.value == ""){
							alert ("Please Input Date of Surgery - Year");
						}else if(document.china_medical.surgeryTimeMonth.value == ""){
							alert ("Please Input Date of Surgery - Month");
						}else if(document.china_medical.surgeryTimeDay.value == ""){
							alert ("Please Input Date of Surgery - Day");
						}else if(document.china_medical.LHosTimeYear.value == ""){
							alert ("Please Input Date of Discharge - Year");
						}else if(document.china_medical.LHosTimeMonth.value == ""){
							alert ("Please Input Date of Discharge - Month");
						}else if(document.china_medical.LHosTimeDay.value == ""){
							alert ("Please Input Date of Discharge - Day");
						}else if(document.china_medical.surgeon.value == ""){
							alert ("Please Input Name of Surgeon");
						}else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
							alert ("Please Select Did the patient have any treatment before？");
						}else {
							document.china_medical.remark.value = "<? echo '1'; ?>";
							document.china_medical.num.value = "<? echo $CPIData; ?>";
							document.china_medical.submit();
						}
					}else if(opt == "sends"){
						if(document.china_medical.caseYear.value == ""){
							alert ("Please Input Date of Intake - Year");
						}else if(document.china_medical.caseMonth.value == ""){
							alert ("Please Input Date of Intake - Month");
						}else if(document.china_medical.caseDay.value == ""){
							alert ("Please Input Date of Intake - Day");
						}else if(document.china_medical.MedicalRecordNumber.value == ""){
							alert ("Please Input Patient Record Number");
						}else if(document.china_medical.idno.value == ""){
							alert ("Please Input ID of Patient");
						}else if(document.china_medical.name.value == ""){
							alert ("Please Input Name");
						}else if(document.china_medical.gender.value == ""){
							alert ("Please Input Sex");
						}else if(document.china_medical.birthYear.value == ""){
							alert ("Please Input Date of Birth - Year");
						}else if(document.china_medical.birthMonth.value == ""){
							alert ("Please Input Date of Birth - Month");
						}else if(document.china_medical.birthDay.value == ""){
							alert ("Please Input Date of Birth - Day");
						}else if(document.china_medical.address.value == ""){
							alert ("Please Input Address");
						}else if(document.china_medical.height.value == ""){
							alert ("Please Input Height");
						}else if(document.china_medical.weight.value == ""){
							alert ("Please Input Weight");
						}else if(document.china_medical.BIHosTimeYear.value == ""){
							alert ("Please Input Date of Admission - Year");
						}else if(document.china_medical.BIHosTimeMonth.value == ""){
							alert ("Please Input Date of Admission - Month");
						}else if(document.china_medical.BIHosTimeDay.value == ""){
							alert ("Please Input Date of Admission - Day");
						}else if(document.china_medical.surgeryTimeYear.value == ""){
							alert ("Please Input Date of Surgery - Year");
						}else if(document.china_medical.surgeryTimeMonth.value == ""){
							alert ("Please Input Date of Surgery - Month");
						}else if(document.china_medical.surgeryTimeDay.value == ""){
							alert ("Please Input Date of Surgery - Day");
						}else if(document.china_medical.LHosTimeYear.value == ""){
							alert ("Please Input Date of Discharge - Year");
						}else if(document.china_medical.LHosTimeMonth.value == ""){
							alert ("Please Input Date of Discharge - Month");
						}else if(document.china_medical.LHosTimeDay.value == ""){
							alert ("Please Input Date of Discharge - Day");
						}else if(document.china_medical.surgeon.value == ""){
							alert ("Please Input Name of Surgeon");
						}else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
							alert ("Please Select Did the patient have any treatment before？");
						}else {
							document.china_medical.remark.value = "<? echo '0'; ?>";
							document.china_medical.num.value = "<? echo $CPIData; ?>";
							document.china_medical.submit();
						}
					}else if(opt == "cancels"){
						location.href = "searchList.php";
					}
				}
			//-->
	</script>
</head>

<body onLoad="inputData()">
<form name="china_medical" enctype="multipart/form-data" method="post" action="for-pla-add-PK-cgmh-edit.php">
<div align="center">
	<table border="1" width="710" cellspacing="0" id="table1" cellpadding="0" style="border-right-color: #000000; border-bottom-color: #000000">
		<tr>
			<td>
			<div align="center">
				<table border="0" width="700" cellspacing="0" cellpadding="0" id="table9">
					<tr>
						<td height="20">
                        	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
                            	<tr>
              						<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("../pakistan/top.php"); ?></font></td>
            					</tr>
            					<tr>
              						<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("../pakistan/select.php"); ?></font></td>
            					</tr>
                            </table>
						</td>
					</tr>
					<tr>
						<td>
				<div align="center">
				<table border="1" width="700" cellspacing="1" cellpadding="0" id="table34" style="border-right-color: #FFFFFF; border-bottom-color: #FFFFFF" height="50">
					<tr>
						<td>
						<p align="center">
                        <b style='mso-bidi-font-weight:normal'><span lang=EN-US>
        					<font size="5" face="Times New Roman">
        						<select size="1" name="school">
                    				<OPTION value="" <? if($resultChinaPatientinfo['school'] == ""){ echo "selected"; } ?>>Please select...</OPTION> 
									<OPTION value="CLAPP" <? if($resultChinaPatientinfo['school'] == "CLAPP"){ echo "selected"; } ?>>CLAPP Hospital</OPTION>
                                    <!--
									<OPTION value="ASHONMU">Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
									<OPTION value="PHOHSM">People`s Hospital of Hulunbeier,Southern Mongolian</OPTION>
									<OPTION value="SSH">Shenzhen Second Hospital</OPTION>
									<OPTION value="TAHOMCQU">The Affiliated Hospital of Medical College,Qingdao University</OPTION>
									<OPTION value="T2AHOSUMC">The 2nd Affiliated Hospital of Shantou University Medical College</OPTION>
									<OPTION value="TFHOSMU">The First Hospital of Shanxi Medical University</OPTION>
									<OPTION value="WCCOSSU">West China College of Stomatology Sichuan University</OPTION>
									<OPTION value="CMH">Cipto Mangunkusumo Hospital</OPTION>
									<OPTION value="OLOPH">Our Lady of Peace Hospital</OPTION>
									<OPTION value="SEH">St. Elizabeth Hospital</OPTION>
									<OPTION value="HCMHDOMH">Ho Chi Minh Health Department Odorto Mazillo Hospital</OPTION>
									<OPTION value="OTHER">Other</OPTION>
                                    -->
                    			</select> Patient Subsidy Application</font></span></b><span lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					</tr>
				</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
						<div align="center">
						<table border="1" width="700" cellspacing="0" cellpadding="0">
							<tr>
								<td width="120" height="30">
						<span lang=EN-US style='font-family:Times New Roman'>
								<font size="4">*Date
          of&nbsp;Intake</font></span></td>
								<td width="310">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="caseYear" size="2" value=""></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">
          / </font></span>
						<font face="Times New Roman" size="4">
								<input type="text" name="caseMonth" size="1" value="">
						</font>
                        <span lang=EN-US style='font-family:Times New Roman'><font size="4"> /
          						</font></span>
								<font face="Times New Roman" size="4">
									<input type="text" name="caseDay" size="1" value="">
                                </font><span lang=EN-US style='font-family:Times New Roman'>(YYYY/MM/DD)<o:p></o:p></span></td>
								<td width="120">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; NCF
          Number</font><o:p></o:p></span></td>
								<td width="150"><?php echo $resultChinaPatientinfo['NCFID'];  ?></td>
							</tr>
						</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
						<div align="center">
						<table border="1" width="700" cellspacing="0" cellpadding="0">
							<tr>
								<td width="65">
						<span lang=EN-US style='font-family:Times New Roman;
          mso-fareast-language:ZH-CN'>&nbsp;</span><span lang=EN-US
          style='font-family:Times New Roman'>Name of<br>
								&nbsp;</span><span lang=EN-US
          style='font-family:Times New Roman;mso-fareast-language:ZH-CN'>Surgeon</span><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="surgeryDrName" size="17" value=""></font></td>
								<td width="115">
						<span lang=EN-US style='font-family:Times New Roman'>
								<font size="2">&nbsp;Name of<br>
&nbsp;Speech Therapist</font></span></td>
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="languageTherapist" size="17" value=""></font></td>
								<td width="70">
						<span lang=EN-US style='font-family:Times New Roman'>
			&nbsp;Name of<br>
								&nbsp;Orthodontist<o:p></o:p></span></td>
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="orthodontics" size="17" value=""></font></td>
							</tr>
						</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="30">&nbsp;
						</td>
					</tr>
					<tr>
						<td>
				<div align="center">
				<table border="1" width="700" cellspacing="1" cellpadding="0" id="table37" style="border-right-color: #FFFFFF; border-bottom-color: #FFFFFF" height="40">
					<tr>
						<td>
						<p align="center"><b
          style='mso-bidi-font-weight:normal'>
						<span lang=EN-US
          style='font-family:Times New Roman'><font size="4">Part 1: Patient's General Information</font><o:p></o:p></span></b></td>
					</tr>
				</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
				<div align="center">
				<table border="1" width="700" cellspacing="0" cellpadding="0" id="table38" height="193">
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*ID of
          Patient </font></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="idno" size="40" value=""></font></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;*Patient Record Number</font></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="MedicalRecordNumber" size="10" value=""></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Name</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="name" size="40" value=""></font></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Sex</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<p style="line-height: 150%">
						<font size="4" face="Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="gender" <? if($resultChinaPatientinfo['gender'] == "1"){ echo "checked"; } ?>></font></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">Male<br>
&nbsp;</font></span><font face="Times New Roman" size="4"><input type="radio" value="0" name="gender" <? if($resultChinaPatientinfo['gender'] == "0"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">Female</font></span></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Date
          of Birth</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="birthYear" size="2" value=""></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">
          / </font></span><font face="Times New Roman" size="4">
								<input type="text" name="birthMonth" size="1" value=""></font><span lang=EN-US style='font-family:Times New Roman'><font size="4"> /
          						</font></span>
								<font face="Times New Roman" size="4">
								<input type="text" name="birthDay" size="1" value=""></font><span lang=EN-US style='font-family:Times New Roman'>(YYYY/MM/DD)<o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Occupation</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="profession" size="10" value=""></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Telephone</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="tel" size="40" value=""></font></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Education</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="education" size="10" value=""></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Address</font><o:p></o:p></span></td>
						<td colspan="3" height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="address" size="87" value=""></font></td>
					</tr>
					<tr>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Name
          of<br>
&nbsp; Guardian </font> <o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="contactperson" size="40" value=""></font></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Relationship to<br>
&nbsp; the Patient</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="relationship" size="10" value=""></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Telephone </font></span></td>
						<td colspan="3" height="28" valign="middle" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="phone" size="87" value=""></font></td>
					</tr>
				</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="30">&nbsp;
						</td>
					</tr>
					<tr>
						<td>
				<div align="center">
				<table border="1" width="700" cellspacing="1" cellpadding="0" id="table39" style="border-right-color: #FFFFFF; border-bottom-color: #FFFFFF" height="40">
					<tr>
						<td>
						<p align="center">
			<b
          style='mso-bidi-font-weight:normal'>
			<span lang=EN-US
          style='font-family:Times New Roman'><font size="4">Part 2: Diagnosis</font><o:p></o:p></span></b></td>
					</tr>
				</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
				<div align="center">
				<table border="1" width="700" cellspacing="0" cellpadding="0" id="table40" height="404">
					<tr>
						<td width="110" height="30">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Height</font><o:p></o:p></span></td>
						<td valign="middle" width="324">
						<span style="font-family: Times New Roman" lang="en-us">
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="height" size="5" value=""></font><span lang=EN-US style='font-family:Times New Roman'>(cm)<o:p></o:p></span></td>
						<td width="180">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Weight</font><o:p></o:p></span></td>
						<td valign="middle" width="222">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="weight" size="5" value=""></font><span lang=EN-US style='font-family:Times New Roman'>(kg)<o:p></o:p></span></td>
					</tr>
					<tr>
						<td width="700" colspan="4" height="180">
						<p style="line-height: 150%">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Main Diagnosis：<br>
						</font>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="diagnosis_unilateral_cleft_lip_1" value="UCL" <? if(($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Unilateral 
						Cleft Lip ( </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="CK" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Cracked 
						)<o:p><br>
&nbsp;</o:p></span><font face="Times New Roman" size="3"><input type="checkbox" name="diagnosis_bilateral_cleft_lip_2" value="BCL" <? if(($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "BCL") || ($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "1")){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						Cleft Lip ( </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "C"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="MCK" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "MCK"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Mixing 
						Crack ) <o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="CleftPalate" value="CP" <? if($resultChinaPatientinfo['CleftPalate'] == "CP"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Hard 
						Palate --- </span><font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "IC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete 
						( </span><font face="Times New Roman" size="3">
						<input type="radio" value="SCC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Submucosal 
						Cleft </span><font face="Times New Roman" size="3">
						<input type="radio" value="CU" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Uvula 
						Bifida </span><font face="Times New Roman" size="3">
						<input type="radio" value="SP" name="incomplete"<? if($resultChinaPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Soft 
						Palate&nbsp; </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="BC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						Cleft )<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>--- </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "C"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Complete 
						( </span><font face="Times New Roman" size="3">
						<input type="radio" value="U" name="complete" <? if($resultChinaPatientinfo['complete'] == "U"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Unilateral </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="B" name="complete" <? if($resultChinaPatientinfo['complete'] == "B"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						)<o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="BoneGraft_main" value="BoneGraft" <? if($resultChinaPatientinfo['BoneGraft_main'] == "BoneGraft"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Alveolar 
						Cleft ( </span><font face="Times New Roman" size="3">
						<input type="radio" value="C" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "C"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "IC"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="CK" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "CK"){ echo "checked"; } ?>></font><span lang=EN-US style='font-family:Times New Roman'>Cracked 
						)<o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="Combined_with_other_craniofacial_disorders" value="Other" <? if($resultChinaPatientinfo['Combined_with_other_craniofacial_disorders'] == "Other"){ echo "checked"; } ?>>
						</font><span lang=EN-US style='font-family:Times New Roman'>Combined 
						with Others Craniofacial Deformities</span><font face="Times New Roman"><span style='mso-ascii-font-family:
          Calibri;mso-hansi-font-family:Calibri'>：</span></font><font face="Times New Roman" size="4">
						<input type="text" name="Combined_with_other_craniofacial_disorders_text" size="50" value=""></font><o:p></o:p></td>
					</tr>
					<tr>
						<td width="700" colspan="4" height="215">
          <p style="line-height: 150%">
			<span lang=EN-US style='font-family:Times New Roman'>
			<font size="4">*Did
          the patient have any treatment before? </font> <o:p><br>
			</o:p></span><font face="Times New Roman" size="4">
			&nbsp;<font face="Times New Roman"><input type="radio" value="Y" name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "Y"){ echo "checked"; } ?> ></font></font><font size="4"><span lang=EN-US style='font-family:Times New Roman'>Yes<o:p><br>
			</o:p></span></font><span style="font-family: Times New Roman">&nbsp;&nbsp;&nbsp; ---<font face="Times New Roman"><input type="checkbox" name="beforeSurgery_1" value="1LNR" <? if($resultChinaPatientinfo['beforeSurgery_1'] == "1LNR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Primary
          Unilateral Lip/ Nose Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_2" value="1BLANR" <? if($resultChinaPatientinfo['beforeSurgery_2'] == "1BLANR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Primary
          Bilateral Lip/ Nose Repair<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>&nbsp;<font face="Times New Roman"><input type="checkbox" name="beforeSurgery_3" value="1CPR" <? if($resultChinaPatientinfo['beforeSurgery_3'] == "1CPR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Primary Cleft Palate Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_4" value="FHR" <? if($resultChinaPatientinfo['beforeSurgery_4'] == "FHR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Fistula Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_5" value="PF" <? if($resultChinaPatientinfo['beforeSurgery_5'] == "PF"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Pharyngeal
          Flap Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_6" value="PBR" <? if($resultChinaPatientinfo['beforeSurgery_6'] == "PBR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Vomer
          Flap Repair<br>
			&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_7" value="2CPR" <? if($resultChinaPatientinfo['beforeSurgery_7'] == "2CPR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Secondary
          Cleft Palate Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_8" value="LR" <? if($resultChinaPatientinfo['beforeSurgery_8'] == "LR"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Lip
          Rhinoplasty Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_9" value="AB" <? if($resultChinaPatientinfo['beforeSurgery_9'] == "AB"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Alveolar
          Bone Graft <br>
&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_10" value="PO" <? if($resultChinaPatientinfo['beforeSurgery_10'] == "PO"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Pre-Surgery
          Molding<br>
&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_11" value="SL" <? if($resultChinaPatientinfo['beforeSurgery_11'] == "SL"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Speech
          Therapy<br>
			&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_other" value="other" <? if($resultChinaPatientinfo['beforeSurgery_other'] == "other"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Others,
          please specify</span>：<font face="Times New Roman"><input type="text" name="beforeSurgery_other_reason" size="70" value=""></font></span><span lang=EN-US style="font-family: Times New Roman"><o:p><br>
			</o:p></span><font face="Times New Roman" size="4">
			&nbsp;<font face="Times New Roman"><input type="radio" value="N" name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "N"){ echo "checked"; } ?>></font></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">No</font><o:p></o:p></span></p>
						</td>
					</tr>
				</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="30">&nbsp;
						</td>
					</tr>
					<tr>
						<td height="10">
			<div align="center">
			<table border="1" width="700" cellspacing="1" cellpadding="0" id="table46" height="40">
				<tr>
					<td>
					<p align="center"><b
          style='mso-bidi-font-weight:normal'>
					<span lang=EN-US
          style='font-family:Times New Roman'><font size="4">Part 3: Family Information</font></span></b></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td height="30">
			<div align="center">
			<table border="1" width="700" cellspacing="0" cellpadding="0" id="table42">
				<tr>
					<td colspan="2" height="30">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Family Members</span></font><o:p></o:p></td>
					<td colspan="4">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;Total 
					<font face="Times New Roman"> 
					<input type="text" name="familyMembers" size="5" value=""></font><span style='font-family:Times New Roman'> person(s)</span>; 
					<span style='font-family:Times New Roman'>Living with </span>
					<font face="Times New Roman">
					<input type="text" name="live_together" size="5" value=""></font><span style='font-family:Times New Roman'> person(s)</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="107">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Father's Age</span></font><o:p></o:p></td>
					<td width="75">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="fatherAge" size="1" value=""></font></span></font></td>
					<td width="95">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Occupation</span></font></td>
					<td width="113">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="fatherProfession_main" size="12" value=""></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Education</span></font><o:p></o:p></td>
					<td width="170">
          <p style="line-height: 150%">
          <font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "1"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>College/
          University<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="2" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "2"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>High School<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="3" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "3"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Elementary School<br>
          &nbsp;</span><font face="Times New Roman"><input type="radio" value="4" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "4"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Literate<br>
          </span>&nbsp;<font face="Times New Roman"><input type="radio" value="5" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "5"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Preliterate</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="107">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Moher's Age</span></font><o:p></o:p></td>
					<td width="75">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="motherAge" size="1" value=""></font></span></font></td>
					<td width="95">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Occupation</span></font></td>
					<td width="113">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="motherProfession_main" size="12" value=""></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Education</span></font><o:p></o:p></td>
					<td width="170">
          <p style="line-height: 150%">
          <font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "1"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>College/
          University<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="2" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "2"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>High School<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="3" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "3"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Elementary School<br>
          &nbsp;</span><font face="Times New Roman"><input type="radio" value="4" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "4"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Literate<br>
			&nbsp;</span><font face="Times New Roman"><input type="radio" value="5" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "5"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman'>Preliterate</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="2">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Description
          of<br>
&nbsp; Family Condition</span></font></td>
					<td colspan="4">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><textarea rows="5" name="descriptionCaseFamily" cols="60"></textarea></font></span></font></td>
				</tr>
				<tr>
					<td colspan="2">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Major Income Source</span></font><o:p></o:p></td>
					<td colspan="2">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="mainSourceofIncome" size="27" value=""></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Annual
          Income<br>
					&nbsp; (average)</span></font><o:p></o:p></td>
					<td width="170">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;US$ 
					<font face="Times New Roman"> 
					<input type="text" name="income" size="5" value=""></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="2">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Family Fixed Expenses</span></font><o:p></o:p></td>
					<td colspan="2">
					<p style="line-height: 200%">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;1. 
					<font face="Times New Roman"> 
					<input type="text" name="fixedExpenditure1" size="24" value=""></font><span style='font-family:Times New Roman'><br>
          &nbsp;2. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure2" size="24" value=""></font><span style='font-family:Times New Roman'><br>
          &nbsp;3. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure3" size="24" value=""></font><span style='font-family:Times New Roman'><br>
          &nbsp;4. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure4" size="24" value=""></font><span style='font-family:Times New Roman'> </span>
					</span></font>
					</td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Monthly Living<br>
&nbsp; Expenses<br>
&nbsp; (average)</span></font></td>
					<td width="170">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;US$ 
					<font face="Times New Roman"> 
					<input type="text" name="extimatedExpenditures" size="5" value=""></font></span></font><o:p></o:p></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="30">&nbsp;
						</td>
					</tr>
					<tr>
						<td height="10">
			<div align="center">
			<table border="1" width="700" cellspacing="1" cellpadding="0" id="table43" height="40">
				<tr>
					<td>
					<p align="center"><b
          style='mso-bidi-font-weight:normal'>
					<span lang=EN-US
          style='font-family:Times New Roman'><font size="4">Part 4: Patient’s Information of 
			</font> </span></b><b>
					<span
          lang=EN-US style='font-family:Times New Roman;mso-hansi-font-family:新細明體;
          mso-bidi-font-style:italic'><font size="4">Surgery and Transportation 
			</font> </span></b></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td height="10">
			<div align="center">
			<table border="1" width="700" cellspacing="0" cellpadding="0" id="table47">
				<tr>
					<td width="341" height="30">
					<span lang=EN-US style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'><font size="4">&nbsp; Subsidy Number (NCF)</font></span><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td width="353"><? echo $NCFMedicalNum."&nbsp;"; ?><?php echo $resultChinaPatientRecord['NCFMedicalNum'];  ?></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td>
			<div align="center">
			<table border="1" width="700" cellspacing="0" cellpadding="0" id="table45">
				<tr>
					<td width="159"><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">*<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Date
          of Admission</span></span></font></td>
					<td width="180">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="BIHosTimeYear" size="2" value=""></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="BIHosTimeMonth" size="1" value=""></font> /
          						<font face="Times New Roman">
          						<input type="text" name="BIHosTimeDay" size="1" value=""></font><br>
&nbsp;&nbsp;&nbsp;&nbsp; </font>(YYYY/MM/DD)</span><o:p></o:p></td>
					<td width="142"><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">*<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Date
          of Surgery</span></span></font><span lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td width="209">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="surgeryTimeYear" size="2" value=""></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="surgeryTimeMonth" size="1" value=""></font> /
          						<font face="Times New Roman">
          						<input type="text" name="surgeryTimeDay" size="1" value=""></font><br>
&nbsp;&nbsp;&nbsp;&nbsp; </font>(YYYY/MM/DD)</span><o:p></o:p></td>
				</tr>
				<tr>
					<td width="159">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>*Date of Discharge</span></font><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td width="180">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="LHosTimeYear" size="2" value=""></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="LHosTimeMonth" size="1" value=""></font> /
          						<font face="Times New Roman">
          						<input type="text" name="LHosTimeDay" size="1" value=""></font><br>
&nbsp;&nbsp;&nbsp;&nbsp; </font>(YYYY/MM/DD)</span><o:p></o:p></td>
					<td width="142">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Type of<br>
&nbsp; Anesthesia</span></font><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td width="209">
          <p style="line-height: 150%">
          <font size="4">
			<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="GA" name="Anesthesia" <?php if($resultChinaPatientRecord['Anesthesia'] =="GA"){echo "checked";}  ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>General
          Anesthesia<br>
			</span>&nbsp;<font face="Times New Roman"><input type="radio" value="LA" name="Anesthesia" <?php if($resultChinaPatientRecord['Anesthesia'] =="LA"){echo "checked";}  ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Local Anesthesia</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="159"><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">*<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Name 
					of Surgeon </span></span></font><span lang=EN-US style='font-family:Calibri'><o:p></o:p></span>
					</td>
					<td width="180">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="surgeon" size="22" value=""></font></span></font></td>
					<td width="142">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp; Name of<br>
&nbsp; Anesthesiologist</span></font></td>
					<td width="209">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="anesthesiologist" size="27" value=""></font></span></font></td>
				</tr>
				<tr>
					<td width="159" height="133">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Type of Surgery</span></font><span lang=EN-US
          style='font-family:Calibri'><o:p></o:p></span></td>
					<td colspan="3">
					<p style="line-height: 150%">
					<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M1LNR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1LNR"){ echo "checked"; } ?>></font>Primary Unilateral Lip/Nose Repair</span></font><font face="Times New Roman"><span style='mso-hansi-font-family:新細明體'> </span>
					</font>
					<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font face="Times New Roman">
					<input type="radio" value="M1BLANR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1BLANR"){ echo "checked"; } ?>></font>Bilateral Lip/ Nose Repair</span></font><span
          lang=EN-US style='font-family:Times New Roman;mso-hansi-font-family:新細明體'><o:p><br>
					</o:p></span><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M1CPR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1CPR"){ echo "checked"; } ?>></font>Primary Cleft Palate Repair</span></font><font face="Times New Roman"><span style='mso-hansi-font-family:新細明體'> </span>
					</font>
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
					<font face="Times New Roman">
					<input type="radio" value="MFHR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MFHR"){ echo "checked"; } ?>></font>Fistula Repair</font></span><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M2CPR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M2CPR"){ echo "checked"; } ?>></font>Secondary Cleft Palate
          Repair</span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
					</font></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font face="Times New Roman">
					<input type="radio" value="MLR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MLR"){ echo "checked"; } ?>></font></span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">Lip
          and/or Nose Revision</font></span><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="MAB" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MAB"){ echo "checked"; } ?>></font>Alveolar
          Bone Graft</span></font><span lang="en-us" style="mso-hansi-font-family: 新細明體; font-family: Times New Roman">&nbsp;
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
					<font face="Times New Roman">
					<input type="radio" value="MPF" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MPF"){ echo "checked"; } ?>></font>Pharyngeal
          Flap Repair<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'> </span></font></span> 
					<font face="Times New Roman"> <o:p><br>
					</o:p>
					</font>
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font size="4">&nbsp;</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font face="Times New Roman"><input type="radio" value="MPBR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MPBR"){ echo "checked"; } ?>></font></span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">Vomer
          Flap Repair<br>
					</font></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="MOTH" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MOTH"){ echo "checked"; } ?>>
					</font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Others</span>： 
					</span><span style="font-family: Times New Roman">
					<font face="Times New Roman">
					<input type="text" name="surgeryTypeOther_text" size="65" value=""></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td rowspan="4" width="159">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Type of Repair</span></font><span lang=EN-US
          style='font-family:Calibri'><o:p></o:p></span></td>
					<td colspan="3">
					<p style="line-height: 150%">
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Unilateral Cleft Lip：</span></font><span
          lang=EN-US style='font-family:Times New Roman'><o:p><br>
					</o:p></span><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Rotation-AdvancementVariant" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Rotation-AdvancementVariant"){ echo "checked"; } ?>></font>Rotation-Advancement
          Variant <font face="Times New Roman"> <input type="radio" value="TriangularVariant" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "TriangularVariant"){ echo "checked"; } ?>></font>Triangular
          Variant <font face="Times New Roman"> <input type="radio" value="Mohler" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Mohler"){ echo "checked"; } ?>></font>Mohler</span></font><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Others" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Others"){ echo "checked"; } ?>></font>Others：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeUnilateralcleftlip_text" size="27" value=""></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="3">
					<p style="line-height: 150%">
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Bilateral Cleft Lip：<br>
					</span></font>
					<span lang="en-us" style="mso-hansi-font-family: 新細明體; font-family: Times New Roman">&nbsp;</span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="StraightLine" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "StraightLine"){ echo "checked"; } ?>></font>Straight
          Line <font face="Times New Roman"> <input type="radio" value="ForkedFlap" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "ForkedFlap"){ echo "checked"; } ?>></font>Forked
          Flap <font face="Times New Roman"> <input type="radio" value="Others" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "Others"){ echo "checked"; } ?>></font>Others：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeBilateralcleftlip_text" size="27" value=""></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="3">
					<p style="line-height: 150%"><font size="4">
					<span style="font-family: Times New Roman">&nbsp;</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Cleft Palate：<br>
					<font size="3">&nbsp;&nbsp;
					<font face="Times New Roman">
					<input type="radio" value="LangenbeckVariant" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "LangenbeckVariant"){ echo "checked"; } ?>></font></font></font>Langenbeck
          Variant <font face="Times New Roman" size="3"><input type="radio" value="PushbackVariant" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "PushbackVariant"){ echo "checked"; } ?>></font>Pushback
          Variant <font face="Times New Roman" size="3"><input type="radio" value="Furlow" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "Furlow"){ echo "checked"; } ?>></font>Furlow
          			<font face="Times New Roman" size="3"><input type="radio" value="PF" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "PF"){ echo "checked"; } ?>></font>PF&nbsp;
					<font face="Times New Roman" size="3"><input type="radio" value="FurlowPF" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "FurlowPF"){ echo "checked"; } ?>></font>Furlow+PF<font size="4"><br>
					&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Others" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "Others"){ echo "checked"; } ?>></font>Others：</font></span><font size="4"><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeCleftpalate_text" size="27" value=""></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="3">
					<p style="line-height: 150%">
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Alveolar Cleft：</span></font><span lang=EN-US
          style='font-family:Times New Roman'><o:p><br>
					</o:p></span><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;
					<font face="Times New Roman">
					<input type="radio" value="BoneGraft" name="BoneGraft" <? if($resultChinaPatientRecord['BoneGraft'] == "BoneGraft"){ echo "checked"; } ?>></font>Bone
          Graft</span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="4">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Patient’s Photo</span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：<br>
&nbsp;&nbsp;&nbsp; --</span><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>Date 
					(Pre-Surgery)</span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><input type="text" name="beforeSurgeryYear" size="2" value="">/ <input type="text" name="beforeSurgeryMonth" size="1" value="">/ <input type="text" name="beforeSurgeryDay" size="1" value=""></span></font><div align="center">
						<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="420">
							<tr>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Frontal<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics1'])){ echo $resultChinaPatientRecord['pedigree_graphics1']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics1"></font></span></td>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Side<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics4'])){ echo $resultChinaPatientRecord['pedigree_graphics4']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics4"></font></span></td>
							</tr>
							<tr>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Shape of Nose’s Hole<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics3'])){ echo $resultChinaPatientRecord['pedigree_graphics3']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics3"></font></span></td>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Others<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics5'])){ echo $resultChinaPatientRecord['pedigree_graphics5']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics5"></font></span></td>
							</tr>
						</table>
					</div>
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp;&nbsp;&nbsp; 
					--Date (Post-Surgery)：<input type="text" name="afterSurgeryYear" size="2">/ <input type="text" name="afterSurgeryMonth" size="1">/ <input type="text" name="afterSurgeryDay" size="1"></span></font><div align="center">
						<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="420">
							<tr>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Frontal<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics2'])){ echo $resultChinaPatientRecord['pedigree_graphics2']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics2"></font></span></td>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Side<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics7'])){ echo $resultChinaPatientRecord['pedigree_graphics7']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210"/><br><input type="file" size="25" name="pedigree_graphics7"></font></span></td>
							</tr>
							<tr>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Shape of Nose’s Hole<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics6'])){ echo $resultChinaPatientRecord['pedigree_graphics6']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics6"></font></span></td>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Other<br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics8'])){ echo $resultChinaPatientRecord['pedigree_graphics8']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="345" height="210" /><br><input type="file" size="25" name="pedigree_graphics8"></font></span></td>
							</tr>
						</table>
						</div>
					</td>
				</tr>
				<tr>
					<td width="159">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Subsidy from Others<br>
&nbsp; Organization</span></font><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td colspan="3">
					<p>
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					&nbsp;<font face="Times New Roman"><input type="radio" value="Y" name="usageofSocialResources" <?PHP if($resultChinaPatientinfo['usageofSocialResources'] == "Y"){ echo "checked"; } ?>></font>Yes</span></font><span
          lang=EN-US style='font-family:Times New Roman'><o:p><font size="4"><br>
					</font></o:p></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Medical Subsidy：</span></font><span style="font-family: Times New Roman"><font face="Times New Roman" size="4"><input type="checkbox" name="smileTrain" value="1" <?PHP if($resultChinaPatientinfo['smileTrain'] == "1"){ echo "checked"; } ?>></font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Smile Train<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>, </span>
					Project Name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="MSitem" size="18" value=""></font><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></font>
					<span style="font-family: Times New Roman">
					<font face="Times New Roman" size="4">
			<input type="checkbox" name="MSOther" value="1" <?PHP if($resultChinaPatientinfo['MSOther'] == "1"){ echo "checked"; } ?>></font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Others</span>：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="MSOther_text" size="42" value=""></font><br>
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Living
          Allowance：from Organization of </span>
			<span style="font-family: Times New Roman">
					<font face="Times New Roman">
			<input type="text" name="LAunit" size="28" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>&nbsp;;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P</span>roject Name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="LAitem" size="34" value=""></font><br>
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Others Subsidy<span
          style='mso-hansi-font-family:新細明體; font-family:Times New Roman'>：</span>from Organization of
			</span><span style="font-family: Times New Roman">
					<font face="Times New Roman">
			        <input type="text" name="OAunit" size="33" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>&nbsp;;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P</span>roject Name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="OAitem" size="39" value=""></font></span></font><o:p><font size="4" face="Times New Roman"><br>
					</font></o:p><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="N" name="usageofSocialResources" <? if($resultChinaPatientinfo['usageofSocialResources'] == "N"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>No</span></span></font><span
          lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
				</tr>
				<tr>
					<td width="159">
          <font size="4">
			<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Distance from<br>
&nbsp; Home&nbsp;to Hospital</span></font><span lang=EN-US
          style='font-family:Calibri'><o:p></o:p></span></td>
					<td colspan="3">
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					&nbsp;<font face="Times New Roman"><input type="radio" value="100" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "100"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Less
          than 100 KM</span> <font face="Times New Roman"> <input type="radio" value="100-200" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "100-200"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>100~200 KM</span>&nbsp;<font face="Times New Roman"><input type="radio" value="200" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "200"){ echo "checked"; } ?>></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>More
          than 200 KM</span></span></font><o:p></o:p></td>
				</tr>
				</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="20">&nbsp;
						</td>
					</tr>
					<tr>
						<td>
			<div align="center">
			<table border="1" width="700" cellspacing="1" cellpadding="0" id="table48" height="40">
				<tr>
					<td>
					<p align="center"><b><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體; mso-bidi-font-style: italic">
					Part 5: Subsidy Details</span></font></b></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
						<div align="center">
							<table border="1" width="700" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<span style="font-family: Times New Roman">
					&nbsp;<font face="Times New Roman"><input type="checkbox" name="subsidiesforMedicalExpenses" value="1" <? if($resultChinaPatientRecord['subsidiesforMedicalExpenses'] == "1"){ echo "checked"; } ?>></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Medical 
									Expenses Subsidy<br>
&nbsp; Total amount of medical expenses: US$ </font></span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman" size="4">
					<input type="text" name="TotalSFME" size="8" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4"><br>
									</font></span><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; 
									1.NCF supports: US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="NCFAllowance" size="6" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">; 
									&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="NCFProportion" size="1" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">％ 
									of total expense<br>
&nbsp;&nbsp; 2.Patient pays: US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="PatientPay" size="6" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">; 
									&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="PatientProportion" size="1" value=""></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">％ 
									of total expense</span></font></td>
									<td valign="top">
									<span style="font-family: Times New Roman">
					&nbsp;<font face="Times New Roman"><input type="checkbox" name="transportationSubsidies" value="1" <? if($resultChinaPatientinfo['transportationSubsidies'] == "1"){ echo "checked"; } ?>></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Transportation 
									Subsidy<br>
									</font></span><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp; 
									1.NCF supports：US$<input type="text" name="NCFSOT" size="6" value=""> <br>
&nbsp; 2.</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Patient 
									pays</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">US$
									</font></span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman" size="4">
					<input type="text" name="PatientSOT" size="6" value=""></font></span>
                    
                    				<br>
                                    <span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									&nbsp;3.Others：US$ 
                                    </span>
									<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					                <input type="text" name="OtherPay" size="6" value=""></font></span>
                                    </td>
								</tr>
								<tr>
									<td colspan="2" height="30">
									<p align="center"><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									Total Amount of NCF Subsidy：US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="NCFTotalSubsidies" size="8" value=""></font></span></font></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
					<tr>
						<td height="20">&nbsp;
						</td>
					</tr>
					<tr>
						<td>
			<div align="center">
			<table border="1" width="700" cellspacing="1" cellpadding="0" id="table49" height="40">
				<tr>
					<td>
					<p align="center"><b>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體; mso-bidi-font-style: italic">
					<font size="4">Part 6: Files Upload</font></span></b></td>
				</tr>
			</table>
			</div>
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					<tr>
						<td>
						<div align="center">
							<table border="1" width="700" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center"><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">* 
									Part 6A</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Expense Receipt (issued by 
									Hospital)</font></span><table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="500">
										<tr>
											<td valign="top" align="center"><br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics_other'])){ echo $resultChinaPatientRecord['pedigree_graphics_other']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree"  width="690" height="500"><br><input type="file" size="25" name="pedigree_graphics_other"></td>
										</tr>
									</table>
					<font size="4">
									<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					&nbsp;</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">* 
									Part 6B</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Receipt of NCF grant<br>
									(Containing Signature of Patient, 
									Coordinator and Program Director)</font></span><table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="500">
										<tr>
											<td valign="top" align="center"><br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics9'])){ echo $resultChinaPatientRecord['pedigree_graphics9']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="690" height="500"/><br><input type="file" size="25" name="pedigree_graphics9"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6C</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others Receipt (1)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics10'])){ echo $resultChinaPatientRecord['pedigree_graphics10']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="690" height="210"/><br><input type="file" size="25" name="pedigree_graphics10"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6D</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others Receipt (2)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics11'])){ echo $resultChinaPatientRecord['pedigree_graphics11']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="690" height="210" /><br><input type="file" size="25" name="pedigree_graphics11"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6E</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others Receipt (3)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br><img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics12'])){ echo $resultChinaPatientRecord['pedigree_graphics12']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="690" height="210" /><br><input type="file" size="25" name="pedigree_graphics12"></td>
										</tr>
									</table>
									</td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
					</table>
			</div>
			</td>
		</tr>
	</table>
    <table border="0" cellspacing="1" width="710">
    	<?
			if(($resultChinaPatientinfo['ncfAll2China'] == "1") || ($resultChinaPatientinfo['ncfAll2China'] == 1)){
		?>
		<!-- 
			<tr>
				<td style="border-style: solid; border-width: 1">
					<p><font size="4"><i><strong>核准补助：</strong></i></font></p>
				</td>
			</tr>
            <tr>
            	<td style="border-style: solid; border-width: 1">
					<p><font size="3">1. 医疗费用补助：人民币&nbsp;&nbsp; <? //echo $resultChinaPatientinfo['ncfAllMedicaid'];  ?> 元</font></p>
				</td>
			</tr>
            <tr>
            	<td style="border-style: solid; border-width: 1">
					<p><font size="3">2. 交通费用补助：人民币&nbsp;&nbsp; <? //echo $resultChinaPatientinfo['ncfAllTransport'];  ?> 元</font></p>
				</td>
			</tr>
            <tr>
            	<td style="border-style: solid; border-width: 1">
							<p>&nbsp;</p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p><font size="3">NCF 补助费用总金额为：人民币&nbsp;&nbsp; <? //echo $resultChinaPatientinfo['ncfAllTotal'];  ?> 元</font></p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p><font size="3">意见：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? //echo $resultChinaPatientinfo['ncfAllRemark'];  ?></font></p>
						</td>
					</tr>
                    -->

			<?
				}
			?>        
    
    
		<tr>
			<td>
				<p align="center">
					<font size="3">
						<?
							//echo "PatientID: ".$resultChinaPatientinfo['patientID']."<br> SEID: ".$seid."<br> Remark:".$resultChinaPatientinfo['remark']."<br>";
							if(($resultChinaPatientinfo['remark'] == "0") || ($resultChinaPatientinfo['remark'] == 0) || (($resultChinaPatientinfo['patientID'] != $seid)) || ($resultChinaPatientinfo['remark'] == "2") || ($resultChinaPatientinfo['remark'] == 2)){
								echo "<input id='previous0' onClick=\"return saveData('cancels')\" type='button' value='Back' name='save'>";
							}else {
								echo "<input id='save0' onClick=\"return saveData('save')\" type='button' value='Save' name='save'>";
                        		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                	        	echo "<input id='close0' onClick=\"return saveData('cancels')\" type='button' value='Cancel' name='close'>";
                    	    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    	    	echo "<input id='close0' onClick=\"return saveData('sends')\" type='button' value='Submit' name='sends'>";
							}
                    	?>
					</font>
				</p>
			</td>
		</tr>
	</table>
</div>
<input type="hidden" name="patientID" value="<? echo $seid; ?>">
<input type="hidden" name="remark" value="">
<input type="hidden" name="NCFID" value="<?php echo $resultChinaPatientinfo['NCFID'];  ?>">
<input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
<input type="hidden" name="branch" value="1">
<input type="hidden" name="serialcode" value="1">
<input type="hidden" name="num" value="">
<input type="hidden" name="num2" value="<?php echo $resultChinaPatientinfo['NCFMedicalNum'];  ?>">

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