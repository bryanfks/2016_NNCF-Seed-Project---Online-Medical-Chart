<?
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){
		
		$srhValue = $_POST["srhValue"];
		if((!empty($srhValue))){
			$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE `name` LIKE '".$srhValue."' OR `idno` LIKE '".$srhValue."' OR `MedicalRecordNumber` LIKE '".$srhValue."'"; 
			//屬廣泛搜尋法 ％：表示分配字元
			@$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
			@$rows = mysql_num_rows($queryChinaPatientinfo);
		}
		/*
		$srhType = $_POST["srhType"];
		if(($srhType == "chkID") && (!empty($srhValue))){
			$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE idno ='".$srhValue."' ORDER BY `idno` DESC";
		}else if(($srhType == "chkNAME") && (!empty($srhValue))){
			$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE name ='".$srhValue."' ORDER BY `name` DESC";
		}else if(($srhType == "chkPATNO") && (!empty($srhValue))){
			$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE MedicalRecordNumber ='".$srhValue."' ORDER BY `MedicalRecordNumber` DESC";
		}else{
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			//echo "\n alert('查无符合资料！请按下“新增”直接新增补助申请表或是按下“取消”重新查询');";
			echo "\n";
			echo " location.href='search_msg.php';\n";
			//echo " location.href='for-pla-add-china-search.php';\n";
			echo "//-->";
			echo " </Script>";
		}
		*/
	
		if(empty($rows)){
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			//echo "\n alert('查无符合资料！请按下“新增”直接新增补助申请表或是按下“取消”重新查询。');";
			//echo "\n alert('No data! Please press \"Add\" to create a new application or \"Cancel\" to restart the process.');";
			echo "\n";
			echo " location.href='search_msg.php';\n";
			echo "//-->";
			echo " </Script>";
			echo "</head>";
			echo "</html>";
		}
	
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
			location.href = "for-pla-add-china-cgmh_new.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>";
		}
		function addData(){
			location.href = "for-pla-add-china-cgmh.php";
		}
		function turnback(){
			//alert("for-pla-add-china-cgmh-view.php?cpi="+num);
			location.href = "for-pla-add-china-cgmh.php";
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/cambodia/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/cambodia/select.php"); ?></font></td>
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
                        	<p style="line-height: 150%">NCF Number</td>  
						<td width="16%" align="center" height="19" valign="middle">
                        	<p style="line-height: 150%">ID Number</td>
						<td width="17%" align="center" height="19" valign="middle">
                        	<p style="line-height: 150%">Name</td>
						<td width="17%" align="center" height="19" valign="middle">
                        	<p style="line-height: 150%">Hospital</td>
						<td width="17%" align="center" height="19" valign="middle">
							<p style="line-height: 150%">Patient Record Number(Hospital)</td>
						<td width="17%" align="center" valign="middle">　</td>
                  </tr>
                   <?PHP
				   	$i = 1;
					while($resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo)){
						echo "<tr>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFID"]."</td>";
						echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["idno"]."</td>";
        		    	echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["name"]."</td>";
					    echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["school"]."</td>";
						echo "<td width='17%' align='center' valign='middle'>".$resultChinaPatientinfo["MedicalRecordNumber"]."</td>";
						$values = $resultChinaPatientinfo['num'];
						//echo "Value: ".$values;
						echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='Apply for Surgery & &#010;Traffic Subsidy' name='search' onClick='fetch_Data(".$values.")'></font></td>";
						echo "</tr>";
						//echo $i."<br/>";
					    $i++;
					}
	              ?>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
              <p><input type="button" name="addNewRecord" value="Add New Patient" onClick="return addData()"></p>
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
<input type="hidden" name="srhType" value="<? echo $srhType; ?>">
<input type="hidden" name="srhValue" value="<? echo $srhValue; ?>">

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