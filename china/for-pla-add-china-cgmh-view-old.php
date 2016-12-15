<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	//echo $seid."<br />";

	
	if(!empty($seid) && !empty($sepwd)){
		$CPIData = $_GET["cpi"];
		
		// 搜寻病患-病歷表资料
		//$resultChinaPatientRecord = mysql_fetch_array(mysql_query("SELECT * FROM `patientrecord-china` WHERE NCFMedicalNum='".$NCFMedicalNums."'"));
		$sCNPatRec = "SELECT * FROM `patientrecord-china` WHERE num=".$CPIData."";
		$qCNPatRec = mysql_query($sCNPatRec);
		$resultChinaPatientRecord = mysql_fetch_array($qCNPatRec);

		//搜寻病患病例表
		//$resultChinaPatientinfo = mysql_fetch_array(mysql_query("SELECT * FROM `patient-china` WHERE num = ".$CPIData.""));

//echo $resultChinaPatientRecord["NCFID"]."<br>";
		

		$sCNPatInfo = "SELECT * FROM `patient-china` WHERE `NCFID`='".$resultChinaPatientRecord["NCFID"]."'";
		$qCNPatInfo = mysql_query($sCNPatInfo);
		$resultChinaPatientinfo = mysql_fetch_array($qCNPatInfo);


		//$NCFMedicalNums = $resultChinaPatientinfo['NCFID']."11";
		
		//echo $selChinaPatientinfo."<br/><br/><br/>";
		
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<script language="javascript">
			<!--
				function inputData(){
						//病患个人资料
document.china_medical.caseYear.value = "<?php echo $resultChinaPatientinfo['caseYear'];  ?>";
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
document.china_medical.surgeryTimeYear.value = "<?php echo $resultChinaPatientRecord['surgeryTimeYear'];  ?>";
document.china_medical.LHosTimeYear.value = "<?php echo $resultChinaPatientRecord['LHosTimeYear'];  ?>";
document.china_medical.surgeon.value = "<?php echo $resultChinaPatientRecord['surgeon'];  ?>";
document.china_medical.anesthesiologist.value = "<?php echo $resultChinaPatientRecord['anesthesiologist'];  ?>";
document.china_medical.surgeryTypeOther_text.value = "<?php echo $resultChinaPatientRecord['surgeryTypeOther_text'];  ?>";
document.china_medical.repairTypeUnilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeUnilateralcleftlip_text'];  ?>";
document.china_medical.repairTypeBilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeBilateralcleftlip_text'];  ?>";
document.china_medical.repairTypeCleftpalate_text.value = "<?php echo $resultChinaPatientRecord['repairTypeCleftpalate_text'];  ?>";
document.china_medical.beforeSurgeryYear.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryYear'];  ?>";
document.china_medical.afterSurgeryYear.value = "<?php echo $resultChinaPatientRecord[afterSurgeryYear];  ?>";
document.china_medical.MSitem.value = "<?php echo $resultChinaPatientRecord['MSitem'];  ?>";
document.china_medical.MSOther_text.value = "<?php echo $resultChinaPatientRecord['MSOther_text'];  ?>";
document.china_medical.LAunit.value = "<?php echo $resultChinaPatientRecord['LAunit'];  ?>";
document.china_medical.LAitem.value = "<?php echo $resultChinaPatientRecord['LAitem'];  ?>";
document.china_medical.OAunit.value = "<?php echo $resultChinaPatientRecord['OAunit'];  ?>";
document.china_medical.OAitem.value = "<?php echo $resultChinaPatientRecord['OAitem'];  ?>";

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
							alert ("请输入 接案日期 年份");
						}else if(document.china_medical.idno.value == ""){
							alert ("请输入 身份证号");
						}else if(document.china_medical.name.value == ""){
							alert ("请输入 个案姓名");
						}else if(document.china_medical.birthYear.value == ""){
							alert ("请输入 出生年");
						}else if(document.china_medical.address.value == ""){
							alert ("请输入 住址");
						}else if(document.china_medical.height.value == ""){
							alert ("请输入 身高");
						}else if(document.china_medical.weight.value == ""){
							alert ("请输入 体重");
						}else if(document.china_medical.BIHosTimeYear.value == ""){
							alert ("请输入 住院时间-年");
						}else if(document.china_medical.surgeryTimeYear.value == ""){
							alert ("请输入 开刀时间-年");
						}else if(document.china_medical.LHosTimeYear.value == ""){
							alert ("请输入 出院时间-年");
						}else if(document.china_medical.surgeon.value == ""){
							alert ("请输入 外科医师");
						}else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
							alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
						}else {
							document.china_medical.remark.value = "<? echo '1'; ?>";
							document.china_medical.num.value = "<? echo $CPIData; ?>";
							document.china_medical.submit();
						}
					}else if(opt == "sends"){
						if(document.china_medical.caseYear.value == ""){
							alert ("请输入 接案日期 年份");
						}else if(document.china_medical.idno.value == ""){
							alert ("请输入 身份证号");
						}else if(document.china_medical.name.value == ""){
							alert ("请输入 个案姓名");
						}else if(document.china_medical.birthYear.value == ""){
							alert ("请输入 出生年");
						}else if(document.china_medical.address.value == ""){
							alert ("请输入 住址");
						}else if(document.china_medical.height.value == ""){
							alert ("请输入 身高");
						}else if(document.china_medical.weight.value == ""){
							alert ("请输入 体重");
						}else if(document.china_medical.BIHosTimeYear.value == ""){
							alert ("请输入 住院时间-年");
						}else if(document.china_medical.surgeryTimeYear.value == ""){
							alert ("请输入 开刀时间-年");
						}else if(document.china_medical.LHosTimeYear.value == ""){
							alert ("请输入 出院时间-年");
						}else if(document.china_medical.surgeon.value == ""){
							alert ("请输入 外科医师");
						}else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
							alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
						}else {
							document.china_medical.remark.value = "<? echo '0'; ?>";
							document.china_medical.num.value = "<? echo $CPIData; ?>";
							document.china_medical.submit();
						}
					}else if(opt == "cancels"){
						location.href = "searchList.php?c=1";
					}
				}
						
			//-->
			</script>
