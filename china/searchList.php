<?
	session_start(); 

	include 'db.php'; 
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){

		$courses = $_POST["courses"];

    if(isset($_POST["c"])){
      $ctype = $_POST["c"];
    }else {
      $ctype = $_GET["c"];
    }
    
    

    if(($courses == "ps") || ($ctype == "1")){
      $branch = "1";
      $courses = "ps";
    }elseif (($courses == "po") || ($ctype == "2")) {
      $branch = "2";
      $courses = "po";
    }elseif (($courses == "st") || ($ctype == "3")) {
      $branch = "3";
      $courses = "st";
    }

    //echo "courses: ".$courses."<br/>"."Ctype: ".$ctype."<br/>";

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	function fetch_Data(num){
    var courses = document.getElementById("courses").value;

    if(courses == "ps"){
      location.href = "for-pla-add-china-cgmh-view.php?cpi="+num;
    }else if(courses == "po"){
      var ncfmn = document.getElementById("ncfmn").value;
      location.href = "china-addpat-po-view.php?cpi="+num+"&n="+ncfmn;
    }else if(courses == "st"){
      location.href = "cn-lang-view.php?cpi="+num;
    }
	}
	function addData(){
		//alert("for-pla-add-china-cgmh-view.php?cpi="+num);
		//location.href = "for-pla-add-china-cgmh.php";
	}
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../china/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../china/select.php"); ?></font></td>
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

                      echo "<input type='hidden' id='courses' name='courses' value='".$courses."'>";
                      $i = 1;

                      if(($courses == "st") || ($ctype == "3")){
                        $sel2tab = "SELECT `patient_cn_lang_record`.`num` AS `numRec`,`patient_cn_lang_record`.`remark` AS `remark`,`patient_cn_lang_record`.`NCFMedicalNum` AS `NCFMedicalNum`, `patient-china`.`NCFID` AS `NCFID`, `patient-china`.`name` AS `name`, `patient-china`.`school` AS `school`, `patient-china`.`MedicalRecordNumber` AS `MedicalRecordNumber`, `patient-china`.`ncfAllStatus` AS `ncfAllStatus`, `patient-china`.`num` FROM `patient-china`, `patient_cn_lang_record` WHERE `patient-china`.`NCFID` = `patient_cn_lang_record`.`NCFID` AND `patient_cn_lang_record`.`branch`='".$branch."' ORDER BY `patient_cn_lang_record`.`NCFMedicalNum` DESC";  
                        //$sel2tab = "SELECT `patient_cn_lang_record`.`num` AS `numRec`,`patient_cn_lang_record`.`remark` AS `remark`,`patient_cn_lang_record`.`NCFMedicalNum` AS `NCFMedicalNum`, `patient-china`.`NCFID` AS `NCFID`, `patient-china`.`name` AS `name`, `patient-china`.`school` AS `school`, `patient-china`.`MedicalRecordNumber` AS `MedicalRecordNumber`, `patient-china`.`ncfAllStatus` AS `ncfAllStatus`, `patient-china`.`num` FROM `patient-china`, `patient_cn_lang_record` WHERE `patient-china`.`NCFID` = `patient_cn_lang_record`.`NCFID` AND `patient_cn_lang_record`.`branch`='3' ORDER BY `patient_cn_lang_record`.`NCFMedicalNum` DESC";  
                      }else{
                        $sel2tab = "SELECT `patientrecord-china`.`num` AS `numRec`,`patientrecord-china`.`remark` AS `remark`,`patientrecord-china`.`NCFMedicalNum` AS `NCFMedicalNum`, `patient-china`.`NCFID` AS `NCFID`, `patient-china`.`name` AS `name`, `patient-china`.`school` AS `school`, `patient-china`.`MedicalRecordNumber` AS `MedicalRecordNumber`, `patient-china`.`ncfAllStatus` AS `ncfAllStatus`, `patient-china`.`num` FROM `patient-china`, `patientrecord-china` WHERE `patient-china`.`NCFID` = `patientrecord-china`.`NCFID` AND `patientrecord-china`.`branch`='".$branch."' ORDER BY `patientrecord-china`.`NCFMedicalNum` DESC";
                      }
                    //echo "<br/>".$sel2tab."<br/>";
                      $queryData = mysql_query($sel2tab);
                      while($resCNPatRec = mysql_fetch_array($queryData)){
						
                        $remark = $resCNPatRec["remark"];
                        $ncfAllStatus = $resCNPatRec["ncfAllStatus"];
                        
                         //echo $resCNPatRec["NCFMedicalNum"]." : ncfAllStatus : ".$ncfAllStatus." : Remark : ".$remark."<br/>";


                      	if((($remark == "0") || ($remark == 0)) && (($ncfAllStatus == "1") || ($ncfAllStatus == 1))){ 
                      		$remark2 = "完成补助";
                        }else if(($remark == "1") || ($remark == 1)){
								          $remark2 = "等待送出";
                        }else if (($remark == "0") || ($remark == 0)) {
                          $remark2 = "等待补助";
                        }

                        if ($resCNPatRec["school"] == "C" || $resCNPatRec["school"] == "西安交通大学口腔医院") {
                          $hospital = "西安交通大学口腔医院";
                        } else {
                          $hospital = "中国医学科学院北京协和医院";
                        }

                        echo "<tr>";
                        echo "<td width='16%' align='center' valign='middle'>".$resCNPatRec["NCFMedicalNum"]."</td>";
                        echo "<td width='16%' align='center' valign='middle'>".$resCNPatRec["NCFID"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resCNPatRec["name"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$hospital."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resCNPatRec["MedicalRecordNumber"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                        $values = $resCNPatRec['num'];
                        $values2 = $resCNPatRec["numRec"];
                        $ncfmn = substr($resCNPatRec["NCFMedicalNum"], 2);    // get Year last 2 bits.
                        echo "<input type='hidden' id='ncfmn' name='ncfmn' value='".$ncfmn."'>";
                        echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values2.")'></font></td>";
                        echo "</tr>";
                        $i++;
                      }

                      
                    ?>
                <br/>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">&nbsp; </p>
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