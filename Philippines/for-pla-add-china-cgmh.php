<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	$branch = "1";
	$serialcode = "1";		//暫時以此當作同病患的病歷表流水號
	
	
	if(!empty($seid) && !empty($sepwd)){
		//製作自動帶出NCF編號code
		$get_time = getdate();
		$date_year =  $get_time['year'];	// Year is 4 bits.
		$date = substr($date_year, 2);		// get Year last 2 bits.
		
		// if DB-Num. is not empty, get MAX no.
		//$sel_max = "SELECT MAX(num) FROM chinapatientrecord";	
		$sel_max = "SELECT MAX(num) FROM `PHpatient`";
		$query = mysql_query($sel_max);
		$result = mysql_fetch_array($query);
		$maxNum = $result['MAX(num)'];	//Get MAX num from China patient's num.
		
		//$maxData = "SELECT * FROM `chinapatientrecord` WHERE num=".$maxNum."";
		$maxData = "SELECT * FROM `PHpatient` WHERE num=".$maxNum."";
		@$queryData = mysql_query($maxData);
		@$resultData = mysql_fetch_array($queryData);
		//$maxNums = $resultData["NCFNum"];
		$maxNums = $resultData["NCFID"];
		
		// split no 
		if(!empty($maxNums)){	// If $max !empty than split no
			$no_date = substr($maxNums,2,2);	// fetch last 4 bits flow Num..
			$flow_no = substr($maxNums,-4);		// fetch 4 bits flow No.
			if($no_date == $date){
				$flow_no = $flow_no+1;
				if($flow_no <10){
					$flow_no = "000".$flow_no;
				}else if($flow_no <100){
					$flow_no = "00".$flow_no;
				}else if($flow_no <1000){
					$flow_no = "0".$flow_no;
				}else if($flow_no <10000){
					$flow_no = $flow_no;
				}
				$NCFNumX = "PH".$date.$flow_no;
			}else{
				$NCFNumX = "PH".$date."0001";	
			}
		}else{
			$NCFNumX = "PH".$date."0001";
		}
		// NCFNumX is china patient's Number.
		//End of China patient's Num.	
		
		//echo $NCFNumX."<br/>";
			
		
		
		// Make China patient's Medical Record Number.
		$recordData = "SELECT MAX(NCFMedicalNum) FROM PHrecord WHERE NCFID='".$NCFNumX."'";
		@$queryRecordData = mysql_query($recordData);
		@$resultRecordData = mysql_fetch_array($queryRecordData);
		$NCFMedicalNum = $resultRecordData["MAX(NCFMedicalNum)"];
	// $NCFMedicalNum = $resultRecordData["MAX(NCFMedicalNum)"];
	// echo $recordData."<br/>";
	
		// 建立病歷表編號
		if(!empty($NCFMedicalNum)){	// If $max !empty than split no
			if($NCFMedicalNum <10){
				$NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
			}else if($NCFMedicalNum <100){
				$NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
			}
		}
		
		
		$NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;
		//echo $NCFMedicalNumNow."<br/>";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
	<script language="javascript">
		<!--
			function saveData(opt){
				//alert (opt);
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
							document.china_medical.submit();
						}
					}else if(opt == "close"){
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
							document.china_medical.submit();
						}
					} else if(opt == "cancelAdd"){
							location.href='for-pla-add-china-search.php';
					}
				}
				
				//-->
		</script>
</head>

