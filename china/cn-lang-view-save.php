<?PHP
	session_cache_limiter("none");
	session_start();
	
	require_once("db.php");
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
/* ----- 病患個人資料 START ----- */
		$school = $_POST["school"];
		$caseYear = $_POST["caseYear"];
		$caseMonth = $_POST["caseMonth"];
		$caseDay = $_POST["caseDay"];
		$NCFID = $_POST["NCFID"];
		$surgeryDrName = $_POST["surgeryDrName"];
		$languageTherapist = $_POST["languageTherapist"];
		$orthodontics = $_POST["orthodontics"];
		$MedicalRecordNumber = $_POST["MedicalRecordNumber"];
		$idno = $_POST["idno"];
		$name = $_POST["name"];
		$gender = $_POST["gender"];
		$birthYear = $_POST["birthYear"];
		$birthMonth = $_POST["birthMonth"];
		$birthDay = $_POST["birthDay"];
		$profession = $_POST["profession"];
		$tel = $_POST["tel"];
		$education = $_POST["education"];
		$address = $_POST["address"];
		$contactperson = $_POST["contactperson"];
		$relationship = $_POST["relationship"];
		$phone = $_POST["phone"];

		$cellphone = $_POST["cellphone"];

		$h2hdistance = $_POST["h2hdistance"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$diagnosis_unilateral_cleft_lip_1 = $_POST["diagnosis_unilateral_cleft_lip_1"];
		$diagnosis_unilateral_cleft_lip = $_POST["diagnosis_unilateral_cleft_lip"];
		$diagnosis_bilateral_cleft_lip_2 = $_POST["diagnosis_bilateral_cleft_lip_2"];
		$diagnosis_bilateral_cleft_lip = $_POST["diagnosis_bilateral_cleft_lip"];
		$BoneGraft_main = $_POST["BoneGraft_main"];
		$BoneGraft_select = $_POST["BoneGraft_select"];
		$CleftPalate = $_POST["CleftPalate"];
		$incomplete_main = $_POST["incomplete_main"];
		$incomplete = $_POST["incomplete"];
		$complete_main = $_POST["complete_main"];
		$complete = $_POST["complete"];
		$Combined_with_other_craniofacial_disorders = $_POST["Combined_with_other_craniofacial_disorders"];
		$Combined_with_other_craniofacial_disorders_text = $_POST["Combined_with_other_craniofacial_disorders_text"];
		$Cleft_lip_and_palate_surgery = $_POST["Cleft_lip_and_palate_surgery"];
		$beforeSurgery_1 = $_POST["beforeSurgery_1"];
		$beforeSurgery_2 = $_POST["beforeSurgery_2"];
		$beforeSurgery_3 = $_POST["beforeSurgery_3"];
		$beforeSurgery_4 = $_POST["beforeSurgery_4"];
		$beforeSurgery_5 = $_POST["beforeSurgery_5"];
		$beforeSurgery_6 = $_POST["beforeSurgery_6"];
		$beforeSurgery_7 = $_POST["beforeSurgery_7"];
		$beforeSurgery_8 = $_POST["beforeSurgery_8"];
		$beforeSurgery_9 = $_POST["beforeSurgery_9"];
		$beforeSurgery_10 = $_POST["beforeSurgery_10"];
		$beforeSurgery_11 = $_POST["beforeSurgery_11"];
		$beforeSurgery_other = $_POST["beforeSurgery_other"];
		$beforeSurgery_other_reason = $_POST["beforeSurgery_other_reason"];
		$familyMembers = $_POST["familyMembers"];
		$live_together = $_POST["live_together"];
		$fatherAge = $_POST["fatherAge"];
		$fatherProfession_main = $_POST["fatherProfession_main"];
		$fatherProfession = $_POST["fatherProfession"];
		$motherAge = $_POST["motherAge"];
		$motherProfession_main = $_POST["motherProfession_main"];
		$motherProfession = $_POST["motherProfession"];
		$descriptionCaseFamily = $_POST["descriptionCaseFamily"];
		$mainSourceofIncome = $_POST["mainSourceofIncome"];
		$income = $_POST["income"];
		$fixedExpenditure1 = $_POST["fixedExpenditure1"];
		$fixedExpenditure2 = $_POST["fixedExpenditure2"];
		$fixedExpenditure3 = $_POST["fixedExpenditure3"];
		$fixedExpenditure4 = $_POST["fixedExpenditure4"];
		$extimatedExpenditures = $_POST["extimatedExpenditures"];
/* ----- 病患個人資料 END ----- */


/* ----- 個人病例表資料 START ----- */
		$BIHosTimeYear = $_POST["BIHosTimeYear"];
		$BIHosTimeMonth = $_POST["BIHosTimeMonth"];
		$BIHosTimeDay = $_POST["BIHosTimeDay"];
		$speechDr = $_POST["speechDr"];
		$hypernasality = $_POST["hypernasality"];
		$mild = $_POST["mild"];
		$moderate = $_POST["moderate"];
		$severity = $_POST["severity"];
		$hyponasality = $_POST["hyponasality"];
		$mix = $_POST["mix"];
		$cdsr = $_POST["cdsr"];
		$visble = $_POST["visble"];
		$rt = $_POST["rt"];
		$lt = $_POST["lt"];
		$bil = $_POST["bil"];
		$audible = $_POST["audible"];
		$nt = $_POST["nt"];
		$Grimace = $_POST["Grimace"];
		$hsn = $_POST["hsn"];
		$lp = $_POST["lp"];
		$rl = $_POST["rl"];
		$Omission_ck = $_POST["Omission_ck"];
		$Omission = $_POST["Omission"];
		$nvs_ck = $_POST["nvs_ck"];
		$nvs = $_POST["nvs"];
		$mo_ck = $_POST["mo_ck"];
		$mo = $_POST["mo"];
		$scv_ck = $_POST["scv_ck"];
		$scv = $_POST["scv"];
		$CVCCV_ck = $_POST["CVCCV_ck"];
		$CVCCV = $_POST["CVCCV"];
		$CVCVV_ck = $_POST["CVCVV_ck"];
		$CVCVV = $_POST["CVCVV"];
		$Fronting_ck = $_POST["Fronting_ck"];
		$Fronting = $_POST["Fronting"];
		$Backing_ck = $_POST["Backing_ck"];
		$Backing = $_POST["Backing"];
		$lsa_ck = $_POST["lsa_ck"];
		$lsa = $_POST["lsa"];
		$arx_ck = $_POST["arx_ck"];
		$arx = $_POST["arx"];
		$Stopping_ck = $_POST["Stopping_ck"];
		$Stopping = $_POST["Stopping"];
		$Affrication_ck = $_POST["Affrication_ck"];
		$Affrication = $_POST["Affrication"];
		$Deaffrication_ck = $_POST["Deaffrication_ck"];
		$Deaffrication = $_POST["Deaffrication"];
		$Aspiration_ck = $_POST["Aspiration_ck"];
		$Aspiration = $_POST["Aspiration"];
		$Unaspiration_ck = $_POST["Unaspiration_ck"];
		$Unaspiration = $_POST["Unaspiration"];
		$Naslization_ck = $_POST["Naslization_ck"];
		$Naslization = $_POST["Naslization"];
		$Lateralization_ck = $_POST["Lateralization_ck"];
		$Lateralization = $_POST["Lateralization"];
		$ac_ck = $_POST["ac_ck"];
		$ac = $_POST["ac"];
		$oa_ck = $_POST["oa_ck"];
		$oa = $_POST["oa"];
		$Glottal = $_POST["Glottal"];
		$phf = $_POST["phf"];
		$phls = $_POST["phls"];
		$oca = $_POST["oca"];
		$wkp = $_POST["wkp"];
		$Omission2 = $_POST["Omission2"];
		$Nasalization = $_POST["Nasalization"];
		$other_vpr_ck = $_POST["other_vpr_ck"];
		$other_vpr = $_POST["other_vpr"];
		$Intelligibility = $_POST["Intelligibility"];
		$VPI = $_POST["VPI"];
		$RecF = $_POST["RecF"];
		$RecHP = $_POST["RecHP"];
		$RecST = $_POST["RecST"];
		$RecNPS = $_POST["RecNPS"];
		$Other_ER = $_POST["Other_ER"];
		
		$TTPN = $_POST["TTPN"];
		$sht_month = $_POST["sht_month"];
		$sht_day = $_POST["sht_day"];
		$pdmc = $_POST["pdmc"];
		$astp = $_POST["astp"];
		$tmf = $_POST["tmf"];
		$stee = $_POST["stee"];
		$fuptp = $_POST["fuptp"];
		$fuptp_oth = $_POST["fuptp_oth"];
		$fuptp_txt = $_POST["fuptp_txt"];
		$mlss = $_POST["mlss"];
		$tmcost = $_POST["tmcost"];
		$npy_ck = $_POST["npy_ck"];
		$npy = $_POST["npy"];
		$lat_ck = $_POST["lat_ck"];
		$lat = $_POST["lat"];
		$spty_ck = $_POST["spty_ck"];
		$spty = $_POST["spty"];
		$totalRMB = $_POST["totalRMB"];
		$tRMBps = $_POST["tRMBps"];
		$Deductible = $_POST["Deductible"];
		$ddps = $_POST["ddps"];
		$ncfts_ck = $_POST["ncfts_ck"];
		$ncftsRMB = $_POST["ncftsRMB"];
		$selfpay = $_POST["selfpay"];
		$tcost = $_POST["tcost"];
		$totalNCF = $_POST["totalNCF"];
		

		/*
		$scode_sql = "SELECT MAX(serialcode) FROM `patient_cn_lang_record`";
      	$scode_Rec = mysql_query($scode_sql);
      	$scode = mysql_fetch_array($scode_Rec);
		*/
		$NCFMedicalNum = $NCFID.$branch.$serialcode; // 病历表编号
		//$NCFMedicalNum  = $_POST["NCFMedicalNum"];	// 病历表编号
		/* ----- 個人病例表資料 END ----- */



	//1. 判斷預設存放圖片之資料夾是否存在？
	// 设定病患照片路径
	//$NCFMedicalNum_path = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
	$NCFMedicalNum_path = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
	///var/www/vhosts/seed-nncf.org
	
	if(is_dir($NCFMedicalNum_path)){																			// 判断上列 病患照片路径 是否已存在
		//$imgPath = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
	} else {
		$oldmask = umask(0);
		//mkdir("/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
		mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum, 0777);
		//$imgPath = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum."/";
		umask($oldmask);
	}


	//2. 取得上傳圖片並複製到指定資料夾
	// upload 个案照片
	
	for ($i=1; $i<11; $i++) {
		$filenames[$i] = $_FILES['pedigree_graphics'.$i]['name'];										// get picture's file name.
		if(!empty($filenames[$i])){
			copy($_FILES['pedigree_graphics'.$i]['tmp_name'], $imgPath.$_FILES['pedigree_graphics'.$i]['name']);	// save picture from temp_file to folder.
			//$picpaths_patienrecord[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			$pedigree_img[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			unset($_SESSION["pedigree_graphics"][$i]);
			$_SESSION['pedigree_graphics'][$i] = $picpaths[$i];
		}else {
			$pedigree_img[$i] = "";
		}
	}
	


	// upload 上传其它资料
	// => 將檔案名稱顯示在查詢頁
	for ($i=1; $i<11; $i++) {
		$fname[$i] = $_FILES['pedigree_graphics_other'.$i]['name'];										// get other picture's file name.
		if(!empty($fname[$i])){
			copy($_FILES['pedigree_graphics_other'.$i]['tmp_name'], $imgPath.$_FILES['pedigree_graphics_other'.$i]['name']);	// save picture from temp_file to fold.
			//$picpaths_patienrecord2[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			$pedigree_other[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$fname[$i];			// picture path for show picture on page.
			$PGO[$i] = $fname[$i];
			unset($_SESSION["pedigree_graphics_other"][$i]);
			$_SESSION['pedigree_graphics_other'][$i] = $picpaths2[$i];
		}else {
			$pedigree_other[$i] = "";
			$PGO[$i] = "";
		}
	}
	

	$selChinaPatientRecord = "SELECT * FROM `patient_cn_lang_record` WHERE NCFMedicalNum='".$NCFMedicalNum."'";
	$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
	$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);

	if(empty($pedigree_other[1])){
			$pedigree_graphics_other[1] = $resultChinaPatientRecord['pedigree_graphics_other1'];
			$PGO[1] = $resultChinaPatientRecord['PGO1'];
		} else {
			$pedigree_graphics_other[1] = $pedigree_other[1];
		}
		if(empty($pedigree_other[2])){
			$pedigree_graphics_other[2] = $resultChinaPatientRecord['pedigree_graphics_other2'];
			$PGO[2] = $resultChinaPatientRecord['PGO2'];
		} else {
			$pedigree_graphics_other[2] = $pedigree_other[2];
		}
		if(empty($pedigree_other[3])){
			$pedigree_graphics_other[3] = $resultChinaPatientRecord['pedigree_graphics_other3'];
			$PGO[3] = $resultChinaPatientRecord['PGO3'];
		} else {
			$pedigree_graphics_other[3] = $pedigree_other[3];
		}
		if(empty($pedigree_other[4])){
			$pedigree_graphics_other[4] = $resultChinaPatientRecord['pedigree_graphics_other4'];
			$PGO[4] = $resultChinaPatientRecord['PGO4'];
		} else {
			$pedigree_graphics_other[4] = $pedigree_other[4];
		}
		if(empty($pedigree_other[5])){
			$pedigree_graphics_other[5] = $resultChinaPatientRecord['pedigree_graphics_other5'];
			$PGO[5] = $resultChinaPatientRecord['PGO5'];
		} else {
			$pedigree_graphics_other[5] = $pedigree_other[5];
		}
		if(empty($pedigree_other[6])){
			$pedigree_graphics_other[6] = $resultChinaPatientRecord['pedigree_graphics_other6'];
			$PGO[6] = $resultChinaPatientRecord['PGO6'];
		} else {
			$pedigree_graphics_other[6] = $pedigree_other[6];
		}
		if(empty($pedigree_other[7])){
			$pedigree_graphics_other[7] = $resultChinaPatientRecord['pedigree_graphics_other7'];
			$PGO[7] = $resultChinaPatientRecord['PGO7'];
		} else {
			$pedigree_graphics_other[7] = $pedigree_other[7];
		}
		if(empty($pedigree_other[8])){
			$pedigree_graphics_other[8] = $resultChinaPatientRecord['pedigree_graphics_other8'];
			$PGO[8] = $resultChinaPatientRecord['PGO8'];
		} else {
			$pedigree_graphics_other[8] = $pedigree_other[8];
		}
		if(empty($pedigree_other[9])){
			$pedigree_graphics_other[9] = $resultChinaPatientRecord['pedigree_graphics_other9'];
			$PGO[9] = $resultChinaPatientRecord['PGO9'];
		} else {
			$pedigree_graphics_other[9] = $pedigree_other[9];
		}
		if(empty($pedigree_other[10])){
			$pedigree_graphics_other[10] = $resultChinaPatientRecord['pedigree_graphics_other10'];
			$PGO[10] = $resultChinaPatientRecord['PGO10'];
		} else {
			$pedigree_graphics_other[10] = $pedigree_other[10];
		}




