<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	//echo $seid."<br />";

	
	if(!empty($seid) && !empty($sepwd)){
		$CPIData = $_GET["cpi"];
		 
		// 搜寻病患资料
		//$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE num =".$CPIData." ORDER BY `MedicalRecordNumber` DESC";
		$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE num =".$CPIData."";
		//$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE num =".$CPIData."";
		$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		$resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo);
		
		//echo $resultChinaPatientinfo."<br/>";
		
		//搜寻病患病例表
		
		//$NCFMedicalNums = $resultChinaPatientinfo['MedicalRecordNumber']."11";
		$NCFMedicalNums = $resultChinaPatientinfo['NCFID']."11";
		$selChinaPatientRecord = "SELECT * FROM `chinapatientrecord` WHERE NCFMedicalNum='".$NCFMedicalNums."'";
		$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
		$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
		
		
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
				
				}
				
				function saveData(opt){
					if(opt == "save"){
						// 警示未填写必要输入项资料
						if(document.china_medical.caseYear.value == ""){
							alert ("Please Input Date of Intake - Year");
						}else if(document.china_medical.caseMonth.value == ""){
							alert ("Please Input Date of Intake - Month");
						}else if(document.china_medical.caseDat.value == ""){
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
						}else if(document.china_medical.caseDat.value == ""){
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
				function turnbacke(){
					document.turnback.submit();
				}
				function addData(num){
					location.href = "for-pla-add-china-cgmh_new.php?num="+num;
				}
			//-->
	</script>
</head>

<body onLoad="inputData()">
<form name="china_medical" enctype="multipart/form-data" method="post" action="for-pla-add-china-cgmh-edit.php">
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
              						<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("top.php"); ?></font></td>
            					</tr>
            					<tr>
              						<td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("select.php"); ?></font></td>
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
                    				<OPTION value="" selected>Please select...</OPTION> 
									<OPTION value="NPH">National Pediatric Hospital</OPTION>
									<!--<OPTION value="ASHONMU">Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
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
									<OPTION value="OTHER">Other</OPTION>-->
                    			</select> Patient Subsidy Application</font></span></b>
                                <span lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
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
						<td height="10">
						</td>
					</tr>
					
					<tr>
						<td>
			
						</td>
					</tr>
					
					
					<tr>
						<td>
						
						</td>
					</tr>
					
					<tr>
						<td>
			
						</td>
					</tr>
					<tr>
						<td height="10">
						</td>
					</tr>
					
					</table>
			</div>
			</td>
		</tr>
	</table>
    <table border="0" cellspacing="1" width="700">
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
							<p><font size="3">1. 医疗费用补助：人民币&nbsp;&nbsp; <? echo $resultChinaPatientinfo['ncfAllMedicaid'];  ?> 元</font></p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p><font size="3">2. 交通费用补助：人民币&nbsp;&nbsp; <? echo $resultChinaPatientinfo['ncfAllTransport'];  ?> 元</font></p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p>&nbsp;</p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p><font size="3">NCF 补助费用总金额为：人民币&nbsp;&nbsp; <? echo $resultChinaPatientinfo['ncfAllTotal'];  ?> 元</font></p>
						</td>
					</tr>
                    <tr>
                    	<td style="border-style: solid; border-width: 1">
							<p><font size="3">意见：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $resultChinaPatientinfo['ncfAllRemark'];  ?></font></p>
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
						<table border="0" cellspacing="1" width="780">
							<tr>
								<td>
									<p align="center">
                						<font size="3">
                							<input id="save0" onClick="return addData('<? echo $nums;  ?>')" type="button" value="Add New Case" name="save">			
                        					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        					<input id="close0" onClick="return turnbacke()" type="button" value="Back" name="close">
                    					</font>
               						</p>
               					</td>
							</tr>
						</table>
					</font>
				</p>
			</td>
		</tr>
	</table>
</div>
<input type="hidden" name="patientID" value="<? echo $seid; ?>">
<input type="hidden" name="remark" value="">
<input type="hidden" name="NCFID" value="<? echo $resultChinaPatientinfo['NCFID']; ?>">
<input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNums; ?>">
<input type="hidden" name="num" value="">
<input type="hidden" name="branch" value="1">
<input type="hidden" name="serialcode" value="1">
</form>
        <form name="turnback" enctype="multipart/form-data" method="post" action="rec-sea-list-china-search.php">
			<input type="hidden" name="srhType" value="<? echo $srhType; ?>">
			<input type="hidden" name="srhValue" value="<? echo $srhValue; ?>">
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