<body>
<form name="china_medical" enctype="multipart/form-data" method="post" action="for-pla-add-china-cgmh-save.php">
<div align="center">
	<!-- <table border="1" width="710" cellspacing="0" id="table1" cellpadding="0" style="border-right-color: #000000; border-bottom-color: #000000"> -->
	<table border="1" width="710" cellspacing="0" id="table1" cellpadding="0">
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
				<table border="1" width="700" cellspacing="1" cellpadding="0" id="table34" style="border-right-color: #FFF3DE; border-bottom-color: #FFF3DE" height="50">
					<tr>
						<td>
						<p align="center">
                        <b style='mso-bidi-font-weight:normal'><span lang=EN-US>
        					<font size="5" face="Times New Roman">
        						<select size="1" name="school">
                    				<OPTION value="" selected>Please select...</OPTION> 
									<OPTION value="NPH">National Pediatric Hospital</OPTION>
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
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="caseYear" size="2"></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">
          / </font></span>
						<font face="Times New Roman" size="4">
								<input type="text" name="caseMonth" size="1">
						</font>
                        <span lang=EN-US style='font-family:Times New Roman'><font size="4"> /
          						</font></span>
								<font face="Times New Roman" size="4">
									<input type="text" name="caseDay" size="1">
                                </font><span lang=EN-US style='font-family:Times New Roman'>(YYYY/MM/DD)<o:p></o:p></span></td>
								<td width="120">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; NCF
          Number</font><o:p></o:p></span></td>
								<td width="150">&nbsp;</td>
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
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="surgeryDrName" size="17"></font></td>
								<td width="115">
						<span lang=EN-US style='font-family:Times New Roman'>
								<font size="2">&nbsp;Name of<br>
&nbsp;Speech Therapist</font></span></td>
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="languageTherapist" size="17"></font></td>
								<td width="70">
						<span lang=EN-US style='font-family:Times New Roman'>
			&nbsp;Name of<br>
								&nbsp;Orthodontist<o:p></o:p></span></td>
								<td width="150"><font face="Times New Roman">&nbsp;<input type="text" name="orthodontics" size="17"></font></td>
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
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="idno" size="40"></font></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Patient Record Number</font></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="MedicalRecordNumber" size="10"></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Name</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="name" size="40"></font></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Sex</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<p style="line-height: 150%">
						<font size="4" face="Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="gender"></font></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">Male<br>
&nbsp;</font></span><font face="Times New Roman" size="4"><input type="radio" value="0" name="gender"></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">Female</font></span></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Date
          of Birth</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="birthYear" size="2"></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">
          / </font></span><font face="Times New Roman" size="4">
								<input type="text" name="birthMonth" size="1"></font><span lang=EN-US style='font-family:Times New Roman'><font size="4"> /
          						</font></span>
								<font face="Times New Roman" size="4">
								<input type="text" name="birthDay" size="1"></font><span lang=EN-US style='font-family:Times New Roman'>(YYYY/MM/DD)<o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Occupation</font><o:p></o:p></span></td>
						<td height="27" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="profession" size="10"></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Telephone</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="tel" size="40"></font></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Education</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="education" size="10"></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Address</font><o:p></o:p></span></td>
						<td colspan="3" height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="address" size="87"></font></td>
					</tr>
					<tr>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Name
          of<br>
&nbsp; Guardian </font> <o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="contactperson" size="40"></font></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Relationship to<br>
&nbsp; the Patient</font><o:p></o:p></span></td>
						<td height="28" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="relationship" size="10"></font></td>
					</tr>
					<tr>
						<td height="30" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp; Telephone </font></span></td>
						<td colspan="3" height="28" valign="middle" width="0">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman"><input type="text" name="phone" size="87"></font></td>
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
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="height" size="5"></font><span lang=EN-US style='font-family:Times New Roman'>(cm)<o:p></o:p></span></td>
						<td width="180">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Weight</font><o:p></o:p></span></td>
						<td valign="middle" width="222">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">&nbsp;</font></span><font face="Times New Roman" size="4"><input type="text" name="weight" size="5"></font><span lang=EN-US style='font-family:Times New Roman'>(kg)<o:p></o:p></span></td>
					</tr>
					<tr>
						<td width="700" colspan="4" height="180">
						<p style="line-height: 150%">
						<span lang=EN-US style='font-family:Times New Roman'>
						<font size="4">*Main Diagnosis：<br>
						</font>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="diagnosis_unilateral_cleft_lip_1" value="UCL"></font><span lang=EN-US style='font-family:Times New Roman'>Unilateral 
						Cleft Lip ( </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="diagnosis_unilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="diagnosis_unilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="CK" name="diagnosis_unilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Cracked 
						)<o:p><br>
