<?PHP
session_start();

include 'db.php';

$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];

if ((!empty($seid)) && (!empty($sepwd))) {

	$personalSQL = "SELECT `patientrecord-china`.`NCFMedicalNum` AS `NCFMedicalNum`,
	`patientrecord-china`.`NCFID` AS `NCFID`,
	`patient-china`.`name` AS `name`,
	`patient-china`.`school` AS `hospital`,
	`patientrecord-china`.`NCFMedicalNum` AS `MedicalRecordNumber`,
	`patientrecord-china`.`remark` AS `remark2`,
	`patientrecord-china`.`num` AS `num`,
	`patientrecord-china`.`num` AS `numRec`,
	`patientrecord-china`.`branch` AS `courses`
	FROM `patientrecord-china` INNER JOIN `patient-china` ON `patient-china`.`NCFID`= `patientrecord-china`.`NCFID`	WHERE";

/*
 *
 * @ modelSQL 搜尋條件
 *
 */
	$modelSQL = "";

	if (!empty($_POST['GenderType'])) {
		if (!empty($_POST['gender'])) {
			if (($_POST['gender'] == '男') || (($_POST['gender'] == '男'))) {
				$modelSQL = " (`patient-china`.`gender`='M' OR `patient-china`.`gender`='男')";
			} else {
				$modelSQL = " (`patient-china`.`gender`='F' OR `patient-china`.`gender`='女')";
			}

		}
	}

	if (!empty($_POST['Birthday'])) {
		if (!empty($_POST['BirthdayStart'])) {
			$bdsY = substr($_POST['BirthdayStart'], 0, 4);
			$bdsM = substr($_POST['BirthdayStart'], 4, 2);
			$bdsD = substr($_POST['BirthdayStart'], 6, 2);
		}
		if (!empty($_POST['BirthdayEnd'])) {
			$bdeY = substr($_POST['BirthdayEnd'], 0, 4);
			$bdeM = substr($_POST['BirthdayEnd'], 4, 2);
			$bdeD = substr($_POST['BirthdayEnd'], 6, 2);
		}
		if (!empty($modelSQL)) {
			$modelSQL .= " AND `birthYear` BETWEEN '" . $bdsY . "' AND '" . $bdeY . "' AND `birthMonth` BETWEEN '" . $bdsM . "' AND '" . $bdeM . "' AND `birthDay` BETWEEN '" . $bdsD . "' AND '" . $bdeD . "'";
		} else {
			$modelSQL .= " `birthYear` BETWEEN '" . $bdsY . "' AND '" . $bdeY . "' AND `birthMonth` BETWEEN '" . $bdsM . "' AND '" . $bdeM . "' AND `birthDay` BETWEEN '" . $bdsD . "' AND '" . $bdeD . "'";
		}

	}
	if (!empty($_POST['Distance'])) {
		if (!empty($modelSQL)) {
			$modelSQL .= " AND `patient-china`.`h2hdistance`='" . $_POST['h2hdistance'] . "'";
		} else {
			$modelSQL .= " `patient-china`.`h2hdistance`='" . $_POST['h2hdistance'] . "'";
		}
	}
//主诊断类型
	if (!empty($_POST['DiagnosisType'])) {
		//单侧唇裂
		if (!empty($_POST['diagnosis_unilateral_cleft_lip_1'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `diagnosis_unilateral_cleft_lip_1`='" . $_POST['diagnosis_unilateral_cleft_lip_1'] . "' AND `diagnosis_unilateral_cleft_lip`='" . $_POST['diagnosis_unilateral_cleft_lip'] . "'";
			} else {
				$modelSQL .= " `diagnosis_unilateral_cleft_lip_1`='" . $_POST['diagnosis_unilateral_cleft_lip_1'] . "' AND `diagnosis_unilateral_cleft_lip`='" . $_POST['diagnosis_unilateral_cleft_lip'] . "'";
			}
		}
		//双侧唇裂
		if (!empty($_POST['diagnosis_bilateral_cleft_lip_2'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `diagnosis_bilateral_cleft_lip_2`='" . $_POST['diagnosis_bilateral_cleft_lip_2'] . "' AND `diagnosis_bilateral_cleft_lip`='" . $_POST['diagnosis_bilateral_cleft_lip'] . "'";
			} else {
				$modelSQL .= " `diagnosis_bilateral_cleft_lip_2`='" . $_POST['diagnosis_bilateral_cleft_lip_2'] . "' AND `diagnosis_bilateral_cleft_lip`='" . $_POST['diagnosis_bilateral_cleft_lip'] . "'";
			}
		}
		//颚裂
		if (!empty($_POST['CleftPalate'])) {
			//不完全性
			if ($_POST['complete_main'] == "IC") {
				$incomplete = $_POST['incomplete'];
				if (!empty($modelSQL)) {
					$modelSQL .= " AND `CleftPalate`='" . $_POST['CleftPalate'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "'";
				} else {
					$modelSQL .= " `CleftPalate`='" . $_POST['CleftPalate'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "'";
				}
			} else {
				//完全性
				$complete = $_POST['complete'];
				if (!empty($modelSQL)) {
					$modelSQL .= " AND `CleftPalate`='" . $_POST['CleftPalate'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `complete`='" . $_POST['complete'] . "'";
				} else {
					$modelSQL .= " `CleftPalate`='" . $_POST['CleftPalate'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `incomplete`='" . $_POST['incomplete'] . "' AND `complete_main`='" . $_POST['complete_main'] . "' AND `complete`='" . $_POST['complete'] . "'";
				}
			}
		}
		//牙槽突裂
		if (!empty($_POST['BoneGraft_main'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `BoneGraft_main`='" . $_POST['BoneGraft_main'] . "' AND `BoneGraft_select`='" . $_POST['BoneGraft_select'] . "'";
			} else {
				$modelSQL .= " `BoneGraft_main`='" . $_POST['BoneGraft_main'] . "' AND `BoneGraft_select`='" . $_POST['BoneGraft_select'] . "'";
			}
		}
		//合并其它颅颜病症
		if (!empty($_POST['Combined_with_other_craniofacial_disorders'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `Combined_with_other_craniofacial_disorders_text`='" . $_POST['Combined_with_other_craniofacial_disorders_text'] . "'";
			} else {
				$modelSQL .= " `Combined_with_other_craniofacial_disorders_text`='" . $_POST['Combined_with_other_craniofacial_disorders_text'] . "'";
			}
		}
	}
//平均年收入
	if (!empty($_POST['AnnualIncome'])) {
		if (!empty($modelSQL)) {
			$modelSQL .= " AND `income` BETWEEN '" . $_POST['AnnualIncomeStart'] . "' AND '" . $_POST['AnnualIncomeEnd'] . "'";
		} else {
			$modelSQL .= " `income` BETWEEN '" . $_POST['AnnualIncomeStart'] . "' AND '" . $_POST['AnnualIncomeEnd'] . "'";
		}
	}
//家庭居住地
	if (!empty($_POST['Occupancy'])) {
		if (!empty($modelSQL)) {
			$modelSQL .= " AND `address` = '" . $_POST['OccupancyAddress'] . "'";
		} else {
			$modelSQL .= " `address` = '" . $_POST['OccupancyAddress'] . "'";
		}
	}
//手术类型
	if (!empty($_POST['SurgeryType'])) {
		if (!empty($_POST['surgeryType1'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType1` = '" . $_POST['surgeryType1'] . "'";
			} else {
				$modelSQL .= " `surgeryType1` = '" . $_POST['surgeryType1'] . "'";
			}
		}
		if (!empty($_POST['surgeryType2'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType2` = '" . $_POST['surgeryType2'] . "'";
			} else {
				$modelSQL .= " `surgeryType2` = '" . $_POST['surgeryType2'] . "'";
			}
		}
		if (!empty($_POST['surgeryType3'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType3` = '" . $_POST['surgeryType3'] . "'";
			} else {
				$modelSQL .= " `surgeryType3` = '" . $_POST['surgeryType3'] . "'";
			}
		}
		if (!empty($_POST['surgeryType4'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType4` = '" . $_POST['surgeryType4'] . "'";
			} else {
				$modelSQL .= " `surgeryType4` = '" . $_POST['surgeryType4'] . "'";
			}
		}
		if (!empty($_POST['surgeryType5'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType5` = '" . $_POST['surgeryType5'] . "'";
			} else {
				$modelSQL .= " `surgeryType5` = '" . $_POST['surgeryType5'] . "'";
			}
		}
		if (!empty($_POST['surgeryType6'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType6` = '" . $_POST['surgeryType6'] . "'";
			} else {
				$modelSQL .= " `surgeryType6` = '" . $_POST['surgeryType6'] . "'";
			}
		}
		if (!empty($_POST['surgeryType7'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType7` = '" . $_POST['surgeryType7'] . "'";
			} else {
				$modelSQL .= " `surgeryType7` = '" . $_POST['surgeryType7'] . "'";
			}
		}
		if (!empty($_POST['surgeryType8'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType8` = '" . $_POST['surgeryType8'] . "'";
			} else {
				$modelSQL .= " `surgeryType8` = '" . $_POST['surgeryType8'] . "'";
			}
		}
		if (!empty($_POST['surgeryType9'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryType9` = '" . $_POST['surgeryType9'] . "'";
			} else {
				$modelSQL .= " `surgeryType9` = '" . $_POST['surgeryType9'] . "'";
			}
		}
		if (!empty($_POST['surgeryType10'])) {
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `surgeryTypeOther_text` = '" . $_POST['surgeryTypeOther_text'] . "'";
			} else {
				$modelSQL .= " `surgeryTypeOther_text` = '" . $_POST['surgeryTypeOther_text'] . "'";
			}
		}
	}
	if (!empty($_POST['AllowanceType'])) {
		$TypeStatus = 0;
		if (!empty($_POST['ps'])) {
			if (!empty($_POST['ps'])) {
				$branch = "1";
			}
			if (!empty($modelSQL)) {
				$modelSQL .= " AND `branch` = '" . $branch . "'";
				$TypeStatus = 1;
			} else {
				$modelSQL .= " `branch` = '" . $branch . "'";
			}
		}
		if (!empty($_POST['po'])) {
			if (!empty($_POST['po'])) {
				$branch = "2";
			}
			if (!empty($modelSQL)) {
				if ($TypeStatus != 0) {
					$modelSQL .= " OR `branch` = '" . $branch . "'";
				} else {
					$modelSQL .= " AND `branch` = '" . $branch . "'"; # code...
				}
			} else {
				$modelSQL .= " `branch` = '" . $branch . "'";
			}
		}
		if (isset($_POST['st'])) {
			if (!empty($_POST['st'])) {
				$branch = "3"; //設定語言治療代號
			}

			$STSQL = "SELECT `patient_cn_lang_record`.`NCFMedicalNum` AS `NCFMedicalNum`,
			`patient_cn_lang_record`.`NCFID` AS `NCFID`, `patient-china`.`name` AS `name`,
			`patient-china`.`school` AS `hospital`,
			`patient_cn_lang_record`.`NCFMedicalNum` AS `MedicalRecordNumber`,
			`patient_cn_lang_record`.`remark` AS `remark2`,
			`patient_cn_lang_record`.`num` AS `num`,
			`patient_cn_lang_record`.`num` AS `numRec`,
			`patient_cn_lang_record`.`branch` AS `courses`
			FROM `patient_cn_lang_record` INNER JOIN `patient-china` ON `patient-china`.`NCFID`= `patient_cn_lang_record`.`NCFID` WHERE";

			if (!empty($modelSQL)) {
				if ($TypeStatus != 0) {
					$modelSQL .= " OR `branch` = '" . $branch . "'";
					$STSQLCode = $STSQL . $modelSQL . " ORDER BY `patient_cn_lang_record`.`NCFID` DESC";
				} else {
					$modelSQL .= " AND `branch` = '" . $branch . "'";
					$STSQLCode = $STSQL . $modelSQL . " ORDER BY `patient_cn_lang_record`.`NCFID` DESC";
				}
			} else {
				$modelSQL .= " `branch` = '" . $branch . "'";
				$STSQLCode = $STSQL . $modelSQL . " ORDER BY `patient_cn_lang_record`.`NCFID` DESC";
			}
		}
	}

	$SQLCode = $personalSQL . $modelSQL . " ORDER BY `patientrecord-china`.`NCFID` DESC";
	//echo $SQLCode . "<br/>";

	?>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>NCF -- Patient Record Online Management System</title>
        <SCRIPT LANGUAGE="javascript">
        function fetch_Data(num, courses, cpi) {
            //var courses = document.getElementById("courses").value;
            // alert(num);

            if (courses == "1") { //ps
                location.href = "chinaview.php?cpi=" + num + "&cpi2=" + cpi;
            } else if (courses == "2") { //po
                var ncfmn = document.getElementById("ncfmn").value;
                location.href = "chinaview-po?cpi=" + num + "&n=" + cpi;
            } else if (courses == "3") { //st
                location.href = "cn-lang-view.php?cpi=" + num;
            }
        }
        </SCRIPT>
    </head>

    <body topmargin="2">
        <form name="myForm" enctype="multipart/form-data" method="post">
            <div align="center">
                <center>
                    <table border="0" cellpadding="0" cellspacing="0" width="760">
                        <tr>
                            <td width="100%">
                                <div align="center">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">

                                        <tr>
                                            <td width="100%" height="100%" align="center">
                                                <div align="center">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <tr>
                                                                <td width="100%" align="center"><font size="3" face="Arial"><?PHP include "top.php";?></font></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="center"><font size="3" face="Arial"><?PHP include "select.php";?></font></td>
                                                            </tr>
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
                                                                                    <p align="center"><i><font face="Arial" color="#FFFFFF" size="3"><b>Search Patient</b></font></i></p></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <font color="#666666" size="2">　</font>
                                                                </td>
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

	$i = 1;

	// 查詢病患個人資料
	$queryData = mysql_query($SQLCode);
	$querySTData = mysql_query($STSQLCode); //單指語言治療部分
	// 統計合計筆數
	$queryRows = mysql_num_rows($queryData);
	$querySTDataRows = mysql_num_rows($querySTData); //單指語言治療部分

	// echo "<br/><br/>Rows: " . $querySTData . "<br/><br/><br/>";
	// 統計三種療程共計筆數
	if (!empty($querySTData)) {
		$ACCRows = $queryRows + $querySTDataRows; //三療程治療統計數字
		echo "共计 " . $ACCRows . " 笔<br/>";
	} elseif (!empty($queryRows)) {
		echo "共计 " . $queryRows . " 笔<br/>";
	} else {
		echo "共计 0 笔<br/>";
	}

	while ($resCNPatRec = mysql_fetch_array($queryData)) {

		$chinaPatinfo = mysql_query("SELECT * FROM `patient-china` WHERE `NCFID` = '" . $resCNPatRec['NCFID'] . "'");
		$resChinaPatinfo = mysql_fetch_array($chinaPatinfo);

		$remark = $resCNPatRec["remark"];
		$ncfAllStatus = $resCNPatRec["ncfAllStatus"];

		//echo $resCNPatRec["NCFMedicalNum"]." : ncfAllStatus : ".$ncfAllStatus." : Remark : ".$remark."<br/>";

		if ((($remark == "0") || ($remark == 0)) && (($ncfAllStatus == "1") || ($ncfAllStatus == 1))) {
			$remark2 = "完成补助";
		} else if (($remark == "1") || ($remark == 1)) {
			$remark2 = "等待送出";
		} else if (($remark == "0") || ($remark == 0)) {
			$remark2 = "等待补助";
		}

		if ($resCNPatRec["school"] == "C" || $resCNPatRec["school"] == "西安交通大学口腔医院") {
			$hospital = "西安交通大学口腔医院";
		} else {
			$hospital = "中国医学科学院北京协和医院";
		}
		echo "<tr>";
		echo "<td width='16%' align='center' valign='middle'>" . $resCNPatRec["NCFMedicalNum"] . "</td>";
		echo "<td width='16%' align='center' valign='middle'>" . $resCNPatRec["NCFID"] . "</td>";
		echo "<td width='17%' align='center' valign='middle'>" . $resCNPatRec["name"] . "</td>";
		echo "<td width='17%' align='center' valign='middle'>" . $hospital . "</td>";
		echo "<td width='17%' align='center' valign='middle'>" . $resCNPatRec["MedicalRecordNumber"] . "</td>";
		echo "<td width='17%' align='center' valign='middle'>" . $remark2 . "</td>";
		$values = $resCNPatRec['num'];
		$values2 = $resCNPatRec["numRec"];
		$ncfmn = substr($resCNPatRec["NCFMedicalNum"], 2); // get Year last 2 bits.
		echo "<input type='hidden' id='ncfmn' name='ncfmn' value='" . $ncfmn . "'>";
		echo "<input type='hidden' id='courses' name='courses' value='" . $resCNPatRec["courses"] . "'>";
		echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(" . $resChinaPatinfo['num'] . ", " . $resCNPatRec["courses"] . ", " . $values2 . ")'></font></td>";
		echo "</tr>";
		$i++;
	}
	if (!empty($querySTData)) {
		//echo "<br/><br/>Rows3: " . $querySTData . "<br/><br/><br/>";
		while ($resSTPatRec = mysql_fetch_array($querySTData)) {

			$remark = $resSTPatRec["remark"];
			$ncfAllStatus = $resSTPatRec["ncfAllStatus"];

			//echo $resSTPatRec["NCFMedicalNum"]." : ncfAllStatus : ".$ncfAllStatus." : Remark : ".$remark."<br/>";

			if ((($remark == "0") || ($remark == 0)) && (($ncfAllStatus == "1") || ($ncfAllStatus == 1))) {
				$remark2 = "完成补助";
			} else if (($remark == "1") || ($remark == 1)) {
				$remark2 = "等待送出";
			} else if (($remark == "0") || ($remark == 0)) {
				$remark2 = "等待补助";
			}

			if ($resSTPatRec["school"] == "C" || $resSTPatRec["school"] == "西安交通大学口腔医院") {
				$hospital = "西安交通大学口腔医院";
			} else {
				$hospital = "中国医学科学院北京协和医院";
			}
			echo "<tr>";
			echo "<td width='16%' align='center' valign='middle'>" . $resSTPatRec["NCFMedicalNum"] . "</td>";
			echo "<td width='16%' align='center' valign='middle'>" . $resSTPatRec["NCFID"] . "</td>";
			echo "<td width='17%' align='center' valign='middle'>" . $resSTPatRec["name"] . "</td>";
			echo "<td width='17%' align='center' valign='middle'>" . $hospital . "</td>";
			echo "<td width='17%' align='center' valign='middle'>" . $resSTPatRec["MedicalRecordNumber"] . "</td>";
			echo "<td width='17%' align='center' valign='middle'>" . $remark2 . "</td>";
			$values = $resSTPatRec['num'];
			$values2 = $resSTPatRec["numRec"];
			$ncfmn = substr($resSTPatRec["NCFMedicalNum"], 2); // get Year last 2 bits.
			echo "<input type='hidden' id='ncfmn' name='ncfmn' value='" . $ncfmn . "'>";
			echo "<input type='hidden' id='courses' name='courses' value='" . $resSTPatRec["courses"] . "'>";
			echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='确定' name='search' onClick='fetch_Data(" . $values2 . ", " . $resSTPatRec["courses"] . ")'></font></td>";
			echo "</tr>";
			$i++;
		}

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
                                                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：
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
} else {
	echo "<html>";
	echo "<head>";
	echo "<Script Language='JavaScript'>";
	echo "<!--";
	echo "\n alert('抱歉您现在无权限读取，请先登入');";
	echo "\n";
	echo " location.href='login.php';\n";
	echo "//-->";
	echo " </Script>";
	echo "</head>";
	echo "</html>";
}
?>
