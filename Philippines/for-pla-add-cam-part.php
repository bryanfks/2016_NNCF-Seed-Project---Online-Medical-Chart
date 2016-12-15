<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_record_num = $_SESSION["record_num"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$pat_id_1 = $_GET["patid"];
		$pat_id_2 =$_SESSION["patient_id"];
		
		$record_nums = $_GET["record_num"];
		
		if($_GET["patid"] != "" ){
			$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_GET["patid"]."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
		} else if($_SESSION["patient_id"] != ""){
			 $sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_SESSION["patient_id"]."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
		}else if(($record_nums != "") || ($record_nums != "undefined")) {
			$sel_Patientdata =  "SELECT * FROM `patientmr` WHERE record_num=\"".$record_nums."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
		} else {
			$sel_Patientdata =  "SELECT * FROM `patientmr` WHERE record_num=\"".$patient_record_num."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["patname"];
		}
		
		$sel_Memberdata = "SELECT * FROM `member` WHERE id=\"".$seid."\" AND pwd=\"".$sepwd."\"";
		$query_Memberdata = mysql_query($sel_Memberdata);
		$res_Memberdata = mysql_fetch_array($query_Memberdata);
		$editor = $res_Memberdata["specialty"];
		
		if($record_nums){
			// 置入 Record Number 並分割存入陣列，然後於 SQL 用 AND 來搜尋資料
			$patientid_num = substr($record_nums, 0, 8);
			$branch_num = substr($record_nums, 8, 1);
			$serialcode_num = substr($record_nums, 9, 2);
			
			$sel_PatientRecord = "SELECT * FROM `patientmr` WHERE patientid='".$patientid_num."' AND branch='".$branch_num."' AND serialcode='".$serialcode_num."'";
			$query_PatientRecord = mysql_query($sel_PatientRecord);
			$res_PatientRecord = mysql_fetch_array($query_PatientRecord);
			$patient_Fullname = $res_PatientRecord["patname"];
		}
		
		
		if(!empty($pat_id)){
			$patient_id = $pat_id;
		} else {
			$patient_id = $res_PatientRecord["patientid"];
		}
		
		$branch = $_GET["branch"];  //病患病例號碼的科別
		if(!empty($branch)) {
			$sel_serialcode = "SELECT MAX(serialcode) FROM patientmr WHERE patientid ='".$patient_id."'";
			$query_serialcode = mysql_query($sel_serialcode);
			$result_serialcode = mysql_fetch_array($query_serialcode);
			$serialcode_result = $result_serialcode['MAX(serialcode)'];				// flownum: patient's ID flow number by Nationality.
			
			if(empty($serialcode_result)){
				$serialcode = "1";
			}else{
				$serialcode = $serialcode_result + 1;
			}
			$medicalrecord = $branch.$serialcode;
		} else {
			$branch = $res_PatientRecord["branch"];
			$serialcode = $res_PatientRecord["serialcode"];
		}
		
		/* 新增：
				1. 備註資料是否允許下次在編輯：editState
				2. 是否躍提供病患補助金：foundationSupport
		
				"Additional comments on intervention", "Questions", "Additional comments on assessment"
				上列三項目為防止資料內容中有Enter的斷行，故需要用Javascript做轉換的動作
				將 Enter 轉換成 "#"
		*/
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<script language="javascript">
	<!--
		function previewData(){
			document.ppls_form.record_num.value = "<?PHP echo $res_PatientRecord["record_num"]; ?>";
			document.ppls_form.height.value = "<?PHP echo $res_PatientRecord["height"]; ?>";
			document.ppls_form.weight.value = "<?PHP echo $res_PatientRecord["weight"]; ?>";
			
			SurgeryData = "<?PHP echo $res_PatientRecord["surgery_state"]; ?>";
			if(SurgeryData == "yes"){
				document.getElementById('select_Surgery').style.visibility = "visible";
			}
			
			document.ppls_form.hospitals.value = "<?PHP echo $res_PatientRecord["hospitals"]; ?>";
			document.ppls_form.craniofacial.value = "<?PHP echo $res_PatientRecord["craniofacial"]; ?>";
			
			document.ppls_form.add_day.value = "<?PHP echo $res_PatientRecord["add_day"]; ?>";
			document.ppls_form.add_month.value = "<?PHP echo $res_PatientRecord["add_month"]; ?>";
			document.ppls_form.add_year.value = "<?PHP echo $res_PatientRecord["add_year"]; ?>";
			
			document.ppls_form.sur_day.value = "<?PHP echo $res_PatientRecord["sur_day"]; ?>";
			document.ppls_form.sur_month.value = "<?PHP echo $res_PatientRecord["sur_month"]; ?>";
			document.ppls_form.sur_year.value = "<?PHP echo $res_PatientRecord["sur_year"]; ?>";
			
			document.ppls_form.dis_day.value = "<?PHP echo $res_PatientRecord["dis_day"]; ?>";
			document.ppls_form.dis_month.value = "<?PHP echo $res_PatientRecord["dis_month"]; ?>";
			document.ppls_form.dis_year.value = "<?PHP echo $res_PatientRecord["dis_year"]; ?>";
			
			document.ppls_form.sur_typeoth.value = "<?PHP echo $res_PatientRecord["sur_typeoth"]; ?>";
			document.ppls_form.sur_cmd.value = "<?PHP echo $res_PatientRecord["sur_cmd"]; ?>";
			
			document.ppls_form.op_resultcmd.value = "<?PHP echo $res_PatientRecord["op_resultcmd"]; ?>";
			document.ppls_form.questions.value = "<?PHP echo $res_PatientRecord["questions"]; ?>";
			document.ppls_form.sign.value = "<?PHP echo $res_PatientRecord["sign"]; ?>";
			
			document.ppls_form.family_member.value = "<?PHP echo $res_PatientRecord["family_member"]; ?>";
			document.ppls_form.family_income.value = "<?PHP echo $res_PatientRecord["family_income"]; ?>";
			document.ppls_form.comments.value = "<?PHP echo $res_PatientRecord["comments"]; ?>";
			
			document.ppls_form.tra_allowper.value = "<?PHP echo $res_PatientRecord["tra_allowper"]; ?>";
			document.ppls_form.tol_amount.value = "<?PHP echo $res_PatientRecord["tol_amount"]; ?>";
			document.ppls_form.ncf_surallow.value = "<?PHP echo $res_PatientRecord["ncf_surallow"]; ?>";
			document.ppls_form.liv_allowday.value = "<?PHP echo $res_PatientRecord["liv_allowday"]; ?>";
			document.ppls_form.tra_allowdist.value = "<?PHP echo $res_PatientRecord["tra_allowdist"]; ?>";
			
			if(document.ppls_form.hospital.value != "OTHER"){		//判斷 --  Name of the hospital -- 一開始載入頁面後即判斷 OTHER 值是否被選取
				document.ppls_form.hospitals.disabled = true;
			} else {
				document.ppls_form.hospitals.disabled = false;
			}
			
			if(document.ppls_form.sur_type.value != "OTHER"){			//判斷 -- Type of the operation -- 一開始載入頁面後即判斷 OTHER 值是否被選取
				document.ppls_form.sur_typeoth.disabled = true;
			} else {
				document.ppls_form.sur_typeoth.disabled = false;
			}
			
			data_Condition = "<?PHP echo $res_PatientRecord["condition"]; ?>";
			if(data_Condition == "1"){									// 判斷load 的資料是否屬於可編輯的
				document.ppls_form.condition.value = "2";		// 2: 表示第二次以上，可編輯的資料
			} else {
				document.ppls_form.condition.value = "";
			}
			livAllow = "<?PHP echo $res_PatientRecord["liv_allow"]; ?>";
			traAllow = "<?PHP echo $res_PatientRecord["tra_allow"]; ?>";
			surAllow = "<?PHP echo $res_PatientRecord["sur_allow"]; ?>";
			if((livAllow == "ON") || (traAllow == "ON") || (surAllow == "ON")){
				document.getElementById('financialSupport').style.visibility = "visible";
			}
			document.ppls_form.op_results.value = "<?PHP echo $res_PatientRecord["op_results"]; ?>";
			document.ppls_form.suggestions.value = "<?PHP echo $res_PatientRecord["suggestions"]; ?>";
		}
		
		function saveData(opt){
			if(opt == "save"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allows.value = "ON";
				}  else {
					document.ppls_form.sur_allows.value = "";
				}
				document.ppls_form.condition.value = "1";
				document.ppls_form.chkcode.value = "pe";
				document.ppls_form.action = "for-pla-sav-cam-part.php";
				document.ppls_form.submit();
				return true;
			}else if(opt == "submit"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allow.value = "ON";
					document.ppls_form.sur_allows.value = "ON";
				}  else {
					document.ppls_form.sur_allow.value = "";
					document.ppls_form.sur_allows.value = "";
				}
				document.ppls_form.condition.value = "2";
				document.ppls_form.chkcode.value = "p";
				document.ppls_form.action = "for-pla-sub-cam-part.php";
				document.ppls_form.submit();
				return true;
			}
		}
		function calcSum(){
			var allow, living, traveling1, traveling2, n, surAllow, calc;
			
			if(document.ppls_form.liv_allow.checked){
				allow = eval(document.ppls_form.liv_allowday.value);
				livings = eval(allow) * 2;
				if((eval(livings) != 0) || (livings != "NaN")){
					living = eval(livings);
				}else {
					living = 0;
				}
			}else {
				living = 0;
			}
			
			if(document.ppls_form.tra_allow.checked){
				travelings =  document.ppls_form.tra_allowper.value;
				if(travelings == ""){
					traveling1 = 0;
				} else {
					traveling1 = eval(travelings);
				}	
				traveling2 =  eval(document.ppls_form.tra_allowdist.value);
				num = traveling1 * traveling2;
				if((num != 0) || (num != "NaN")){
					n = eval(num);
				}else {
					n = 0;
				}
			}else {
				n = 0;
			}
			
			if(document.ppls_form.sur_allow.checked){
				surAllow = 20;
			}else {
				surAllow = 0;
			}
			calc = eval(living) + eval(n) + eval(surAllow);
			document.ppls_form.tol_amount.value = calc;
		}
		function calcSumNCF2(){
			var allow, living, traveling1, traveling2, n, surAllow, calc;
			
			if(document.ppls_form.ncf_livallow.checked){
				allow = eval(document.ppls_form.ncf_livallowday.value);
				livings = eval(allow) * 2;
				if((eval(livings) != 0) || (livings != "NaN")){
					living = eval(livings);
				}else {
					living = 0;
				}
			}else {
				living = 0;
			}
			
			if(document.ppls_form.ncf_traallow.checked){
				travelings =  document.ppls_form.ncf_traallowper.value;
				if(travelings == ""){
					traveling1 = 0;
				} else {
					traveling1 = eval(travelings);
				}	
				traveling2 =  eval(document.ppls_form.ncf_traallowdist.value);
				num = traveling1 * traveling2;
				if((num != 0) || (num != "NaN")){
					n = eval(num);
				}else {
					n = 0;
				}
			}else {
				n = 0;
			}
			
			if(document.ppls_form.ncf_surallow.checked){
				surAllow = 20;
			}else {
				surAllow = 0;
			}
			calc = eval(living) + eval(n) + eval(surAllow);
			document.ppls_form.ncf_tolamont.value = calc;
		}
		function input_Hospital(){
			if(document.ppls_form.hospital.value != "OTHER"){
				document.ppls_form.hospitals.disabled = true;
			} else {
				document.ppls_form.hospitals.disabled = false;
			}
		}
		function input_surType(){
			if(document.ppls_form.sur_type.value != "OTHER"){
				document.ppls_form.sur_typeoth.disabled = true;
			} else {
				document.ppls_form.sur_typeoth.disabled = false;
			}
		}
		function showSurgery(){
			document.getElementById('select_Surgery').style.visibility = "visible";
		}
		function hiddenSurgery(){
			document.getElementById('select_Surgery').style.visibility = "hidden";
		}
		function inputCraniofacial(values){
			if(values != "yes"){
				document.ppls_form.craniofacial.disabled = true;
			} else {
				document.ppls_form.craniofacial.disabled = false;
			}
		}
		function showDiv(){
			document.getElementById('financialSupport').style.visibility = "visible";
			document.ppls_form.finacialState.value = "1";
			//alert(document.ppls_form.finacialState.value);
		}
		function hiddenDiv(){
			document.getElementById('financialSupport').style.visibility = "hidden";
			document.ppls_form.finacialState.value = "0";
			//alert(document.ppls_form.finacialState.value);
			document.ppls_form.family_member.value = "";
			document.ppls_form.family_income.value = "";
			document.ppls_form.comments.value = "";
			document.ppls_form.liv_allow.checked = false;
			document.ppls_form.liv_allowday.value = "0";
			document.ppls_form.tra_allow.checked = false;
			document.ppls_form.tra_allowper.value = "";
			document.ppls_form.tra_allowdist.value = "0";
			document.ppls_form.sur_allow.checked = false;
			document.ppls_form.tol_amount.value = "";
			
			document.ppls_form.ncf_livallow.checked = false;
			document.ppls_form.ncf_livallowday.value = "0";
			document.ppls_form.ncf_traallow.checked = false;
			document.ppls_form.ncf_traallowper.value = "";
			document.ppls_form.ncf_traallowdist.value = "";
			document.ppls_form.ncf_surallow.checked = false;
		}
		
		function checkPartner2(){
			patient_id = document.ppls_form.partner_value.value;
			location.href = "rec-pat-inf.php?id="+patient_id;
		}
	//-->