&nbsp;</o:p></span><font face="Times New Roman" size="3"><input type="checkbox" name="diagnosis_bilateral_cleft_lip_2" value="BCL"></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						Cleft Lip ( </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="diagnosis_bilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="diagnosis_bilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="MCK" name="diagnosis_bilateral_cleft_lip"></font><span lang=EN-US style='font-family:Times New Roman'>Mixing 
						Crack ) <o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="CleftPalate" value="CP"></font><span lang=EN-US style='font-family:Times New Roman'>Hard 
						Palate --- </span><font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="incomplete_main"></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete 
						( </span><font face="Times New Roman" size="3">
						<input type="radio" value="SCC" name="incomplete"></font><span lang=EN-US style='font-family:Times New Roman'>Submucosal 
						Cleft </span><font face="Times New Roman" size="3">
						<input type="radio" value="CU" name="incomplete"></font><span lang=EN-US style='font-family:Times New Roman'>Uvula 
						Bifida </span><font face="Times New Roman" size="3">
						<input type="radio" value="SP" name="incomplete"></font><span lang=EN-US style='font-family:Times New Roman'>Soft 
						Palate&nbsp; </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="BC" name="incomplete"></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						Cleft )<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>--- </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="C" name="incomplete_main"></font><span lang=EN-US style='font-family:Times New Roman'>Complete 
						( </span><font face="Times New Roman" size="3">
						<input type="radio" value="U" name="complete"></font><span lang=EN-US style='font-family:Times New Roman'>Unilateral </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="B" name="complete"></font><span lang=EN-US style='font-family:Times New Roman'>Bilateral 
						)<o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="BoneGraft_main" value="BoneGraft"></font><span lang=EN-US style='font-family:Times New Roman'>Alveolar 
						Cleft ( </span><font face="Times New Roman" size="3">
						<input type="radio" value="C" name="BoneGraft_select"></font><span lang=EN-US style='font-family:Times New Roman'>Complete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="IC" name="BoneGraft_select"></font><span lang=EN-US style='font-family:Times New Roman'>Incomplete </span>
						<font face="Times New Roman" size="3">
						<input type="radio" value="CK" name="BoneGraft_select"></font><span lang=EN-US style='font-family:Times New Roman'>Cracked 
						)<o:p><br>
						</o:p>&nbsp;</span><font face="Times New Roman" size="3"><input type="checkbox" name="Combined_with_other_craniofacial_disorders" value="Other">
						</font><span lang=EN-US style='font-family:Times New Roman'>Combined 
						with Others Craniofacial Deformities</span><font face="Times New Roman"><span style='mso-ascii-font-family:
          Calibri;mso-hansi-font-family:Calibri'>：</span></font><font face="Times New Roman" size="4">
						<input type="text" name="Combined_with_other_craniofacial_disorders_text" size="50"></font><o:p></o:p></td>
					</tr>
					<tr>
						<td width="700" colspan="4" height="215">
          <p style="line-height: 150%">
			<span lang=EN-US style='font-family:Times New Roman'>
			<font size="4">*Did
          the patient have any treatment before? </font> <o:p><br>
			</o:p></span><font face="Times New Roman" size="4">
			&nbsp;<font face="Times New Roman"><input type="radio" value="Y" name="Cleft_lip_and_palate_surgery"></font></font><font size="4"><span lang=EN-US style='font-family:Times New Roman'>Yes<o:p><br>
			</o:p></span></font><span style="font-family: Times New Roman">&nbsp;&nbsp;&nbsp; ---<font face="Times New Roman"><input type="checkbox" name="beforeSurgery_1" value="1LNR"></font><span style='font-family:Times New Roman'>Primary
          Unilateral Lip/ Nose Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_2" value="1BLANR"></font><span style='font-family:Times New Roman'>Primary
          Bilateral Lip/ Nose Repair<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>&nbsp;<font face="Times New Roman"><input type="checkbox" name="beforeSurgery_3" value="1CPR"></font><span style='font-family:Times New Roman'>Primary Cleft Palate Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_4" value="FHR"></font><span style='font-family:Times New Roman'>Fistula Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_5" value="PF"></font><span style='font-family:Times New Roman'>Pharyngeal
          Flap Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_6" value="PBR"></font><span style='font-family:Times New Roman'>Vomer
          Flap Repair<br>
			&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_7" value="2CPR"></font><span style='font-family:Times New Roman'>Secondary
          Cleft Palate Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_8" value="LR"></font><span style='font-family:Times New Roman'>Lip
          Rhinoplasty Repair </span>
			<font face="Times New Roman">
			<input type="checkbox" name="beforeSurgery_9" value="AB"></font><span style='font-family:Times New Roman'>Alveolar
          Bone Graft <br>
