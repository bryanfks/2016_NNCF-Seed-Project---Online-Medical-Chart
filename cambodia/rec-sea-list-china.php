<?
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){
		$chinaDrID = $seid;
		
		$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE patientID ='".$seid."' ORDER BY `NCFID` DESC";
		$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		$rows = mysql_num_rows($queryChinaPatientinfo);
		//echo $rows;
		
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--

		function fetch_Data(num){
			//alert("for-pla-add-china-cgmh-view.php?cpi="+num);
			location.href = "for-pla-add-china-cgmh-view.php?cpi="+num;
		}
	
	//-->
</SCRIPT>
</head>

<body topmargin="2">
<form name="myForm" enctype="multipart/form-data" method="get" >
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/china/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/china/select.php"); ?></font></td>
            </tr>
  
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
        
                <p style="line-height: 200%" align="left"><font color="#666666" size="2">　</font></td>
          </tr>
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
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">病历号码</td>  
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">接案日期</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">个案姓名</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">医师代号</td>
                  			<td width="17%" align="center" valign="middle">　</td>
                  </tr>
                   <?PHP
				   	$i = 1;
					while($resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo)){
						echo "<tr>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFID"]."</td>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["caseYear"].$resultChinaPatientinfo["caseMonth"].$resultChinaPatientinfo["caseDay"]."</td>";
        		    	echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["name"]."</td>";
					    echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["patientID"]."</td>";
						$values = $resultChinaPatientinfo['num'];
						echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='fetch_Data(".$values.")'></font></td>";
						echo "</tr>";
						//echo $i."<br/>";
					    $i++;
					}
	              ?>
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
		echo "<html>";
		echo "<head>";
		echo "<Script Language='JavaScript'>";
		echo "<!--";
		echo "\n alert('Sorry, Access denied. Please Login first.');";
		echo "\n";
		echo " location.href='login.php';\n";
		echo "//-->";
		echo " </Script>";
		echo "</head>";
		echo "</html>";
	}
?>