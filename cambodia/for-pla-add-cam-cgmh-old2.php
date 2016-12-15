<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_record_num = $_SESSION["record_num"];
	
	if(!empty($seid) && !empty($sepwd)){
		$pat_id_1 = $_GET["patid"];
		//$pat_id_2 = $_SESSION["patient_id"];
		$pat_id_2 = $_GET["patient_id"];
		$record_nums = $_GET["record_num"];
		
		if($_GET["patid"] != "" ){
			$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_GET["patid"]."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["firstname"]." ".$res_PatientRecord["lastname"];
			//echo "Echo 1. Name => ".$sel_Patientdata."<br/>";
		} else if($_SESSION["patient_id"] != ""){
			$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_SESSION["patient_id"]."\"";
			//$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_GET["patient_id"]."\"";
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
				document.ppls_form.condition.value = "0";
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
                              <? if($res_Memberdata['authority']  == 'p'){ ?>
                              	<td width="20%"></td>
                              	<td width="20%"><img border="0" src="images/label-22.gif" width="160" height="40"></td>
                                <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <?  } elseif ($res_Memberdata['authority']  == 'c') { ?>
                              	<td width="20%"></td>
                              	<td width="20%"><img border="0" src="images/label-23.gif" width="160" height="40"></td>
                                <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <?  } elseif ($res_Memberdata['authority']  == 'n') { ?>
                              	<td width="20%"></td>
                              	<td width="20%"><img border="0" src="images/label-24.gif" width="160" height="40"></td>
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
              <font color="#666666">&nbsp;Name of the hospital：<?PHP $res_PatientRecord["hospital"]; ?></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Patient&#39;s&#39; record     
                              number： <?PHP echo $res_PatientRecord["record_num"]; ?>   
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
              <font color="#666666">&nbsp;Height： <?PHP echo $res_PatientRecord["height"]; ?> (cm)　　　Weight： <?PHP echo $res_PatientRecord[""]; ?> (kg)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Did the patient have any lip/palate    
              surgery before this evaluation?</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="yes" name="surgery_state" onClick="showSurgery()" <?PHP if($res_PatientRecord["surgery_state"] == "yes"){ echo "CHECKED"; }?> >Yes, he/she had</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　　　<input type="radio" value="Cleft lip surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip surgery"){ echo "CHECKED"; } ?>>Cleft    
              lip surgery　<input type="radio" value="Cleft palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft palate surgery"){ echo "CHECKED"; }?>>Cleft palate    
              surgery　<input type="radio" value="Cleft lip-Palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip-Palate surgery"){ echo "CHECKED"; }?>>Cleft lip/ Palate    
              surgery</font></p>
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
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
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
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
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
                                  <font color="#666666"><select size="1" name="tclp" onChange="return Indata2_onchange()">
                          <option value="" <?PHP if($res_PatientRecord["hardpalate"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Left not cleft" <?PHP if($res_PatientRecord["hardpalate"] == "Left not cleft"){ echo "SELECTED"; }?>>Left not cleft</option>
                          <option value="Right not cleft" <?PHP if($res_PatientRecord["hardpalate"] == "Right not cleft"){ echo "SELECTED"; }?>>Right not cleft</option>
                          <option value="Left complete" <?PHP if($res_PatientRecord["hardpalate"] == "Left complete"){ echo "SELECTED"; }?>>Left complete</option>
                          <option value="Right complete" <?PHP if($res_PatientRecord["hardpalate"] == "Right complete"){ echo "SELECTED"; }?>>Right complete</option>
                          <option value="Left incomplete" <?PHP if($res_PatientRecord["hardpalate"] == "Left incomplete"){ echo "SELECTED"; }?>>Left incomplete</option>
                          <option value="Right incomplete" <?PHP if($res_PatientRecord["hardpalate"] == "Right incomplete"){ echo "SELECTED"; }?>>Right incomplete</option>
                          <option value="Left Submucous" <?PHP if($res_PatientRecord["hardpalate"] == "Left Submucous"){ echo "SELECTED"; }?>>Left Submucous</option>
                          <option value="Right Submucous" <?PHP if($res_PatientRecord["hardpalate"] == "Right Submucous"){ echo "SELECTED"; }?>>Right Submucous</option>
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
                              / <?PHP echo $res_PatientRecord["add_month"]; ?> / <?PHP echo $res_PatientRecord["add_year"]; ?>     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of surgery    
                              treatment：<?PHP echo $res_PatientRecord["sur_day"]; ?>    
                              / <?PHP echo $res_PatientRecord["sur_month"]; ?> / <?PHP echo $res_PatientRecord["sur_year"]; ?>     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Date of discharge： <?PHP echo $res_PatientRecord["dis_day"]; ?>    
                              / <?PHP echo $res_PatientRecord["dis_month"]; ?> / <?PHP echo $res_PatientRecord["dis_year"]; ?>     
                              (dd/mm/yyyy)</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">Type of the operation： <select size="1" name="tsurgery" onChange="return Indata3_onchange()">   
                          <option value="" <?PHP if($res_PatientRecord["sur_type"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="Primary Lip/Nose Unilateral Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Lip/Nose Unilateral Repair"){ echo "SELECTED"; }?>>Primary Lip/Nose Unilateral Repair</option>
                          <option value="Primary Lip/Nose Bilateral Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Lip/Nose Bilateral Repair"){ echo "SELECTED"; }?>>Primary Lip/Nose Bilateral Repair</option>
                          <option value="Primary Cleft Palate Repair" <?PHP if($res_PatientRecord["sur_type"] == "Primary Cleft Palate Repair"){ echo "SELECTED"; }?>>Primary Cleft Palate Repair</option>
                          <option value="Secondary Cleft Palate Repair" <?PHP if($res_PatientRecord["sur_type"] == "Secondary Cleft Palate Repair"){ echo "SELECTED"; }?>>Secondary Cleft Palate Repair </option>
                          <option value="Lip/Nose Revision" <?PHP if($res_PatientRecord["sur_type"] == "Lip/Nose Revision"){ echo "SELECTED"; }?>>Lip/Nose Revision</option>
                          <option value="OTHER" <?PHP if($res_PatientRecord["sur_type"] == "OTHER"){ echo "SELECTED"; }?>>Other</option>
                        </select> <?PHP echo $res_PatientRecord["sur_typeoth"]; ?></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                              <font color="#666666">&nbsp;Additional comments on     
                              intervention： </font>
                              </p>
                              <p align="center" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">
                             <?PHP echo $res_PatientRecord["sur_cmd"]; ?></font></p>
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
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="150">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP echo $res_PatientRecord["add_record_date"]; ?></font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Palate Repair (Intra-oral)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_intraoral'])){ echo $res_PatientRecord['prephoto_intraoral']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="150">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP echo $res_PatientRecord["add_record_date"]; ?></font></p>
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
                                    <font color="#666666">Lip Repair (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal1'])){ echo $res_PatientRecord['posphoto_frontal1']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="150">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP echo $res_PatientRecord["add_record_date"]; ?></font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal2'])){ echo $res_PatientRecord['posphoto_frontal2']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="150">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP echo $res_PatientRecord["add_record_date"]; ?></font></p>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <div align="center">
                                <table border="1" cellspacing="1" width="300">
                                  <tr>
                                    <td width="310">
                                     <p align="center"><font color="#666666">Frontal Smiling</font></p> 
                                    <p align="center">
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal3'])){ echo $res_PatientRecord['posphoto_frontal3']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="150">
                                    </p>
                                     <p style="margin-left: 10; margin-right: 10" align="center"></p>
                                    <p align="center"><font color="#666666"><?PHP echo $res_PatientRecord["add_record_date"]; ?></font></p>
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
                    <font color="#666666">&nbsp;　<input type="radio" value="excellent" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "excellent"){ echo "CHECKED"; }?>>Excellent　　<input type="radio" value="good" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "good"){ echo "CHECKED"; }?>>Good　　<input type="radio" value="average" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "average"){ echo "CHECKED"; }?>>Average　　<input type="radio" value="poor" name="op_result" <?PHP if($res_PatientRecord["op_result"] == "poor"){ echo "CHECKED"; }?>>Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;&nbsp;&nbsp;&nbsp; With    
                    complications    
                    <?PHP echo $res_PatientRecord["op_resultcmd"]; ?></font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Questions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <?PHP echo $res_PatientRecord["questions"]; ?></p>
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
                      <font color="#666666">&nbsp;<input type="checkbox" name="liv_allow" value="ON" <?PHP if($res_PatientRecord["liv_allow"] == "ON"){ echo "CHECKED"; }?>>
                      A. Living allowance： <?PHP echo $res_PatientRecord["liv_allowday"]; ?> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="tra_allow" value="ON" <?PHP if($res_PatientRecord["tra_allow"] == "ON"){ echo "CHECKED"; }?>>
                      B. Travel allowance<font size="2">： </font> <?PHP echo $res_PatientRecord["tra_allowper"]; ?><font size="2"> person *   
                      </font> <?PHP echo $res_PatientRecord["tra_allowdist"]; ?><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="sur_allow" value="ON" <?PHP if($res_PatientRecord["sur_allow"] == "ON"){ echo "CHECKED"; }?>>
                      C. Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;
                      Total amount： <?PHP echo $res_PatientRecord["tol_amount"]; ?>     
                      USD</font></p>    
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <p align="left" style="margin-left: 10; margin-right: 10"></p>
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
                    <p align="center"><b>Comments and Suggestions（CGCFC）</b></td>    
                  </tr>
                  <tr>
                    <td width="100%">
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;This operation result is：</font></p>    
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;　<input type="radio" value="Excellent" name="OperationResult">Excellent　　<input type="radio" value="Good" name="OperationResult">Good　　<input type="radio" value="Average" name="OperationResult">Average　　<input type="radio" value="Poor" name="OperationResult">Poor</font></p> 
                    <p align="left" style="margin-left: 10; margin-right: 10">
                    <font color="#666666">&nbsp;Suggestions：</font></p> 
                    <p align="center" style="margin-left: 10; margin-right: 10">
                              <textarea rows="3" name="Suggestions" cols="59" ></textarea></p>
                    <p align="center" style="margin-left: 10; margin-right: 10">&nbsp;
                              </p>
                    </td>
                  </tr>
                  <tr>
                    <td width="100%">
                    <p align="center">
              		<font size="3">
                    	<input type="button" value="SAVE" name="SendData" onClick="return saveData('save')">　　　　　<input type="button" value="SUMBIT" name="SendData" onClick="return saveData('submit')"></font><p align="right">
                    </font></td>   
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
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_livallow" value="ON" <?PHP if($res_PatientRecord["ncf_livallow"] == "ON"){ echo "CHECKED"; } ?>>
                      A. Living allowance： <select size="1" name="ncf_livallowday">    
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
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_traallow" value="ON" <?PHP if($res_PatientRecord["ncf_traallow"] == "ON"){ echo "CHECKED"; }?>>B.    
                      Travel allowance<font size="2">： </font> <?PHP echo $res_PatientRecord["ncf_tolamont"]; ?><font size="2"> person *   
                      </font><?PHP echo $res_PatientRecord["ncf_traallowdist"]; ?><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_surallow" value="ON" <?PHP if($res_PatientRecord["ncf_surallow"] == "ON"){ echo "CHECKED"; }?>>C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="button" name="" onClick="calcSum()" value="Count"> 
                      Total amount： <?PHP echo $res_PatientRecord["ncf_tolamont"]; ?>     
                      USD</font></p>    
              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">Note：</font></p>          
                    <p align="center">
                      <font size="3" color="#666666">
                              <?PHP echo $res_PatientRecord["note"]; ?></font></p>
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
	<input type="hidden" name="patname" value="<?PHP echo $res_PatientRecord["patname"]; ?>">
                  <input type="hidden" name="patientid" value="<?PHP echo $res_PatientRecord["patientid"]; ?>">
                  <input type="hidden" name="hospital" value="<?PHP echo $res_PatientRecord["hospital"]; ?>">
                  <input type="hidden" name="record_num" value="<?PHP echo $res_PatientRecord["record_num"]; ?>">
                  <input type="hidden" name="height" value="<?PHP echo $res_PatientRecord["height"]; ?>">
                  <input type="hidden" name="weight" value="<?PHP echo $res_PatientRecord["weight"]; ?>">
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
                  
                  <input type="hidden" name="sur_type	" value="<?PHP echo $res_PatientRecord["sur_type"]; ?>">
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
                  
                  <input type="hidden" name="liv_allow" value="<?PHP echo $res_PatientRecord["liv_allow"]; ?>">
                  <input type="hidden" name="liv_allowday" value="<?PHP echo $res_PatientRecord["liv_allowday"]; ?>">
                  <input type="hidden" name="tra_allow" value="<?PHP echo $res_PatientRecord["tra_allow"]; ?>">
                  <input type="hidden" name="tra_allowper" value="<?PHP echo $res_PatientRecord["tra_allowper"]; ?>">
                  
                  <input type="hidden" name="tra_allowdist" value="<?PHP echo $res_PatientRecord["tra_allowdist"]; ?>">
                  <input type="hidden" name="sur_allow" value="<?PHP echo $res_PatientRecord["sur_allow"]; ?>">
                  <input type="hidden" name="tol_amount" value="<?PHP echo $res_PatientRecord["tol_amount"]; ?>">
                  <input type="hidden" name="op_results" value="<?PHP echo $res_PatientRecord["op_results"]; ?>">
                  <input type="hidden" name="suggestions" value="<?PHP echo $res_PatientRecord["suggestions"]; ?>">
                  
                  <input type="hidden" name="ncf_livallow" value="<?PHP echo $res_PatientRecord["ncf_livallow"]; ?>">
                  <input type="hidden" name="ncf_livallowday" value="<?PHP echo $res_PatientRecord["ncf_livallowday"]; ?>">
                  <input type="hidden" name="ncf_traallow" value="<?PHP echo $res_PatientRecord["ncf_traallow"]; ?>">
                  <input type="hidden" name="ncf_traallowdist" value="<?PHP echo $res_PatientRecord["ncf_traallowdist"]; ?>">
                  <input type="hidden" name="ncf_surallow" value="<?PHP echo $res_PatientRecord["ncf_surallow"]; ?>">
                  <input type="hidden" name="ncf_tolamont" value="<?PHP echo $res_PatientRecord["ncf_tolamont"]; ?>">
                  <input type="hidden" name="note" value="<?PHP echo $res_PatientRecord["note"]; ?>">
                  
                  <input type="hidden" name="accdate_day" value="<?PHP echo $res_PatientRecord["accdate_day"]; ?>">
                  <input type="hidden" name="accdate_month" value="<?PHP echo $res_PatientRecord["accdate_month"]; ?>">
                  <input type="hidden" name="accdate_year" value="<?PHP echo $res_PatientRecord["accdate_year"]; ?>">
                  <input type="hidden" name="condition" value="">
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