&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_10" value="PO"></font><span style='font-family:Times New Roman'>Pre-Surgery
          Molding<br>
&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_11" value="SL"></font><span style='font-family:Times New Roman'>Speech
          Therapy<br>
			&nbsp;&nbsp;&nbsp; ---</span><font face="Times New Roman"><input type="checkbox" name="beforeSurgery_other" value="other"></font><span style='font-family:Times New Roman'>Others,
          please specify</span>：<font face="Times New Roman"><input type="text" name="beforeSurgery_other_reason" size="70"></font></span><span lang=EN-US style="font-family: Times New Roman"><o:p><br>
			</o:p></span><font face="Times New Roman" size="4">
			&nbsp;<font face="Times New Roman"><input type="radio" value="N" name="Cleft_lip_and_palate_surgery"></font></font><span lang=EN-US style='font-family:Times New Roman'><font size="4">No</font><o:p></o:p></span></p>
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
					<input type="text" name="familyMembers" size="5"></font><span style='font-family:Times New Roman'> person(s)</span>; 
					<span style='font-family:Times New Roman'>Living with </span>
					<font face="Times New Roman">
					<input type="text" name="live_together" size="5"></font><span style='font-family:Times New Roman'> person(s)</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="107">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Father's Age</span></font><o:p></o:p></td>
					<td width="75">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="fatherAge" size="1"></font></span></font></td>
					<td width="95">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Occupation</span></font></td>
					<td width="113">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="fatherProfession_main" size="12"></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Education</span></font><o:p></o:p></td>
					<td width="170">
          <p style="line-height: 150%">
          <font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="fatherProfession"></font><span style='font-family:Times New Roman'>College/
          University<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="2" name="fatherProfession"></font><span style='font-family:Times New Roman'>High School<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="3" name="fatherProfession"></font><span style='font-family:Times New Roman'>Elementary School<br>
          &nbsp;</span><font face="Times New Roman"><input type="radio" value="4" name="fatherProfession"></font><span style='font-family:Times New Roman'>Literate<br>
          </span>&nbsp;<font face="Times New Roman"><input type="radio" value="5" name="fatherProfession"></font><span style='font-family:Times New Roman'>Preliterate</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="107">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Moher's Age</span></font><o:p></o:p></td>
					<td width="75">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="motherAge" size="1"></font></span></font></td>
					<td width="95">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Occupation</span></font></td>
					<td width="113">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="motherProfession_main" size="12"></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Education</span></font><o:p></o:p></td>
					<td width="170">
          <p style="line-height: 150%">
          <font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="radio" value="1" name="motherProfession"></font><span style='font-family:Times New Roman'>College/
          University<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="2" name="motherProfession"></font><span style='font-family:Times New Roman'>High School<br>
           &nbsp;</span><font face="Times New Roman"><input type="radio" value="3" name="motherProfession"></font><span style='font-family:Times New Roman'>Elementary School<br>
          &nbsp;</span><font face="Times New Roman"><input type="radio" value="4" name="motherProfession"></font><span style='font-family:Times New Roman'>Literate<br>
			&nbsp;</span><font face="Times New Roman"><input type="radio" value="5" name="motherProfession"></font><span style='font-family:Times New Roman'>Preliterate</span></span></font><o:p></o:p></td>
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
					<font size="4"><span style="font-family: Times New Roman">&nbsp;<font face="Times New Roman"><input type="text" name="mainSourceofIncome" size="27"></font></span></font></td>
					<td width="126">
					<font size="4">
					<span style='font-family:Times New Roman'>
					&nbsp; Annual
          Income<br>
					&nbsp; (average)</span></font><o:p></o:p></td>
					<td width="170">
					<font size="4"><span style="font-family: Times New Roman">&nbsp;US$ 
					<font face="Times New Roman"> 
					<input type="text" name="income" size="5"></font></span></font><o:p></o:p></td>
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
					<input type="text" name="fixedExpenditure1" size="24"></font><span style='font-family:Times New Roman'><br>
          &nbsp;2. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure2" size="24"></font><span style='font-family:Times New Roman'><br>
          &nbsp;3. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure3" size="24"></font><span style='font-family:Times New Roman'><br>
          &nbsp;4. </span><font face="Times New Roman"><input type="text" name="fixedExpenditure4" size="24"></font><span style='font-family:Times New Roman'> </span>
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
					<input type="text" name="extimatedExpenditures" size="5"></font></span></font><o:p></o:p></td>
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
					<td width="353"><? echo $NCFMedicalNum."&nbsp;"; ?></td>
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
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="BIHosTimeYear" size="2"></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="BIHosTimeMonth" size="1"></font> /
          						<font face="Times New Roman">
          						<input type="text" name="BIHosTimeDay" size="1"></font><br>
