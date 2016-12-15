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

			$sel_flownum = "SELECT MAX(flownum) FROM patient WHERE datecode='".$datecode."' GROUP BY datecode";
			$query_flownum = mysql_query($sel_flownum);
			$result_flownum = mysql_fetch_array($query_flownum);
			$flowcode = $result_flownum['MAX(flownum)'];				// flownum: Client's ID 流水號
			
			if(empty($flowcode)){
				$flownum = 0001;
			}else{
				$flownum = $flowcode + 1;
			}
		// --------------------------  END  -------------------------------- 
		
			
		
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
			if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
				document.myform.nationalitys.disabled = false;
			}else{
				document.myform.nationalitys.disabled = true;
			}
		}
	
		function openSubWin(){
			window.open("calendar_js.htm","Sub","width='200',hight='200'");
		}

	//-->
</SCRIPT>
</head>
<body topmargin="2">
<form name="myform" enctype="multipart/form-data" method="post" action="pat-add-save_2008.php">
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
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="../old/images/label-21.gif" width="160" height="40"></font></td>
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
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<select size="1" name="nationality" onLoad="return Indata2_onchange()" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                          <option value="CAM">Cambodia</option>
                          <option value="VIE">Vietnam</option>
                          <option value="PHI">Philippines</option>
                          <option value="CHI">China</option>
                          <option value="MYA">Myanmar</option>
                          <option value="IND">India</option>
                          <option value="INS">Indonesia</option>
                          <option value="PAK">Pakistan</option>
                          <option value="DOM">Dominican Republic</option>
                          <option value="OTHER">Other</option>
                        </select><input type="text" size="20" name="nationalitys" value="" disabled></font>   
                    </td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; 
                      Sex：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="radio" value="male" name="gendered">Male&nbsp; <input type="radio" value="female" name="gendered">Female&nbsp; <input type="radio" value="OTHER" name="gendered">Unknown             
                        <input type="text" name="gendereds" size="8"></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="11" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; 
                      Date of birth：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; <input type="text" name="birthday" size="2"> 
                      / <input type="text" name="birthmonth" size="2"> / <input type="text" name="birthyears" size="4"> 
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
&nbsp;Country - <SELECT onchange="return Indata2_onchange()" size=1 name="country" onLoad="return Indata2_onchange()"> 
                          <OPTION value="" selected>Please select...</OPTION> 
                          <OPTION value="CAM">Cambodia</OPTION> 
                          <OPTION value="CHI">China</OPTION> 
                          <OPTION value="DOM">Dominican Republic</OPTION> 
                          <OPTION value="IND">India</OPTION> 
                          <OPTION value="INS">Indonesia</OPTION> 
                          <OPTION value="MYA">Myanmar</OPTION> 
                          <OPTION value="PHI">Philippines</OPTION> 
                          <OPTION value="PAK">Pakistan</OPTION> 
                          <OPTION value="TAI">Taiwan</option>
                          <OPTION value="VIE">Vietnam</OPTION> 
                          <OPTION value="OTHER">Other</OPTION></SELECT> 
                          <INPUT disabled maxLength="256" size="40" name="countrycontent"></font>
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
	<input type="hidden" name="drid" value="<?PHP echo $drid; ?>">
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