</script>
</head>

<body topmargin="2" onLoad="previewData()">
<form name="ppls_form" enctype="multipart/form-data" method="post" action="">
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
                <? if($res_Memberdata['authority']  == 'p'){ ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"><img border="0" src="images/label-22.gif" width="160" height="40"></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
					  <?  } elseif ($res_Memberdata['authority']  == 'c') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"></td>
                              <td width="20%"><img border="0" src="images/label-23.gif" width="160" height="40"></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                        <?  } elseif ($res_Memberdata['authority']  == 'n' || 'a') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="21%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="19%"></td>
                              <td width="21%"></td>
                              <td width="21%"><img border="0" src="images/label-24.gif" width="160" height="40"></td>
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
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>
                      Record of Plastic &amp; Reconstructive Surgery</b></i></font></td>       
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left" dir="rtl">&nbsp;</td>
          </tr>
          <tr>
            <td width="103%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" height="4" align="right" valign="top">
               <?PHP 
			   		echo "Record Number: ".$record_nums;
			   ?>

              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
              
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <b>Patient Medical Record</b></td>     
                  </tr>
                  <tr>
                    <td align="center" height="19" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              General Information</span></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
              &nbsp;<font color="#666666">Name of the patient：<?PHP echo $patient_Fullname; ?></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Name of the hospital： 
              		<select size="1" name="hospital" onChange="input_Hospital()">   
                    	<OPTION value="" <? if($res_PatientRecord["hospital"] == "") { echo "SELECTED"; }?>>Please select...</OPTION> 
                        <OPTION value="National Pediatric Hospital" <? if($res_PatientRecord["hospital"] == "National Pediatric Hospital"){ echo "SELECTED"; }?>>National Pediatric Hospital</OPTION>
                        <OPTION value="Affiliated Stomatological Hospital of Nanjing Medical University" <? if($res_PatientRecord["hospital"] == "Affiliated Stomatological Hospital of Nanjing Medical University"){ echo "SELECTED"; }?>>Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
                        <OPTION value="People`s Hospital of Hulunbeier,Southern Mongolian" <? if($res_PatientRecord["hospital"] == "People`s Hospital of Hulunbeier,Southern Mongolian"){ echo "SELECTED"; }?>>People`s Hospital of Hulunbeier,Southern Mongolian</OPTION>
                        <OPTION value="Shenzhen Second Hospital" <? if($res_PatientRecord["hospital"] == "Shenzhen Second Hospital"){ echo "SELECTED"; }?>>Shenzhen Second Hospital</OPTION>
                        <OPTION value="The Affiliated Hospital of Medical College,Qingdao University" <? if($res_PatientRecord["hospital"] == "The Affiliated Hospital of Medical College,Qingdao University"){ echo "SELECTED"; }?>>The Affiliated Hospital of Medical College,Qingdao University</OPTION>
                        <OPTION value="The 2nd Affiliated Hospital of Shantou University Medical College" <? if($res_PatientRecord["hospital"] == "The 2nd Affiliated Hospital of Shantou University Medical College"){ echo "SELECTED"; }?>>The 2nd Affiliated Hospital of Shantou University Medical College</OPTION>
                        <OPTION value="The First Hospital of Shanxi Medical University" <? if($res_PatientRecord["hospital"] == "The First Hospital of Shanxi Medical University"){ echo "SELECTED"; }?>>The First Hospital of Shanxi Medical University</OPTION>
                        <OPTION value="West China College of Stomatology Sichuan University" <? if($res_PatientRecord["hospital"] == "West China College of Stomatology Sichuan University"){ echo "SELECTED"; }?>>West China College of Stomatology Sichuan University</OPTION>
                        <OPTION value="Cipto Mangunkusumo Hospital" <? if($res_PatientRecord["hospital"] == "Cipto Mangunkusumo Hospital"){ echo "SELECTED"; }?>>Cipto Mangunkusumo Hospital</OPTION>
                        <OPTION value="Our Lady of Peace Hospital" <? if($res_PatientRecord["hospital"] == "Our Lady of Peace Hospital"){ echo "SELECTED"; }?>>Our Lady of Peace Hospital</OPTION>
                        <OPTION value="St. Elizabeth Hospital" <? if($res_PatientRecord["hospital"] == "St. Elizabeth Hospital"){ echo "SELECTED"; }?>>St. Elizabeth Hospital</OPTION>
                        <OPTION value="Ho Chi Minh Health Department Odorto Mazillo Hospital" <? if($res_PatientRecord["hospital"] == "Ho Chi Minh Health Department Odorto Mazillo Hospital"){ echo "SELECTED"; }?>>Ho Chi Minh Health Department Odorto Mazillo Hospital</OPTION>
                        <OPTION value="OTHER" <?PHP if($res_PatientRecord["hospital"] == "OTHER"){ echo "SELECTED"; }?>>Other</OPTION>
                    </select> <input type="text" name="hospitals" size="20" value="" disabled></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Patient&#39;s&#39; record    
                              number： <input type="text" name="record_num" size="20" value="">  
                              </font>                              </p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</p></td>  
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Diagnosis</span></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Height： <input type="text" name="height" size="20" value=""> (cm)　　　Weight： <input type="text" name="weight" size="20" value=""> (kg)</font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Did the patient have any lip/palate   
              surgery before this evaluation?</font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;　
                                  <input type="radio" value="yes" name="surgery_state" onClick="showSurgery()" <?PHP if($res_PatientRecord["surgery_state"] == "yes"){ echo "CHECKED"; }?> >Yes, he/she had</font></p>  
              <div id="select_Surgery" class="select_Surgery" style="visibility: hidden">
              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　　　<input type="radio" value="Cleft lip surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip surgery"){ echo "CHECKED"; }?>>Cleft   
              lip surgery　<input type="radio" value="Cleft palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft palate surgery"){ echo "CHECKED"; }?>>Cleft palate surgery　<input type="radio" value="Cleft lip-Palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip-Palate surgery"){ echo "CHECKED"; }?>>Cleft lip/ Palate surgery</font></p></div>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="no" name="surgery_state" onClick="hiddenSurgery()" <?PHP if($res_PatientRecord["surgery_state"] == "no"){ echo "CHECKED"; }?>>No.&nbsp;</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Diagnosis：</font></p>
                              <table border="0" cellspacing="1" width="90%">
                                <tr>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666">Lip</font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666">Alveolus</font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666">Hard Palate</font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666">Soft Palate</font></td>
                                </tr>
                                <tr>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="lip">
                          <option value="" <?PHP if($res_PatientRecord["lip"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Left not cleft" <?PHP if($res_PatientRecord["lip"] == "Left not cleft"){ echo "SELECTED"; }?>>Left not cleft</option>
                          <option value="Right not cleft" <?PHP if($res_PatientRecord["lip"] == "Right not cleft"){ echo "SELECTED"; }?>>Right not cleft</option>
                          <option value="Left complete" <?PHP if($res_PatientRecord["lip"] == "Left complete"){ echo "SELECTED"; }?>>Left complete</option>
                          <option value="Right complete" <?PHP if($res_PatientRecord["lip"] == "Right complete"){ echo "SELECTED"; }?>>Right complete</option>
                          <option value="Left incomplete" <?PHP if($res_PatientRecord["lip"] == "Left incomplete"){ echo "SELECTED"; }?>>Left incomplete</option>
                          <option value="Right incomplete" <?PHP if($res_PatientRecord["lip"] == "Right incomplete"){ echo "SELECTED"; }?>>Right incomplete</option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666">
                                  	<select size="1" name="alveolus">
                          <option value="" <?PHP if($res_PatientRecord["alveolus"]== ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Left not cleft" <?PHP if($res_PatientRecord["alveolus"] == "Left not cleft"){ echo "SELECTED"; }?>>Left not cleft</option>
                          <option value="Right not cleft" <?PHP if($res_PatientRecord["alveolus"] == "Right not cleft"){ echo "SELECTED"; }?>>Right not cleft</option>
                          <option value="Left complete" <?PHP if($res_PatientRecord["alveolus"] == "Left complete"){ echo "SELECTED"; }?>>Left complete</option>
                          <option value="Right complete" <?PHP if($res_PatientRecord["alveolus"] == "Right complete"){ echo "SELECTED"; }?>>Right complete</option>
                          <option value="Left incomplete" <?PHP if($res_PatientRecord["alveolus"] == "Left incomplete"){ echo "SELECTED"; }?>>Left incomplete</option>
                          <option value="Right incomplete" <?PHP if($res_PatientRecord["alveolus"] == "Right incomplete"){ echo "SELECTED"; }?>>Right incomplete</option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="hardpalate">
                          <option value="" <?PHP if($res_PatientRecord["hardpalate"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Left not cleft" <?PHP if($res_PatientRecord["hardpalate"] == "Left not cleft"){ echo "SELECTED"; }?>>Left not cleft</option>
                          <option value="Right not cleft" <?PHP if($res_PatientRecord["hardpalate"] == "Right not cleft"){ echo "SELECTED"; }?>>Right not cleft</option>
                          <option value="Left complete" <?PHP if($res_PatientRecord["hardpalate"] == "Left complete"){ echo "SELECTED"; }?>>Left complete</option>
                          <option value="Right complete" <?PHP if($res_PatientRecord["hardpalate"] == "Right complete"){ echo "SELECTED"; }?>>Right complete</option>
                          <option value="Left incomplete" <?PHP if($res_PatientRecord["hardpalate"] == "Left incomplete"){ echo "SELECTED"; }?>>Left incomplete</option>
                          <option value="Right incomplete" <?PHP if($res_PatientRecord["hardpalate"] == "Right incomplete"){ echo "SELECTED"; }?>>Right incomplete</option>
                          <option value="Left Submucous" <?PHP if($res_PatientRecord["hardpalate"] == "Left Submucous"){ echo "SELECTED"; }?>>Left Submucous</option>
                          <option value="Right Submucous" <?PHP if($res_PatientRecord["hardpalate"] == "Right Submucous"){ echo "SELECTED"; }?>>Right Submucous                          </option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="softpalate">
                          <option value="" <?PHP if($res_PatientRecord["softpalate"]  == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Not cleft" <?PHP if($res_PatientRecord["softpalate"] == "Not cleft"){ echo "SELECTED"; }?>>Not cleft</option>
                          <option value="Complete cleft" <?PHP if($res_PatientRecord["softpalate"] == "Complete cleft"){ echo "SELECTED"; }?>>Complete cleft</option>
                          <option value="Incomplete cleft" <?PHP if($res_PatientRecord["softpalate"] == "Incomplete cleft"){ echo "SELECTED"; }?>>Incomplete cleft</option>
                          <option value="Submucous" <?PHP if($res_PatientRecord["softpalate"] == "Submucous"){ echo "SELECTED"; }?>>Submucous</option>
                        </select></font></td>
                                </tr>
                              </table>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Does the patient have    
                              any other craniofacial deformities?</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;<input type="radio" value="yes" name="craniofacial_state" onClick="inputCraniofacial('yes')" <?PHP if($res_PatientRecord["craniofacial_state"] == "yes"){ echo "CHECKED"; }?>>Yes <input type="text" name="craniofacial" size="20" value="">　<input type="radio" value="no" name="craniofacial_state" onClick="inputCraniofacial('no')" <?PHP if($res_PatientRecord["craniofacial_state"] == "no"){ echo "CHECKED"; }?>>No　<input type="radio" value="dontknow" name="craniofacial_state" onClick="inputCraniofacial('no')" <?PHP if($res_PatientRecord["craniofacial_state"] == "dontknow"){ echo "CHECKED"; }?>>Don&#39;t    
                              Know</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Surgical Treatment</span></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of admission： <input type="text" name="add_day" size="2" maxLength="2" value="">    
                              / <input type="text" name="add_month" size="2" maxlength="2" value=""> / <input type="text" name="add_year" size="4" maxlength="4" value="">    
                              (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of surgery   
                              treatment： <input type="text" name="sur_day" size="2" maxlength="2" value="">    
                              / <input type="text" name="sur_month" size="2" maxlength="2" value=""> / <input type="text" name="sur_year" size="4" maxlength="4" value="">    
                              (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of discharge： <input type="text" name="dis_day" size="2" maxlength="2" value="">    
                              / <input type="text" name="dis_month" size="2" maxlength="2" value=""> / <input type="text" name="dis_year" size="4" maxlength="4" value="">    
                              (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">Type of the operation： <select size="1" name="sur_type" onChange="input_surType()">  
                          <option value="" <?PHP if($res_PatientRecord["sur_type"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Primary Lip/Nose Unilateral Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Lip/Nose Unilateral Repair"){ echo "SELECTED"; }?>>Primary 
                          Lip/Nose Unilateral Repair</option>
                          <option value="Primary Lip/Nose Bilateral Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Lip/Nose Bilateral Repair"){ echo "SELECTED"; }?>>Primary 
                          Lip/Nose Bilateral Repair</option>
                          <option value="Primary Cleft Palate Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Cleft Palate Repair"){ echo "SELECTED"; }?>>Primary 
                          Cleft Palate Repair</option>
                          <option value="Secondary Cleft Palate Repair" <?PHP if($res_PatientRecord["sur_type"] == "Secondary Cleft Palate Repair"){ echo "SELECTED"; }?>>Secondary 
                          Cleft Palate Repair                          </option>
                          <option value="Lip/Nose Revision" <?PHP if($res_PatientRecord["sur_type"] == "Lip/Nose Revision"){ echo "SELECTED"; }?>>Lip/Nose Revision                          </option>
                          <option value="OTHER" <?PHP if($res_PatientRecord["sur_type"] == "OTHER"){ echo "SELECTED"; }?>>Other</option>
                        </select> <input type="text" name="sur_typeoth" size="20" value="" disabled></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on    
                              intervention： </font>                              </p>
                              <p align="center" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">
                              <textarea rows="7" name="sur_cmd" cols="59"  value=""></textarea></font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<b>Patient Results：</b></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;&nbsp; Pre-operative Photo--</font></p>   
                              <div align="center">
                                <center>
                                <table border="1" cellspacing="1" width="100%">
                                  <tr>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair (Frontal)</font> 
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="photo0" size="25" value=""></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Palate Repair   
                                    (Intra-oral)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_intraoral'])){ echo $res_PatientRecord['prephoto_intraoral']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="photo1" size="25"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                  </tr>
                                </table>
                                </center>
                              </div>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;&nbsp; Post-operative Photo--</font></p>   
                              <div align="center">
                                <center>
                                <table border="1" cellspacing="1" width="100%">
                                  <tr>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair   
                                    (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal1'])){ echo $res_PatientRecord['posphoto_frontal1']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="photo2" size="25"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair   
                                    (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal2'])){ echo $res_PatientRecord['posphoto_frontal2']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="photo3" size="25"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                  </tr>
                                </table>
                                </center>
                              </div>
                              <div align="center">
                                <center>
                                <table border="1" cellspacing="1" width="300">
                                  <tr>
                                    <td width="310">
                                    <p align="center"><font color="#666666">
                                    Frontal Smiling</font></p> 
                                    <p align="center">
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal3'])){ echo $res_PatientRecord['posphoto_frontal3']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                     <p style="margin-left: 10; margin-right: 10" align="center">
                                      <input type="file" name="photo4" size="25"></p>
                                    <p align="center"><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                  </tr>
                                </table>
                                </center>
                              </div>
                              <p align="center" style="margin-left: 10; margin-right: 10">&nbsp;                      </p>                              </td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <span style="background-color: #CCCCCC">Self Estimate of   
                      the Result</span></p>  
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;This operation result is：</font></p>   
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;　<input type="radio" value="excellent" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "excellent"){ echo "CHECKED"; }?>>Excellent　　<input type="radio" value="good" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "good"){ echo "CHECKED"; }?>>Good　　<input type="radio" value="average" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "average"){ echo "CHECKED"; }?>>Average　　<input type="radio" value="poor" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "poor"){ echo "CHECKED"; }?>>Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;&nbsp;&nbsp;&nbsp; With   
                    complications   
                    <input type="text" name="op_resultcmd" size="30" value=""></font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Questions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <textarea rows="3" name="questions" cols="59"  value=""></textarea></p>
                    <p align="left" style="margin-left: 10; margin-right: 10"><font color="#666666">&nbsp;Name of the Surgeon ：</font><input type="text" name="sign" id="sign" value=""></p>
                              <p>&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="center">Apply for NCF&#39;s financial   
                              assistance?　<input type="button" value="YES" name="visible" onClick="showDiv()">　<input type="button" value="NO" name="hidden" onClick="hiddenDiv()"></td>  
                  </tr>
                  <tr on>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <div align="left" id="financialSupport" class="pplsFinacial" style="visibility: hidden">
                              <span style="background-color: #CCCCCC; ">
                              Financial Assessment &amp; Assistance</span></p>   
    
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                    <td width="100%">
                                    <p align="left" style="margin-left: 10; margin-right: 10"><font color="#666666">&nbsp;Number of family    
                              members： <input type="text" name="family_member" size="5" value=""></font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Total family income    
                              per month( USD )： <input type="text" name="family_income" size="5" value=""></font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on assessment：</font></p>  
                              <p style="margin-left: 10; margin-right: 10" align="center">
                      <font color="#666666">
                              <textarea rows="7" name="comments" cols="59"  value=""></textarea></font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<b>Financial Assistance：</b></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="liv_allow" value="ON" <?PHP if($res_PatientRecord["liv_allow"] == "ON"){ echo "CHECKED"; } else { echo "";} ?>>
                      A.   
                      Living allowance： <input type="text" name="liv_allowday" size="3" width="3" maxlength="1" value=""> day(s) * 2 USD per day</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="tra_allow" value="ON" <?PHP if($res_PatientRecord["tra_allow"] == "ON"){ echo "CHECKED"; } else { echo "";} ?>>B.   
                      Travel allowance<font size="2">： </font> <input type="text" name="tra_allowper" size="5" width="2" value=""><font size="2"> person *  
                      </font> <input type="text" name="tra_allowdist" size="5" width="4" value=""><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="sur_allow" value="ON" <?PHP if($res_PatientRecord["sur_allow"] == "ON"){ echo "CHECKED"; }  else{ echo ""; } ?>>C.   
                      Surgery allowance： 20 USD per patient</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="button" name="counts" onClick="return calcSum()" value="Count"> 
                      Total amount： <input type="text" name="tol_amount" size="15" value="">    
                      USD</font></p>                                    </td>
                                  </tr>
                                  </table>
                              </div>
                              <p align="left" style="margin-left: 10; margin-right: 10"></p>                            </td>  
                  </tr>
                  <?PHP /*
				  <tr>
                    <td width="67%" align="center" valign="middle">　<font size="3"><input type="button" value="SAVE" name="SendData" onClick="return saveData('save')">　　　　　<input type="button" value="SUMBIT" name="SendData" onClick="return saveData('submit')"></font><p align="right">
                              <font color="#666666"></font></td>  
                  </tr>
				  */ ?>
                  <input type="hidden" name="patname" value="<?PHP echo $patient_Fullname; ?>">
                  <input type="hidden" name="patient_id" value="<?PHP echo $patient_id; ?>">
                  <input type="hidden" name="condition" value="">
                  <input type="hidden" name="finacialState" value="">
                  <input type="hidden" name="state" value="">
                  <input type="hidden" name="sur_allows" value="">
                  <tr>
                    <td width="67%" align="center" valign="middle">　
                    <font size="3">
                    <?PHP 
						if(($res_PatientRecord["editor"] == $seid) || ($res_PatientRecord["editor"] == "") || ($res_PatientRecord["chkcode"] == "pe")) {  ?>
                    	<input type="button" value="SAVE" name="SendData" onClick="return saveData('save')">　　　　　<input type="button" value="SUBMIT" name="SendData" onClick="return saveData('submit')">
                    <?PHP } else { echo "";} ?>
                        </font><p align="right">
                              <font color="#666666"></font></td>  
                  </tr>
              </table>
                </center>
              </div>
              <p align="center" style="margin-left: 10; margin-right: 10">
              &nbsp;<div align="center">
                <center>
                <table border="1" cellspacing="1" width="90%">
                  <tr>
                    <td width="100%">
                    <p align="center"><b>Comments and Suggestions（CGCFC）</b></td>    
                  </tr>
                  <tr>
                    <td width="100%">
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;This operation result is：</font></p>    
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;　<input type="radio" value="Excellent" name="op_results" <?PHP if($res_PatientRecord["op_results"] == "Excellent"){ echo "CHECKED"; } ?>>Excellent　　<input type="radio" value="Good" name="op_results" <?PHP if($res_PatientRecord["op_results"] == "Good"){ echo "CHECKED"; } ?>>Good　　<input type="radio" value="Average" name="op_results" <?PHP if($res_PatientRecord["op_results"] == "Average"){ echo "CHECKED"; } ?>>Average　　<input type="radio" value="Poor" name="op_results" <?PHP if($res_PatientRecord["op_results"] == "Poor"){ echo "CHECKED"; } ?>>Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Suggestions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10"><font color="#666666"><?PHP echo $res_PatientRecord["suggestions"]; ?></font></p>
                    <p align="center" style="margin-left: 10; margin-right: 10">&nbsp;
                              </p>
                    </td>
                  </tr>
                  <tr>
                    <td width="100%">
                    </td>   
                  </tr>
                </table>
                </center>
              </div>
              <p align="center" style="margin-left: 10; margin-right: 10">
              &nbsp;<div align="center">
                <center>
                <table border="1" cellspacing="1" width="90%">
                  <tr>
                    <td width="100%">
                    <p align="center"><b>NCF Financial Approval</b></td>    
                  </tr>
                  <tr>
                    <td width="100%">
                    		<?
								$liv_allow			= $res_PatientRecord["liv_allow"];
								$liv_allowday		= $res_PatientRecord["liv_allowday"];
								$tra_allow			= $res_PatientRecord["tra_allow"];
								$tra_allowper		= $res_PatientRecord["tra_allowper"];
								$tra_allowdist	= $res_PatientRecord["tra_allowdist"];
								$sur_allow			= $res_PatientRecord["sur_allow"];
								$tol_amount		= $res_PatientRecord["tol_amount"];
								
								$ncf_livallow			= $res_PatientRecord["ncf_livallow"];
								$ncf_livallowday		=	$res_PatientRecord["ncf_livallowday"];
								$ncf_traallow			= $res_PatientRecord["ncf_traallow"];
								$ncf_traallowper	= $res_PatientRecord["ncf_traallowper"];
								$ncf_traallowdist	= $res_PatientRecord["ncf_traallowdist"];
								$ncf_surallow			= $res_PatientRecord["ncf_surallow"];
								$ncf_tolamont		= $res_PatientRecord["ncf_tolamont"];
								
								// if($res_PatientRecord["ncf_livallow"] == "ON"){ echo "CHECKED";
								// echo $res_PatientRecord["ncf_livallowday"];
								
								
								
							?>
                            <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_livallow" value="" <?PHP if(($ncf_livallow == "ON") || ($liv_allow == "ON")){ echo "CHECKED"; } ?>>A.    
                      Living allowance： <?PHP if (!empty($ncf_livallow)) { echo $liv_allowday; } else if ((!empty($liv_allowday)) && (empty($ncf_livallowday))) { echo $liv_allowday; } ?> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_traallow" value="" <?PHP if(($ncf_traallow == "ON") || ($tra_allow == "ON")){ echo "CHECKED"; }?>>B.    
                      Travel allowance<font size="2">： </font> <?PHP if (!empty($ncf_traallowper)) { echo $ncf_traallowper; } else if ((!empty($tra_allowper)) && (empty($ncf_traallowper))) { echo $tra_allowper; } ?><font size="2"> person * <?PHP if (!empty($ncf_traallowdist)) { echo $ncf_traallowdist; } else if ((!empty($tra_allowdist)) && (empty($ncf_traallowdist))) { echo $tra_allowdist; } ?>                      </font> 
                        <font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_surallow" value="" <?PHP  if(($ncf_surallow == "ON") || ($sur_allow == "ON")){ echo "CHECKED"; } ?>>C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;Total amount： <?PHP if (!empty($ncf_tolamont)) { echo $ncf_tolamont; } else if ((!empty($tol_amount)) && (empty($ncf_tolamont))) { echo $tol_amount; } ?> USD</font></p>    
              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">Note：</font></p>          
                    <p align="center">
                      <font size="3" color="#666666"><?PHP echo $res_PatientRecord["note"]; ?></font></p>
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">Date of accounting recognition： <?PHP echo $res_PatientRecord["accdate_day"]; ?>  / <?PHP echo $res_PatientRecord["accdate_month"]; ?> / <?PHP echo $res_PatientRecord["accdate_year"]; ?>  
                    (dd/mm/yyyy)</font></p> 
                    <p>&nbsp;</td>
                  </tr>
                  </table>
                </center>
              </div>
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
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
				  <input type="hidden" name="op_results" value="<?PHP echo $res_PatientRecord["op_results"]; ?>">
                  <input type="hidden" name="suggestions" value="<?PHP echo $res_PatientRecord["suggestions"]; ?>">
                  
                  <input type="hidden" name="ncf_livallow" value="<?PHP echo $res_PatientRecord["ncf_livallow"]; ?>">
                  <input type="hidden" name="ncf_livallowday" value="<?PHP echo $res_PatientRecord["ncf_livallowday"]; ?>">
                  <input type="hidden" name="ncf_traallowper" value="<?PHP echo $res_PatientRecord["ncf_traallowper"]; ?>">
                  <input type="hidden" name="ncf_traallowdist" value="<?PHP echo $res_PatientRecord["ncf_traallowdist"]; ?>">
                  
                  <input type="hidden" name="ncf_tolamont" value="<?PHP echo $res_PatientRecord["ncf_tolamont"]; ?>">
                  <input type="hidden" name="note" value="<?PHP echo $res_PatientRecord["note"]; ?>">
                  
                  <input type="hidden" name="accdate_day" value="<?PHP echo $res_PatientRecord["accdate_day"]; ?>">
                  <input type="hidden" name="accdate_month" value="<?PHP echo $res_PatientRecord["accdate_month"]; ?>">
                  <input type="hidden" name="accdate_year" value="<?PHP echo $res_PatientRecord["accdate_year"]; ?>">
                  
                  <input type="hidden" name="sur_allows" value="">
                  <input type="hidden" name="chkcode" value="">
                  
                  <input type="hidden" name="branch" value="<?PHP if (!empty($res_PatientRecord["branch"])) {echo $res_PatientRecord["branch"];} else {echo $branch;} ?>">
                  <input type="hidden" name="serialcode" value="<?PHP if (!empty($res_PatientRecord["serialcode"])) {echo $res_PatientRecord["serialcode"];} else {echo $serialcode;} ?>">
                  <input type="hidden" name="sendMail" value="yes">
</form>
</body>

</html>
<?PHP
		//}
	}else{
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
	
/*
	prephoto_frontal	->	photo[0];
	perphoto_intraoral	->	photo[1];
	posphoto_frontal1	->	photo[2];
	posphoto_frontal2	->	photo[3];
	posphoto_frontal3	->	photo[4];

*/	
?>