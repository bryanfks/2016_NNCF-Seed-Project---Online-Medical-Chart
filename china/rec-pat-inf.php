<?
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		$patid = $_GET["id"];
		
		
		// ---- Search Patient's information. ----
		$sel_data = "SELECT * FROM `patient` WHERE patientid='".$patid."'";
		$query_data = mysql_query($sel_data);
		$result = mysql_fetch_array($query_data);
		
		// ---- End ----
		
		// ----Search Member information ----
		$sel_member = "SELECT * FROM `member` WHERE id='".$seid."'";
		$query_member = mysql_query($sel_member);
		$result_member = mysql_fetch_array($query_member);
		$auth = $result_member["authority"];
		$res_country = $result_member["country"];
		// ---- End ----
		
		// ---- Check Member & Patient country name. ----
		$patient_country = $result["nationality"];
		$member_country = $result_member["country"];
		$sel_country = "SELECT * FROM country WHERE nationality='".$member_country."' AND natcode='".$patient_country."'";
		$query_country = mysql_query($sel_country);
		$result_country = mysql_fetch_array($query_country);
		// ---- End ----
		
		if(($result["nationality"] != "KH") && ($result["nationality"] != "VN") && ($result["nationality"] != "PH") && ($result["nationality"] != "CN") && ($result["nationality"] != "MM") && ($result["nationality"] != "IN") && ($result["nationality"] != "ID") && ($result["nationality"] != "PK") && ($result["nationality"] != "DM") && ($result["nationality"] != "TW")){
									$natcode = $result["nationality"];
								}else{
									$sel_natcode = "SELECT * FROM `country` WHERE natcode='".$result["nationality"]."'";
									$query_natcode= mysql_query($sel_natcode);	
									$natcodes = mysql_fetch_array($query_natcode);
									$natcode = $natcodes["nationality"];
								}
		
		if(($result["country"] != "KH") && ($result["country"] != "VN") && ($result["country"] != "PH") && ($result["country"] != "CN") && ($result["country"] != "MM") && ($result["country"] != "IN") && ($result["country"] != "ID") && ($result["country"] != "PK") && ($result["country"] != "DM") && ($result["country"] != "TW")){
									$countrycode = $result["country"];
								}else{
									$sel_natcode2 = "SELECT * FROM `country` WHERE natcode='".$result["country"]."'";
									$query_natcode2= mysql_query($sel_natcode2);
									$natcodes2 = mysql_fetch_array($query_natcode2);
									$countrycode = $natcodes2["nationality"];
								}
		
		
		$sel_auth = "SELECT `authority` FROM `member` WHERE id='".$seid."'";
		$query_auth = mysql_query($sel_auth);
		$result_auth = mysql_fetch_array($query_auth);
		
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<script language="javascript" type="text/javascript">
	<!--
		function checkPartner(){
			patient_id = document.myform.partner_value.value;
			location.href = "for-dep-part.php?patid="+patient_id;
		}
	//-->
</script>
</head>

