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
		
		//echo "Echo A => ".$record_nums."<br/>";
		
		if($_GET["patid"] != "" ){
			$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_GET["patid"]."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
			//echo "Echo 1. Name => ".$sel_Patientdata."<br/>";
		} else if($_SESSION["patient_id"] != ""){
			 $sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_SESSION["patient_id"]."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
			//echo "Echo 1.1 Name => ".$sel_Patientdata."<br/>";
		}else if(($record_nums != "") || ($record_nums != "undefined")) {
			$sel_Patientdata =  "SELECT * FROM `patientmr` WHERE record_num=\"".$record_nums."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["patname"];
			//echo "Echo 2. Name => ".$sel_Patientdata."<br/>";
		} else {
			$sel_Patientdata =  "SELECT * FROM `patientmr` WHERE record_num=\"".$patient_record_num."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["patname"];
			//echo "Echo 3. Name => ".$sel_Patientdata."<br/>";
		}
		
		if(!empty($pat_id)){
			$patient_id = $pat_id;
		} else {
			$patient_id = $res_PatientRecord["patientid"];
		}
		
		$sel_Memberdata = "SELECT * FROM `member` WHERE id=\"".$seid."\" AND pwd=\"".$sepwd."\"";
		$query_Memberdata = mysql_query($sel_Memberdata);
		$res_Memberdata = mysql_fetch_array($query_Memberdata);
		$editor = $res_Memberdata["specialty"];
		//$editor = "cgmhps";
		
		if($record_nums){
			// 置入 Record Number 並分割存入陣列，然後於 SQL 用 AND 來搜尋資料
			$patientid_num = substr($record_nums, 0, 8);
			$branch_num = substr($record_nums, 8, 1);
			$serialcode_num = substr($record_nums, 9, 1);
			
			//$sel_PatientRecord = "SELECT * FROM `patientmr` WHERE record_num=\"".$record_nums."\"";
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
			echo $medicalrecord."<br/>";
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
			
			SurgeryData = "<?PHP echo $res_PatientRecord["surgery_state"]; ?>";
			if(SurgeryData == "yes"){
				document.getElementById('select_Surgery').style.visibility = "visible";
			}
			
			document.ppls_form.ncf_livallowday.value = "<?PHP echo $ncf_livallowday; ?>";
			document.ppls_form.ncf_traallowper.value = "<?PHP echo $ncf_traallowper; ?>";
			document.ppls_form.ncf_traallowdist.value = "<?PHP echo $ncf_traallowdist; ?>";
			document.ppls_form.ncf_tolamont.value = "<?PHP if (!empty($ncf_tolamont)) { echo $ncf_tolamont; } else if ((!empty($tol_amount)) && (empty($ncf_tolamont))) { echo $tol_amount; } ?>";
			document.ppls_form.note.value = "<?PHP echo $res_PatientRecord["note"]; ?>";
			document.ppls_form.accdate_day.value = "<?PHP echo $res_PatientRecord["accdate_day"]; ?>";
			document.ppls_form.accdate_month.value = "<?PHP echo $res_PatientRecord["accdate_month"]; ?>";
			document.ppls_form.accdate_year.value = "<?PHP echo $res_PatientRecord["accdate_year"]; ?>";
			
			data_Condition = "<?PHP echo $res_PatientRecord["condition"]; ?>";
			if((data_Condition == "1") || (data_Condition == "2") || (data_Condition == "3")){									// 判斷load 的資料是否屬於可編輯的
				document.ppls_form.condition.value = "3";		// 2: 表示第二次以上，可編輯的資料 - 9/29 調整為: 3
			} else {
				document.ppls_form.condition.value = "";
			}
			livAllow = "<?PHP echo $res_PatientRecord["lliv_allow"]; ?>";
			traAllow = "<?PHP echo $res_PatientRecord["tra_allow"]; ?>";
			surAllow = "<?PHP echo $res_PatientRecord["sur_allow"]; ?>";
			if((livAllow == "ON") || (traAllow == "ON") || (surAllow == "ON")){
				document.getElementById('financialSupport').style.visibility = "visible";
			}
		}
		
		function saveData(opt){
			if(opt == "save"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allows.value = "ON";
				}  else {
					document.ppls_form.sur_allows.value = "";
				}
				document.ppls_form.condition.value = "3";  /* 原設定為1, 9/29調整為3 */
				document.ppls_form.action = "for-pla-sav-cam-ncf.php";
				document.ppls_form.submit();
				return true;
			}else if(opt == "submit"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allows.value = "ON";
					//document.ppls_form.sur_allows.value = "OFF";
				}  else {
					document.ppls_form.sur_allows.value = "";
				}
				document.ppls_form.condition.value = "4";   /* 原設定為0, 9/29調整為 4 */
				document.ppls_form.action = "for-pla-sub-cam-ncf.php";
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
		
		function showDiv(){
			document.getElementById('financialSupport').style.visibility = "visible";
			document.ppls_form.finacialState.value = "1";
			//alert(document.ppls_form.finacialState.value);
		}
		function hiddenDiv(){
			document.getElementById('financialSupport').style.visibility = "hidden";
			document.ppls_form.finacialState.value = "0";
			//alert(document.ppls_form.finacialState.value);
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="103%">
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
              <font color="#666666">&nbsp;Name of the hospital： <?PHP echo $res_PatientRecord["hospital"]; ?></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Patient&#39;s&#39; record    
                              number： <?PHP echo $res_PatientRecord["record_num"]; ?>  
                              </font>                              </p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</p>                              </td>  
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Diagnosis</span></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Height： <?PHP echo $res_PatientRecord["height"]; ?> (cm)　　　Weight： <?PHP echo $res_PatientRecord["weight"]; ?> (kg)</font></p>  
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
                                  <font color="#666666"><?PHP echo $res_PatientRecord["lip"]; ?></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><?PHP echo $res_PatientRecord["alveolus"]; ?></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><?PHP echo $res_PatientRecord["hardpalate"]; ?></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><?PHP echo $res_PatientRecord["softpalate"]; ?></font></td>
                                </tr>
                              </table>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Does the patient have    
                              any other craniofacial deformities?</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;<input type="radio" value="yes" name="craniofacial_state" onClick="inputCraniofacial('yes')" <?PHP if($res_PatientRecord["craniofacial_state"] == "yes"){ echo "CHECKED"; }?>>Yes <?PHP echo $res_PatientRecord["craniofacial"]; ?>　<input type="radio" value="no" name="craniofacial_state" onClick="inputCraniofacial('no')" <?PHP if($res_PatientRecord["craniofacial_state"] == "no"){ echo "CHECKED"; }?>>No　<input type="radio" value="dontknow" name="craniofacial_state" onClick="inputCraniofacial('no')" <?PHP if($res_PatientRecord["craniofacial_state"] == "dontknow"){ echo "CHECKED"; }?>>Don&#39;t    
                              Know</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Surgical Treatment</span></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of admission： <?PHP echo $res_PatientRecord["add_day"]; ?>    
                              / <?PHP echo $res_PatientRecord["add_month"]; ?> / <?PHP echo $res_PatientRecord["add_year"]; ?> (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of surgery   
                              treatment： <?PHP echo $res_PatientRecord["sur_day"]; ?>    
                              / <?PHP echo $res_PatientRecord["sur_month"]; ?> / <?PHP echo $res_PatientRecord["sur_year"]; ?>    
                              (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of discharge： <?PHP echo $res_PatientRecord["dis_day"]; ?>    
                              / <?PHP echo $res_PatientRecord["dis_month"]; ?> / <?PHP echo $res_PatientRecord["dis_year"]; ?>    
                              (dd/mm/yyyy)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">Type of the operation： <?PHP echo $res_PatientRecord["sur_type"]; ?>  <?PHP echo $res_PatientRecord["sur_typeoth"]; ?></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on    
                              intervention： </font>                              </p>
                              <p align="center" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">
                              <?PHP echo $res_PatientRecord["sur_cmd"]; ?></font></p>
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
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Palate Repair   
                                    (Intra-oral)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_intraoral'])){ echo $res_PatientRecord['prephoto_intraoral']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
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
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair   
                                    (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal2'])){ echo $res_PatientRecord['posphoto_frontal2']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
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
                                     <p style="margin-left: 10; margin-right: 10" align="center"></p>
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
                    <?PHP echo $res_PatientRecord["op_resultcmd"]; ?></font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Questions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <font color="#666666"><?PHP echo $res_PatientRecord["questions"]; ?></font></p>
                              <p>&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="center">Apply for NCF&#39;s financial   
                              assistance?　<input type="button" value="YES" name="visible" onClick="showDiv()">　<input type="button" value="NO" name="hidden" onClick="hiddenDiv()"></td>  
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <div align="left" id="financialSupport" class="pplsFinacial" style="visibility: hidden">
                              <span style="background-color: #CCCCCC; ">
                              Financial Assessment &amp; Assistance</span></p>   
    
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                    <td width="100%">
                                    <p align="left" style="margin-left: 10; margin-right: 10"><font color="#666666">&nbsp;Number of family    
                              members： <?PHP echo $res_PatientRecord["family_member"]; ?></font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Total family income    
                              per month( USD )： <?PHP echo $res_PatientRecord["family_income"]; ?></font></p>  
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on assessment：</font></p>  
                              <p style="margin-left: 10; margin-right: 10" align="center">
                      <font color="#666666"><?PHP echo $res_PatientRecord["comments"]; ?></font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<b>Financial Assistance：</b></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="liv_allow" value="ON" <?PHP if($liv_allow == "ON"){ echo "CHECKED"; } else { echo "";} ?>>
                      A. Living allowance： <?PHP echo $res_PatientRecord["liv_allowday"]; ?> day(s) * 2 USD per day</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="tra_allow" value="ON" <?PHP if($tra_allow == "ON"){ echo "CHECKED"; } else { echo "";}?>>B.   
                      Travel allowance<font size="2">： </font> <?PHP echo $tra_allowper; ?><font size="2"> person *  
                      </font> <?PHP echo $res_PatientRecord["tra_allowdist"]; ?><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="sur_allow" value="ON" <?PHP if($res_PatientRecord["sur_allow"] == "ON"){ echo "CHECKED"; } else{ echo ""; } ?>>C.  
                      Surgery allowance： 20 USD per patient</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp; Total amount： <?PHP echo $res_PatientRecord["tol_amount"]; ?>    
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
                  
                  <input type="hidden" name="branch" value="<?PHP if (!empty($res_PatientRecord["branch"])) {echo $res_PatientRecord["branch"];} else {echo $branch;} ?>">
                  <input type="hidden" name="serialcode" value="<?PHP if (!empty($res_PatientRecord["serialcode"])) {echo $res_PatientRecord["serialcode"];} else {echo $serialcode;} ?>">
                  
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
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_livallow" value="ON" <?PHP if($ncf_livallow == "ON"){ echo "CHECKED"; } else if(($ncf_livallow == "") || ($ncf_livallow == "false")){ echo "";} ?>>A. 
                      Living allowance： 
                      <select size="1" name="ncf_livallowday"> 
                      	  	<option value="0" <?PHP if($res_PatientRecord["ncf_livallowday"] == "0" || ""){ echo "SELECTED"; }?>>0</option>   
                          	<option value="1" <?PHP if($res_PatientRecord["ncf_livallowday"] == "1"){ echo "SELECTED"; }?>>1</option>
                          	<option value="2" <?PHP if($res_PatientRecord["ncf_livallowday"] == "2"){ echo "SELECTED"; }?>>2</option>
                          	<option value="3" <?PHP if($res_PatientRecord["ncf_livallowday"] == "3"){ echo "SELECTED"; }?>>3</option>
                        	<option value="4" <?PHP if($res_PatientRecord["ncf_livallowday"] == "4"){ echo "SELECTED"; }?>>4</option>
                        	<option value="5" <?PHP if($res_PatientRecord["ncf_livallowday"] == "5"){ echo "SELECTED"; }?>>5</option>
                        	<option value="6" <?PHP if($res_PatientRecord["ncf_livallowday"] == "6"){ echo "SELECTED"; }?>>6</option>
                        	<option value="7" <?PHP if($res_PatientRecord["ncf_livallowday"] == "7"){ echo "SELECTED"; }?>>7</option>
                        	<option value="8" <?PHP if($res_PatientRecord["ncf_livallowday"] == "8"){ echo "SELECTED"; }?>>8</option>
                      </select> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_traallow" value="ON" <?PHP if(($ncf_traallow == "") || ($ncf_traallow == "false")){ echo ""; } else if ($ncf_traallow == "ON"){ echo "CHECKED"; } ?>>B.    
                      Travel allowance<font size="2">： </font> <input type="text" name="ncf_traallowper" size="1" value=""><font size="2"> person *   
                      </font> <select size="1" name="ncf_traallowdist" onChange="return Indata3_onchange()"> 
                          <option value="0" <?PHP if($res_PatientRecord["ncf_traallowdist"] == "0" || ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="4" <?PHP if($res_PatientRecord["ncf_traallowdist"] == "4"){ echo "SELECTED"; }?>>less than 100km (4 USD/per person)</option>
                          <option value="8" <?PHP if($res_PatientRecord["ncf_traallowdist"] == "8"){ echo "SELECTED"; }?>>less than 200km (8 USD/per person)</option>
                          <option value="10" <?PHP if($res_PatientRecord["ncf_traallowdist"] == "10"){ echo "SELECTED"; }?>>more than 200km (10 USD/per person)</option>
                        </select>
                        <font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_surallow" value="ON" <?PHP  if(($ncf_surallow == "") || ($ncf_surallow == "false")){ echo ""; } else if ($ncf_surallow == "ON"){ echo "CHECKED"; } ?>>C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="button" name="ncf_count" onClick="calcSumNCF2()" value="Count"> 
                      Total amount： <input type="text" name="ncf_tolamont" size="15" value="">     
                      USD</font></p>    
              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">Note：</font></p>          
                    <p align="center">
                      <font size="3" color="#666666">
                              <textarea rows="7" name="note" cols="59" value=""></textarea></font></p>
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">Date of accounting recognition： <input type="text" name="accdate_day" size="2" maxlength="2" value="">  
                    / <input type="text" name="accdate_month" size="2" maxlength="2" value=""> / <input type="text" name="accdate_year" size="4" maxlength="4" value="">  
                    (dd/mm/yyyy)</font></p> 
                    <p>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="67%" align="center" valign="middle">　
                    <font size="3">
                    <?PHP 
						if(($res_PatientRecord["condition"] != "4") || ($res_PatientRecord["condition"] == "")) {  
					?>
                    	<input type="button" value="SAVE" name="SendData" onClick="return saveData('save')">　　　　　<input type="button" value="SUBMIT" name="SendData" onClick="return saveData('submit')">
                   <?PHP } else { echo "";} ?>
                    </font></td>  
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
				  <input type="hidden" name="patientid" value="<?PHP echo $res_PatientRecord["patientid"]; ?>">
                  <input type="hidden" name="patname" value="<?PHP echo $res_PatientRecord["patname"]; ?>">
                  <input type="hidden" name="hospital" value="<?PHP echo $res_PatientRecord["hospital"]; ?>">
                  <input type="hidden" name="hospitals" value="<?PHP echo $res_PatientRecord["hospitals"]; ?>">
                  <input type="hidden" name="record_num" value="<?PHP echo $res_PatientRecord["record_num"]; ?>">
                  
                  <input type="hidden" name="height" value="<?PHP echo $res_PatientRecord["height"]; ?>">
                  <input type="hidden" name="weight" value="<?PHP echo $res_PatientRecord["weight"]; ?>">
                  <input type="hidden" name="lip" value="<?PHP echo $res_PatientRecord["lip"]; ?>">
                  <input type="hidden" name="alveolus" value="<?PHP echo $res_PatientRecord["alveolus"]; ?>">
                  <input type="hidden" name="hardpalate" value="<?PHP echo $res_PatientRecord["hardpalate"]; ?>">
                  <input type="hidden" name="softpalate" value="<?PHP echo $res_PatientRecord["softpalate"]; ?>">
                  <input type="hidden" name="craniofacial" value="<?PHP echo $res_PatientRecord["craniofacial"]; ?>">
                  
                  <input type="hidden" name="add_day" value="<?PHP echo $res_PatientRecord["add_day"]; ?>">
                  <input type="hidden" name="add_month" value="<?PHP echo $res_PatientRecord["add_month"]; ?>">
                  <input type="hidden" name="add_year" value="<?PHP echo $res_PatientRecord["add_year"]; ?>">
                  
                  <input type="hidden" name="sur_day" value="<?PHP echo $res_PatientRecord["sur_day"]; ?>">
                  <input type="hidden" name="sur_month" value="<?PHP echo $res_PatientRecord["sur_month"]; ?>">
                  <input type="hidden" name="sur_year" value="<?PHP echo $res_PatientRecord["sur_year"]; ?>">
                  
                  <input type="hidden" name="dis_day" value="<?PHP echo $res_PatientRecord["dis_day"]; ?>">
                  <input type="hidden" name="dis_month" value="<?PHP echo $res_PatientRecord["dis_month"]; ?>">
                  <input type="hidden" name="dis_year" value="<?PHP echo $res_PatientRecord["dis_year"]; ?>">
                  
                  <input type="hidden" name="sur_type" value="<?PHP echo $res_PatientRecord["sur_type"]; ?>">
                  <input type="hidden" name="sur_typeoth" value="<?PHP echo $res_PatientRecord["sur_typeoth"]; ?>">
                  <input type="hidden" name="sur_cmd" value="<?PHP echo $res_PatientRecord["sur_cmd"]; ?>">
                  
                  <input type="hidden" name="prephoto_frontal" value="<?PHP echo $res_PatientRecord["prephoto_frontal"]; ?>">
                  <input type="hidden" name="prephoto_intraoral" value="<?PHP echo $res_PatientRecord["prephoto_intraoral"]; ?>">
                  <input type="hidden" name="posphoto_frontal1" value="<?PHP echo $res_PatientRecord["posphoto_frontal1"]; ?>">
                  <input type="hidden" name="posphoto_frontal2" value="<?PHP echo $res_PatientRecord["posphoto_frontal2"]; ?>">
                  <input type="hidden" name="posphoto_frontal3" value="<?PHP echo $res_PatientRecord["posphoto_frontal3"]; ?>">
                  
                  <input type="hidden" name="op_result" value="<?PHP echo $res_PatientRecord["op_result"]; ?>">
                  <input type="hidden" name="op_resultcmd" value="<?PHP echo $res_PatientRecord["op_resultcmd"]; ?>">
                  <input type="hidden" name="questions" value="<?PHP echo $res_PatientRecord["questions"]; ?>">
                  
                  <input type="hidden" name="family_member" value="<?PHP echo $res_PatientRecord["family_member"]; ?>">
                  <input type="hidden" name="family_income" value="<?PHP echo $res_PatientRecord["family_income"]; ?>">
                  <input type="hidden" name="comments" value="<?PHP echo $res_PatientRecord["comments"]; ?>">
                  
                  <input type="hidden" name="liv_allowday" value="<?PHP echo $res_PatientRecord["liv_allowday"]; ?>">
                  <input type="hidden" name="tra_allowper" value="<?PHP echo $res_PatientRecord["tra_allowper"]; ?>">
                  <input type="hidden" name="tra_allowdist" value="<?PHP echo $res_PatientRecord["tra_allowdist"]; ?>">
                  <input type="hidden" name="tol_amount" value="<?PHP echo $res_PatientRecord["tol_amount"]; ?>">
                  
                  <input type="hidden" name="suggestions" value="<?PHP echo $res_PatientRecord["suggestions"]; ?>">
                  
                  <input type="hidden" name="sur_allows" value="">
                  
                  <input type="hidden" name="branch" value="<?PHP if (!empty($res_PatientRecord["branch"])) {echo $res_PatientRecord["branch"];} else { echo $branch; } ?>">
                  <input type="hidden" name="serialcode" value="<?PHP if (!empty($res_PatientRecord["serialcode"])) {echo $res_PatientRecord["serialcode"]; } else { echo $serialcode; } ?>">
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