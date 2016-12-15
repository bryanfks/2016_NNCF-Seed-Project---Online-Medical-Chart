<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
		
		// -------------------- 處理 Client-ID ------------------------------
			$dates = getdate();
			$year = $dates['year'];
			$mon = $dates['mon'];
			
			if($mon < 10){ 
				$month = "0".$mon;
			}else{
				$month = $mon;
			}

			$datecode = $year.$month;							// datecode: Client's ID 日期碼

			//$sel_flownum = "SELECT MAX(flownum) FROM patient WHERE flownum='".$datecode."' GROUP BY datecode";
			/*
			$sel_flownum = "SELECT MAX(flownum) FROM patient";
			$query_flownum = mysql_query($sel_flownum);
			$result_flownum = mysql_fetch_array($query_flownum);
			$flowcode = $result_flownum['MAX(flownum)'];				// flownum: Client's ID 流水號
			
			if(empty($flowcode)){
				$flownum = 0001;
			}else{
				$flownum = $flowcode + 1;
			}
			*/
		// --------------------------  END  -------------------------------- 
		
		$sel_dr_country = "SELECT * FROM member WHERE id='".$seid."'";	
		$query_dr_country = mysql_query($sel_dr_country);
		$result_dr_country = mysql_fetch_array($query_dr_country);
		$dr_country = $result_dr_country["country"];
		$authority_code = $result_dr_country["authority"];	
		//echo $authority_code;
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>
	<!--
		function sendData(){
			firstname = document.myform.firstname.value;
			lastname = document.myform.lastname.value;
			nationality = document.myform.nationality.value;
		
			if(firstname == ""){
				alert("Please input \"First Name\".");
				return false;
			}
		
			if(lastname == ""){
				alert("Please input \"Last Name\".");
				return false;
			}
		
			if(nationality == ""){
				alert("Please select \"Nationality of birth\".");
				return false;
			}
		
			if((firstname != "") && (lastname != "") && (nationality != "")){
				document.myform.submit();	
			}
		}
		
		function Indata2_onchange(){
			//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
			if(document.myform.nationality.options.value == 'OTHER'){
				document.myform.nationalitys.disabled = false;
			}else{
				document.myform.nationalitys.disabled = true;
			}
		}
		function Indata3_onchange() {
			if(document.myform.country.options.value == 'OTHER'){
				document.myform.countrys.disabled = false;
			}else{
				document.myform.countrys.disabled = true;
			}
		}
		function openSubWin(){
			window.open("calendar_js.htm","Sub","width='200',hight='200'");
		}

	//-->
</SCRIPT>
</head>
<body topmargin="2">
<form name="myform" enctype="multipart/form-data" method="post" action="pat-add-save.php">
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
                      <td width="100%">
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="../images/label-21.gif" width="160" height="40"></font></td>
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
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>Add  
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
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      * Name：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;First name - <input type="text" name="firstname" size="20"><br>                  
                      &nbsp;Last name - <input type="text" name="lastname" size="20"></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
                      * Nationality：</font></td> 
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<select size="1" name="nationality" onChange="return Indata2_onchange()">
                      <?PHP
					 echo "Auth code: ";
					 	  if ($authority_code == "a") { 
						  	echo "<option value='' selected>Please select...</option>
									 <option value='KH'>Cambodia</option>
									 <option value='VN'>Vietnam</option>
									 <option value='PH'>Philippines</option>
									 <option value='CN'>China</option>
									 <option value='MM'>Myanmar</option>
									 <option value='IN'>India</option>
									 <option value='ID'>Indonesia</option>
									 <option value='PK'>Pakistan</option>
									 <option value='DM'>Dominican Republic</option>
									 <option value='TW'>Taiwan</option>";
                          } else if ($dr_country == "") { echo "<option value='' selected>Please select...</option>";
						  } else if ($dr_country == "Cambodia") { echo "<option value='KH'>Cambodia</option>";
						  } else if ($dr_country == "Vietnam") { echo "<option value='VN'>Vietnam</option>";
                          } else if ($dr_country == "Philippines") { echo "<option value='PH'>Philippines</option>";
                          } else if ($dr_country == "China") { echo "<option value='CN'>China</option>";
                          } else if ($dr_country == "Myanmar") { echo "<option value='MM'>Myanmar</option>";
                          } else if ($dr_country == "India") { echo "<option value='IN'>India</option>";
                          } else if ($dr_country == "Indonesia") { echo "<option value='ID'>Indonesia</option>";
                          } else if ($dr_country == "Pakistan") { echo "<option value='PK'>Pakistan</option>";
                          } else if ($dr_country == "Dominican Republic") { echo "<option value='DM'>Dominican Republic</option>";
                          } else if ($dr_country == "Taiwan") { echo "<option value='TW'>Taiwan</option>";
						  }
					  ?>
						</select><input type="hidden" size="20" name="nationalitys" value="" disabled></font>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; 
                      Sex：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="radio" value="Male" name="gendered">Male&nbsp; <input type="radio" value="Female" name="gendered">Female&nbsp; <input type="radio" value="OTHER" name="gendered">Unknown             
                        <input type="text" name="gendereds" size="8"></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="11" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; 
                      Date of birth：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2" maxLength="2">&nbsp; <input type="text" name="birthday" size="2" maxLength="2"> 
                      / <input type="text" name="birthmonth" size="2" maxlength="2"> / <input type="text" name="birthyears" size="4" maxLength="4"> 
                      (dd/mm/yyyy)</font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="20" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp; Contact details：</font></td>                
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <input type="text" name="address" size="70"><br>
&nbsp;City - <input type="text" name="city" size="25">&nbsp; State/Province - 
                      <input type="text" name="state" size="25"><br>
&nbsp;Zip/Postal code -   
                      <input type="text" name="zipcode" size="10"><br>
&nbsp;Country - <SELECT onChange="return Indata3_onchange()" size=1 name="country"> 
                          <OPTION value="" selected>Please select...</OPTION> 
                          <option value="KH">Cambodia</option>
                          <option value="VN">Vietnam</option>
                          <option value="PH">Philippines</option>
                          <option value="CN">China</option>
                          <option value="MM">Myanmar</option>
                          <option value="IN">India</option>
                          <option value="ID">Indonesia</option>
                          <option value="PK">Pakistan</option>
                          <option value="DM">Dominican Republic</option>
                          <OPTION value="TW">Taiwan</option>
                          </SELECT></font>
                          <p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br>
&nbsp; Country Code - <input type="text" name="telcountry" size="10">&nbsp; Area Code 
                      - <input type="text" name="telarea" size="10"><br>
&nbsp;&nbsp; Tel - <input type="text" name="tel" size="15">&nbsp; Fax    
                      - <input type="text" name="fax" size="15">&nbsp; Mobile - 
                      <input type="text" name="mobile" size="17"></font></p>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp; 
                      Note：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="15" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="center">
                      <font size="2" color="#666666">
                      <textarea rows="5" name="note" cols="64"></textarea></font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="4" colspan="2" valign="middle">
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
                Copyright © 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;         
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
	<input type="hidden" name="datecode" value="<?PHP echo $datecode; ?>">
	<input type="hidden" name="flownum" value="<?PHP echo $flownum; ?>">
    <input type="hidden" name="drid" value="<?PHP echo $seid; ?>">
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
?>