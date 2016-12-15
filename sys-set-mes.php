<?PHP 
	
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		/*
		First step: Got old message than show it on the browser.
		Second step: waiting user change message than save new message
		*/
		
		$sel_msg_num = "SELECT * FROM message";
		$query_num = mysql_query($sel_msg_num);
		$result_num = mysql_fetch_array($query_num);
		$r_num = $result_num["msg1"];
	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<Script language="JavaScript">
	<!--
				function input_text(){
					document.myform.msg.value = "<?  echo $r_num; ?>";
				}
				function a(){
					msge = document.myform.msg.value;
					if(msge == ""){
						alert("Please enter Message.");
						return false;
					}else{
						document.myform.submit();
					}
				}
	//-->
</Script>
</head>

<body topmargin="2" onLoad="input_text()">
<form name="myform" enctype="multipart/form-data" method="post" action="sys-set-mes-save.php">
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <p align="right"><font size="2"><img border="0" src="images/laebl-25.gif" width="160" height="40"></font></td>
                    </tr>
  <center>
  <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Set  
                      Real-time message</font></b></i></td>         
                  </tr>
                </table>
              </div>
              <p></td>
          </tr>
        </center>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19" align="center">
                      <p align="left"><font size="3">※</font><font size="3" face="Arial">150</font><font size="3"> 
                      character maximum</font></p>
                <center>
                        <p><font size="3"><textarea rows="3" name="msg" cols="50" value=""></textarea></font></p>
                        <p><font size="3"><input type="button" value="SAVE" name="save" onClick="a()"></font></p>
                    </td>
                  </tr>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
	
}


?>