&nbsp;&nbsp;&nbsp;&nbsp; </font>(YYYY/MM/DD)</span><o:p></o:p></td>
					<td width="142"><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">*<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Date
          of Surgery</span></span></font><span lang=EN-US style='font-family:Calibri'><o:p></o:p></span></td>
					<td width="209">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="surgeryTimeYear" size="2"></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="surgeryTimeMonth" size="1"></font> /
          						<font face="Times New Roman">
          						<input type="text" name="surgeryTimeDay" size="1"></font><br>
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
					<font size="4">&nbsp;<font face="Times New Roman"><input type="text" name="LHosTimeYear" size="2"></font>
          / 
								<font face="Times New Roman"> 
								<input type="text" name="LHosTimeMonth" size="1"></font> /
          						<font face="Times New Roman">
          						<input type="text" name="LHosTimeDay" size="1"></font><br>
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
			<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="GA" name="Anesthesia"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>General
          Anesthesia<br>
			</span>&nbsp;<font face="Times New Roman"><input type="radio" value="LA" name="Anesthesia"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Local Anesthesia</span></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td width="159"><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">*<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Name 
					of Surgeon </span></span></font><span lang=EN-US style='font-family:Calibri'><o:p></o:p></span>
					</td>
					<td width="180">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="surgeon" size="22"></font></span></font></td>
					<td width="142">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp; Name of<br>