$chinapatient_sql = "UPDATE `patient-china` SET `school` = '".$school."', 
`caseYear` =  '".$caseYear."',
`caseMonth` =  '".$caseMonth."',
`caseDay` =  '".$caseDay."',
`surgeryDrName` =  '".$surgeryDrName."',
`languageTherapist` =  '".$languageTherapist."',
`orthodontics` =  '".$orthodontics."',
`MedicalRecordNumber` =  '".$MedicalRecordNumber."',
`idno` =  '".$idno."',
`name` =  '".$name."',
`gender` =  '".$gender."',
`birthYear` =  '".$birthYear."',
`birthMonth` =  '".$birthMonth."',
`birthDay` =  '".$birthDay."',
`profession` =  '".$profession."',
`tel` =  '".$tel."',
`education` =  '".$education."',
`address` =  '".$address."',
`contactperson` =  '".$contactperson."',
`relationship` =  '".$relationship."',
`phone` =  '".$phone."',
`cellphone` =  '".$cellphone."',
`h2hdistance` =  '".$h2hdistance."',
`height` =  '".$height."',
`weight` =  '".$weight."',
`diagnosis_unilateral_cleft_lip_1` =  '".$diagnosis_unilateral_cleft_lip_1."',
`diagnosis_unilateral_cleft_lip` = '".$diagnosis_unilateral_cleft_lip."',
`diagnosis_bilateral_cleft_lip_2` =  '".$diagnosis_bilateral_cleft_lip_2."',
`diagnosis_bilateral_cleft_lip` = '".$diagnosis_bilateral_cleft_lip."',
`BoneGraft_main` =  '".$BoneGraft_main."',
`BoneGraft_select` =  '".$BoneGraft_select."',
`CleftPalate` =  '".$CleftPalate."',
`incomplete_main` =  '".$incomplete_main."',
`incomplete` =  '".$incomplete."',
`complete_main` =  '".$complete_main."',
`complete` =  '".$complete."',
`Combined_with_other_craniofacial_disorders` =  '".$Combined_with_other_craniofacial_disorders."',
`Combined_with_other_craniofacial_disorders_text` =  '".$Combined_with_other_craniofacial_disorders_text."',
`Cleft_lip_and_palate_surgery` =  '".$Cleft_lip_and_palate_surgery."',
`beforeSurgery_1` =  '".$beforeSurgery_1."',
`beforeSurgery_2` =  '".$beforeSurgery_2."',
`beforeSurgery_3` =  '".$beforeSurgery_3."',
`beforeSurgery_4` =  '".$beforeSurgery_4."',
`beforeSurgery_5` =  '".$beforeSurgery_5."',
`beforeSurgery_6` =  '".$beforeSurgery_6."',
`beforeSurgery_7` =  '".$beforeSurgery_7."',
`beforeSurgery_8` =  '".$beforeSurgery_8."',
`beforeSurgery_9` =  '".$beforeSurgery_9."',
`beforeSurgery_10` =  '".$beforeSurgery_10."',
`beforeSurgery_11` =  '".$beforeSurgery_11."',
`beforeSurgery_other` =  '".$beforeSurgery_other."',
`beforeSurgery_other_reason` =  '".$beforeSurgery_other_reason."',
`familyMembers` =  '".$familyMembers."',
`live_together` =  '".$live_together."',
`fatherAge` =  '".$fatherAge."',
`fatherProfession_main` =  '".$fatherProfession_main."',
`fatherProfession` =  '".$fatherProfession."',
`motherAge` =  '".$motherAge."',
`motherProfession_main` =  '".$motherProfession_main."',
`motherProfession` =  '".$motherProfession."',
`pedigree_graphics1` =  '".$picpaths_patienrecord[1]."',
`pedigree_graphics2` =  '".$picpaths_patienrecord[2]."',
`pedigree_graphics3` =  '".$picpaths_patienrecord[3]."',
`pedigree_graphics4` =  '".$picpaths_patienrecord[4]."',
`pedigree_graphics5` =  '".$picpaths_patienrecord[5]."',
`descriptionCaseFamily` =  '".$descriptionCaseFamily."',
`mainSourceofIncome` =  '".$mainSourceofIncome."',
`income` =  '".$income."',
`fixedExpenditure1` =  '".$fixedExpenditure1."',
`fixedExpenditure2` =  '".$fixedExpenditure2."',
`fixedExpenditure3` =  '".$fixedExpenditure3."',
`fixedExpenditure4` =  '".$fixedExpenditure4."',
`extimatedExpenditures` =  '".$extimatedExpenditures."',
`usageofSocialResources` =  '".$usageofSocialResources."',
`smileTrain` =  '".$smileTrain."',
`MSitem` =  '".$MSitem."',
`MSOther` =  '".$MSOther."',
`MSOther_text` =  '".$MSOther_text."',
`LAunit` =  '".$LAunit."',
`LAitem` =  '".$LAitem."',
`OAunit` =  '".$OAunit."',
`OAitem` =  '".$OAitem."',
`surgicalAssistanceForMedicalExpenses` =  '".$surgicalAssistanceForMedicalExpenses."',
`surgicalAssistanceForMedicalExpenses_sel` =  '".$surgicalAssistanceForMedicalExpenses_sel."',
`speechTherapySubsidies` =  '".$speechTherapySubsidies."',
`transportationSubsidies` =  '".$transportationSubsidies."',
`preoperativeOrthodonticSubsidies` =  '".$preoperativeOrthodonticSubsidies."',
`NCFAssistance_Other` =  '".$NCFAssistance_Other."',
`NCFAssistance_Other_text` =  '".$NCFAssistance_Other_text."',
`signature` =  '".$signature."',
`remark` =  '".$remark."',
`hospitalname` =  '".$hospitalname."',
`DrID` =  '".$DrID."',
`ncfAllMedicaid` =  '".$ncfAllMedicaid."',
`ncfAllTransport` =  '".$ncfAllTransport."',
`ncfAllTotal` =  '".$ncfAllTotal."',
`ncfAllRemark` =  '".$ncfAllRemark."',
`ncfAllStatus` =  '".$ncfAllStatus."',
`ncfAlltime` =  '".$ncfAlltime."',
`ncfAll2China` =  '".$ncfAll2China."'
WHERE `NCFID` = '".$NCFID."' LIMIT 1";

