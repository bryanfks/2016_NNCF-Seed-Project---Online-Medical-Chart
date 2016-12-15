<?
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
	
		$patientid = $_POST["patids"];
		
		$sel_data = "SELECT * FROM `patient` WHERE patientid='".$patientid."'";
		$query_data = mysql_query($sel_data);
		$result = mysql_fetch_array($query_data);
		
		$get_time = getdate();
		$chgtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$datecode = $get_time['mon']."-".$get_time['mday']."-".$get_time['year'];
		
		$sel_natcode = "SELECT * FROM `country` WHERE natcode='".$result['nationality']."'";
		$query_natcode= mysql_query($sel_natcode);	
		$natcode = mysql_fetch_array($query_natcode);
	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<Script language="JavaScript">
			<!--
   				function inputText(){
					document.myform.firstname.value = "<? echo $result['firstname']; ?>";
					document.myform.lastname.value = "<? echo $result['lastname']; ?>";
			        document.myform.day.value = "<? echo $result['birthday']; ?>";
					document.myform.month.value = "<? echo $result['birthmonth']; ?>";
					document.myform.years.value = "<? echo $result['birthyears']; ?>";
					document.myform.address.value = "<? echo $result['address']; ?>";
					document.myform.city.value = "<? echo $result['city']; ?>";
					document.myform.state.value = "<? echo $result['state']; ?>";
					document.myform.zipcode.value = "<? echo $result['zipcode']; ?>";
					document.myform.telcountry.value = "<? echo $result['telcountry']; ?>";
					document.myform.telarea.value = "<? echo $result['telarea']; ?>";
					document.myform.tel.value = "<? echo $result['tel']; ?>";
					document.myform.fax.value = "<? echo $result['fax']; ?>";
					document.myform.mobile.value = "<? echo $result['mobile']; ?>";
					var country = "<? echo $result['country']; ?>";
					if((country != "KH") && (country != "CN") && (country != "DM") && (country != "IN") && (country != "ID") && (country != "MM") && (country != "PH") && (country != "PK") && (country != "TW") && (country != "VN") ){
						document.myform.countrys.value = "<? echo $result['country']; ?>";
					} else {
						document.myform.countrys.value = "";
					}
				}
				
			function sendData(){
			firstname = document.myform.firstname.value;
			lastname = document.myform.lastname.value;
			
				if(firstname == ""){
					alert("Please input \"First Name\".");
					return false;
				}
		
				if(lastname == ""){
					alert("Please input \"Last Name\".");
					return false;
				}
			
				if((firstname != "") && (lastname != "")){
					document.myform.submit();	
				}
			}
			
			function Indata2_onchange() {
				//if(document.myform.country.options.value == 'OTHER'){
				if(document.myform.country.options.value == "OTHER"){
					document.myform.countrys.disabled = false;
				}else{
					document.myform.countrys.disabled = true;
				}
			}
			
			function Indata3_onchange() {
				//if(document.myform.hospital.options.value == 'OTHER'){
				if(document.myform.hospital.options.value == "OTHER"){
					document.myform.hospitals.disabled = false;
				}else{
					document.myform.hospitals.disabled = true;
				}
			}
			//-->
		</Script>
</head>

<body topmargin="2" onLoad="inputText()">
<form name="myform" enctype="multipart/form-data" method="post" action="rec-edi-pat-save.php">
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
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="images/label-21.gif" width="160" height="40"></font></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
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
                      Edit   
                      Patient</b></i></font></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left"><font color="#666666" size="2">　　　※</font><font face="Arial" color="#666666" size="2">Items 
                marked with an asterisk * are required.</font></td>
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
                      * Name：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;First name - <input type="text" name="firstname" size="20" value=""><br>                   
                      &nbsp;Last name - <input type="text" name="lastname" size="20" value=""></font></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
                      * Nationality：</font></td>  
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;</font><?PHP echo $natcode['nationality']; ?>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;  
                      Sex：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="radio" value="Male" name="gendered"<? if($result["gendered"] == "Male"){ echo "CHECKED"; }?>>Male&nbsp; <input type="radio" value="Female" name="gendered" <? if($result["gendered"] == "Female"){ echo "CHECKED"; }?>>Female&nbsp; <input type="radio" value="OTHER" name="gendered"<? if(($result["gendered"] != "Male") && ($result["gendered"] != "Female") && ($result["gendered"] != "Male" || "Female")){ echo "CHECKED"; }?>>Unknown              
                        <input type="text" name="gendereds" size="8" value='<? if(($result["gendered"] != "Male") && ($result["gendered"] != "Female")){ echo $result["gendered"]; }?>'></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="11" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;  
                      Date of birth：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; <input type="text" name="day" size="2" maxlength="2" value="">  
                      / <input type="text" name="month" size="2" maxlength="2" value=""> / <input type="text" name="years" size="4" maxlength="4" value="">  
                      (dd/mm/yyyy)</font></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="20" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp; Contact details：</font></td>                 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <input type="text" name="address" size="70" value=""><br> 
