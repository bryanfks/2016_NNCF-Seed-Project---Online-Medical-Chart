<?
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){
		
		$srhType = $_POST["srhType"];
		$srhValue = $_POST["srhValue"];
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
			//location.href = "for-pla-add-china-cgmh-view.php?cpi="+num;
			location.href = "pakistanCheck.php?cpi="+num;
		}
		function addData(){
			//alert("for-pla-add-china-cgmh-view.php?cpi="+num);
			location.href = "for-pla-add-PK-cgmh.php";
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/select.php"); ?></font></td>
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
        
          <font color="#666666" size="2">　</font></td>
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
                              <p style="line-height: 150%">Subsidy Number(NCF)</td>  
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">NCF Number</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Name</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Hospital</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Patient Record Number(Hospital) </td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Status</td>
                  			<td width="17%" align="center" valign="middle">　</td>
                  </tr>
                  <?PHP
				   
					$selChinapatientrecordinfo = "SELECT * FROM `PKpatientrecord` ORDER BY `NCFMedicalNum` DESC";
					$queryChinapatientrecordinfo = mysql_query($selChinapatientrecordinfo);
					
				   	$i = 1;
					while($resultChinapatientrecordinfo = mysql_fetch_array($queryChinapatientrecordinfo)){
						$selChinaPatientinfo = "SELECT * FROM `PKpatient2` WHERE `NCFMedicalNum`='".$resultChinapatientrecordinfo['NCFMedicalNum']."'";
						$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
						$resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo);
						//echo $selChinaPatientinfo."<br/>";
						
						
						$remarks = $resultChinaPatientinfo["remark"];
						if($remarks == "0" || $remarks == 0){
							$remark2 = "Waiting for Approval";
						}else if($remarks == "1" || $remarks == 1){
							$remark2 = "Incomplete";
						}else if($remarks == "2" || $remarks == 2){
							$remark2 = "Complete";
						}
						echo "<tr>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinapatientrecordinfo["NCFMedicalNum"]."</td>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinapatientrecordinfo["NCFID"]."</td>";
        		    	echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["name"]."</td>";
					    echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["school"]."</td>";
						echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["MedicalRecordNumber"]."</td>";
						echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
						
						//Complete
	 					$values = $resultChinapatientrecordinfo['num'];
						
						echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='Enter' name='search' onClick='fetch_Data(".$values.")'></font></td>";
						echo "</tr>";
						//echo $i."<br/>";
					    $i++;
					}
	              ?>
                </table>
                </center>
              </div>
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
<input type="hidden" name="srhType" value="$srhType">
<input type="hidden" name="srhValue" value="$srhValue">

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
