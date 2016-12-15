<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_record_num = $_SESSION["record_num"];
	
	if(!empty($seid) && !empty($sepwd)){
		//$pat_id_1 = $_GET["patid"];
		//$pat_id_1 = $_GET["patient_id"];
		//$pat_id_2 = $_SESSION["patient_id"];
		$record_num_from = $_GET["record_num"];
		$patientid_num = substr($record_num_from, 0, 8);
		$branch_num = substr($record_num_from, 8, 1);
		$serialcode_num = substr($record_num_from, 9);
	
		$pateint_id = $_GET["patient_id"];
	
		
		/*
		//if($_GET["patid"] != "" ){
		if($_GET["patient_id"] != "" ){
			$sel_Patientdata = "SELECT * FROM `patient` WHERE patientid=\"".$_GET["patient_id"]."\"";
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
		*/
		
		
		
		
		
		
		if(!empty($pateint_id)){
			$patient_id = $pateint_id;
		} else {
			$patient_id = $res_PatientRecord["patientid"];
		}
		
		$sel_Memberdata = "SELECT * FROM `member` WHERE id=\"".$seid."\" AND pwd=\"".$sepwd."\"";
		$query_Memberdata = mysql_query($sel_Memberdata);
		$res_Memberdata = mysql_fetch_array($query_Memberdata);
		$editor = $res_Memberdata["specialty"];
		//$editor = "cgmhps";
		
		//if($record_nums){
	
			$sel_PatientRecord = "SELECT * FROM `patientmr` WHERE patientid='".$patientid_num."' AND branch='".$branch_num."' AND serialcode='".$serialcode_num."'";
			$query_PatientRecord = mysql_query($sel_PatientRecord);
			$res_PatientRecord = mysql_fetch_array($query_PatientRecord);
		//	echo $sel_PatientRecord."<br/>";	
		//}
		
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<script language="javascript" type="text/javascript">
	<!--
		function checkPartner2(){
			patient_id = document.ppls_form.partner_value.value;
			location.href = "rec-pat-inf.php?id="+patient_id;
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("select.php"); ?></font></td>
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
			   		//echo "Record Number: ".$record_nums;
					echo "Record Number: ".$record_num_from;
			   ?>
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
              &nbsp;<font color="#666666">Name of the patient：<?PHP echo $res_PatientRecord["patname"]; ?></font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Name of the hospital：<? if ($res_PatientRecord["hospital"] != "OTHER") { echo $res_PatientRecord["hospital"]; } else { echo $res_PatientRecord["hospitals"]; } ?></font></p>    
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
              <font color="#666666">&nbsp;Height： <?PHP echo $res_PatientRecord["height"]; ?> (cm)　　　Weight： <?PHP echo $res_PatientRecord["weight"]; ?> (kg)</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;Did the patient have any lip/palate    
              surgery before this evaluation?</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="yes" name="surgery_state" <?PHP if($res_PatientRecord["surgery_state"] == "yes"){ echo "CHECKED"; }?> >Yes, he/she had</font></p>   
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　　　<input type="radio" value="Cleft lip surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip surgery"){ echo "CHECKED"; } ?>>Cleft    
              lip surgery　<input type="radio" value="Cleft palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft palate surgery"){ echo "CHECKED"; }?>>Cleft palate    
              surgery　<input type="radio" value="Cleft lip-Palate surgery" name="surgery" <?PHP if($res_PatientRecord["surgery"] == "Cleft lip-Palate surgery"){ echo "CHECKED"; }?>>Cleft lip/ Palate    
              surgery</font></p>
                              <p align="left" style="margin-left: 10; margin-right: 10">
              <font color="#666666">&nbsp;　<input type="radio" value="no" name="surgery_state" <?PHP if($res_PatientRecord["surgery_state"] == "no"){ echo "CHECKED"; }?>>No.&nbsp;</font></p>
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
                              <font color="#666666">&nbsp;<input type="radio" value="yes" name="craniofacial_state" <?PHP if($res_PatientRecord["craniofacial_state"] == "yes"){ echo "CHECKED"; }?>>Yes <?PHP echo $res_PatientRecord["craniofacial"]; ?>　<input type="radio" value="no" name="craniofacial_state" <?PHP if($res_PatientRecord["craniofacial_state"] == "no"){ echo "CHECKED"; }?>>No　<input type="radio" value="dontknow" name="craniofacial_state" <?PHP if($res_PatientRecord["craniofacial_state"] == "dontknow"){ echo "CHECKED"; }?>>Don&#39;t     
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
                              <font color="#666666">Type of the operation： <? if ($res_PatientRecord["sur_type"] != "OTHER") { echo $res_PatientRecord["sur_type"]; } else { echo $res_PatientRecord["sur_typeoth"]; } ?></font></p>    
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
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Palate Repair (Intra-oral)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_intraoral'])){ echo $res_PatientRecord['prephoto_intraoral']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>
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
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal1'])){ echo $res_PatientRecord['posphoto_frontal1']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>
                                    </td>
                                    <td align="center" width="300">
                                    <font color="#666666">Lip Repair (Frontal)</font>
                                    <p>
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal2'])){ echo $res_PatientRecord['posphoto_frontal2']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                    <p style="margin-left: 10; margin-right: 10"></p>
                                    <p><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>
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
                                    	<img border="0" src="<?PHP if(!empty($res_PatientRecord['posphoto_frontal3'])){ echo $res_PatientRecord['posphoto_frontal3']; }else{ echo 'images/user-pic.jpg'; } ?>" width="290" height="250">
                                    </p>
                                     <p style="margin-left: 10; margin-right: 10" align="center"></p>
                                    <p align="center"><font color="#666666"><?PHP //echo $res_PatientRecord["add_record_date"]; ?></font></p>
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
                              <font color="#666666"><?PHP echo $res_PatientRecord["questions"]; ?></font></p>
                              <p>&nbsp;</td>  
                  </tr>
                  <tr>
                            <td width="67%" align="left" height="19" valign="middle">
                              <p align="center">Apply for NCF&#39;s financial assistance　</td>  
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
                      </font> <?PHP 
					  						//$tra_allowdist_value = $res_PatientRecord["tra_allowdist"]; 
											if ($res_PatientRecord["tra_allowdist"] == "0" || "") {
												echo "less than 0km (0 USD/per person)";
											} else if ($res_PatientRecord["tra_allowdist"] == "4") {
												echo "less than 100km (4 USD/per person) ";
											} else if ($res_PatientRecord["tra_allowdist"] == "8") {
												echo "less than 100km (8 USD/per person) ";
											} else if ($res_PatientRecord["tra_allowdist"] == "10") {
												echo "less than 100km (10 USD/per person) ";
											}
											
								    ?><font size="2"> distance</font></font></p> 
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
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_livallow" value="ON" <?PHP if($res_PatientRecord["ncf_livallow"] == "ON"){ echo "CHECKED"; } ?>>
                      A. Living allowance： <?PHP echo $res_PatientRecord["ncf_livallowday"]; ?> day(s) * 2 USD per day</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_traallow" value="ON" <?PHP if($res_PatientRecord["ncf_traallow"] == "ON"){ echo "CHECKED"; }?>>B.    
                      Travel allowance<font size="2">： </font> <?PHP echo $res_PatientRecord["ncf_traallowper"]; ?><font size="2"> person *   
                      </font><?PHP 
					  						//$tra_allowdist_value = $res_PatientRecord["tra_allowdist"]; 
											if ($res_PatientRecord["ncf_traallowdist"] == "0") {
												echo "less than 0km (0 USD/per person)";
											} else if ($res_PatientRecord["ncf_traallowdist"] == "4") {
												echo "less than 100km (4 USD/per person) ";
											} else if ($res_PatientRecord["ncf_traallowdist"] == "8") {
												echo "less than 100km (8 USD/per person) ";
											} else if ($res_PatientRecord["ncf_traallowdist"] == "10") {
												echo "less than 100km (10 USD/per person) ";
											}
											
								    ?><font size="2"> distance</font></font></p> 
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;<input type="checkbox" name="ncf_surallow" value="ON" <?PHP if($res_PatientRecord["ncf_surallow"] == "ON"){ echo "CHECKED"; }?>>C.    
                      Surgery allowance： 20 USD per patient</font></p>    
                              <p align="left" style="margin-left: 10; margin-right: 10">
                      <font color="#666666">&nbsp;Total amount： <?PHP echo $res_PatientRecord["ncf_tolamont"]; ?>     
                      USD</font></p>    
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