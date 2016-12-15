<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		//制作自动带出NCF编号code
		$get_time = getdate();
		$date_year =  $get_time['year'];	// Year is 4 bits.
		$date = substr($date_year, 2);		// get Year last 2 bits.
		
		$sel_max = "SELECT MAX(NCFID) FROM `patient-china`";
		$query = mysql_query($sel_max);
		$result = mysql_fetch_array($query);
		$maxNums = $result['MAX(NCFID)'];	//Get MAX num from China patient's num.
		
		// split no 
		if(!empty($maxNums)){	// If $max !empty than split no
			$now_date = substr($maxNums,2,2);	// fetch last 4 bits flow Num..
			$flow_no = substr($maxNums,-4);		// fetch 4 bits flow No.
			if($now_date == $date){
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
				$NCFNumX = "CN".$date.$flow_no;
			}else{
				$NCFNumX = "CN".$date."0001";	
			}
		}else{
			$NCFNumX = "CN".$date."0001";
		}

		
		// NCFNumX is china patient's Number.
		//End of China patient's Num.	
		// Make China patient's Medical Record Number.
		$recordData = "SELECT MAX(NCFMedicalNum) FROM `patientrecord-china` WHERE NCFID='".$NCFNumX."'";
		@$queryRecordData = mysql_query($recordData);
		@$resultRecordData = mysql_fetch_array($queryRecordData);
		$NCFMedicalNum = $resultRecordData["MAX(NCFMedicalNum)"];
		
		// 建立病历表编号
		if(!empty($NCFMedicalNum)){	// If $max !empty than split no
			if($NCFMedicalNum <10){
				$NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
			}else if($NCFMedicalNum <100){
				$NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
			}
		}

		$branch = "1";
		$serialcode = "1";		//暂时以此当作同病患的病历表流水号
		$NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;
//echo $NCFMedicalNumNow."<br>";

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
							alert ("请输入 接案日期 年份");
						}else if(document.china_medical.idno.value == ""){
							alert ("请输入 身份证号");
						}else if(document.china_medical.name.value == ""){
							alert ("请输入 个案姓名");
						}else if(document.china_medical.gender.value == ""){
							alert ("请选择 性别");
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
							document.china_medical.submit();
						}
					}else if(opt == "close"){
						if(document.china_medical.caseYear.value == ""){
							alert ("请输入 接案日期 年份");
						}else if(document.china_medical.idno.value == ""){
							alert ("请输入 身份证号");
						}else if(document.china_medical.name.value == ""){
							alert ("请输入 个案姓名");
						}else if(document.china_medical.gender.value == ""){
							alert ("请选择 性别");
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
							document.china_medical.submit();
						}
					} else if(opt == "cancelAdd"){
							location.href='for-pla-add-china-search.php';
					}
				}
				
				//-->
		</script>
</head>

