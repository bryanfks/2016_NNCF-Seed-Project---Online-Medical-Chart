<?PHP 
	
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$id = $seid;														
		$sel_data = "SELECT * FROM `patient` ORDER BY `patientid` DESC";				
		$query = mysql_query($sel_data);	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function fetch_Data(num){
			if(confirm('Delete Patient?')){
				if(num/2 != 0){			
					nums = num*2;
				}else{
					nums = num;
				}
				result = document.myForm.elements[nums].value;
				location.href = "sys-del-pat-del.php?id="+result;
			}
		}
	// -->
</SCRIPT>
</head>

<body topmargin="2">
<form name="myForm">
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
                        <p align="right"><font size="2"><img border="0" src="images/laebl-25.gif" width="160" height="40"></font></td>
                    </tr>
  <center>
  <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">�@</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Delete 
                      Patient</font></b></i></td>        
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                </table>
                </center>
              </div>
              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">ID</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">First  
                              name</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Last  
                              name</font></td>
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%"><font size="3">�@</font></p>
                            </td>
                  </tr>
                  <tr>
                  	<?PHP
                  		$i=2;
                  		while($result	=	mysql_fetch_array($query)){
                        	echo "<tr>";
	                        //echo "<input id='patient_flow_num' type='hidden' name='".$i."' value='".$result["num"]."'>";
							echo "<input type='hidden' name='".$i."' value='".$result["patientid"]."'>";
	                       // echo "<input id='patient_flow_num' type='hidden' name='".$result["patientid"]."' value='".$result["patientid"]."'>";
		                    echo "<td width='20%' align='center' valign='middle' >".$result["patientid"]."</td>";
    		                echo "<td width='20%' align='center' valign='middle'>".$result["firstname"]."</td>";
            		        echo "<td width='20%' align='center' valign='middle'>".$result["lastname"]."</td>";
                		    //echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='button' value='DELETE' name='maintain' onClick='fetch_Data(".$i.")'></font></td>";
                		    echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='button' value='DELETE' name='maintain' onClick='fetch_Data(".$i.")'></font></td>";
	                		echo "</tr>";
	                		$i++;
	                	}
	              	/*
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%">�@</p>
                    </td>
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%">�@</p>
                    </td>
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%">�@</p>
                    </td>
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%"><font size="3"><input type="submit" value="DELETE" name="B1"></font></p>
                    </td>
                    */
                    ?>
                  </tr>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              �@</td>
  </tr>
                    </table>
                  </div>
                </td>
            </tr>
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;           
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">�G           
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