$query_Chinapatient = mysql_query($chinapatient_sql); //病患基本資料
		
 
$cn_lang_recode_ins = "UPDATE `patient_cn_lang_record` SET `NCFID` = '".$NCFID."',
`NCFMedicalNum` = '".$NCFMedicalNum."',
`patientID` = '".$patientID."',
`branch` = '".$branch."',
`serialcode` = '".$serialcode."',
`patientName` = '".$patientName."',
`DrID` = '".$DrID."',
`status` = '".$status."',
`BIHosTimeYear` = '".$BIHosTimeYear."',
`BIHosTimeMonth` = '".$BIHosTimeMonth."',
`BIHosTimeDay` = '".$BIHosTimeDay."',
`speechDr` = '".$speechDr."',
`hypernasality` = '".$hypernasality."',
`mild` = '".$mild."',
`moderate` = '".$moderate."',
`severity` = '".$severity."',
`hyponasality` = '".$hyponasality."',
`mix` = '".$mix."',
`cdsr` = '".$cdsr."',
`visble` = '".$visble."',
`rt` = '".$rt."',
`lt` = '".$lt."',
`bil` = '".$bil."',
`audible` = '".$audible."',
`nt` = '".$nt."',
`Grimace` = '".$Grimace."',
`hsn` = '".$hsn."',
`lp` = '".$lp."',
`rl` = '".$rl."',
`Omission_ck` = '".$Omission_ck."',
`Omission` = '".$Omission."',
`nvs_ck` = '".$nvs_ck."',
`nvs` = '".$nvs."',
`mo_ck` = '".$mo_ck."',
`mo` = '".$mo."',
`scv_ck` = '".$scv_ck."',
`scv` = '".$scv."',
`CVCCV_ck` = '".$CVCCV_ck."',
`CVCCV` = '".$CVCCV."',
`CVCVV_ck` = '".$CVCVV_ck."',
`CVCVV` = '".$CVCVV."',
`Fronting_ck` = '".$Fronting_ck."',
`Fronting` = '".$Fronting."',
`Backing_ck` = '".$Backing_ck."',
`Backing` = '".$Backing."',
`lsa_ck` = '".$lsa_ck."',
`lsa` = '".$lsa."',
`arx_ck` = '".$arx_ck."',
`arx` = '".$arx."',
`Stopping_ck` = '".$Stopping_ck."',
`Stopping` = '".$Stopping."',
`Affrication_ck` = '".$Affrication_ck."',
`Affrication` = '".$Affrication."',
`Deaffrication_ck` = '".$Deaffrication_ck."',
`Deaffrication` = '".$Deaffrication."',
`Aspiration_ck` = '".$Aspiration_ck."',
`Aspiration` = '".$Aspiration."',
`Unaspiration_ck` = '".$Unaspiration_ck."',
`Unaspiration` = '".$Unaspiration."',
`Naslization_ck` = '".$Naslization_ck."',
`Naslization` = '".$Naslization."',
`Lateralization_ck` = '".$Lateralization_ck."',
`Lateralization` = '".$Lateralization."',
`ac_ck` = '".$ac_ck."',
`ac` = '".$ac."',
`oa_ck` = '".$oa_ck."',
`oa` = '".$oa."',
`Glottal` = '".$Glottal."',
`phf` = '".$phf."',
`phls` = '".$phls."',
`oca` = '".$oca."',
`wkp` = '".$wkp."',
`Omission2` = '".$Omission2."',
`Nasalization` = '".$Nasalization."',
`other_vpr_ck` = '".$other_vpr_ck."',
`other_vpr` = '".$other_vpr."',
`Intelligibility` = '".$Intelligibility."',
`VPI` = '".$VPI."',
`RecF` = '".$RecF."',
`RecHP` = '".$RecHP."',
`RecST` = '".$RecST."',
`RecNPS` = '".$RecNPS."',
`Other_ER` = '".$Other_ER."',
`TTPN` = '".$TTPN."',
`sht_month` = '".$sht_month."',
`sht_day` = '".$sht_day."',
`pdmc` = '".$pdmc."',
`astp` = '".$astp."',
`tmf` = '".$tmf."',
`stee` = '".$stee."',
`fuptp` = '".$fuptp."',
`fuptp_oth` = '".$fuptp_oth."',
`fuptp_txt` = '".$fuptp_txt."',
`mlss` = '".$mlss."',
`tmcost` = '".$tmcost."',
`npy_ck` = '".$npy_ck."',
`npy` = '".$npy."',
`lat_ck` = '".$lat_ck."',
`lat` = '".$lat."',
`spty_ck` = '".$spty_ck."',
`spty` = '".$spty."',
`totalRMB` = '".$totalRMB."',
`tRMBps` = '".$tRMBps."',
`Deductible` = '".$Deductible."',
`ddps` = '".$ddps."',
`ncfts_ck` = '".$ncfts_ck."',
`ncftsRMB` = '".$ncftsRMB."',
`selfpay` = '".$selfpay."',
`tcost` = '".$tcost."',
`totalNCF` = '".$totalNCF."',
`pedigree_graphics_other1` =  '".$pedigree_graphics_other[1]."',
`pedigree_graphics_other2` =  '".$pedigree_graphics_other[2]."',
`pedigree_graphics_other3` =  '".$pedigree_graphics_other[3]."',
`pedigree_graphics_other4` =  '".$pedigree_graphics_other[4]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[5]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[6]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[7]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[8]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[9]."',
`pedigree_graphics_other5` =  '".$pedigree_graphics_other[10]."', 
`PGO1` = '".$PGO[1]."',
`PGO2` = '".$PGO[2]."',
`PGO3` = '".$PGO[3]."',
`PGO4` = '".$PGO[4]."',
`PGO5` = '".$PGO[5]."',
`PGO5` = '".$PGO[6]."',
`PGO5` = '".$PGO[7]."',
`PGO5` = '".$PGO[8]."',
`PGO5` = '".$PGO[9]."',
`PGO5` = '".$PGO[10]."',
`remark` = '".$remark."' 
WHERE `num` = '".$num."' LIMIT 1";

