<?
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		
		$seid = $_SESSION['seid'];
		$drid = $seid;														
		$sel_auth = "SELECT * FROM member WHERE id='".$seid."'";			
		$query = mysql_query($sel_auth);
		$result = mysql_fetch_array($query);
		$auth = $result['authority'];										
		
		$sel_auth_code = "SELECT * FROM auth WHERE occupation='".$auth."'";	
		$query_code = mysql_query($sel_auth_code);
		$result_code = mysql_fetch_array($query_code);
		
		//if($result_code['code'] == "f"){
			
		
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
	<meta name="ProgId" content="FrontPage.Editor.Document">
	<title>NCF -- Patient Record Online Management System</title>
	<Script language="JavaScript">
		<!--
			function sendData(){
				clientid = document.myform.clientid.value;
				firstname = document.myform.firstname.value;
				lastname = document.myform.lastname.value;
				nationality = document.myform.nationality.value;
				drid = document.myform.nationality.value;
			
				
					document.myform.submit();  
				
			} 
			
			function Indata2_onchange(){
				if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'Other'){
					document.myform.nationalitys.disabled = false;
				}else{
					document.myform.nationalitys.disabled = true;
				}
			}	
		//-->
	</Script>
</head>

<body topmargin="2">
<form name="myform" enctype="multipart/form-data" method="post" action="rec-sea-end.php">
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
              <font size="2"></font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i>
                      <font face="Arial" color="#FFFFFF" size="3"><b>Search    
                      Patient</b></font></i></td>   
                  </tr>
                </table>
              </div>
        </center>
                <p style="line-height: 200%" align="left"><font color="#666666" size="2"></font></td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;    
                      ID of the patient:</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">      
                      <input type="text" name="clientid" size="20"></font></td>   
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="25" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;    
                      Name     
                      of the patient:</font></td>            
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">First name-<input type="text" name="firstname" size="20"><br>               
                      Last name-<input type="text" name="lastname" size="20"></font></td>                  
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;    
                      Nationality of        
                      the patient birth:</font></td>       
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font size="2"><font color="#666666"><select size="1" name="nationality" onchange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                        </font>
                        <font size="3" color="#666666">
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
                        </font>
                        </select><input type="text" size="20" name="nationalitys" value="" disabled></font></td>
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp; 
                      ID of the doctor first creation:</font></td>    
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2"><input type="text" name="drid" size="22"></font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="4" colspan="2">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">
             <input type="button" value="SEARCH" name="search" onClick="return sendData()"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">:        
                </font><font face="Arial"><font color="#999999">Internet&nbsp;           
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;           
                Resolution<br>
                Copyright c 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;           
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
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>