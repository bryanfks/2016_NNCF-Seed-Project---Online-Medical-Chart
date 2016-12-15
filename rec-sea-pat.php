<?PHP
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		
		
		//$seid = $_SESSION['seid'];
		$drid = $seid;														
		$sel_auth = "SELECT * FROM member WHERE id='".$seid."'";			
		$query = mysql_query($sel_auth);
		$result = mysql_fetch_array($query);
		$specialty = $result['specialty'];										
		
		/*
		$sel_auth_code = "SELECT * FROM auth WHERE occupation='".$auth."'";	
		$query_code = mysql_query($sel_auth_code);
		$result_code = mysql_fetch_array($query_code);
		*/
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<Script language="JavaScript">
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
                            	<td width="20%"></td>
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
                      <p align="center"><i>
                      <font face="Arial" color="#FFFFFF" size="3"><b>Search     
                      Patient</b></font></i></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left"><font color="#666666" size="2">　</font></td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="1" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="1" valign="middle">
                      <form method="POST" action="--WEBBOT-SELF--">
                      <p style="line-height: 30%" align="center">&nbsp;</p>
                        <p style="line-height: 200%"  align="center">
                        	<select size="1" name="D1" onChange="location = this.options[this.selectedIndex].value;">
                        		<option selected value="Please select...">Please select...</option>
                        		<!-- <option value='rec-sea-pat-id.php'>ID of the patient：</option> //-->
                        		<!-- <option value="rec-sea-pat-name.php">Name of the patient：</option> //-->
                        		<option value="rec-sea-pat-nat.php">Nationality of the patient：</option>
                        		<!-- <option value='rec-sea-pat-editor.php'>ID of the editor：</option> //-->
                        	</select>
                        </p>
                        <p style="line-height: 30%" align="center">&nbsp;</p>
                      </form>
                    </td>              
                    <td width="67%" style="border-top: 1 solid #C0C0C0" height="1" bgcolor="#F7E3AD">
                    </td>   
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="4" colspan="2">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </tr>
                  </table>
                </center>
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
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
        
        
        
        <div align="center">
  <center>
  

        
        
        
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