</head>

<body topmargin="2" onLoad="inputData()">
<form name="china_medical" enctype="multipart/form-data" method="post" action="for-pla-add-china-cgmh-edit.php">
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/china/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/china/select.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="300" align="center" bgcolor="#FFF3DE"><font size="3">
              	
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

				<font color="#000000" size="4">
                	<select size="1" name="school">
                    	<option selected>请选择医院</option>
                        <option value="西安交通大学口腔医院" <?php if($resultChinaPatientinfo['school'] =="西安交通大学口腔医院"){echo "selected";}  ?>>西安交通大学口腔医院</option>
                    </select>
                             &nbsp;清寒唇颚裂患者补助申请表（整形外科）</font></i></b></span>
               <font size="5">
				</font>  

              </td>

            </tr>

          </tbody>

        </table>

      </div>

        <br>

&nbsp;<div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td width="109" style="border-style: solid; border-width: 1"><font size="3">*接案日期</font></td>

                      <td width="252" style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="caseYear0" maxLength="4" size="5" name="caseYear" value=""> 年   

                          <select size="1" name="caseMonth">
                        		<option value="01" <?php if($resultChinaPatientinfo['caseMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientinfo['caseMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientinfo['caseMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientinfo['caseMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientinfo['caseMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientinfo['caseMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientinfo['caseMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientinfo['caseMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientinfo['caseMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientinfo['caseMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientinfo['caseMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientinfo['caseMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月   

                          <select size="1" name="caseDay">
                        		<option value="01" <?php if($resultChinaPatientinfo['caseDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientinfo['caseDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientinfo['caseDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientinfo['caseDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientinfo['caseDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientinfo['caseDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientinfo['caseDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientinfo['caseDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientinfo['caseDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientinfo['caseDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientinfo['caseDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientinfo['caseDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientinfo['caseDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientinfo['caseDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientinfo['caseDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientinfo['caseDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientinfo['caseDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientinfo['caseDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientinfo['caseDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientinfo['caseDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientinfo['caseDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientinfo['caseDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientinfo['caseDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientinfo['caseDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientinfo['caseDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientinfo['caseDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientinfo['caseDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientinfo['caseDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientinfo['caseDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientinfo['caseDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientinfo['caseDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日</font></td>

                      <td width="106" style="border-style: solid; border-width: 1"><font size="3">&nbsp;NCF个案编号</font></td>

                      <td width="287" style="border-style: solid; border-width: 1"><?php echo $resultChinaPatientinfo['NCFID'];  ?></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1;"><span class closure_uid_qekr43="387" Kc="null" lang="zh-CN" id="result_box2" c="4" a="undefined"><font size="3">&nbsp;外科医师</font></span></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeryDrName1" maxLength="20" name="surgeryDrName" size="20" value="">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;语言治疗师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="languageTherapist1" maxLength="20" name="languageTherapist" size="20" value="">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;正畸科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="orthodontics" maxLength="20" name="orthodontics" size="20" value="">&nbsp;</font></td>

                    </tr>

                  </table>

                </div>

              </td>

            </tr>

          </table>

        </div><br>

&nbsp;<div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td> 

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">个案基本数据</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*</font>身份证号</td>

					<td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="idno" maxLength="20" name="idno" size="20" value="">&nbsp; 

                            </font></td>
                   
                      <td style="border-style: solid; border-width: 1" width="113">

						<font size="3">&nbsp;病历</font>号<font size="3">码</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="MedicalRecordNumber" maxLength="20" name="MedicalRecordNumber" size="20" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*个案姓名</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="name" maxLength="20" name="name" size="20" value=""></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*性&nbsp;      

                        别</font></td>

					<td style="border-style: solid; border-width: 1" width="251">
                    	<font size="3">
                        	<label><input id="gender_male2" type="radio" value="男" name="gender" <? if($resultChinaPatientinfo['gender'] == "男"){ echo "checked"; } ?>>男</label> 
							<label><input id="gender_female2" type="radio" value="女" name="gender" <? if($resultChinaPatientinfo['gender'] == "女"){ echo "checked"; } ?>>女</label>
                        </font>
					</td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*出生日期</font></td>

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="birthYear2" maxLength="4" size="4" name="birthYear" value=""> 年&nbsp;
                      		<select size="1" name="birthMonth">
                        		<option value="01" <?php if($resultChinaPatientinfo['birthMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientinfo['birthMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientinfo['birthMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientinfo['birthMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientinfo['birthMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientinfo['birthMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientinfo['birthMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientinfo['birthMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientinfo['birthMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientinfo['birthMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientinfo['birthMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientinfo['birthMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月 
                        <select size="1" name="birthDay">
                        		<option value="01" <?php if($resultChinaPatientinfo['birthDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientinfo['birthDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientinfo['birthDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientinfo['birthDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientinfo['birthDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientinfo['birthDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientinfo['birthDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientinfo['birthDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientinfo['birthDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientinfo['birthDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientinfo['birthDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientinfo['birthDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientinfo['birthDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientinfo['birthDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientinfo['birthDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientinfo['birthDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientinfo['birthDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientinfo['birthDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientinfo['birthDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientinfo['birthDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientinfo['birthDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientinfo['birthDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientinfo['birthDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientinfo['birthDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientinfo['birthDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientinfo['birthDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientinfo['birthDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientinfo['birthDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientinfo['birthDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientinfo['birthDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientinfo['birthDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                       </font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;职&nbsp; 

						业</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="profession2" maxLength="20" name="profession" size="20" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;电&nbsp; 话</font></td>     

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="tel2" maxLength="20" name="tel" size="32" value=""></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;教育程度</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="education2" maxLength="20" name="education" size="20" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*住&nbsp;      

                        址</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">&nbsp;<input id="address2" maxLength="110" size="81" name="address" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;重要联系人</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="contactperson2" maxLength="20" name="contactperson" size="20" value=""></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;</font>与个案关系</td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="relationship2" maxLength="20" name="relationship" size="20" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3">&nbsp;连络电话</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">

						&nbsp;<input id="phone3" name="phone" size="32" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="766" colspan="4">

						<b><i><font size="4">医师诊断</font></i></b></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*身&nbsp; 高</font></td>      

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="height0" maxLength="3" size="4" name="height" value=""> 

                        公分</font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*体&nbsp; 重</font></td>      

                      <td style="border-style: solid; border-width: 1" width="251"><font size="3">&nbsp;<input id="weight0" maxLength="3" size="4" name="weight" value=""> 

                        公斤</font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="129"><font size="3">

						*主诊断<br>

                          &nbsp; ( 医学专有名词 )</font></td>      

                      <td style="border-style: solid; border-width: 1" width="637">

                          <p><font size="3">&nbsp;<input id="diagnosis_unilateral_cleft_lip_1" type="checkbox" value="UCL" name="diagnosis_unilateral_cleft_lip_1" <? if(($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?> />单侧唇裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip0" type="radio" value="C" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>/>完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>/>不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip2" type="radio" value="CK" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>/>隐裂 

							)</font></p>

                          <font size="3"> 

                          &nbsp;<input id="diagnosis_bilateral_cleft_lip_3" type="checkbox" value="BCL" name="diagnosis_bilateral_cleft_lip_2" <? if(($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "BCL") || ($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "1")){ echo "checked"; } ?>/>双侧唇裂 

							(                                 

                          <input id="diagnosis_bilateral_cleft_lip0" type="radio" value="C" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "C"){ echo "checked"; } ?>/>完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>/>不完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip2" type="radio" value="MCK" name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "MCK"){ echo "checked"; } ?>/>混合裂 

							)</font><p>&nbsp;<font size="3"><label for="checkbox9"><input id="CleftPalate0" type="checkbox" value="CP" name="CleftPalate" <? if($resultChinaPatientinfo['CleftPalate'] == "CP"){ echo "checked"; } ?>/></label>颚裂  

                          ---   

                          <label for="checkbox11">

							<input id="incomplete" type="radio" value="IC" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "IC"){ echo "checked"; } ?>/></label>不完全性 

							(  

                          <label for="checkbox11"><input id="incomplete0" type="radio" value="SCC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>/></label>粘膜下裂  

                          <label for="checkbox12"><input id="incomplete1" type="radio" value="CU" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>/></label>悬雍垂裂  

                          <label for="checkbox13"><input id="incomplete2" type="radio" value="SP" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>/></label>软颚裂  

                          <input id="incomplete3" type="radio" value="BC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>/>双侧裂 

							)<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

							---  

                          <label for="checkbox11">

							<input id="incomplete" type="radio" value="C" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "C"){ echo "checked"; } ?>/></label> 

                          完全性 ( <input id="complete0" type="radio" value="U" name="complete" <? if($resultChinaPatientinfo['complete'] == "U"){ echo "checked"; } ?>/>单侧 <input id="complete1" type="radio" value="B" name="complete" <? if($resultChinaPatientinfo['complete'] == "B"){ echo "checked"; } ?>/>双侧 

							)</font></p>                                

                          <p><font size="3">&nbsp;<input id="beforeSurgery_21" type="checkbox" value="BoneGraft" name="BoneGraft_main" <? if($resultChinaPatientinfo['BoneGraft_main'] == "BoneGraft"){ echo "checked"; } ?>/>牙槽突裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip3" type="radio" value="C" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "C"){ echo "checked"; } ?>/>完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip4" type="radio" value="IC" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "IC"){ echo "checked"; } ?>/>不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip5" type="radio" value="CK" name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "CK"){ echo "checked"; } ?>/>隐裂 

							)</font></p>                    

                          <p><font size="3">&nbsp;<input id="Combined_with_other_craniofacial_disorders0" type="checkbox" value="Other" name="Combined_with_other_craniofacial_disorders" <? if($resultChinaPatientinfo['Combined_with_other_craniofacial_disorders'] == "Other"){ echo "checked"; } ?>/>合并其他颅颜病症

							： 

							<input id="Combined_with_other_craniofacial_disorders_text" maxLength="30" size="50" name="Combined_with_other_craniofacial_disorders_text" value=""></font></p>            

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*</font>个案<font size="3">之前是否接受过任何唇颚裂治疗？</font><p>

						&nbsp;<font size="3"><label><input id="Cleft_lip_and_palate_surgery0" type="radio" value="Y" name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "Y"){ echo "checked"; } ?> />是</label></font></p>

                          <p><font size="3">&nbsp; <label>&nbsp;<input id="beforeSurgery_1" type="checkbox" value="1LNR" name="beforeSurgery_1" <? if($resultChinaPatientinfo['beforeSurgery_1'] == "1LNR"){ echo "checked"; } ?>/>一期唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_12" type="checkbox" value="1BLANR" name="beforeSurgery_2" <? if($resultChinaPatientinfo['beforeSurgery_2'] == "1BLANR"){ echo "checked"; } ?>/>一期双侧唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_13" type="checkbox" value="1CPR" name="beforeSurgery_3" <? if($resultChinaPatientinfo['beforeSurgery_3'] == "1CPR"){ echo "checked"; } ?>/>一期颚裂修复</label>                                 

                          <label><input id="beforeSurgery_14" type="checkbox" value="FHR" name="beforeSurgery_4" <? if($resultChinaPatientinfo['beforeSurgery_4'] == "FHR"){ echo "checked"; } ?>/>廔孔修复</label>                                 

                          <label><input id="beforeSurgery_15" type="checkbox" value="PF" name="beforeSurgery_5" <? if($resultChinaPatientinfo['beforeSurgery_5'] == "PF"){ echo "checked"; } ?>/>咽瓣修复</label>                                 

                          <label><input id="beforeSurgery_16" type="checkbox" value="PBR" name="beforeSurgery_6" <? if($resultChinaPatientinfo['beforeSurgery_6'] == "PBR"){ echo "checked"; } ?>/>梨骨瓣修复</label></font></p>                                

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_17" type="checkbox" value="2CPR" name="beforeSurgery_7" <? if($resultChinaPatientinfo['beforeSurgery_7'] == "2CPR"){ echo "checked"; } ?>/>二期颚裂(颚咽)修复                  

                          <input id="beforeSurgery_18" type="checkbox" value="LR" name="beforeSurgery_8" <? if($resultChinaPatientinfo['beforeSurgery_8'] == "LR"){ echo "checked"; } ?>/>唇鼻整形                  

                          <input id="beforeSurgery_19" type="checkbox" value="AB" name="beforeSurgery_9" <? if($resultChinaPatientinfo['beforeSurgery_9'] == "AB"){ echo "checked"; } ?>/>齿槽植骨                  

                          <input id="beforeSurgery_20" type="checkbox" value="PO" name="beforeSurgery_10" <? if($resultChinaPatientinfo['beforeSurgery_10'] == "PO"){ echo "checked"; } ?>/>术前正畸                  

                          <input id="beforeSurgery_22" type="checkbox" value="SL" name="beforeSurgery_11" <? if($resultChinaPatientinfo['beforeSurgery_11'] == "SL"){ echo "checked"; } ?>/>语言治疗</font></p>              

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_other0" type="checkbox" value="other" name="beforeSurgery_other" <? if($resultChinaPatientinfo['beforeSurgery_other'] == "other"){ echo "checked"; } ?>>其他，请详述

							：                  

                          <input id="beforeSurgery_other_reason0" maxLength="60" size="60" name="beforeSurgery_other_reason" value=""/></font></p>              

                          <p><label><font size="3">&nbsp;<input id="Cleft_lip_and_palate_surgery1" type="radio" value="N" name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "N"){ echo "checked"; } ?> />否</font></label></p>

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">家庭状况</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3">&nbsp;家庭成员</font></td>

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5"><font size="3">&nbsp;共 <input id="familyMembers0" maxLength="3" size="4" name="familyMembers" value="">     

                          人；同住 <input id="live_together0" maxLength="3" size="4" name="live_together" value="">     

                          人</font></td>  

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3"> &nbsp;父亲年龄</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge2" maxLength="3" size="4" name="fatherAge" value=""> 

                        岁</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;职业</font></td>

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main2" maxLength="20" name="fatherProfession_main" size="20" value=""></font></td>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3"> &nbsp;教育程度</font></td>

					<td style="border-style: solid; border-width: 1" width="221"><font size="3">
                    	<label>&nbsp;<input id="fatherProfession10" type="radio" value="大专以上" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "大专以上"){ echo "checked"; } ?>/>大专以上</label><br>
						<label>&nbsp;<input id="fatherProfession11" type="radio" value="中学" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "中学"){ echo "checked"; } ?>/>中学(专)</label><br>
						<label>&nbsp;<input id="fatherProfession12" type="radio" value="小学" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "小学"){ echo "checked"; } ?>/>小学</label><br>
						<label>&nbsp;<input id="fatherProfession13" type="radio" value="识字" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "识字"){ echo "checked"; } ?>/>识字</label> 
						<label>&nbsp;<input id="fatherProfession14" type="radio" value="不识字" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "不识字"){ echo "checked"; } ?>/>不识字</label></font>
					</td>     
				</tr>
				<tr>
					
                      <td style="border-style: solid; border-width: 1" width="103"><font size="3">&nbsp;母亲年龄</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge1" maxLength="3" size="4" name="motherAge" value=""> 

                        岁</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;职业</font></td> 

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main1" maxLength="20" name="motherProfession_main" size="20" value=""></font></td>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3"> &nbsp;教育程度</font></td> 

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession5" type="radio" value="大专以上" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "大专以上"){ echo "checked"; } ?>/>大专以上</label><br>

                          <label>&nbsp;<input id="fatherProfession6" type="radio" value="中学" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "中学"){ echo "checked"; } ?>/>中学(专)</label><br>

                          <label>&nbsp;<input id="fatherProfession7" type="radio" value="小学" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "小学"){ echo "checked"; } ?>/>小学</label><br>

                          <label>&nbsp;<input id="fatherProfession8" type="radio" value="识字" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "识字"){ echo "checked"; } ?>/>识字</label> 

                          <label>&nbsp;<input id="fatherProfession9" type="radio" value="不识字" name="motherProfession" <? if($resultChinaPatientinfo['motherProfession'] == "不识字"){ echo "checked"; } ?>/>不识字</label></font></td>     

                    </tr>

                    <!--
                    <tr>
                    	<td style="border-style: solid; border-width: 1" width="103" rowspan="2"><font size="3"> &nbsp;家系图</font></td>
	                    <td style="border-style: solid; border-width: 1" width="639" colspan="5">
	                    	<p align="center"><font size="3">
								<img border="0" src="<?PHP //if(!empty($resultChinaPatientinfo['pedigree_graphics'])){ echo $resultChinaPatientinfo['pedigree_graphics']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="325" height="285"></font>
						</td>
					</tr>
					-->

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5">

                        <p align="center"><font size="3">

                        <input type="file" size="25" name="pedigree_graphics" value=""></font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;</font>个案<font size="3">家庭情况说明</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                        <p align="center"><font size="3">

						<textarea id="descriptionCaseFamily" name="descriptionCaseFamily" rows="4" cols="70" value=""></textarea></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;主要经济/</font>收入来源</td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="mainSourceofIncome1" maxLength="26" size="30" name="mainSourceofIncome" value=""></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3"> &nbsp;平均年收入</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;     

                        <input id="income" maxLength="7" size="9" name="income" value="">         

                          (人民币)</font></td>     

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;家中固定支出项目<br>

                          &nbsp;(福利院免填)</font></td>     

                      <td style="border-style: solid; border-width: 1"><font size="3">
                      	  <label for="fixedExpenditure1">&nbsp;1. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure1" value=""></label><br>

                          <label for="fixedExpenditure2">&nbsp;2. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure2" value=""></label><br>   

                          <label for="fixedExpenditure3">&nbsp;3. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure3" value=""></label><br>   

                          <label for="fixedExpenditure4">&nbsp;4. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure4" value=""></label></font></td> 

                      <td style="border-style: solid; border-width: 1"><font size="3">  &nbsp;预估支出</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;平均每月生活支出 <input id="extimatedExpenditures1" maxLength="7" size="9" name="extimatedExpenditures" value="">            

                          (人民币)</font></td>    

                    </tr>

                  </table>

                </div>

              </td>

            </tr>

          </table>

        </div>

        <br>

        <br>

        <div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">手术医疗及交通费补助申请</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="155"><font size="3">&nbsp;NCF补助编</font>号</td>

                      <td style="border-style: solid; border-width: 1" width="611"><?php echo $resultChinaPatientRecord['NCFMedicalNum'];  ?></td>
                      																			
                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*住院时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="BIHosTimeYear" maxLength="4" size="5" name="BIHosTimeYear" value=""> 年   

                          <select size="1" name="BIHosTimeMonth">
                        		<option value="01" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['BIHosTimeMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月 
                          
                          <select size="1" name="BIHosTimeDay">
                        		<option value="01" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientRecord['BIHosTimeDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                          </font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">*开刀时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="surgeryTimeYear0" maxLength="4" size="5" name="surgeryTimeYear" value=""> 年   

                          <select size="1" name="surgeryTimeMonth">
                        		<option value="01" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['surgeryTimeMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月  

                          <select size="1" name="surgeryTimeDay">
                        		<option value="01" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientRecord['surgeryTimeDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                           </font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*出院时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="LHosTimeYear0" maxLength="4" size="5" name="LHosTimeYear" value=""> 年   

                          <select size="1" name="LHosTimeMonth">
                        		<option value="01" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['LHosTimeMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月  

                          <select size="1" name="LHosTimeDay">
                        		<option value="01" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientRecord['LHosTimeDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                           </font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉方法</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;
                          <input id="Anesthesia" type="radio" value="GA" name="Anesthesia" <?php if($resultChinaPatientRecord['Anesthesia'] =="GA"){echo "checked";}  ?>>全身麻醉   

                          <input id="Anesthesia" type="radio" value="LA" name="Anesthesia" <?php if($resultChinaPatientRecord['Anesthesia'] =="LA"){echo "checked";}  ?>>局部麻醉</font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*外科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeon0" maxLength="20" name="surgeon" size="20" value=""></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="anesthesiologist0" maxLength="20" name="anesthesiologist" size="20" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;手术类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;<input id="surgeryType0" type="radio" value="M1LNR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1LNR"){ echo "checked"; } ?>>一期单侧唇鼻修复    

                          <input id="surgeryType1" type="radio" value="M1BLANR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1BLANR"){ echo "checked"; } ?>>一期双侧唇鼻修复    

                          <input id="surgeryType2" type="radio" value="M1CPR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M1CPR"){ echo "checked"; } ?>>一期颚裂修复    

                          <input id="surgeryType3" type="radio" value="MFHR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MFHR"){ echo "checked"; } ?>>廔孔修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType4" type="radio" value="M2CPR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "M2CPR"){ echo "checked"; } ?>>二期颚裂(颚咽)修复                      

                          <input id="surgeryType5" type="radio" value="MLR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MLR"){ echo "checked"; } ?>>唇鼻整形                      

                          <input id="surgeryType6" type="radio" value="MAB" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MAB"){ echo "checked"; } ?>>齿槽植骨                      

                          <input id="surgeryType7" type="radio" value="MPF" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MPF"){ echo "checked"; } ?>>咽瓣修复                      

                          <input id="surgeryType8" type="radio" value="MPBR" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MPBR"){ echo "checked"; } ?>>梨骨瓣修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType9" type="radio" value="MOTH" name="surgeryType" <? if($resultChinaPatientRecord['surgeryType'] == "MOTH"){ echo "checked"; } ?>>其他：    

                          <input id="surgeryTypeOther_text0" maxLength="20" name="surgeryTypeOther_text" size="20" value=""></font></p>

                        </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" rowspan="4"><font size="3">&nbsp;修补类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;单侧唇裂：</font></p>

							<p><font size="3"><label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip0" type="radio" value="Rotation-AdvancementVariant" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Rotation-AdvancementVariant"){ echo "checked"; } ?>>Rotation-Advancement    

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip1" type="radio" value="TriangularVariant" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "TriangularVariant"){ echo "checked"; } ?>>Triangular                      

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip2" type="radio" value="Mohler" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Mohler"){ echo "checked"; } ?>>Mohler</label></font></p>                     

                          <p><font size="3"> <label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip3" type="radio" value="Others" name="repairTypeUnilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeUnilateralcleftlip'] == "Others"){ echo "checked"; } ?>>Others：</label>  

                          <input id="repairTypeUnilateralcleftlip_text0" name="repairTypeUnilateralcleftlip_text" size="20" value=""></font></p>                    

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;双侧唇裂：</font></p>

                          <p><font size="3">&nbsp;&nbsp; <input id="repairTypeBilateralcleftlip0" type="radio" value="StraightLine" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "StraightLine"){ echo "checked"; } ?>>Straight                      

                          Line <input id="repairTypeBilateralcleftlip1" type="radio" value="ForkedFlap" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "ForkedFlap"){ echo "checked"; } ?>>Forked                      

                          Flap <input id="repairTypeBilateralcleftlip2" type="radio" value="Others" name="repairTypeBilateralcleftlip" <? if($resultChinaPatientRecord['repairTypeBilateralcleftlip'] == "Others"){ echo "checked"; } ?>>Others：                      

                          <input id="repairTypeBilateralcleftlip_text0" maxLength="20" name="repairTypeBilateralcleftlip_text" size="20" value=""></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;颚裂：</font></p>

                          <p><font size="3">&nbsp; &nbsp;<input id="repairTypeCleftpalate0" type="radio" value="LangenbeckVariant" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "LangenbeckVariant"){ echo "checked"; } ?>>Langenbeck                      

                          Variant <input id="repairTypeCleftpalate1" type="radio" value="PushbackVariant" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "PushbackVariant"){ echo "checked"; } ?>>Pushback                      

                          Variant <input id="repairTypeCleftpalate2" type="radio" value="Furlow" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "Furlow"){ echo "checked"; } ?>>Furlow                      

                          <input id="repairTypeCleftpalate3" type="radio" value="PF" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "PF"){ echo "checked"; } ?>>PF</font> 

                          <font size="3"><input id="repairTypeCleftpalate4" type="radio" value="FurlowPF" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "FurlowPF"){ echo "checked"; } ?>>Furlow+PF</font></p>        

                          <p><font size="3">&nbsp;&nbsp;                     

                          <input id="repairTypeCleftpalate5" type="radio" value="Others" name="repairTypeCleftpalate" <? if($resultChinaPatientRecord['repairTypeCleftpalate'] == "Others"){ echo "checked"; } ?>>Others：                      

                          <input id="repairTypeCleftpalate_text0" maxLength="20" name="repairTypeCleftpalate_text" size="20" value=""></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;牙槽突裂：</font></p>

                        <p><font size="3">&nbsp; &nbsp;<input id="BoneGraft" type="radio" value="BoneGraft" name="BoneGraft" <? if($resultChinaPatientRecord['BoneGraft'] == "BoneGraft"){ echo "checked"; } ?>>Bone         

                          Graft</font></p>

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td rowspan="4" style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;           

                          </font>个案照片</td>

                      <td style="border-style: solid; border-width: 1"><font size="3">         

                          &nbsp;手术前－拍照日： <input id="beforeSurgeryYear0" maxLength="4" size="5" name="beforeSurgeryYear" value=""> 年      

                          <select size="1" name="beforeSurgeryMonth">
                        		<option value="01" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['beforeSurgeryMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月

                           <select size="1" name="beforeSurgeryDay">
                        		<option value="01" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientRecord['beforeSurgeryDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                           </font><p align="center"><font size="3">

						<img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics1'])){ echo $resultChinaPatientRecord['pedigree_graphics1']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="316" height="280" /></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics1" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">         

                          &nbsp;手术后－拍照日： <input id="afterSurgeryYear0" maxLength="4" size="5" name="afterSurgeryYear" value=""> 年      

                          <select size="1" name="afterSurgeryMonth">
                        		<option value="01" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['afterSurgeryMonth'] =="12"){echo "selected";}  ?>>12</option>
                            </select>月

                          <select size="1" name="afterSurgeryDay">
                        		<option value="01" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="01"){echo "selected";}  ?>>01</option>
                                <option value="02" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="02"){echo "selected";}  ?>>02</option>
                                <option value="03" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="03"){echo "selected";}  ?>>03</option>
                                <option value="04" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="04"){echo "selected";}  ?>>04</option>
                                <option value="05" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="05"){echo "selected";}  ?>>05</option>
                                <option value="06" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="06"){echo "selected";}  ?>>06</option>
                                <option value="07" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="07"){echo "selected";}  ?>>07</option>
                                <option value="08" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="08"){echo "selected";}  ?>>08</option>
                                <option value="09" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="09"){echo "selected";}  ?>>09</option>
                                <option value="10" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="10"){echo "selected";}  ?>>10</option>
                                <option value="11" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="11"){echo "selected";}  ?>>11</option>
                                <option value="12" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="12"){echo "selected";}  ?>>12</option>
                                <option value="13" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="13"){echo "selected";}  ?>>13</option>
                                <option value="14" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="14"){echo "selected";}  ?>>14</option>
                                <option value="15" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="15"){echo "selected";}  ?>>15</option>
                                <option value="16" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="16"){echo "selected";}  ?>>16</option>
                                <option value="17" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="17"){echo "selected";}  ?>>17</option>
                                <option value="18" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="18"){echo "selected";}  ?>>18</option>
                                <option value="19" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="19"){echo "selected";}  ?>>19</option>
                                <option value="20" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="20"){echo "selected";}  ?>>20</option>
                                <option value="21" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="21"){echo "selected";}  ?>>21</option>
                                <option value="22" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="22"){echo "selected";}  ?>>22</option>
                                <option value="23" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="23"){echo "selected";}  ?>>23</option>
                                <option value="24" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="24"){echo "selected";}  ?>>24</option>
                                <option value="25" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="25"){echo "selected";}  ?>>25</option>
                                <option value="26" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="26"){echo "selected";}  ?>>26</option>
                                <option value="27" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="27"){echo "selected";}  ?>>27</option>
                                <option value="28" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="28"){echo "selected";}  ?>>28</option>
                                <option value="29" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="29"){echo "selected";}  ?>>29</option>
                                <option value="30" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="30"){echo "selected";}  ?>>30</option>
                                <option value="31" <?php if($resultChinaPatientRecord['afterSurgeryDay'] =="31"){echo "selected";}  ?>>31</option>
                            </select>日
                           </font><p align="center"><font size="3">

						<img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics2'])){ echo $resultChinaPatientRecord['pedigree_graphics2']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="316" height="280" /></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics2" value=""></font></td>

                      </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;社会资源使用情形</font></td>    

                      <td style="border-style: solid; border-width: 1">

                          <p><font size="3">&nbsp;<input id="usageofSocialResources0" type="radio" value="Y" name="usageofSocialResources" <? if($resultChinaPatientRecord['usageofSocialResources'] == "Y"){ echo "checked"; } ?>>有</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 医疗补助：                   

                          <input id="smileTrain0" type="checkbox" maxLength="20" value="1" name="smileTrain" <? if($resultChinaPatientRecord['smileTrain'] == "1"){ echo "checked"; } ?>>微笑列车，项目                   

                          <input id="MSitem0" name="MSitem" size="20" value=""> <input id="MSOther0" type="checkbox" value="1" name="MSOther" <? if($resultChinaPatientRecord['MSOther'] == "1"){ echo "checked"; } ?>>其他：                   

                          <input id="MSOther_text0" maxLength="20" name="MSOther_text" size="19" value=""></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 生活补助： 单位

							－ <input id="LAunit0" name="LAunit" size="20" value=""> 项目

							－                   

                          <input id="LAitem0" maxLength="20" name="LAitem" size="20" value=""></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 其他补助： 单位

							－ <input id="OAunit0" maxLength="20" name="OAunit" size="20" value=""> 项目

							－                   

                          <input id="OAitem0" maxLength="20" name="OAitem" size="20" value=""></font></p>

							<p><font size="3">&nbsp;<input id="usageofSocialResources1" type="radio" value="N" name="usageofSocialResources" <? if($resultChinaPatientRecord['usageofSocialResources'] == "N"){ echo "checked"; } ?>></font>无</p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;住家离医院距离</font></td>    

                      <td style="border-style: solid; border-width: 1"><font size="3"><label>&nbsp;<input id="h2hdistance3" type="radio" value="100" name="h2hdistance" <? if($resultChinaPatientRecord['h2hdistance'] == "100"){ echo "checked"; } ?>>少于100公里</label> <label><input id="h2hdistance4" type="radio" value="100-200" name="h2hdistance" <? if($resultChinaPatientRecord['h2hdistance'] == "100-200"){ echo "checked"; } ?>>100-200公里</label> <label><input id="h2hdistance5" type="radio" value="200" name="h2hdistance" <? if($resultChinaPatientRecord['h2hdistance'] == "200"){ echo "checked"; } ?>>大于200公里</label></font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i>

						<strong><font size="4">申请补助项目【*须检具医疗收据复印件、费用明细表复印件】</font></strong></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                          <p><font size="3">&nbsp;<input id="subsidiesforMedicalExpenses0" type="checkbox" value="1" name="subsidiesforMedicalExpenses" <? if($resultChinaPatientRecord['subsidiesforMedicalExpenses'] == "1"){ echo "checked"; } ?>><strong>医疗费补助：</strong></font></p>

							<p><font size="3">&nbsp;&nbsp; 医疗费用总计：人民币 <input id="TotalSFME0" maxLength="6" size="6" name="TotalSFME" value=""> 元</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 1.申请NCF补助：人民币

							<input id="NCFAllowance0" maxLength="6" size="3" name="NCFAllowance" value=""> 元，占医疗费用总金额                   

                          <input id="NCFProportion0" maxLength="3" size="2" name="NCFProportion" value=""> ％</font></p>

							<p>&nbsp;<font size="3">&nbsp;&nbsp;&nbsp; 2.案家自付：人民币

							<input id="PatientPay0" maxLength="6" size="3" name="PatientPay" value=""> 元，占医疗费用总金额                   

                          <input id="textfield19" maxLength="3" size="2" name="PatientProportion" value=""> ％</font></p>

                      </td>

                      <td style="border-style: solid; border-width: 1">

                          <p><strong><font size="3">&nbsp;<input id="transportationSubsidies4" type="checkbox" value="1" name="transportationSubsidies" <? if($resultChinaPatientRecord['transportationSubsidies'] == "1"){ echo "checked"; } ?>>交通费补助：</font></strong></p>

							<p><font size="3">&nbsp;&nbsp; 1.申请NCF补助：人民币

							<input id="NCFSOT0" maxLength="6" size="3" name="NCFSOT" value=""> 元</font></p>

							<p><font size="3">&nbsp;&nbsp; 2.案家自付：人民币

							<input id="PatientSOT0" maxLength="6" size="3" name="PatientSOT" value=""> 元</font></p>          

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" height="38">

                        <p align="center"><strong><font size="4">申请NCF补助费用总金额为：人民币<font size="3"> <input id="NCFTotalSubsidies0" maxLength="6" size="6" name="NCFTotalSubsidies" value=""> </font>元</font></strong></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3">( 上传其他资料 )<br>

                        <img border="0" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics_other'])){ echo $resultChinaPatientRecord['pedigree_graphics_other']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="760" height="1050"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics_other" value=""></font></td>

                    </tr>

                  </table>

                </div>

              </td>

            </tr>
			
            <?
	if(($resultChinaPatientinfo['ncfAll2China'] == "1") || ($resultChinaPatientinfo['ncfAll2China'] == 1)){
?>
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

<?
	}
