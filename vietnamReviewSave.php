<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$num = $_POST["num"];
		$num2 = $_POST["num2"];  //指同一病患的第二筆以上的病歷資料編號
		


// ************************************  NCF 補助項目 START  ************************************
		$subsidiesforMedicalExpenses = $_POST["subsidiesforMedicalExpenses"]; 
		$TotalSFME = $_POST["TotalSFME"]; 
		$NCFAllowance = $_POST["NCFAllowance"];
		$NCFProportion = $_POST["NCFProportion"];
		$PatientPay = $_POST["PatientPay"];
		$PatientProportion = $_POST["PatientProportion"];
		$transportationSubsidies = $_POST["transportationSubsidies"]; 
		$NCFSOT = $_POST["NCFSOT"];
		$PatientSOT = $_POST["PatientSOT"]; 
		$NCFTotalSubsidies = $_POST["NCFTotalSubsidies"]; 
		$remark = $_POST["remark"];

		
		$DrID = $seid;
		//$pedigree_graphics_other = $_POST["pedigree_graphics_other"];

		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];
		$NCFMedicalNum = $_POST['NCFMedicalNum'];
		// $NCFMedicalNum = $NCFID.$branch.$serialcode; // 病历表编号
		//$NCFMedicalNum  = $_POST["NCFMedicalNum"];	// 病历表编号
		
// ************************************  NCF 補助項目 END  ************************************
	
	
// 2016/05/24 新增資料夾
// NCF 審核表單的照片 存檔資料夾名稱：NCFCheck


		// $selPatientRecord = "SELECT * FROM `patient-vn-record` WHERE NCFMedicalNum='".$num2."'";
		$selPatientRecord = "SELECT * FROM `patient-vn-record` WHERE NCFMedicalNum='".$NCFMedicalNum."'";
		$queryPatientRecord = mysql_query($selPatientRecord);
		$resultPatientRecord = mysql_fetch_array($queryPatientRecord);

		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在 For 病歷表
		$pat_NCFMedicalNum_path = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/NCFCheck/".$NCFMedicalNum; 		// 設定病患照片路徑
		if(is_dir($pat_NCFMedicalNum_path)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient_record = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/NCFCheck/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			@mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/photo/NCFCheck/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_record = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/NCFCheck/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		
		for ($i=1; $i<6; $i++) {
			$filenames[$i] = $_FILES['pedigree_graphics_other'.$i]['name'];										// get picture's file name.
			if(!empty($filenames[$i])){
				copy($_FILES['pedigree_graphics_other'.$i]['tmp_name'], $img_path_patient_record.$_FILES['pedigree_graphics_other'.$i]['name']);	// save picture from temp_file to fold.
				$pedigree_graphics_other[$i] = "http://www.seed-nncf.org/photo/NCFCheck/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			}else {
				if(empty($filenames[$i])){
					$pedigree_graphics_other[$i] = $resultPatientRecord['pedigree_graphics_other'.$i];
				}
			}
		}
		
		
		$PatientRecord_SQL = "UPDATE `patient-vn-record` 
		SET `subsidiesforMedicalExpenses` = '".$subsidiesforMedicalExpenses."', 
		`TotalSFME` = '".$TotalSFME."', 
		`NCFAllowance` = '".$NCFAllowance."', 
		`NCFProportion` = '".$NCFProportion."', 
		`PatientPay` = '".$PatientPay."',
		`PatientProportion` = '".$PatientProportion."',
		`transportationSubsidies` = '".$transportationSubsidies."', 
		`NCFSOT` = '".$NCFSOT."', 
		`PatientSOT` = '".$PatientSOT."', 
		`NCFTotalSubsidies` = '".$NCFTotalSubsidies."', 
		`remark` = '".$remark."', 
		`pedigree_graphics_other1` = '".$pedigree_graphics_other[1]."', 
		`pedigree_graphics_other2` = '".$pedigree_graphics_other[2]."', 
		`pedigree_graphics_other3` = '".$pedigree_graphics_other[3]."', 
		`pedigree_graphics_other4` = '".$pedigree_graphics_other[4]."', 
		`pedigree_graphics_other5` = '".$pedigree_graphics_other[5]."', 
		`ncfCheck` = '".$ncfCheck."' 
		WHERE `num` = '".$num."' LIMIT 1";
		
		
		$query_chinapatientrecord = mysql_query($PatientRecord_SQL);
		// echo "<br/><br/><br/><br/>".$PatientRecord_SQL;
	
			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    echo "location.href='vietnamList.php'";
			echo "//-->";
			echo " </Script>";
			echo "</head>";
			echo "</html>";
	}else{
		echo "<html>";
		echo "<head>";
		echo "<Script Language='JavaScript'>";
		echo "<!--";
		echo "\n alert('Sorry, Access denied. Please Login first.');";
		echo "\n";
		echo " location.href='http://www.seed-nncf.org/login.php';\n";
		echo "//-->";
		echo " </Script>";
		echo "</head>";
		echo "</html>";
	}
?>