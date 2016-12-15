<?
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){
		
		$srhType = $_POST["srhType"];
		$srhValue = $_POST["srhValue"];
    $courses = $_GET["c"];
    

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--

		function fetch_Data(num,num2,num3){
			//alert(num+"---"+num2);
      //branch = document.getElementById("branch").value;
      //num2 = document.getElementById("num2").value;
      if((num3 == 1) || (num =="1")){
        location.href = "chinaview.php?cpi="+num+"&cpi2="+num2;  
      }else if((num3 == 2) || (num =="2")){
        location.href = "chinaview-po.php?cpi="+num+"&cpi2="+num2;
      }else if((num3 == 3) || (num =="3")){
        location.href = "chinaview-st.php?cpi="+num+"&cpi2="+num2;
      }
      
    }
		function addData(){
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
                              <p style="line-height: 150%">申请表编号</td>  
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">个案编号</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">个案姓名</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">医院名称</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">医院病历号码</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">补助申请进度</td>
                  			<td width="17%" align="center" valign="middle">　</td>
                  </tr>
                  <?PHP
                    /*
                    $queryChinaPatientinfo = mysql_query("SELECT * FROM `patient-china` ORDER BY `NCFID` DESC");
                    @$rows = mysql_num_rows($queryChinaPatientinfo);
                    */

                    //病患就診資料
                      if($courses == "ps"){
                        //$selChinapatientrecordinfo = "SELECT * FROM `patientrecord-china` WHERE NCFID='".$resultChinaPatientinfo['NCFID']."' AND `branch`='1'";
                        $sel_CN_pat_recode = "SELECT * FROM `patientrecord-china` WHERE `branch`='1' ORDER BY `NCFID` DESC";
                      }elseif($courses == "po"){
                        //$selChinapatientrecordinfo = "SELECT * FROM `patientrecord-china` WHERE NCFID='".$resultChinaPatientinfo['NCFID']."' AND `branch`='2'";
                        $sel_CN_pat_recode = "SELECT * FROM `patientrecord-china` WHERE `branch`='2' ORDER BY `NCFID` DESC";
                      }elseif($courses == "st"){
                        //$selChinapatientrecordinfo = "SELECT * FROM `patient_cn_lang_record` WHERE NCFID='".$resultChinaPatientinfo['NCFID']."' AND `branch`='3'";
                        $sel_CN_pat_recode = "SELECT * FROM `patient_cn_lang_record` WHERE `branch`='3' ORDER BY `NCFID` DESC";
                      }
                      //$selChinapatientrecordinfo = "SELECT * FROM `patientrecord-china` WHERE NCFID='".$resultChinaPatientinfo['NCFID']."'";
                      mysql_query("SET NAMES 'utf8'");
                      $qry_CN_pat_recode = mysql_query($sel_CN_pat_recode);
                      //$rows2 = mysqli_fetch_row($qry_CN_pat_recode);
                  
                    $i = 1;
                    //while($resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo)){
                    while($resultChinaPatientinfo = mysql_fetch_array($qry_CN_pat_recode)){
                      
                      //echo "SELECT * FROM `patient-china` WHERE `NCFID` = '".$resultChinaPatientinfo['NCFID']."'"."<br/>";  
                      // 分療程科別後在返回撈取病患基本資料
                      $chinaPatinfo = mysql_query("SELECT * FROM `patient-china` WHERE `NCFID` = '".$resultChinaPatientinfo['NCFID']."'");
                      $resChinaPatinfo = mysql_fetch_array($chinaPatinfo);
 
                      $remarks = $resultChinaPatientinfo["remark"];
                      if(empty($resultChinaPatientinfo["ncfAllStatus"])){
                        $ncfAllStatus = $resChinaPatinfo["ncfAllStatus"];
                      }else {
                        $ncfAllStatus = $resultChinaPatientinfo["ncfAllStatus"];
                      }
                      
                      if(($remarks == "0" || $remarks == 0) && ($ncfAllStatus == "0" || $ncfAllStatus == 0 || empty($ncfAllStatus))){
                        $remark2 = "等待补助";
                      }else if($remarks == "1" || $remarks == 1){
                        $remark2 = "等待送出";
                      }else if($ncfAllStatus == "1" || $ncfAllStatus == 1){
                        $remark2 = "完成补助";
                      }

                     // echo $resultChinaPatientinfo["branch"]."<br/>";
                      if ($resChinaPatinfo["school"] == "C" || $resChinaPatinfo["school"] == "西安交通大学口腔医院") {
                          $hospital = "西安交通大学口腔医院";
                        }
                      
                      if($resultChinaPatientinfo["branch"] == "1"){
                        echo "<tr>";
                        echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFMedicalNum"]."</td>";
                        echo "<td width='16%' align='center' valign='middle'>".$resChinaPatinfo["NCFID"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["name"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$hospital."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["MedicalRecordNumber"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                        $values = $resChinaPatinfo['num'];
                        $values2 = $resultChinaPatientinfo["num"];
                        $values3 = $resultChinaPatientinfo["branch"];
                        echo "<input type='hidden' id='branch' name='branch' value='".$resultChinaPatientinfo["branch"]."'>";
                        echo "<input type='hidden' id='num2' name='num2' value='".$resultChinaPatientinfo["num"]."'>";
                        echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values.",".$values2.",".$values3.")'></font></td>";
                        echo "</tr>";
                      }elseif($resultChinaPatientinfo["branch"] == "2"){
                        echo "<tr>";
                        echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFMedicalNum"]."</td>";
                        echo "<td width='16%' align='center' valign='middle'>".$resChinaPatinfo["NCFID"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["name"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$hospital."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["MedicalRecordNumber"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                        $values = $resChinaPatinfo['num'];
                        $values2 = $resultChinaPatientinfo["num"];
                        $values3 = $resultChinaPatientinfo["branch"];
                        echo "<input type='hidden' id='branch' name='branch' value='".$resultChinaPatientinfo["branch"]."'>";
                        echo "<input type='hidden' id='num2' name='num2' value='".$resultChinaPatientinfo["num"]."'>";
                        echo "<input type='hidden' id='num3' name='num3' value='".$resultChinaPatientinfo["branch"]."'>";
                        echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values.",".$values2.",".$values3.")'></font></td>";
                        echo "</tr>";
                      }elseif($resultChinaPatientinfo["branch"] == "3"){
                        echo "<tr>";
                        echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFMedicalNum"]."</td>";
                        echo "<td width='16%' align='center' valign='middle'>".$resChinaPatinfo["NCFID"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["name"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$hospital."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["MedicalRecordNumber"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                        $values = $resChinaPatinfo['num'];
                        //$values2 = $resultChinapatientrecordinfo["num"];
                        $values2 = $resultChinaPatientinfo["num"];
                        $values3 = $resultChinaPatientinfo["branch"];
                        echo "<input type='hidden' id='branch' name='branch' value='".$resultChinaPatientinfo["branch"]."'>";
                        echo "<input type='hidden' id='num2' name='num2' value='".$resultChinaPatientinfo["num"]."'>";
                        echo "<input type='hidden' id='num3' name='num3' value='".$resultChinaPatientinfo["branch"]."'>";
                        echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values.",".$values2.",".$values3.")'></font></td>";
                        echo "</tr>";
                      }
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