<body topmargin="2">
<form name="myform" enctype="multipart/form-data" method="post" action="rec-edi-pat.php">
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
                      <td width="100%">
                      <? if($result_auth['authority']  == 'p'){ ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="images/label-21.gif" width="160" height="40"></font></td>
                              <td width="20%">
                              <a id="NCF_Partner" onClick="return checkPartner()" href="#"><img border="0" src="images/label-12.gif" width="160" height="40"></a></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patid."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
					  <?  } elseif ($result_auth['authority']  == 'c') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="images/label-21.gif" width="160" height="40"></font></td>
                              <td width="20%"></td>
                              <td width="20%">
                              <a id="NCF_Partner" onClick="return checkPartner()" href="#"><img border="0" src="images/label-13.gif" width="160" height="40"></a></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patid."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                        <?  } elseif ($result_auth['authority']  == 'n' || 'a') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="21%"><font size="3" face="Arial"><img border="0" src="images/label-21.gif" width="160" height="40"></font></td>
                              <td width="19%"></td>
                              <td width="21%"></td>
                              <td width="21%">
                              <a id="NCF_Partner" onClick="return checkPartner()" href="#"><img border="0" src="images/label-14.gif" width="160" height="40"></a></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patid."'> "; ?>
                              <td width="18%"></td>
                            </tr>
                          </table>
                        </div>
                        <? } ?>
                      </td>
                    </tr>
  <center>
  <tr>
                <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>
                      Patient&#39;s Infomation</b></i></font></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="top">
                      <p style="line-height: 200%"><font size="2">&nbsp; ID of 
                      the patient</font><font size="2" color="#666666">：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2">&nbsp;</font><?PHP echo $result["patientid"]; ?></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp; Name：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;First name - <?PHP echo $result["firstname"]; ?><br>                   
                      &nbsp;Last name - <?PHP echo $result["lastname"]; ?></font></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
                      &nbsp; Nationality：</font></td>  
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;</font><?PHP echo $natcode; ?></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;  
                      Sex：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;</font><?PHP echo $result["gendered"]; ?></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="11" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;  
                      Date of birth：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; <?PHP echo $result["birthday"]; ?> / <?PHP echo $result["birthmonth"]; ?> / <?PHP echo $result["birthyears"]; ?>　</font><font color="#666666" size="2" maxLength="2"> 
                      (dd/mm/yyyy)</font></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="20" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp; Contact details：</font></td>                 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <?PHP echo $result["address"]; ?><br> 
&nbsp;City - <?PHP echo $result["city"]; ?>　　　　　　　　　　　　　　　 State/Province - <?PHP echo $result["state"]; ?><br>
&nbsp;Zip/Postal code - <?PHP echo $result["zipcode"]; ?><br>
&nbsp;Country - <?PHP echo $countrycode; ?></font>
                      <p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br> 
&nbsp; Country Code - <?PHP echo $result["telcountry"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Area Code  
                      - <?PHP echo $result["telarea"]; ?><br> 
&nbsp;&nbsp; Tel - <?PHP echo $result["tel"]; ?>　　　　　　　　　　 Fax     
                      - <?PHP echo $result["fax"]; ?>　　　　　　　　　　 Mobile - <?PHP echo $result["mobile"]; ?></font></p>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;  
                      Note：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="left">
                      <?PHP echo $result["notes"]; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%">
                      <font size="2" color="#666666">&nbsp;&nbsp;Record of edition：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%">
                      <?PHP 
					  		// Show edit time.
							/*
							$i=2;
							$sel_pat = "SELECT * FROM `patrecord` WHERE patid='".$patid."'  ORDER BY `patid`";
							$query_pat = mysql_query($sel_pat);	
							//$patrecords = mysql_fetch_array($query_pat);
							//list($month, $day, $years) = split("-", $patrecords["datecode"]);
							
							while($results = mysql_fetch_array($query_pat)){
								list($month, $day, $years) = split("-", $results["datecode"]);
				   				echo "<font size='2' color='#666666'>&nbsp;ID of the editor：".$results["editorid"]." - ".$day." / ".$month." / ".$years."</font><font color='#666666' size='2' maxLength='2'> (dd/mm/yyyy) ".$results['addtime']."</font><font size='2' color='#666666'><br>";
							}
							*/
					  ?>
					</td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="4" colspan="2" valign="middle">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">
              <?PHP 
        			if ((!empty($result_country)) || ($auth == "a")) {
						if ($auth != "c"){
							echo "<input type='submit' value='EDIT' name='edit'>";
						} else {
							echo "<input type='hidden' value='EDIT' name='edit'>";
						}
					} else {
						echo "<input type='hidden' value='EDIT' name='edit'>";
					}
				?>
                </font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
        <input type="hidden" name="patids" value="<?PHP echo $result["patientid"]; ?>">
      </td>
    </tr>
  </table>
</div>
 </form>
</body>

</html>
<?PHP
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	
	/*
	               $i=2;
				   while($result = mysql_fetch_array($query_data)){
				   		$sel_natcode = "SELECT * FROM `country` WHERE natcode='".$result["nationality"]."'";
						$query_natcode= mysql_query($sel_natcode);	
						$natcode = mysql_fetch_array($query_natcode);
					  $i++;
                   }
	
	*/
?>