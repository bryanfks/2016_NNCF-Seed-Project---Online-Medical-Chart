<?
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function Indata2_onchange() {
				//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
				// onLoad="return Indata2_onchange()"
				if(document.myform.nationality.options.value == 'OTHER'){
					document.myform.nationalitys.disabled = false;
				}else{
					document.myform.nationalitys.disabled = true;
				}
		}
			
		
		function openSubWin(){
			window.open("calendar_js.htm","Sub");
		}
	// -->
</SCRIPT>
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
                      <!--webbot bot="SaveResults" u-file="fpweb:///_private/form_results.csv" s-format="TEXT/CSV" s-label-fields="TRUE" -->
                     	<p style="line-height: 200%" align="center">Nationality of the patient：</p>
					</td>              
					<td width="80%" style="border-top: 1 solid #C0C0C0" height="1" bgcolor="#F7E3AD">
						<p style="line-height: 200%">
							<font color="#666666" size="2">&nbsp;</font>
								<font size="2" color="#666666">
									<font size="2" color="#666666">
										<select size="1" name="nationality" onload="return Indata2_onchange()" onChange="return Indata2_onchange()">
											<option value="" selected>Please select...</option>
											<option value="KH">Cambodia</option>
											<option value="VN">Vietnam</option>
											<option value="PH">Philippines</option>
                        <option value="CN">China</option>
                        <option value="MM">Myanmar</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="PK">Pakistan</option>
                        <option value="DM">Dominican Republic</option>
                        <option value="TW">Taiwan</option>
                      </select>
    	</font>
    	<input type="hidden" size="20" name="nationalitys" value="" disabled>
    	<br>
 	</font>
                      </tr>
  </td>   
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
              <input type="submit" value="SEARCH" name="search"></font>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
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
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>