&nbsp; Anesthesiologist</span></font></td>
					<td width="209">
			<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
			&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="anesthesiologist" size="27"></font></span></font></td>
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
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M1LNR" name="surgeryType"></font>Primary Unilateral Lip/Nose Repair</span></font><font face="Times New Roman"><span style='mso-hansi-font-family:新細明體'> </span>
					</font>
					<font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font face="Times New Roman">
					<input type="radio" value="M1BLANR" name="surgeryType"></font>Bilateral Lip/ Nose Repair</span></font><span
          lang=EN-US style='font-family:Times New Roman;mso-hansi-font-family:新細明體'><o:p><br>
					</o:p></span><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M1CPR" name="surgeryType"></font>Primary Cleft Palate Repair</span></font><font face="Times New Roman"><span style='mso-hansi-font-family:新細明體'> </span>
					</font>
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
					<font face="Times New Roman">
					<input type="radio" value="MFHR" name="surgeryType"></font>Fistula Repair</font></span><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;<font face="Times New Roman"><input type="radio" value="M2CPR" name="surgeryType"></font>Secondary Cleft Palate
          Repair</span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
					</font></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font face="Times New Roman">
					<input type="radio" value="MLR" name="surgeryType"></font></span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">Lip
          and/or Nose Revision</font></span><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="MAB" name="surgeryType"></font>Alveolar
          Bone Graft</span></font><span lang="en-us" style="mso-hansi-font-family: 新細明體; font-family: Times New Roman">&nbsp;
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
					<font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
					<font face="Times New Roman">
					<input type="radio" value="MPF" name="surgeryType"></font>Pharyngeal
          Flap Repair<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'> </span></font></span> 
					<font face="Times New Roman"> <o:p><br>
					</o:p>
					</font>
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					<font size="4">&nbsp;</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font face="Times New Roman"><input type="radio" value="MPBR" name="surgeryType"></font></span></font><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><font size="4">Vomer
          Flap Repair<br>
					</font></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="MOTH" name="surgeryType">
					</font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Other</span>s： 
					</span><span style="font-family: Times New Roman">
					<font face="Times New Roman">
					<input type="text" name="surgeryTypeOther_text" size="65"></font></span></font><o:p></o:p></td>
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
					<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Rotation-AdvancementVariant" name="repairTypeUnilateralcleftlip"></font>Rotation-Advancement
          Variant <font face="Times New Roman"> <input type="radio" value="TriangularVariant" name="repairTypeUnilateralcleftlip"></font>Triangular
          Variant <font face="Times New Roman"> <input type="radio" value="Mohler" name="repairTypeUnilateralcleftlip"></font>Mohler</span></font><font face="Times New Roman"><o:p><br>
					</o:p></font><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Others" name="repairTypeUnilateralcleftlip"></font>Others：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeUnilateralcleftlip_text" size="27"></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="3">
					<p style="line-height: 150%">
					<font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Bilateral Cleft Lip：<br>
					</span></font>
					<span lang="en-us" style="mso-hansi-font-family: 新細明體; font-family: Times New Roman">&nbsp;</span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="StraightLine" name="repairTypeBilateralcleftlip"></font>Straight
          Line <font face="Times New Roman"> <input type="radio" value="ForkedFlap" name="repairTypeBilateralcleftlip"></font>Forked
          Flap <font face="Times New Roman"> <input type="radio" value="Others" name="repairTypeBilateralcleftlip"></font>Others：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeBilateralcleftlip_text" size="27"></font></span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="3">
					<p style="line-height: 150%"><font size="4">
					<span style="font-family: Times New Roman">&nbsp;</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Cleft Palate：<br>
					<font size="3">&nbsp;&nbsp;
					<font face="Times New Roman">
					<input type="radio" value="LangenbeckVariant" name="repairTypeCleftpalate"></font></font></font>Langenbeck
          Variant <font face="Times New Roman" size="3"><input type="radio" value="PushbackVariant" name="repairTypeCleftpalate"></font>Pushback
          Variant <font face="Times New Roman" size="3"><input type="radio" value="Furlow" name="repairTypeCleftpalate"></font>Furlow
          			<font face="Times New Roman" size="3"><input type="radio" value="PF" name="repairTypeCleftpalate"></font>PF&nbsp;
					<font face="Times New Roman" size="3"><input type="radio" value="FurlowPF" name="repairTypeCleftpalate"></font>Furlow+PF<font size="4"><br>
					&nbsp;&nbsp;<font face="Times New Roman"><input type="radio" value="Others" name="repairTypeCleftpalate"></font>Others：</font></span><font size="4"><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="repairTypeCleftpalate_text" size="27"></font></span></font><o:p></o:p></td>
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
					<input type="radio" value="BoneGraft" name="BoneGraft"></font>Bone
          Graft</span></font><o:p></o:p></td>
				</tr>
				<tr>
					<td colspan="4">
					<font size="4">
					<span style='font-family:Times New Roman;
          mso-hansi-font-family:新細明體'>&nbsp; Patient’s Photo</span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：<br>
