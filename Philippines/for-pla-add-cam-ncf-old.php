<?PHP
/*
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
			$sel_PatientRecord = "SELECT * FROM `patientmr` WHERE record_num=\"".$record_nums."\"";
			$query_PatientRecord = mysql_query($sel_PatientRecord);
			$res_PatientRecord = mysql_fetch_array($query_PatientRecord);
		}
*/		
?>
<?
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_record_num = $_SESSION["record_num"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$pat_id_1 = $_GET["patid"];
		$pat_id_2 =$_SESSION["patient_id"];
		echo "Value= ".$seid;
		
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
		
		
		/*
		if(!empty($pat_Fullname)){
			$patient_Fullname = $pat_Fullname;
echo "<br/> Patient name from Search. =".$patient_Fullname."<br/>";
		} else {
			$patient_Fullname = $_SESSION["patient_name"];
echo "<br/> Patient name from Save.";
		}
		*/
//echo "Patient name=".$pat_Fullname."<br/>".$_SESSION["patient_name"]."<br/>";	
		$sel_Memberdata = "SELECT * FROM `member` WHERE id=\"".$seid."\" AND pwd=\"".$sepwd."\"";
		$query_Memberdata = mysql_query($sel_Memberdata);
		$res_Memberdata = mysql_fetch_array($query_Memberdata);
		$editor = $res_Memberdata["specialty"];
		//$editor = "cgmhps";
		
		if($record_nums){
			$sel_PatientRecord = "SELECT * FROM `patientmr` WHERE record_num=\"".$record_nums."\"";
			$query_PatientRecord = mysql_query($sel_PatientRecord);
			$res_PatientRecord = mysql_fetch_array($query_PatientRecord);
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
			document.ppls_form.hospitals.value = "<?PHP echo $res_PatientRecord["hospitals"]; ?>";
			document.ppls_form.record_num.value = "<?PHP echo $res_PatientRecord["record_num"]; ?>";
			document.ppls_form.height.value = "<?PHP echo $res_PatientRecord["height"]; ?>";
			document.ppls_form.weight.value = "<?PHP echo $res_PatientRecord["weight"]; ?>";
			SurgeryData = "<?PHP echo $res_PatientRecord["surgery_state"]; ?>";
			if(SurgeryData == "yes"){
				document.getElementById('select_Surgery').style.visibility = "visible";
			}
			CraniofacialData = "<?PHP echo $res_PatientRecord["craniofacial_state"]; ?>";  //craniofacial
			if(CraniofacialData =="yes"){
				document.ppls_form.craniofacial.disabled = true;
			}
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
			
			document.ppls_form.photo0.value = "<?PHP echo $res_PatientRecord["prephoto_frontal"]; ?>";
			/*
			document.ppls_form.prephoto_intraoral.value = "<?PHP //echo $res_PatientRecord["prephoto_intraoral"]; ?>";
			document.ppls_form.posphoto_frontal1.value = "<?PHP //echo $res_PatientRecord["posphoto_frontal1"]; ?>";
			document.ppls_form.posphoto_frontal2.value = "<?PHP //echo $res_PatientRecord["posphoto_frontal2"]; ?>";
			document.ppls_form.posphoto_frontal3.value = "<?PHP //echo $res_PatientRecord["posphoto_frontal3"]; ?>";
			*/
			document.ppls_form.op_resultcmd.value = "<?PHP echo $res_PatientRecord["op_resultcmd"]; ?>";
			document.ppls_form.questions.value = "<?PHP echo $res_PatientRecord["questions"]; ?>";
			document.ppls_form.family_member.value = "<?PHP echo $res_PatientRecord["family_member"]; ?>";
			
			document.ppls_form.family_income.value = "<?PHP echo $res_PatientRecord["family_income"]; ?>";
			document.ppls_form.comments.value = "<?PHP echo $res_PatientRecord["comments"]; ?>";
			document.ppls_form.tra_allow.value = "<?PHP echo $res_PatientRecord["tra_allow"]; ?>";
			
			document.ppls_form.tra_allowper.value = "<?PHP echo $res_PatientRecord["tra_allowper"]; ?>";
			document.ppls_form.sur_allow.value = "<?PHP echo $res_PatientRecord["sur_allow"]; ?>";
			document.ppls_form.tol_amount.value = "<?PHP echo $res_PatientRecord["tol_amount"]; ?>";
			data_Condition = "<?PHP echo $res_PatientRecord["condition"]; ?>";
			if(data_Condition == "1"){									// 判斷load 的資料是否屬於可編輯的
				document.ppls_form.condition.value = "2";		// 2: 表示第二次以上，可編輯的資料
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
				document.ppls_form.condition.value = "1";
				document.ppls_form.action = "for-pla-sav-cam-part.php";
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
				document.ppls_form.condition.value = "0";
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
		}
		
		function checkPartner2(){
			patien_id = document.ppls_form.partner_value.value;
			location.href = "rec-pat-inf.php?id="+patien_id;
		}
	//-->
</script>
</head>

<body topmargin="2">
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
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="19%">
                              <a id="NCF_Dep_Part" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$pat_id_1."'> "; ?>
                              <? if($result_auth['authority']  == 'p'){ ?>
                              	<td width="20%"><img border="0" src="images/label-22.gif" width="160" height="40"></td>
                                <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <?  } elseif ($result_auth['authority']  == 'c') { ?>
                              	<td width="20%"><img border="0" src="images/label-13.gif" width="160" height="40"></td>
                                <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <?  } elseif ($result_auth['authority']  == 'n') { ?>
                              	<td width="20%"><img border="0" src="images/label-14.gif" width="160" height="40"></td>
                                <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <? } ?>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
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
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="4" valign="top">
              <p align="center">&nbsp;</p>
              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <b>Patient Medical Record</b></td>      
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              General Information</span></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
              &nbsp;<font color="#666666">Name of the patient：<?PHP echo $patient_Fullname; ?></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Name of the hospital： <select size="1" name="hospital" onChange="return Indata1_onchange()">    
                          <option value="" selected>Please select...</option>
                          <option value="NPH">National pediatric hospital (NPH)</option>
                          <option value="OTHER">Other</option>
                        </select> <input type="text" name="hospitals" size="20"disabled></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Patient&#39;s&#39; record     
                              number： <input type="text" name="recordno" size="20" value="">   
                              </font>
                              </p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</p>
                              </td>  
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Diagnosis</span></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Height： <input type="text" name="recordno" size="20" value=""> (cm)　　　Weight： <input type="text" name="recordno" size="20" value=""> (kg)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Did the patient have any lip/palate    
              surgery before this evaluation?</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="V1" name="R1">Yes,    
              he/she had</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　　　<input type="radio" value="V1" name="R1">Cleft    
              lip surgery　<input type="radio" value="V1" name="R1">Cleft palate    
              surgery　<input type="radio" value="V1" name="R1">Cleft lip/ Palate    
              surgery</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="V1" name="R1">No.&nbsp;</font></p>
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
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                          <option value="Left not cleft">Left not cleft</option>
                          <option value="Right not cleft">Right not cleft</option>
                          <option value="Left complete">Left complete</option>
                          <option value="Right complete">Right complete</option>
                          <option value="Left incomplete">Left incomplete</option>
                          <option value="Right incomplete">Right incomplete</option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                          <option value="Left not cleft">Left not cleft</option>
                          <option value="Right not cleft">Right not cleft</option>
                          <option value="Left complete">Left complete</option>
                          <option value="Right complete">Right complete</option>
                          <option value="Left incomplete">Left incomplete</option>
                          <option value="Right incomplete">Right incomplete</option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                          <option value="Left not cleft">Left not cleft</option>
                          <option value="Right not cleft">Right not cleft</option>
                          <option value="Left complete">Left complete</option>
                          <option value="Right complete">Right complete</option>
                          <option value="Left incomplete">Left incomplete</option>
                          <option value="Right incomplete">Right incomplete</option>
                          <option value="Left Submucous">Left Submucous</option>
                          <option value="Right Submucous">Right Submucous
                          </option>
                        </select></font></td>
                                  <td width="25%">
                                  <p align="left" style="margin-left: 10; margin-right: 10">
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                          <option value="Not cleft">Not cleft</option>
                          <option value="Complete cleft">Complete cleft</option>
                          <option value="Incomplete cleft">Incomplete cleft</option>
                          <option value="Submucous">Submucous</option>
                        </select></font></td>
                                </tr>
                              </table>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Does the patient have     
                              any other craniofacial deformities?</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;<input type="radio" value="V1" name="R1">Yes <input type="text" name="recordno" size="20" value="">　<input type="radio" value="V1" name="R1">No　<input type="radio" value="V1" name="R1">Don&#39;t     
                              Know</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC">
                              Surgical Treatment</span></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of admission： <input type="text" name="years" size="2">     
                              / <input type="text" name="years" size="2"> / <input type="text" name="years" size="4">     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of surgery    
                              treatment： <input type="text" name="years" size="2">     
                              / <input type="text" name="years" size="2"> / <input type="text" name="years" size="4">     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of discharge： <input type="text" name="years" size="2">     
                              / <input type="text" name="years" size="2"> / <input type="text" name="years" size="4">     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">Type of the operation： <select size="1" name="tsurgery" onChange="return Indata3_onchange()">   
                          <option value="" selected>Please select...</option>
                          <option value="Primary Lip/Nose Unilateral Repair">Primary 
                          Lip/Nose Unilateral Repair</option>
                          <option value="Primary Lip/Nose Bilateral Repair">Primary 
                          Lip/Nose Bilateral Repair</option>
                          <option value="Primary Cleft Palate Repair">Primary 
                          Cleft Palate Repair</option>
                          <option value="Secondary Cleft Palate Repair">Secondary 
                          Cleft Palate Repair
                          </option>
                          <option value="Lip/Nose Revision">Lip/Nose Revision
                          </option>
                          <option value="OTHER">Other</option>
                        </select> <input type="text" name="recordno" size="20" value=""></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on     
                              intervention： </font>
                              </p>
                              <p align="center" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">
                              <textarea rows="7" name="describe" cols="59"></textarea></font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666"><b>Patient Results：</b></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;&nbsp; Pre-operative Photo--</font></p>   
                              <div align="center">
                                <table border="1" cellspacing="1" width="100%">
                                  <tr>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair (Frontal)</font> 
                                    <p>　</p>
                                    <p>　</p>
                                    <p>　</p>
                                    <form method="POST" enctype="multipart/form-data" action="--WEBBOT-SELF--">
                                      <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="F1" size="25"></p>
                                    </form>
                                    <p><font color="#666666">(time)</font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Palate Repair   
                                    (Intra-oral)</font>
                                    <p>　</p>
                                    <p>　</p>
                                    <p>　</p>
                                    <form method="POST" enctype="multipart/form-data" action="--WEBBOT-SELF--">
                                      <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="F1" size="25"></p>
                                    </form>
                                    <p><font color="#666666">(time)</font></p>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;&nbsp; Post-operative Photo--</font></p>   
                              <div align="center">
                                <table border="1" cellspacing="1" width="100%">
                                  <tr>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair   
                                    (Frontal)</font>
                                    <p>　</p>
                                    <p>　</p>
                                    <p>　</p>
                                    <form method="POST" enctype="multipart/form-data" action="--WEBBOT-SELF--">
                                      <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="F1" size="25"></p>
                                    </form>
                                    <p><font color="#666666">(time)</font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair   
                                    (Frontal)</font>
                                    <p>　</p>
                                    <p>　</p>
                                    <p>　</p>
                                    <form method="POST" enctype="multipart/form-data" action="--WEBBOT-SELF--">
                                      <p style="margin-left: 10; margin-right: 10">
                                      <input type="file" name="F1" size="25"></p>
                                    </form>
                                    <p><font color="#666666">(time)</font></p>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <div align="center">
                                <table border="1" cellspacing="1" width="300">
                                  <tr>
                                    <td width="310">
                                    <p align="center"><font color="#666666">
                                    Frontal Smiling</font></p> 
                                    <p align="center">　</p>
                                    <p align="center">　</p>
                                    <p align="center">　</p>
                                    <form method="POST" enctype="multipart/form-data" action="--WEBBOT-SELF--">
                                      <p style="margin-left: 10; margin-right: 10" align="center">
                                      <input type="file" name="F1" size="25"></p>
                                    </form>
                                    <p align="center"><font color="#666666">(time)</font></p>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <p align="center" style="margin-left: 10; margin-right: 10">&nbsp;
                      </p>
                              </td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <span style="background-color: #CCCCCC">Self Estimate of    
                      the Result</span></p>   
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;This operation result is：</font></p>    
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;　<input type="radio" value="V1" name="R1">Excellent　　<input type="radio" value="V1" name="R1">Good　　<input type="radio" value="V1" name="R1">Average　　<input type="radio" value="V1" name="R1">Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;&nbsp;&nbsp;&nbsp; With    
                    complications    
                    <input type="text" name="total" size="30" value=""></font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Questions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <textarea rows="3" name="describe" cols="59"></textarea></p>
                              <p>&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="center">Apply for NCF&#39;s financial    
                              assistance?　<input type="submit" value="YES" name="B1">　<input type="submit" value="NO" name="B2"></td>  
                  </tr>
                  <tr>
                            <td width="67%" align="center" height="19" valign="middle">
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <span style="background-color: #CCCCCC; ">
                              Financial Assessment &amp; Assistance</span></p>    
                              <div align="left">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                    <td width="100%">
                                    <p align="left" style="margin-left: 10; margin-right: 10"><font color="#666666">&nbsp;Number of family     
                              members： <input type="text" name="living" size="5" value=""></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Total family income     
                              per month( USD )： <input type="text" name="living" size="5" value=""></font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on assessment：</font></p>   
                              <p style="margin-left: 10; margin-right: 10" align="center">
                      <font color="#666666">
                              <textarea rows="7" name="describe" cols="59"></textarea></font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<b>Financial Assistance：</b></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">A.    
                      Living allowance： <select size="1" name="tsurgery" onChange="return Indata3_onchange()">    
                          <option value="1">1
                          </option>
                          <option value="2">2
                          </option>
                          <option value="3">3
                          </option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">B.    
                      Travel allowance<font size="2">： </font> <input type="text" name="total" size="1" value=""><font size="2"> person *   
                      </font> <select size="1" name="tsurgery" onChange="return Indata3_onchange()"> 
                          <option value="" selected>Please select...</option>
                          <option value="4">less than 100km (4 USD/per person)
                          </option>
                          <option value="8">less than 200km (8 USD/per person)
                          </option>
                          <option value="10">more than 200km (10 USD/per person)
                          </option>
                        </select><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="button" name="" onClick="calcSum()" value="Count"> 
                      Total amount： <input type="text" name="total" size="15" value="">     
                      USD</font></p>    
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <p align="left" style="margin-left: 10; margin-right: 10"></p>
                            </td>  
                  </tr>
                  <tr>
                    <td width="67%" align="center" valign="middle">　<font size="3"><input type="submit" value="SAVE" name="B1">　　　　　<input type="submit" value="SUMBIT" name="B1"></font><p align="right"></td>   
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
                    <font color="#666666">&nbsp;　<input type="radio" value="V1" name="R1">Excellent　　<input type="radio" value="V1" name="R1">Good　　<input type="radio" value="V1" name="R1">Average　　<input type="radio" value="V1" name="R1">Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Suggestions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <textarea rows="3" name="describe" cols="59"></textarea></p>
                    <p align="center" style="margin-left: 10; margin-right: 10">&nbsp;
                              </p>
                    </td>
                  </tr>
                  <tr>
                    <td width="100%">
                    <p align="center">
              <font size="3">
                    <input type="submit" value="SAVE" name="B1">　　　　　<input type="submit" value="SUMBIT" name="B1"></font><p align="right"></td>   
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
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">A.    
                      Living allowance： <select size="1" name="tsurgery" onChange="return Indata3_onchange()">    
                          <option value="1">1
                          </option>
                          <option value="2">2
                          </option>
                          <option value="3">3
                          </option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">B.    
                      Travel allowance<font size="2">： </font> <input type="text" name="total" size="1" value=""><font size="2"> person *   
                      </font> <select size="1" name="tsurgery" onChange="return Indata3_onchange()"> 
                          <option value="" selected>Please select...</option>
                          <option value="4">less than 100km (4 USD/per person)
                          </option>
                          <option value="8">less than 200km (8 USD/per person)
                          </option>
                          <option value="10">more than 200km (10 USD/per person)
                          </option>
                        </select><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="C1" value="ON">C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="button" name="" onClick="calcSum()" value="Count"> 
                      Total amount： <input type="text" name="total" size="15" value="">     
                      USD</font></p>    
              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">Note：</font></p>          
                    <p align="center">
                      <font size="3" color="#666666">
                              <textarea rows="7" name="describe" cols="59"></textarea></font></p>
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">Date of accounting recognition： <input type="text" name="years" size="2">  
                    / <input type="text" name="years" size="2"> / <input type="text" name="years" size="4">  
                    (dd/mm/yyyy)</font></p> 
                    <p>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="100%">
                    <p align="center">
              <font size="3">
                    <input type="submit" value="SAVE" name="B1">　　　　　<input type="submit" value="SUMBIT" name="B1"></font><p align="right"></td>
                  </tr>
                </table>
                </center>
              </div>
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="margin-left: 10; margin-right: 10">
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