&nbsp;City - <input type="text" name="city" size="25" value="">&nbsp; State/Province -  
                      <input type="text" name="state" size="25" value=""><br>
&nbsp;Zip/Postal code -    
                      <input type="text" name="zipcode" size="10" value=""><br>
&nbsp;Country - <SELECT onChange="return Indata2_onchange()" size=1 name="country" onLoad="return Indata2_onchange()"> 
                          <option value="" <? if($result["country"] == ""){ echo "SELECTED"; }?>>Please select...</option>
                          <option value="KH" <? if($result["country"] == "KH"){ echo "SELECTED"; }?>>Cambodia</option>
                          <option value="VN" <? if($result["country"] == "VN"){ echo "SELECTED"; }?>>Vietnam</option>
                          <option value="PH" <? if($result["country"] == "PH"){ echo "SELECTED"; }?>>Philippines</option>
                          <option value="CN" <? if($result["country"] == "CN"){ echo "SELECTED"; }?>>China</option>
                          <option value="MM" <? if($result["country"] == "MM"){ echo "SELECTED"; }?>>Myanmar</option>
                          <option value="IN" <? if($result["country"] == "IN"){ echo "SELECTED"; }?>>India</option>
                          <option value="ID" <? if($result["country"] == "ID"){ echo "SELECTED"; }?>>Indonesia</option>
                          <option value="PK" <? if($result["country"] == "PK"){ echo "SELECTED"; }?>>Pakistan</option>
                          <option value="DM" <? if($result["country"] == "DM"){ echo "SELECTED"; }?>>Dominican Republic</option>
                          <OPTION value="TW" <? if($result["country"] == "TW"){ echo "SELECTED"; }?>>Taiwan</option>
                          <!-- <option value="OTHER" <? /* if(($result["country"] != "KH") && ($result["country"] != "VN") && ($result["country"] != "PH") && ($result["country"] != "CN") && ($result["country"] != "MM") && ($result["country"] != "IN") && ($result["country"] != "ID") && ($result["country"] != "PK") && ($result["country"] != "DM") && ($result["country"] != "TW") && ($result["country"] == "OTHER")){ echo "SELECTED"; }  */?>>Other</option> -->
                          </SELECT> <!-- <INPUT disabled maxLength=256 size=40  name="countrys" value=""> -->
                          </font><p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br> 
&nbsp; Country Code - <input type="text" name="telcountry" size="10" value="">&nbsp; Area Code  
                      - <input type="text" name="telarea" size="10" value=""><br> 
&nbsp;&nbsp; Tel - <input type="text" name="tel" size="15" value="">&nbsp; Fax     
                      - <input type="text" name="fax" size="15" value="">&nbsp; Mobile -  
                      <input type="text" name="mobile" size="17" value=""></font></p>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;  
                      Note：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="center">
                      <font size="2" color="#666666">
                      <textarea rows="5" name="note" cols="64"><?PHP echo $result["notes"]; ?></textarea></font></td>
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
              <input type="button" value="SAVE" name="save" onClick="sendData()"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
        	<input type="hidden" name="num" value="<?PHP echo $result['num']; ?>">
            <input type="hidden" name="patientid" value="<?PHP echo $result["patientid"]; ?>">
            <input type="hidden" name="patid" value="<?PHP echo $result["patientid"]; ?>">
			<input type="hidden" name="adminid" value="<?PHP echo $seid; ?>">
            <input type="hidden" name="countrys_back" value="<?PHP echo $result['countrys']; ?>">
            <input type="hidden" name="nationality" value="<?PHP echo $natcode['nationality']; ?>">
            
        </form>
      </td>
    </tr>
  </table>
</div>

</body>

</html>
<?PHP
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>