&nbsp;&nbsp;&nbsp; --</span><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>Date 
					(Pre-Surgery)</span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span><span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'><input type="text" name="beforeSurgeryYear" size="2">/ <input type="text" name="beforeSurgeryMonth" size="1">/ <input type="text" name="beforeSurgeryDay" size="1"></span></font><div align="center">
						<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="420">
							<tr>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Frontal<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics1">
								</font></span></td>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Side<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics4">
								</font></span></td>
							</tr>
							<tr>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Shape of nose’s hole<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics3">
								</font></span></td>
								<td valign="top" align="center" width="345" height="210">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Others<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics5">
								</font></span></td>
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
								<font size="4">Frontal<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics2"></font></span></td>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Side<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics7"></font></span></td>
							</tr>
							<tr>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Shape of nose’s hole<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics6"></font></span></td>
								<td valign="top" height="210" width="345" align="center">
								<span style="color: rgb(0, 0, 0); font-family: Times New Roman; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 238, 238); display: inline !important; float: none">
								<font size="4">Others<br>
									<img alt="Pedigree" src="user-pic.jpg" width="316" height="280" border="0"><br>
									<input type="file" size="25" name="pedigree_graphics8"></font></span></td>
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
					&nbsp;<font face="Times New Roman"><input type="radio" value="Y" name="usageofSocialResources"></font>Yes</span></font><span
          lang=EN-US style='font-family:Times New Roman'><o:p><font size="4"><br>
					</font></o:p></span><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Medical Subsidy：</span></font><span style="font-family: Times New Roman"><font face="Times New Roman" size="4"><input type="checkbox" name="smileTrain" value="1"></font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;Smile Train<span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>, </span>
					Project name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="MSitem" size="18"></font><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></font>
					<span style="font-family: Times New Roman">
					<font face="Times New Roman" size="4">
			<input type="checkbox" name="MSOther" value="1">
					</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Others</span>：</span><span style="font-family: Times New Roman"><font face="Times New Roman">
					<input type="text" name="MSOther_text" size="42"></font><br>
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Living
          Allowance：from organization of </span>
			<span style="font-family: Times New Roman">
					<font face="Times New Roman">
			<input type="text" name="LAunit" size="28"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>&nbsp;;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P</span>roject Name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="LAitem" size="34"></font><br>
					</span>
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; Others Subsidy<span
          style='mso-hansi-font-family:新細明體; font-family:Times New Roman'>：</span>from organization of
			</span><span style="font-family: Times New Roman">
					<font face="Times New Roman">
			        <input type="text" name="OAunit" size="33"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>&nbsp;;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P</span>roject Name：</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="OAitem" size="39"></font></span></font><o:p><font size="4" face="Times New Roman"><br>
					</font></o:p><font size="4">
					<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;<font face="Times New Roman"><input type="radio" value="N" name="usageofSocialResources"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>No</span></span></font><span
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
					&nbsp;<font face="Times New Roman"><input type="radio" value="100" name="h2hdistance"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>Less
          than 100 KM</span> <font face="Times New Roman"> <input type="radio" value="100-200" name="h2hdistance"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>100~200 KM</span>&nbsp;<font face="Times New Roman"><input type="radio" value="200" name="h2hdistance"></font><span style='font-family:Times New Roman;mso-hansi-font-family:新細明體'>More
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
					&nbsp;<font face="Times New Roman"><input type="checkbox" name="subsidiesforMedicalExpenses" value="1"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Medical 
									Expenses Subsidy<br>
&nbsp; Total amount of medical expenses: US$ </font></span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman" size="4">
					<input type="text" name="TotalSFME" size="8"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4"><br>
									</font></span><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;&nbsp; 
									1.NCF supports: US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="NCFAllowance" size="6"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">; 
									&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="NCFProportion" size="1"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">％ 
									of total expense<br>