<body topmargin="2">
<form name="china_medical" enctype="multipart/form-data" method="post" action="for-pla-add-china-cgmh-save.php">
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
                        <option value="西安交通大学口腔医院">西安交通大学口腔医院</option>
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

                      <td width="252" style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="caseYear0" maxLength="4" size="5" name="caseYear"> 年   

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
                            </select> 月   

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
                            </select> 日</font></td>

                      <td width="106" style="border-style: solid; border-width: 1"><font size="3">&nbsp;NCF个案编号</font></td>

                      <td width="287" style="border-style: solid; border-width: 1">&nbsp;<? //echo $NCFNumX; ?></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1;"><span><font size="3">&nbsp;外科医师</font></span></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeryDrName1" maxLength="20" name="surgeryDrName" size="20">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;语言治疗师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="languageTherapist1" maxLength="20" name="languageTherapist" size="20">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;正畸科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="orthodontics" maxLength="20" name="orthodontics" size="20">&nbsp;</font></td>

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

					<td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="idno" maxLength="20" name="idno" size="20" value="">&nbsp; </font></td>
                  
                      <td style="border-style: solid; border-width: 1" width="113">

						<font size="3">&nbsp;病历</font>号<font size="3">码</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="MedicalRecordNumber" maxLength="20" name="MedicalRecordNumber" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*个案姓名</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="name" maxLength="20" name="name" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*性&nbsp;      

                        别</font></td>

                      <td style="border-style: solid; border-width: 1" width="251"><font size="3"><label><input id="gender_male2" type="radio" value="男" name="gender">男</label> 

                          <label><input id="gender_female2" type="radio" value="女" name="gender">女</label></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*出生日期</font></td>

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="birthYear2" maxLength="4" size="4" name="birthYear"> 年&nbsp;
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
                            </select> 日</font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;职&nbsp; 

						业</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="profession2" maxLength="20" name="profession" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;电&nbsp; 话</font></td>     

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="tel2" maxLength="20" name="tel" size="32"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;教育程度</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="education2" maxLength="20" name="education" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*住&nbsp;      

                        址</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">&nbsp;<input id="address2" maxLength="110" size="81" name="address"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;重要联系人</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="contactperson2" maxLength="20" name="contactperson" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;</font>与个案关系</td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="relationship2" maxLength="20" name="relationship" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3">&nbsp;连络电话</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">

						&nbsp;<input id="phone3" name="phone" size="32"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="766" colspan="4">

						<b><i><font size="4">医师诊断</font></i></b></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*身&nbsp; 高</font></td>      

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="height0" maxLength="3" size="4" name="height"> 

                        公分</font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*体&nbsp; 重</font></td>      

                      <td style="border-style: solid; border-width: 1" width="251"><font size="3">&nbsp;<input id="weight0" maxLength="3" size="4" name="weight"> 

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

                          <p><font size="3">&nbsp;<input id="diagnosis_unilateral_cleft_lip_2" type="checkbox" value="UCL" name="diagnosis_unilateral_cleft_lip_1">单侧唇裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip0" type="radio" value="C" name="diagnosis_unilateral_cleft_lip">完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_unilateral_cleft_lip">不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip2" type="radio" value="CK" name="diagnosis_unilateral_cleft_lip">隐裂 

							)</font></p>

                          <font size="3">

                          &nbsp;<input id="diagnosis_bilateral_cleft_lip_3" type="checkbox" value="BCL" name="diagnosis_bilateral_cleft_lip_2">双侧唇裂 

							(                                 

                          <input id="diagnosis_bilateral_cleft_lip0" type="radio" value="C" name="diagnosis_bilateral_cleft_lip">完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_bilateral_cleft_lip">不完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip2" type="radio" value="MCK" name="diagnosis_bilateral_cleft_lip">混合裂 

							)</font><p>&nbsp;<font size="3"><label for="checkbox9"><input id="CleftPalate0" type="checkbox" value="CP" name="CleftPalate"></label>颚裂  

                          ---   

                          <label for="checkbox11">

							<input id="incomplete4" type="radio" value="IC" name="incomplete_main"></label>不完全性 

							(  

                          <label for="checkbox11"><input id="incomplete0" type="radio" value="SCC" name="incomplete"></label>粘膜下裂  

                          <label for="checkbox12"><input id="incomplete1" type="radio" value="CU" name="incomplete"></label>悬雍垂裂  

                          <label for="checkbox13"><input id="incomplete2" type="radio" value="SP" name="incomplete"></label>软颚裂  

                          <input id="incomplete3" type="radio" value="BC" name="incomplete">双侧裂 

							)<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

							---  

                          <label for="checkbox11">

							<input id="incomplete5" type="radio" value="C" name="complete_main"></label> 

                          完全性 ( <input id="complete0" type="radio" value="U" name="complete">单侧 <input id="complete1" type="radio" value="B" name="complete">双侧 

							)</font></p>                                

                          <p><font size="3">&nbsp;<input id="beforeSurgery_21" type="checkbox" value="BoneGraft" name="BoneGraft_main">牙槽突裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip3" type="radio" value="C" name="BoneGraft_select">完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip4" type="radio" value="IC" name="BoneGraft_select">不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip5" type="radio" value="CK" name="BoneGraft_select">隐裂 

							)</font></p>                    

                          <p><font size="3">&nbsp;<input id="Combined_with_other_craniofacial_disorders0" type="checkbox" value="Other" name="Combined_with_other_craniofacial_disorders">合并其他颅颜病症

							： 

							<input id="Combined_with_other_craniofacial_disorders_text0" maxLength="30" size="50" name="Combined_with_other_craniofacial_disorders_text"></font></p>            

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*</font>个案<font size="3">之前是否接受过任何唇颚裂治疗？</font><p>

						&nbsp;<font size="3"><label><input id="Cleft_lip_and_palate_surgery0" type="radio" value="Y" name="Cleft_lip_and_palate_surgery">是</label></font></p>

                          <p><font size="3">&nbsp; <label>&nbsp;<input id="beforeSurgery_1" type="checkbox" value="1LNR" name="beforeSurgery_1">一期唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_12" type="checkbox" value="1BLANR" name="beforeSurgery_2">一期双侧唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_13" type="checkbox" value="1CPR" name="beforeSurgery_3">一期颚裂修复</label>                                 

                          <label><input id="beforeSurgery_14" type="checkbox" value="FHR" name="beforeSurgery_4">廔孔修复</label>                                 

                          <label><input id="beforeSurgery_15" type="checkbox" value="PF" name="beforeSurgery_5">咽瓣修复</label>                                 

                          <label><input id="beforeSurgery_16" type="checkbox" value="PBR" name="beforeSurgery_6">梨骨瓣修复</label></font></p>                                

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_17" type="checkbox" value="2CPR" name="beforeSurgery_7">二期颚裂(颚咽)修复                  

                          <input id="beforeSurgery_18" type="checkbox" value="LR" name="beforeSurgery_8">唇鼻整形                  

                          <input id="beforeSurgery_19" type="checkbox" value="AB" name="beforeSurgery_9">齿槽植骨                  

                          <input id="beforeSurgery_20" type="checkbox" value="PO" name="beforeSurgery_10">术前正畸                  

                          <input id="beforeSurgery_22" type="checkbox" value="SL" name="beforeSurgery_11">语言治疗</font></p>              

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_other0" type="checkbox" value="other" name="beforeSurgery_other">其他，请详述

							：                  

                          <input id="beforeSurgery_other_reason0" maxLength="60" size="60" name="beforeSurgery_other_reason"></font></p>              

                          <p><label><font size="3">&nbsp;<input id="Cleft_lip_and_palate_surgery1" type="radio" value="N" name="Cleft_lip_and_palate_surgery">否</font></label></p>

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

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5"><font size="3">&nbsp;共 <input id="familyMembers0" maxLength="3" size="4" name="familyMembers">     

                          人；同住 <input id="live_together0" maxLength="3" size="4" name="live_together">     

                          人</font></td>  

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3"> &nbsp;父亲年龄</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge2" maxLength="3" size="4" name="fatherAge"> 

                        岁</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;职业</font></td>

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main2" maxLength="20" name="fatherProfession_main" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3"> &nbsp;教育程度</font></td>

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession10" type="radio" value="大专以上" name="fatherProfession">大专以上</label><br>

                          <label>&nbsp;<input id="fatherProfession11" type="radio" value="中学" name="fatherProfession">中学(专)</label><br>

                          <label>&nbsp;<input id="fatherProfession12" type="radio" value="小学" name="fatherProfession">小

						学</label><br>

                          <label>&nbsp;<input id="fatherProfession13" type="radio" value="识字" name="fatherProfession">识字</label> 

                          <label>&nbsp;<input id="fatherProfession14" type="radio" value="不识字" name="fatherProfession">不识字</label></font></td>     

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3">&nbsp;母亲年龄</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge1" maxLength="3" size="4" name="motherAge"> 

                        岁</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;职业</font></td> 

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main1" maxLength="20" name="motherProfession_main" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3"> &nbsp;教育程度</font></td> 

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession5" type="radio" value="大专以上" name="motherProfession">大专以上</label><br>

                          <label>&nbsp;<input id="fatherProfession6" type="radio" value="中学" name="motherProfession">中

						学(专)</label><br>

                          <label>&nbsp;<input id="fatherProfession7" type="radio" value="小学" name="motherProfession">小

						学</label><br>

                          <label>&nbsp;<input id="fatherProfession8" type="radio" value="识字" name="motherProfession">识字</label> 

                          <label>&nbsp;<input id="fatherProfession9" type="radio" value="不识字" name="motherProfession">不识字</label></font></td>     

                    </tr>
						
                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;</font>个案<font size="3">家庭情况说明</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                        <p align="center"><font size="3">

						<textarea id="descriptionCaseFamily0" name="descriptionCaseFamily" rows="4" cols="70"></textarea></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;主要经济/</font>收入来源</td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="mainSourceofIncome1" maxLength="26" size="30" name="mainSourceofIncome"></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3"> &nbsp;平均年收入</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;     

                        <input id="income" maxLength="7" size="9" name="income">         

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

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;平均每月生活支出 <input id="extimatedExpenditures1" maxLength="7" size="9" name="extimatedExpenditures">            

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

                      <td style="border-style: solid; border-width: 1" width="611"><? echo $NCFMedicalNum."&nbsp;"; ?></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*住院时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="BIHosTimeYear0" maxLength="4" size="5" name="BIHosTimeYear"> 年   

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
                            </select> 月   

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
                            </select> 日</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">*开刀时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="surgeryTimeYear0" maxLength="4" size="5" name="surgeryTimeYear"> 年   

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
                            </select> 月   

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
                            </select> 日</font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*出院时间</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="LHosTimeYear0" maxLength="4" size="5" name="LHosTimeYear"> 年   

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
                            </select> 月   

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
                            </select>日</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉方法</font></td>

                      <td style="border-style: solid; border-width: 1"><label><font size="3">&nbsp;<input id="Anesthesia0" type="radio" value="GA" name="Anesthesia">全身麻醉   

                          <input id="Anesthesia1" type="radio" value="LA" name="Anesthesia">局部麻醉</font></label></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*外科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeon0" maxLength="20" name="surgeon" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="anesthesiologist0" maxLength="20" name="anesthesiologist" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;手术类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;<input id="surgeryType0" type="radio" value="M1LNR" name="surgeryType">一期单侧唇鼻修复    

                          <input id="surgeryType1" type="radio" value="M1BLANR" name="surgeryType">一期双侧唇鼻修复    

                          <input id="surgeryType2" type="radio" value="M1CPR" name="surgeryType">一期颚裂修复    

                          <input id="surgeryType3" type="radio" value="MFHR" name="surgeryType">廔孔修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType4" type="radio" value="M2CPR" name="surgeryType">二期颚裂(颚咽)修复                      

                          <input id="surgeryType5" type="radio" value="MLR" name="surgeryType">唇鼻整形                      

                          <input id="surgeryType6" type="radio" value="MAB" name="surgeryType">齿槽植骨                      

                          <input id="surgeryType7" type="radio" value="MPF" name="surgeryType">咽瓣修复                      

                          <input id="surgeryType8" type="radio" value="MPBR" name="surgeryType">梨骨瓣修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType9" type="radio" value="MOTH" name="surgeryType">其他：    

                          <input id="surgeryTypeOther_text0" maxLength="20" name="surgeryTypeOther_text" size="20"></font></p>

                        </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" rowspan="4"><font size="3">&nbsp;修补类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;单侧唇裂：</font></p>

							<p><font size="3"><label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip0" type="radio" value="Rotation-AdvancementVariant" name="repairTypeUnilateralcleftlip">Rotation-Advancement    

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip1" type="radio" value="TriangularVariant" name="repairTypeUnilateralcleftlip">Triangular                      

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip2" type="radio" value="Mohler" name="repairTypeUnilateralcleftlip">Mohler</label></font></p>                     

                          <p><font size="3"> <label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip3" type="radio" value="Others" name="repairTypeUnilateralcleftlip">Others：</label>  

                          <input id="repairTypeUnilateralcleftlip_text0" name="repairTypeUnilateralcleftlip_text" size="20"></font></p>                    

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;双侧唇裂：</font></p>

                          <p><font size="3">&nbsp;&nbsp; <input id="repairTypeBilateralcleftlip0" type="radio" value="StraightLine" name="repairTypeBilateralcleftlip">Straight                      

                          Line <input id="repairTypeBilateralcleftlip1" type="radio" value="ForkedFlap" name="repairTypeBilateralcleftlip">Forked                      

                          Flap <input id="repairTypeBilateralcleftlip2" type="radio" value="Others" name="repairTypeBilateralcleftlip">Others：                      

                          <input id="repairTypeBilateralcleftlip_text0" maxLength="20" name="repairTypeBilateralcleftlip_text" size="20"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;颚裂：</font></p>

                          <p><font size="3">&nbsp; &nbsp;<input id="repairTypeCleftpalate0" type="radio" value="LangenbeckVariant" name="repairTypeCleftpalate">Langenbeck                      

                          Variant <input id="repairTypeCleftpalate1" type="radio" value="PushbackVariant" name="repairTypeCleftpalate">Pushback                      

                          Variant <input id="repairTypeCleftpalate2" type="radio" value="Furlow" name="repairTypeCleftpalate">Furlow                      

                          <input id="repairTypeCleftpalate3" type="radio" value="PF" name="repairTypeCleftpalate">PF</font> 

                          <font size="3"><input id="repairTypeCleftpalate4" type="radio" value="FurlowPF" name="repairTypeCleftpalate">Furlow+PF</font></p>        

                          <p><font size="3">&nbsp;&nbsp;                     

                          <input id="repairTypeCleftpalate5" type="radio" value="Others" name="repairTypeCleftpalate">Others：                      

                          <input id="repairTypeCleftpalate_text0" maxLength="20" name="repairTypeCleftpalate_text" size="20"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;牙槽突裂：</font></p>

                        <p><font size="3">&nbsp; &nbsp;<input id="BoneGraft" type="radio" value="BoneGraft" name="BoneGraft">Bone         

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

                          &nbsp;手术前－拍照日： <input id="beforeSurgeryYear0" maxLength="4" size="5" name="beforeSurgeryYear"> 年      

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
                            </select> 月      

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
                            </select> 日</font><p align="center"><font size="3">

						<img height="280" alt="Pedigree" src="user-pic.jpg" width="316" border="0"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics1"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">         

                          &nbsp;手术后－拍照日： <input id="afterSurgeryYear0" maxLength="4" size="5" name="afterSurgeryYear"> 年      

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
                            </select> 月      

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
                            </select>日</font><p align="center"><font size="3">

						<img height="280" alt="Pedigree" src="user-pic.jpg" width="316" border="0"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics2"></font></td>

                      </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;社会资源使用情形</font></td>    

                      <td style="border-style: solid; border-width: 1">

                          <p><font size="3">&nbsp;<input id="usageofSocialResources0" type="radio" value="Y" name="usageofSocialResources">有</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 医疗补助：                   

                          <input id="smileTrain0" type="checkbox" maxLength="20" value="1" name="smileTrain">微笑列车，项目                   

                          <input id="MSitem0" name="MSitem" size="20"> <input id="MSOther0" type="checkbox" value="1" name="MSOther">其他：                   

                          <input id="MSOther_text0" maxLength="20" name="MSOther_text" size="19"></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 生活补助： 单位

							－ <input id="LAunit0" name="LAunit" size="20"> 项目

							－                   

                          <input id="LAitem0" maxLength="20" name="LAitem" size="20"></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 其他补助： 单位

							－ <input id="OAunit0" maxLength="20" name="OAunit" size="20"> 项目

							－                   

                          <input id="OAitem0" maxLength="20" name="OAitem" size="20"></font></p>

							<p><font size="3">&nbsp;<input id="usageofSocialResources1" type="radio" value="N" name="usageofSocialResources"></font>无</p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;住家离医院距离</font></td>    

                      <td style="border-style: solid; border-width: 1"><font size="3"><label>&nbsp;<input id="h2hdistance3" type="radio" value="100" name="h2hdistance">少于100公里</label> <label><input id="h2hdistance4" type="radio" value="100-200" name="h2hdistance">100-200公里</label> <label><input id="h2hdistance5" type="radio" value="200" name="h2hdistance">大于200公里</label></font></td>

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

                          <p><font size="3">&nbsp;<input id="subsidiesforMedicalExpenses0" type="checkbox" value="1" name="subsidiesforMedicalExpenses"><strong>医疗费补助：</strong></font></p>

							<p><font size="3">&nbsp;&nbsp; 医疗费用总计：人民币 <input id="TotalSFME0" maxLength="6" size="6" name="TotalSFME"> 元</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 1.申请NCF补助：人民币

							<input id="NCFAllowance0" maxLength="6" size="3" name="NCFAllowance"> 元，占医疗费用总金额                   

                          <input id="NCFProportion0" maxLength="3" size="2" name="NCFProportion"> ％</font></p>

							<p>&nbsp;<font size="3">&nbsp;&nbsp;&nbsp; 2.案家自付：人民币

							<input id="PatientPay0" maxLength="6" size="3" name="PatientPay"> 元，占医疗费用总金额                   

                          <input id="textfield19" maxLength="3" size="2" name="PatientProportion"> ％</font></p>

                      </td>

                      <td style="border-style: solid; border-width: 1">

                          <p><strong><font size="3">&nbsp;<input id="transportationSubsidies4" type="checkbox" value="1" name="transportationSubsidies">交通费补助：</font></strong></p>

							<p><font size="3">&nbsp;&nbsp; 1.申请NCF补助：人民币

							<input id="NCFSOT0" maxLength="6" size="3" name="NCFSOT"> 元</font></p>

							<p><font size="3">&nbsp;&nbsp; 2.案家自付：人民币

							<input id="PatientSOT0" maxLength="6" size="3" name="PatientSOT"> 元</font></p>          

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" height="38">

                        <p align="center"><strong><font size="4">申请NCF补助费用总金额为：人民币<font size="3"> <input id="NCFTotalSubsidies0" maxLength="6" size="6" name="NCFTotalSubsidies"> </font>元</font></strong></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3">( 上传其他资料 )<br>

                        <img height="1050" alt="Pedigree" src="user-pic.jpg" width="760" border="0"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics_other"></font></td>

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
                        	<input id="save0" onClick="return saveData('save')" type="button" value="储存" name="save">
                           	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="close0" onClick="return saveData('cancelAdd')" type="button" value="取消" name="close">
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