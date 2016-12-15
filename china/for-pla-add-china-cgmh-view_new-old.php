<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		$CPIData = $_GET["cpi"];
		
		$srhType = $_GET["srhType"];
		$srhValue = $_GET["srhValue"];

		$courses = $_GET["courses"];

		//echo "srhType: ".$srhType."<br/>srhValue: ".$srhValue."<br/>CPIData: ".$CPIData."<br>courses: ".$courses."<br>";
		
		// 搜寻病患资料
		$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE num =".$cpi."";
		$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		$resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo);
		
		//搜寻病患病例表
		//$NCFMedicalNums = $resultChinaPatientinfo['NCFID']."11";
		$selChinaPatientRecord = "SELECT * FROM `patientrecord-china` WHERE NCFMedicalNum='".$NCFMedicalNums."'";
		$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
		$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
		
		//echo $selChinaPatientRecord."<br>";
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
				}
				function turnbacke(){
					document.turnback.submit();
				}
				function addData(num){
					var courses = document.getElementById('courses').value;
					//alert(courses);
					if (courses == "ps"){
						//location.href = "for-pla-add-china-cgmh.php?c="+courses+"n="+NCFMedicalNum;
						location.href = "for-pla-add-china-cgmh_new.php?num="+num;
						//alert("for-pla-add-china-cgmh_new.php?num="+num);
					}else if (courses == "po"){
						location.href = "china-addpat-po-view_new.php?num="+num;
						//alert("china-addpat-po-view_new.php?num="+num);
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
                             &nbsp;清寒唇颚裂患者补助申请表</font></i></b></span>
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

                      <td width="252" style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="caseYear" maxLength="4" size="5" name="caseYear" value=""> 年   

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
                        	<label>
                            	<input id="gender_male2" type="radio" value="男" name="gender" <? if($resultChinaPatientinfo['gender'] == "男"){ echo "checked"; } ?>>男
                            </label> 
							<label>
                            	<input id="gender_female2" type="radio" value="女" name="gender" <? if($resultChinaPatientinfo['gender'] == "女"){ echo "checked"; } ?>>女
                            </label>
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

                          <p><font size="3">&nbsp;<input id="diagnosis_unilateral_cleft_lip_2" type="checkbox" value="UCL" name="diagnosis_unilateral_cleft_lip_1" <? if(($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?> />单侧唇裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip" type="radio" value="C" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>/>完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip" type="radio" value="IC" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>/>不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip" type="radio" value="CK" name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>/>隐裂 

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

							<input id="complete_main" type="radio" value="IC" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "IC"){ echo "checked"; } ?>/></label>不完全性 

							(  

                          <label for="checkbox11"><input id="incomplete0" type="radio" value="SCC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>/></label>粘膜下裂  

                          <label for="checkbox12"><input id="incomplete1" type="radio" value="CU" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>/></label>悬雍垂裂  

                          <label for="checkbox13"><input id="incomplete2" type="radio" value="SP" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>/></label>软颚裂  

                          <input id="incomplete3" type="radio" value="BC" name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>/>双侧裂 

							)<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

							---  

						<label for="checkbox11">
							<input id="complete_main" type="radio" value="C" name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "C"){ echo "checked"; } ?>/>
						</label> 
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

							<input id="Combined_with_other_craniofacial_disorders_text0" maxLength="30" size="50" name="Combined_with_other_craniofacial_disorders_text" value=""></font></p>            

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

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession10" type="radio" value="大专以上" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "大专以上"){ echo "checked"; } ?>/>大专以上</label><br>

                          <label>&nbsp;<input id="fatherProfession11" type="radio" value="中学" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "中学"){ echo "checked"; } ?>/>中学(专)</label><br>

                          <label>&nbsp;<input id="fatherProfession12" type="radio" value="小学" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "小学"){ echo "checked"; } ?>/>小

						学</label><br>

                          <label>&nbsp;<input id="fatherProfession13" type="radio" value="识字" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "识字"){ echo "checked"; } ?>/>识字</label> 

                          <label>&nbsp;<input id="fatherProfession14" type="radio" value="不识字" name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "不识字"){ echo "checked"; } ?>/>不识字</label></font></td>     

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
				</table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;</font>个案<font size="3">家庭情况说明</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                        <p align="center"><font size="3">

						<textarea id="descriptionCaseFamily0" name="descriptionCaseFamily" rows="4" cols="70" value=""></textarea></font></td>

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

                      <td style="border-style: solid; border-width: 1"><font size="3"><label for="fixedExpenditure1">&nbsp;1.    

                          <input id="fixedExpenditure13" maxLength="30" size="30" name="fixedExpenditure1" value=""></label><br>

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
        
        <div align="center">

			<table border="0" cellspacing="1" width="780">
				<tr>
					<td>
						<p align="center">
                			<font size="3">
                				<input id="save0" onClick="return addData('<? echo $nums;  ?>')" type="button" value="新增此患者补助申请表" name="save">			
                        			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        		<input id="close0" onClick="return turnbacke()" type="button" value="回上一页" name="close">
                    		</font>
               			</p>
               		</td>
				</tr>
			</table>

        </div>
		<br>
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
                
                <input type="hidden" id="courses" name="courses" value="<? echo $courses; ?>">

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
		echo "alert('抱歉您现在无权限读取，请先登入')\;";
		echo " location.href='login.php'\;";
		echo " </Script>";
	}
?>