?>        
          </table>

        </div>

        　

        <div align="center">

		<table border="0" cellspacing="1" width="780">
			<tr>
				<td>
					<p align="center">
                		<font size="3">
                    <?
                		if(($resultChinaPatientinfo['remark'] == "0") || ($resultChinaPatientinfo['remark'] == 0) || (($resultChinaPatientinfo['patientID'] != $seid))){
							echo "<input id='previous0' onClick=\"return saveData('cancels')\" type='button' value='回上一页' name='save'>";
						}else {
							echo "<input id='save' onClick=\"return saveData('save')\" type='button' value='储存' name='save'>";
                        	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        	echo "<input id='close' onClick=\"return saveData('cancels')\" type='button' value='取消' name='close'>";
                        	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        	echo "<input id='sends' onClick=\"return saveData('sends')\" type='button' value='送出' name='sends'>";
						}
                    ?>
						</font>
					</p>
				</td>
			</tr>

          </table>

        </div>

  </center>

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
				  <input type="hidden" name="NCFID" value="<? echo $resultChinaPatientinfo['NCFID']; ?>">
                  <input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNums; ?>">
                  <input type="hidden" name="num" value="">
                  <input type="hidden" name="branch" value="1">
                  <input type="hidden" name="serialcode" value="1">
		</form>
</body>

</html>
<?PHP
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('抱歉您现在无权限读取，请先登入')\;";
		echo " location.href='login.php'\;";
		echo " </Script>";
	}
?>
