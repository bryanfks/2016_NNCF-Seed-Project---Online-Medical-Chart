<?
	session_cache_limiter("none");
	session_start();
	

	include 'db.php';  
	
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
		
		
		$seid = $_SESSION['seid'];
		$drid = $seid;														// drid: 開案醫師代號
		$sel_auth = "SELECT * FROM member WHERE id='".$seid."'";			//取得醫師的 ID
		$query = mysql_query($sel_auth);
		
		$result = mysql_fetch_array($query);
		
		$auth = $result['authority'];										//取得職業類別(權限設定);目前取得的是職別全名
			
		
		$sel_auth_code = "SELECT * FROM auth WHERE occupation='".$auth."'";	//將職別代碼轉出國內或國外的代碼 f/t
		$query_code = mysql_query($sel_auth_code);
		
		$result_code = mysql_fetch_array($query_code);
		
		//if($result_code['code'] == "f"){
			
		
?>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<Script language="JavaScript">
			
	<!--
				
		function Indata2_onchange() {
			if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
				document.myform.nationalitys.disabled = false;
					}else{
				document.myform.nationalitys.disabled = true;
			}
		}
	//-->

</Script>

</head>

<body topmargin="2" bgcolor="#F2FBFB" style="font-family: Arial; font-size: 12pt">
<form name="myform" enctype="multipart/form-data" method="post" action="pat-sea-end.php">
<div align="center">
  <center>
  <table border="1" cellpadding="0" cellspacing="0" width="760" background="images/logo1.jpg" height="100%" bordercolor="#CCCCCC">
    <tr>
      <td width="100%" valign="top">
                        </center>
      <div align="center">
        <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="#C0C0C0">
          <tr>
            <td width="100%" align="center" background="images/main1.jpg">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="33%" valign="middle" height="107">
                    <font size="3">　<img border="0" src="images/logo2.gif" align="bottom" width="85" height="90"></font></td>
                    <td width="20%" valign="middle" height="107">
                      　
                    <p>　</p>
                    <p><font color="#666666" size="3">【 </font><font color="#666666" size="3">                
                      Hi ! <?PHP echo $seid; ?> </font><font color="#666666" size="3"> 】</font> </td>                               
                    <td width="47%" valign="top" height="107">
                      <p><font size="3"><font color="#FF9966">　　　　　　　　</font><font color="#FF9966">Amount of online user：</font><font color="#008080">&lt;num&gt;</font></font></p>                     
                      <p><b><font size="3"><font color="#FF9966">
                      Real-time message</font><font color="#FF9966">：                      
                      </font></font></b><font size="3"><font color="#FF9966"><br>                     
                      </font><font color="#008080">　　</font><font color="#008080">&lt;                                    
                      message&gt;</font></font></p>  
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#C0C0C0">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select1" onChange="javascript:location.href=this.options.value">
                        <option selected>Record Management</option>
                        <option value="pat-sea-pat.php">Search Patient</option>
                        <option value="pat-add-pat.php">Add Patient</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select2" onChange="javascript:location.href=this.options.value">
                        <option selected>Other Function</option>
                        <option value="oth-acc-inf.php">Personal Info Edit</option>
                        <option value="">Forum Of Discussion</option>
                        <option value="oth-all.php">Allowances Function</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select3" onChange="javascript:location.href=this.options.value">
                        <option selected>Report Management</option>
                        <option>Print Patient Data</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select4" onChange="javascript:location.href=this.options.value">
                        <option selected>System Management</option>
                        <option value="sys-add-acc.php">Add Account</option>
                        <option value="">Maintain Account</option>
                        <option value="">Delete Account</option>
                        <option value="">Set Real-time Message</option>
                        <option value="">Assign E-mail</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><input type="button" value="LOGOUT" name="logout" onclick="javascript:location.href='logout.php'"></font></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center">
              <hr size="1" color="#999999">
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" valign="bottom">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center" valign="bottom"><font size="3" face="Arial"><img border="0" src="images/main2-21.gif" width="160" height="40"></font></td>
                    <td width="20%" align="center" valign="bottom"><a href="for-key.php"><font size="3" face="Arial"><img border="0" src="images/main2-12.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom"><a href="med-sup.php"><font size="3" face="Arial"><img border="0" src="images/main2-13.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom"><a href="fin-ass.php"><font size="3" face="Arial"><img border="0" src="images/main2-14.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom">　</td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              　
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font size="4" face="Arial" color="#FFFFFF"><i>
                      Search patient</i></font></td>      
                  </tr>
                </table>
              </div>
              <p></td>
          </tr>
        </center>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="86" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;    
                      Client's ID of the patient</font><font color="#666666" size="3">：</font></td>         
                    <td width="67%" style="border-top: 1px solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font color="#666666" size="3">      
                      <input type="text" name="clientid" size="20"></font></td>
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="25" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;    
                      </font><font color="#666666" size="3" face="Arial">Name</font><font color="#666666" size="3"> 
                      of the patient：</font></td>        
                    <td width="67%" style="border-top: 1px solid #C0C0C0" height="25">
                      <p style="line-height: 200%">
                        <font color="#666666" size="3">First name</font><font color="#666666" size="3">－ <input type="text" name="firstname" size="20"><br>           
                        </font><font color="#666666" size="3">       
                      Last name</font><font color="#666666" size="3">－ <input type="text" name="lastname" size="20"></font></td>    
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="3">&nbsp;    
                      </font><font face="Arial" color="#666666" size="3">Nationality of    
                      the patient birth</font><font color="#666666" size="3">：</font></td>   
                    <td width="67%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font size="3" color="#666666"><select size="1" name="nationality" onchange="return Indata2_onchange()">
                          <option value="" Selected>Please select...</option>
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
                        </select><input type="text" name="nationalitys" size="22" value="" disabled></td>
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="3">&nbsp;  
                      Client's ID of the doctor<br> 
                      &nbsp; create the information：</font></td>  
                    <td width="67%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><input type="text" name="drid" size="22"></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="1" colspan="2">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="3">
              <input type="submit" value="SEARCH" name="searchs"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　</td>
          </tr>
        </table>
      </div>
      <p align="center" style="line-height: 150%"><i><font color="#999999" face="Arial" size="3">The&nbsp; Web&nbsp; Best&nbsp;                                     
      Browse&nbsp; Mode </font><font size="3" color="#999999"> ： </font><font color="#999999" face="Arial" size="3"> Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;                                     
      /&nbsp; 800 x 600&nbsp; Resolution<br>                                    
      Copyright &copy; 2005~2006&nbsp; <a href="http://www.nncf.org/" target="_blank">Noordhoff&nbsp;                                     
      Craniofacial&nbsp; Foundation</a></font></i></p>                                   
      </td>
    </tr>
  </table>
</div>

</body>

</html>
<?
		/*
		}else{
			
			echo "<Script Language='JavaScript'>";
			
			echo "alert('Sorry, Access denied.');";
			
			echo " location.href='main.php';";
			
			echo " </Script>";
		
		}
		*/
	}else{
		
	
		echo "<Script Language='JavaScript'>";
		
	
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		
	
		echo " location.href='login.php';";
		
	
		echo " </Script>";
	
	}

?>