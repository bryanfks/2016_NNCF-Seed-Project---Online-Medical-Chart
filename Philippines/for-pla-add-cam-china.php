<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$patient_record_num = $_SESSION["record_num"];
	
	if(!empty($seid) && !empty($sepwd)){
		$pat_id_1 = $_GET["patid"];
		$pat_id_2 = $_SESSION["patient_id"];
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
			$patient_Fullname = $res_PatientRecord["patname"];
		} else {
			$sel_Patientdata =  "SELECT * FROM `patientmr` WHERE record_num=\"".$patient_record_num."\"";
			$query_Patientdata = mysql_query($sel_Patientdata);
			$res_PatientRecord = mysql_fetch_array($query_Patientdata);
			$patient_Fullname = $res_PatientRecord["patname"];
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
			$serialcode_num = substr($record_nums, 9);
			
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
			document.ppls_form.suggestions.value = "<?PHP echo $res_PatientRecord["suggestions"]; ?>";
			
			data_Condition = "<?PHP echo $res_PatientRecord["condition"]; ?>";
			if(data_Condition == "1"){									// 判斷load 的資料是否屬於可編輯的
				document.ppls_form.condition.value = "2";		// 2: 表示第二次以上，可編輯的資料
			} else {
				document.ppls_form.condition.value = "";
			}
			livAllow = "<?PHP echo $res_PatientRecord["liv_allow"]; ?>";
			traAllow = "<?PHP echo $res_PatientRecord["tra_allow"]; ?>";
			surAllow = "<?PHP echo $res_PatientRecord["sur_allow"]; ?>";
		}
		
		function saveData(opt){
			if(opt == "save"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allows.value = "ON";
				}  else {
					document.ppls_form.sur_allows.value = "";
				}
				document.ppls_form.condition.value = "5";		/* 原為1，改為5*/
				chkcd = "<?PHP echo $res_PatientRecord["chkcode"]; ?>";
				if (chkcd == "pn") {
					document.ppls_form.chkcode.value = "pnce";
				} else {
					document.ppls_form.chkcode.value = "pce";	
				}
				document.ppls_form.action = "for-pla-sav-cam-cgmh.php";
				document.ppls_form.submit();
				return true;
			}else if(opt == "submit"){
				sur_allow_flag = document.ppls_form.sur_allow.checked;
				if(sur_allow_flag){
					document.ppls_form.sur_allows.value = "ON";
				}  else {
					document.ppls_form.sur_allows.value = "";
				}
				chkcode_auths = "<?PHP echo $res_PatientRecord["chkcode"]; ?>";
				if ((chkcode_auths == "pnce")) {
					document.ppls_form.condition.value = "0";
					document.ppls_form.chkcode.value = "pnc";	// 表示基金會已經審閱完成，且經國內醫師審閱完成，可以關閉病歷表。
				} else if ((chkcode_auths == "p") || (chkcode_auths == "pce")) {
					document.ppls_form.condition.value = "0";
					document.ppls_form.chkcode.value = "pc";	// 表示國外醫師審閱完成，但是基金會未審閱。
				}
				document.ppls_form.action = "for-pla-sub-cam-cgmh.php";
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
			   		echo "Record Number: ".$record_nums;
			   ?>
               <p align="center" style="margin-left: 10; margin-right: 10">
                 &nbsp;<div align="center">
                <center>
                <table border="1" cellspacing="1" width="90%">
                  <tr>
                    <td width="100%">&nbsp;</td>    
                  </tr>
                  <tr>
                    <td width="100%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="100%">&nbsp;</td>   
                  </tr>
                </table>
                </center>
              </div>
              <p align="center" style="margin-left: 10; margin-right: 10">
              &nbsp;<div align="center">
                <center>
                <table border="1" cellspacing="1" width="90%">
                  <tr>
                    <td width="100%">&nbsp;</td>    
                  </tr>
                  <tr>
                    <td width="100%">&nbsp;</td>
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
				  <input type="hidden" name="patient_id" value="<?PHP echo $patient_id; ?>">
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
                  
                  
                  <input type="hidden" name="ncf_livallowday" value="<?PHP echo $res_PatientRecord["ncf_livallowday"]; ?>">
                  <input type="hidden" name="ncf_traallowdist" value="<?PHP echo $res_PatientRecord["ncf_traallowdist"]; ?>">
                  <input type="hidden" name="ncf_tolamont" value="<?PHP echo $res_PatientRecord["ncf_tolamont"]; ?>">
                  <input type="hidden" name="note" value="<?PHP echo $res_PatientRecord["note"]; ?>">
                  
                  <input type="hidden" name="accdate_day" value="<?PHP echo $res_PatientRecord["accdate_day"]; ?>">
                  <input type="hidden" name="accdate_month" value="<?PHP echo $res_PatientRecord["accdate_month"]; ?>">
                  <input type="hidden" name="accdate_year" value="<?PHP echo $res_PatientRecord["accdate_year"]; ?>">
                  
                  <input type="hidden" name="condition" value="">
                  <input type="hidden" name="finacialState" value="">
                  <input type="hidden" name="state" value="">
                  <input type="hidden" name="sur_allows" value="">
                  <input type="hidden" name="chkcode" value="">
                  
                  <input type="hidden" name="branch" value="<?PHP if (!empty($res_PatientRecord["branch"])) {echo $res_PatientRecord["branch"];} else {echo $branch;} ?>">
                  <input type="hidden" name="serialcode" value="<?PHP if (!empty($res_PatientRecord["serialcode"])) {echo $res_PatientRecord["serialcode"];} else {echo $serialcode;} ?>">
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