&nbsp;&nbsp; 2.Patient pays: US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="PatientPay" size="6"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">; 
									&nbsp;</span><span style="font-family: Times New Roman"><font face="Times New Roman"><input type="text" name="PatientProportion" size="1"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">％ 
									of total expense</span></font></td>
									<td valign="top">
									<span style="font-family: Times New Roman">
					&nbsp;<font face="Times New Roman"><input type="checkbox" name="transportationSubsidies" value="1"></font></span><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Transportation 
									Subsidy<br>
									</font></span><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp; 
									1.NCF supports：US$<input type="text" name="NCFSOT" size="6" value=""> <br>
&nbsp; 2.</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Patient 
									pays</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">US$
									</font></span>
                                    <span style="font-family: Times New Roman">
										<font face="Times New Roman" size="4">
											<input type="text" name="PatientSOT" size="6">
                                        </font>
                                    </span>
                                    <br>
                                    <span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									&nbsp;3.Others：US$ 
                                    </span>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
										<font face="Times New Roman">
											<input type="text" name="OtherPay" size="6" value="">
                                        </font>
                                    </span>
                                    </td>
								</tr>
								<tr>
									<td colspan="2" height="30">
									<p align="center"><font size="4">
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									Total Amount of NCF Subsidy：US$ </span>
					<span style="font-family: Times New Roman">
									<font face="Times New Roman">
					<input type="text" name="NCFTotalSubsidies" size="8"></font></span></font></td>
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
									<td align="center">
										<font size="4">
											<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">&nbsp;</span>
										</font>
										<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
											<font size="4">* 
									Part 6A</font></span>
										<font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font>
										<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Expense Receipt (issued by 
									hospital)</font></span><table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="500">
										<tr>
											<td valign="top" align="center"><br>
												<img alt="Pedigree" src="user-pic.jpg" width="680" height="480" border="0"><br>
												<input type="file" size="25" name="pedigree_graphics_other">
											</td>
										</tr>
									</table>
					<font size="4">
									<span style='font-family:Times New Roman; mso-hansi-font-family:新細明體'>
					&nbsp;</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">* 
									Part 6B</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Receipt of NCF grant<br>
									(containing signature of patient, 
									coordinator and program director)</font></span><table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="250">
										<tr>
											<td valign="top" align="center"><br>
												<img alt="Pedigree" src="user-pic.jpg" width="680" height="300" border="0"><br>
												<input type="file" size="25" name="pedigree_graphics9"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6C</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others receipt (1)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br>
												<img alt="Pedigree" src="user-pic.jpg" width="680" height="300" border="0"><br>
												<input type="file" size="25" name="pedigree_graphics10"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6D</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others receipt (2)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br>
												<img alt="Pedigree" src="user-pic.jpg" width="680" height="300" border="0"><br>
												<input type="file" size="25" name="pedigree_graphics11"></td>
										</tr>
									</table>
									<span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">
									<font size="4">Part 6E</font></span><font size="4"><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體">：</span></font><span style="font-family: Times New Roman; mso-hansi-font-family: 新細明體"><font size="4">Others receipt (3)</font></span>
									<table border="1" width="690" cellspacing="0" cellpadding="0" style="border-style: dashed; border-width: 1px; padding-left: 0; padding-right: 0; padding-top: 0px; padding-bottom: 0px" height="210">
										<tr>
											<td valign="top" align="center"><br>
												<img alt="Pedigree" src="user-pic.jpg" width="680" height="300" border="0"><br>
												<input type="file" size="25" name="pedigree_graphics12"></td>
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
		<tr>
			<td>
				<p align="center">
					<font size="3">
						<input id="save0" onClick="return saveData('save')" type="button" value="Save" name="save">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="close0" onClick="return saveData('cancelAdd')" type="button" value="Cancel" name="close">
					</font>
				</p>
			</td>
		</tr>
	</table>
</div>
<input type="hidden" name="patientID" value="<? echo $seid; ?>">
<input type="hidden" name="remark" value="">
<input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
<input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
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