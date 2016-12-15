<?PHP
	//require_once("db.php");
	$aVar = mysqli_connect('db02.coowo.com','seed-nncforg','g233a03i6ns','seed-nncforg');

	//$qry_Lang = mysqli_query("SELECT * FROM `patient_cn_lang_record` WHERE `branch`='3' ORDER BY `NCFID` DESC");
	$qry_Lang = mysqli_query($aVar,"SELECT `patient_cn_lang_record`.`num` AS `numRec`,`patient_cn_lang_record`.`remark` AS `remark`,`patient_cn_lang_record`.`NCFMedicalNum` AS `NCFMedicalNum`, `patient-china`.`NCFID` AS `NCFID`, `patient-china`.`name` AS `name`, `patient-china`.`school` AS `school`, `patient-china`.`MedicalRecordNumber` AS `MedicalRecordNumber`, `patient-china`.`ncfAllStatus` AS `ncfAllStatus`, `patient-china`.`num` FROM `patient-china`, `patient_cn_lang_record` WHERE `patient-china`.`NCFID` = `patient_cn_lang_record`.`NCFID` AND `patient_cn_lang_record`.`branch`='3' ORDER BY `patient_cn_lang_record`.`NCFMedicalNum` DESC");
	
	$res_Lang = mysqli_fetch_array($qry_Lang);
	//$rows_Lang = mysql_num_rows($qry_Lang);

	/*
	echo $rows_Lang."<br/>";

	foreach ($res_Lang as $key => $value) {
		//echo $value."<br/>";
	}
	
	foreach ($res_Lang as $key => $value) {
		echo $value."<br/>";
	}
	
	echo mysql_num_rows($qry_Lang)."<br/>";
	


	reset($res_Lang);

	$j = 0;
	//while ($res_Lang = mysql_fetch_array($qry_Lang)) {
	while ($res_Lang = mysql_fetch_array($qry_Lang)) {
		echo $res_Lang["NCFID"]."<br/>";
		$j++;
	}
	*/







?>

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
                    
                    $i = 0;
                    while($resultChinaPatientinfo = mysqli_fetch_array($qry_Lang)){
                      
                      
                      // 分療程科別後在返回撈取病患基本資料
                      $chinaPatinfo = mysqli_query($aVar,"SELECT * FROM `patient-china` WHERE `NCFID` = '".$resultChinaPatientinfo['NCFID']."'");
                      $resChinaPatinfo = mysqli_fetch_array($chinaPatinfo);
 						
 						//echo "SELECT * FROM `patient-china` WHERE `NCFID` = '".$resultChinaPatientinfo['NCFID']."'"."<br/>";
                      /*
                      $remarks = $resultChinaPatientinfo["remark"];
                      $ncfAllStatus = $resultChinaPatientinfo["ncfAllStatus"];
                      
                      if(($remarks == "0" || $remarks == 0) && ($ncfAllStatus == "0" || $ncfAllStatus == 0 || empty($ncfAllStatus))){
                        $remark2 = "等待补助";
                      }else if($remarks == "1" || $remarks == 1){
                        $remark2 = "等待送出";
                      }else if($ncfAllStatus == "1" || $ncfAllStatus == 1){
                        $remark2 = "完成补助";
                      }

                      echo "<br/>".$resultChinaPatientinfo['NCFID']."<br/>";
						*/
                      
                      //if($resultChinaPatientinfo["branch"] == "3"){
                        if((($remark == "0") || ($remark == 0)) && (($ncfAllStatus == "1") || ($ncfAllStatus == 1))){ 
                      		$remark2 = "完成补助";
                        }else if(($remark == "1") || ($remark == 1)){
								          $remark2 = "等待送出";
                        }else if (($remark == "0") || ($remark == 0)) {
                          $remark2 = "等待补助";
                        }

                        if ($resChinaPatinfo["school"] == "C" || $resChinaPatinfo["school"] == "西安交通大学口腔医院") {
                          $hospital = "西安交通大学口腔医院";
                        }

                        echo "<tr>";
                        echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFMedicalNum"]."</td>";
                        echo "<td width='16%' align='center' valign='middle'>".$resultChinaPatientinfo["NCFID"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["name"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$hospital."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$resChinaPatinfo["MedicalRecordNumber"]."</td>";
                        echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                        $values = $resChinaPatinfo['num'];
                        $values2 = $resChinaPatinfo["numRec"];
                        $ncfmn = substr($resChinaPatinfo["NCFMedicalNum"], 2);    // get Year last 2 bits.
                        echo "<input type='hidden' id='ncfmn' name='ncfmn' value='".$ncfmn."'>";
                        echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(".$values2.")'></font></td>";
                        echo "</tr>";
                      //}
                      $i++;
                    }
	              ?>
                </table>
                </center>
              </div>
