<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	   
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	$branch = "1";
	$serialcode = "1";		//暂时以此当作同病患的病历表流水号
	
	
	if(!empty($seid) && !empty($sepwd)){
		//制作自动带出NCF编号code
		$get_time = getdate();
		$date_year =  $get_time['year'];	// Year is 4 bits.
		$date = substr($date_year, 2);		// get Year last 2 bits.
		
		// if DB-Num. is not empty, get MAX no.
		//$sel_max = "SELECT MAX(num) FROM chinapatientrecord";	
		$sel_max = "SELECT MAX(num) FROM `patient-china`";
		$query = mysql_query($sel_max);
		$result = mysql_fetch_array($query);
		$maxNum = $result['MAX(num)'];	//Get MAX num from China patient's num.
		
		//$maxData = "SELECT * FROM `chinapatientrecord` WHERE num=".$maxNum."";
		$maxData = "SELECT * FROM `patient-china` WHERE num=".$maxNum."";
		@$queryData = mysql_query($maxData);
		@$resultData = mysql_fetch_array($queryData);
		//$maxNums = $resultData["NCFNum"];
		$maxNums = $resultData["NCFID"];
		
		// split no 
		if(!empty($maxNums)){	// If $max !empty than split no
			$no_date = substr($maxNums,2,3);	// fetch last 4 bits flow Num..
			$flow_no = substr($maxNums,-4);		// fetch 4 bits flow No.
			if($no_date = $date){
				$flow_no = $flow_no+1;
				if($flow_no <10){
					$flow_no = "000".$flow_no;
				}else if($flow_no <100){
					$flow_no = "00".$flow_no;
				}else if($flow_no <1000){
					$flow_no = "0".$flow_no;
				}else if($flow_no <10000){
					$flow_no = $flow_no;
				}
				$NCFNumX = "CN".$date.$flow_no;
			}else{
				$NCFNumX = "CN".$date."0001";	
			}
		}else{
			$NCFNumX = "CN".$date."0001";
		}
		// NCFNumX is china patient's Number.
		//End of China patient's Num.	
		
		// Make China patient's Medical Record Number.
		$recordData = "SELECT MAX(NCFMedicalNum) FROM `patientrecord-china` WHERE NCFID='".$NCFNumX."'";
		@$queryRecordData = mysql_query($recordData);
		@$resultRecordData = mysql_fetch_array($queryRecordData);
		$NCFMedicalNum = $resultRecordData["MAX(NCFMedicalNum)"];
		
		// 建立病历表编号
		if(!empty($NCFMedicalNum)){	// If $max !empty than split no
			if($NCFMedicalNum <10){
				$NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
			}else if($NCFMedicalNum <100){
				$NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
			}
		}
		
		
		$NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;
		
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
	/*
		function searchData(){
			if(document.china_medical.srhType.value == "none"){
				alert ("请选择查询条件");
			}else{
				document.china_medical.submit();
			}
		}
		*/
		function searchData(){
			document.china_medical.submit();
		}
	//-->
</SCRIPT>
</head>

<body topmargin="2">
<form name="china_medical" enctype="multipart/form-data" method="post" action="rec-sea-list-china-search.php">
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="346">
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("../cambodia/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("../cambodia/select.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="261" align="center" bgcolor="#FFF3DE"><font size="3">
              	
                <div align="center">

  <center>

  <table border="0" cellpadding="0" cellspacing="0" width="780">

    <tr>

      <td align="left">

		<div align="center">

        <table cellSpacing="0" cellPadding="0" width="100%" bgColor="#ff9966" border="1" height="40">

          <tbody>

            <tr>

              <td>

                <p align="center">

				<span class closure_uid_qekr43="362" Kc="null" lang="zh-CN" id="result_box" c="4" a="undefined">

				<b><i>

				<font color="#000000" size="4">Subsidy Application</font></i></b></span>
               <font size="5">
				</font>  

              </td>

            </tr>

          </tbody>

        </table>

      </div>

        <br>

&nbsp;<div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>
                <div align="center">
					<table border="0" cellspacing="1" width="780">
						<tr>
							<td width="10" style="border-style: solid; border-width: 0">&nbsp;</td>
							<td width="760" style="border-style: solid; border-width: 0">
                            	<div align="center">
                            	  <!-- 2013/08/14 NCF改變搜尋方式，取消三個下拉式選單功能
                                <select size="1" name="srhType">
                        			<option selected value="none">Search by Criteria</option>
                                	<option value="chkID">ID Number</option>
                        			<option value="chkNAME">Patient's Name</option>
                                    <option value="chkPATNO">Patient Record Number(Hospital)</option>
                    			</select>
                                -->
                            	  
                            	  Search by ID Number, Patient Record Number or Patient's Name<br><br>
                                  <input id="searchpatient" type="text" value="" name="srhValue">
                          	  </div></td>
							<td width="10" style="border-style: solid; border-width: 0">&nbsp;</td>
						</tr>
					</table>
				</div>


              </td>

            </tr>

          </table>

        </div>
        
        <div align="center">

          <table border="0" cellspacing="1" width="780">

            <tr>

			<td>
				<p align="center"><font size="3"><input id="search0" type="button" value="Search" name="search0" onClick="return searchData()"></font></p>
			</td>

            </tr>

          </table>

        </div></td>

    </tr>

  </table>

</div>
              
              </font></td>
            </tr>
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;   
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：   
                </font><font face="Arial"><font color="#999999">Internet&nbsp;   
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;   
                Resolution<br>
                Copyright c 2006~2012&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;   
                Craniofacial&nbsp; Foundation<br>  
                <br>
                </font></a></font></font></i></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
  </center>
</div>
<input type="hidden" name="patientID" value="<? echo $seid; ?>">
<input type="hidden" name="remark" value="">
<input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
<input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
<input type="hidden" name="branch" value="1">
<input type="hidden" name="serialcode" value="1">

</form>
</body>

</html>
<?PHP
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('抱歉您现在无权限读取,请先登入')\;";
		echo " location.href=\'login.php\'\;";
		echo " </Script>";
	}
?>