$query_chinapatientrecord = mysql_query($cn_lang_recode_ins); //語言治療病例表
		
		
$CNPat_sql = "UPDATE `patient-china-record` SET `school` = '".$school."', 
`caseYear` =  '".$caseYear."',
`caseMonth` =  '".$caseMonth."',
`caseDay` =  '".$caseDay."',
`surgeryDrName` =  '".$surgeryDrName."',
`languageTherapist` =  '".$languageTherapist."',
`orthodontics` =  '".$orthodontics."',
`MedicalRecordNumber` =  '".$MedicalRecordNumber."',
`idno` =  '".$idno."',
`name` =  '".$name."',
`gender` =  '".$gender."',
`birthYear` =  '".$birthYear."',
`birthMonth` =  '".$birthMonth."',
`birthDay` =  '".$birthDay."',
`profession` =  '".$profession."',
`tel` =  '".$tel."',
`education` =  '".$education."',
`address` =  '".$address."',
`contactperson` =  '".$contactperson."',
`relationship` =  '".$relationship."',
`phone` =  '".$phone."',
`cellphone` =  '".$cellphone."',
`h2hdistance` =  '".$h2hdistance."',
`height` =  '".$height."',
`weight` =  '".$weight."',
`diagnosis_unilateral_cleft_lip_1` =  '".$diagnosis_unilateral_cleft_lip_1."',
`diagnosis_unilateral_cleft_lip` = '".$diagnosis_unilateral_cleft_lip."',
`diagnosis_bilateral_cleft_lip_2` =  '".$diagnosis_bilateral_cleft_lip_2."',
`diagnosis_bilateral_cleft_lip` = '".$diagnosis_bilateral_cleft_lip."',
`BoneGraft_main` =  '".$BoneGraft_main."',
`BoneGraft_select` =  '".$BoneGraft_select."',
`CleftPalate` =  '".$CleftPalate."',
`incomplete_main` =  '".$incomplete_main."',
`incomplete` =  '".$incomplete."',
`complete_main` =  '".$complete_main."',
`complete` =  '".$complete."',
`Combined_with_other_craniofacial_disorders` =  '".$Combined_with_other_craniofacial_disorders."',
`Combined_with_other_craniofacial_disorders_text` =  '".$Combined_with_other_craniofacial_disorders_text."',
`Cleft_lip_and_palate_surgery` =  '".$Cleft_lip_and_palate_surgery."',
`beforeSurgery_1` =  '".$beforeSurgery_1."',
`beforeSurgery_2` =  '".$beforeSurgery_2."',
`beforeSurgery_3` =  '".$beforeSurgery_3."',
`beforeSurgery_4` =  '".$beforeSurgery_4."',
`beforeSurgery_5` =  '".$beforeSurgery_5."',
`beforeSurgery_6` =  '".$beforeSurgery_6."',
`beforeSurgery_7` =  '".$beforeSurgery_7."',
`beforeSurgery_8` =  '".$beforeSurgery_8."',
`beforeSurgery_9` =  '".$beforeSurgery_9."',
`beforeSurgery_10` =  '".$beforeSurgery_10."',
`beforeSurgery_11` =  '".$beforeSurgery_11."',
`beforeSurgery_other` =  '".$beforeSurgery_other."',
`beforeSurgery_other_reason` =  '".$beforeSurgery_other_reason."',
`familyMembers` =  '".$familyMembers."',
`live_together` =  '".$live_together."',
`fatherAge` =  '".$fatherAge."',
`fatherProfession_main` =  '".$fatherProfession_main."',
`fatherProfession` =  '".$fatherProfession."',
`motherAge` =  '".$motherAge."',
`motherProfession_main` =  '".$motherProfession_main."',
`motherProfession` =  '".$motherProfession."',
`pedigree_graphics1` =  '".$picpaths_patienrecord[1]."',
`pedigree_graphics2` =  '".$picpaths_patienrecord[2]."',
`pedigree_graphics3` =  '".$picpaths_patienrecord[3]."',
`pedigree_graphics4` =  '".$picpaths_patienrecord[4]."',
`pedigree_graphics5` =  '".$picpaths_patienrecord[5]."',
`descriptionCaseFamily` =  '".$descriptionCaseFamily."',
`mainSourceofIncome` =  '".$mainSourceofIncome."',
`income` =  '".$income."',
`fixedExpenditure1` =  '".$fixedExpenditure1."',
`fixedExpenditure2` =  '".$fixedExpenditure2."',
`fixedExpenditure3` =  '".$fixedExpenditure3."',
`fixedExpenditure4` =  '".$fixedExpenditure4."',
`extimatedExpenditures` =  '".$extimatedExpenditures."',
`usageofSocialResources` =  '".$usageofSocialResources."',
`smileTrain` =  '".$smileTrain."',
`MSitem` =  '".$MSitem."',
`MSOther` =  '".$MSOther."',
`MSOther_text` =  '".$MSOther_text."',
`LAunit` =  '".$LAunit."',
`LAitem` =  '".$LAitem."',
`OAunit` =  '".$OAunit."',
`OAitem` =  '".$OAitem."',
`surgicalAssistanceForMedicalExpenses` =  '".$surgicalAssistanceForMedicalExpenses."',
`surgicalAssistanceForMedicalExpenses_sel` =  '".$surgicalAssistanceForMedicalExpenses_sel."',
`speechTherapySubsidies` =  '".$speechTherapySubsidies."',
`transportationSubsidies` =  '".$transportationSubsidies."',
`preoperativeOrthodonticSubsidies` =  '".$preoperativeOrthodonticSubsidies."',
`NCFAssistance_Other` =  '".$NCFAssistance_Other."',
`NCFAssistance_Other_text` =  '".$NCFAssistance_Other_text."',
`signature` =  '".$signature."',
`remark` =  '".$remark."',
`hospitalname` =  '".$hospitalname."',
`DrID` =  '".$DrID."',
`ncfAllMedicaid` =  '".$ncfAllMedicaid."',
`ncfAllTransport` =  '".$ncfAllTransport."',
`ncfAllTotal` =  '".$ncfAllTotal."',
`ncfAllRemark` =  '".$ncfAllRemark."',
`ncfAllStatus` =  '".$ncfAllStatus."',
`ncfAlltime` =  '".$ncfAlltime."',
`ncfAll2China` =  '".$ncfAll2China."'
WHERE `NCFID` = '".$NCFID."' LIMIT 1";

$query_CNPat = mysql_query($CNPat_sql);		

//echo $chinapatient_sql."<br/><br/>".$cn_lang_recode_ins."<br/><br/>".$CNPat_sql;
	    
		
		$_SESSION["record_Num"] = $record_num;
		$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
			echo "location.href='searchList.php?c=3'";
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
		echo " location.href='login.php';\n";
		echo "//-->";
		echo " </Script>";
		echo "</head>";
		echo "</html>";
	}
?>