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
		$totalNCF = $_POST["totalNCF"];

		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];

		
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
	
	for ($i=1; $i<6; $i++) {
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
	for ($i=1; $i<6; $i++) {
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



$chinapatient_insert = "INSERT INTO `patient-china` ( `num` , `patientID` , `school` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` ,`MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `cellphone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` ,`BoneGraft_main` , `BoneGraft_select` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete` , `Combined_with_other_craniofacial_disorders` ,`Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` ,`beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10` , `beforeSurgery_11` , `beforeSurgery_other` , `beforeSurgery_other_reason` ,`familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics1` , `pedigree_graphics2` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` ,`usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` ,`surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname` ) VALUES ('', '".$patientID."', '".$school."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$cellphone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$pedigree_img[1]."', '".$pedigree_img[2]."', '".$pedigree_img[3]."', '".$pedigree_img[4]."', '".$pedigree_img[5]."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$hospitalname."')";
$query_Chinapatient = mysql_query($chinapatient_insert); //病患基本資料
		



$cn_lang_recode_ins = "INSERT INTO `patient_cn_lang_record` ( 
`num` , `NCFID` , `NCFMedicalNum` , `patientID` , `branch` , `serialcode` , `patientName` , 
`DrID` , `status` , `BIHosTimeYear` , `BIHosTimeMonth` , `BIHosTimeDay` , `speechDr` , `hypernasality` , 
`mild` , `moderate` , `severity` , `hyponasality` , `mix` , `cdsr` , `visble` , `rt` , `lt` , `bil` , `audible` , 
`nt` , `Grimace` , `hsn` , `lp` , `rl` , `Omission_ck` , `Omission` , `nvs_ck` , `nvs` , `mo_ck` , `mo` , 
`scv_ck` , `scv` , `CVCCV_ck` , `CVCCV` , `CVCVV_ck` , `CVCVV` , `Fronting_ck` , `Fronting` , `Backing_ck` , 
`Backing` , `lsa_ck` , `lsa` , `arx_ck` , `arx` , `Stopping_ck` , `Stopping` , `Affrication_ck` , `Affrication` , 
`Deaffrication_ck` , `Deaffrication` , `Aspiration_ck` , `Aspiration` , `Unaspiration_ck` , `Unaspiration` , 
`Naslization_ck` , `Naslization` , `Lateralization_ck` , `Lateralization` , `ac_ck` , `ac` , `oa_ck` , `oa` ,
`Glottal` , `phf` , `phls` , `oca` , `wkp` , `Omission2` , `Nasalization` , `other_vpr_ck` , `other_vpr` ,
`Intelligibility` , `VPI` , `RecF` , `RecHP` , `RecST` , `RecNPS` , `Other_ER` , `TTPN` , `sht_month` , `sht_day` ,
`pdmc` , `astp` , `tmf` , `stee` , `fuptp` , `fuptp_oth` , `fuptp_txt` , `mlss` , `tmcost` , `npy_ck` , `npy` , `lat_ck` , `lat` , `spty_ck` , 
`spty` , `totalRMB` , `tRMBps` , `Deductible` , `ddps` , `ncfts_ck` , `ncftsRMB` , `selfpay` , `pedigree_graphics_other1` , `pedigree_graphics_other2` , `pedigree_graphics_other3` , `pedigree_graphics_other4` , `pedigree_graphics_other5` , `PGO1` , `PGO2` , 
`PGO3` , `PGO4` , `PGO5` , `remark` )
VALUES (
'', '".$NCFID."', '".$NCFMedicalNum."', '".$patientID."', '".$branch."', '".$serialcode."', '".$patientName."', 
'".$DrID."', '".$status."', '".$BIHosTimeYear."', '".$BIHosTimeMonth."', '".$BIHosTimeDay."', '".$speechDr."', '".$hypernasality."', 
'".$mild."', '".$moderate."', '".$severity."', '".$hyponasality."', '".$mix."', '".$cdsr."', '".$visble."', '".$rt."', '".$lt."', '".$bil."', '".$audible."', 
'".$nt."', '".$Grimace."', '".$hsn."', '".$lp."', '".$rl."', '".$Omission_ck."', '".$Omission."' , '".$nvs_ck."' , '".$nvs."' , '".$mo_ck."' , '".$mo."' , 
'".$scv_ck."' , '".$scv."' , '".$CVCCV_ck."' , '".$CVCCV."' , '".$CVCVV_ck."' , '".$CVCVV."' , '".$Fronting_ck."' , '".$Fronting."' , '".$Backing_ck."' , 
'".$Backing."' , '".$lsa_ck."' , '".$lsa."' , '".$arx_ck."' , '".$arx."' , '".$Stopping_ck."' , '".$Stopping."' , '".$Affrication_ck."' , '".$Affrication."' , 
'".$Deaffrication_ck."' , '".$Deaffrication."' , '".$Aspiration_ck."' , '".$Aspiration."' , '".$Unaspiration_ck."' , '".$Unaspiration."' , 
'".$Naslization_ck."' , '".$Naslization."' , '".$Lateralization_ck."' , '".$Lateralization."' , '".$ac_ck."' , '".$ac."' , '".$oa_ck."' , '".$oa."' , 
'".$Glottal."' , '".$phf."' , '".$phls."' , '".$oca."' , '".$wkp."' , '".$Omission2."' , '".$Nasalization."' , '".$other_vpr_ck."' , '".$other_vpr."' , 
'".$Intelligibility."' , '".$VPI."' , '".$RecF."' , '".$RecHP."' , '".$RecST."' , '".$RecNPS."' , '".$Other_ER."' , '".$TTPN."' , '".$sht_month."' , '".$sht_day."' , 
'".$pdmc."' , '".$astp."' , '".$tmf."' , '".$stee."' , '".$fuptp."' , '".$fuptp_oth."', '".$fuptp_txt."', '".$mlss."' , '".$tmcost."' , '".$npy_ck."' , '".$npy."' , '".$lat_ck."' , '".$lat."' , '".$spty_ck."' , 
'".$spty."' , '".$totalRMB."' , '".$tRMBps."' , '".$Deductible."' , '".$ddps."' , '".$ncfts_ck."' , '".$ncftsRMB."' , '".$selfpay."' , '".$pedigree_graphics_other[1]."' , '".$picpaths_patienrecord[2]."' , '".$picpaths_patienrecord[3]."' , '".$picpaths_patienrecord[4]."' , '".$picpaths_patienrecord[5]."' , '".$PGO1."' , '".$PGO2."' , 
'".$PGO3."' , '".$PGO4."' , '".$PGO5."' , '".$remark."')";
$query_chinapatientrecord = mysql_query($cn_lang_recode_ins); //語言治療病例表
		
		
$CNPat_insert = "INSERT INTO `patient-china-record` ( `num` , `patientID` , `school` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` ,`MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `cellphone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` ,`BoneGraft_main` , `BoneGraft_select` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete` , `Combined_with_other_craniofacial_disorders` ,`Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` ,`beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10` , `beforeSurgery_11` , `beforeSurgery_other` , `beforeSurgery_other_reason` ,`familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics1` , `pedigree_graphics2` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` ,`usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` ,`surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname` ) VALUES ('', '".$patientID."', '".$school."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$cellphone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$pedigree_img[1]."', '".$pedigree_img[2]."', '".$pedigree_img[3]."', '".$pedigree_img[4]."', '".$pedigree_img[5]."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$hospitalname."')";//	$query_Chinapatient2 = mysql_query($CNPat_insert);
$query_CNPat_insert = mysql_query($CNPat_insert);
		//echo $chinapatient_insert."<br/><br/>".$cn_lang_recode_ins."<br/><br/>".$CNPat_insert;
	    
		
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