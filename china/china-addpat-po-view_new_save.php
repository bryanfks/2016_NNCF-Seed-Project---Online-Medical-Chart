<?PHP
	session_cache_limiter("none");
	session_start();
	 
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
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
		$usageofSocialResources = $_POST["usageofSocialResources"];
		$smileTrain = $_POST["smileTrain"];
		$MSitem = $_POST["MSitem"];
		$MSOther = $_POST["MSOther"];
		$MSOther_text = $_POST["MSOther_text"];
		$LAunit = $_POST["LAunit"];
		$LAitem = $_POST["LAitem"];
		$OAunit = $_POST["OAunit"];
		$OAitem = $_POST["OAitem"];
		$surgicalAssistanceForMedicalExpenses = $_POST["surgicalAssistanceForMedicalExpenses"];
		$surgicalAssistanceForMedicalExpenses_sel = $_POST["surgicalAssistanceForMedicalExpenses_sel"];
		$speechTherapySubsidies = $_POST["speechTherapySubsidies"];
		$transportationSubsidies = $_POST["transportationSubsidies"];
		$preoperativeOrthodonticSubsidies = $_POST["preoperativeOrthodonticSubsidies"];
		$NCFAssistance_Other = $_POST["NCFAssistance_Other"];
		$NCFAssistance_Other_text = $_POST["NCFAssistance_Other_text"];
		$signature = $_POST["signature"];
		$remark = $_POST["remark"];
		$hospitalname = $_POST["hospitalname"];
		
		
		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];
		$NCFID = $_POST["NCFID"];
		$patientName = $_POST["patientName"];
		$BIHosTimeYear = $_POST["BIHosTimeYear"];
		$BIHosTimeMonth = $_POST["BIHosTimeMonth"];
		$BIHosTimeDay = $_POST["BIHosTimeDay"];
		$surgeryTimeYear = $_POST["surgeryTimeYear"];
		$surgeryTimeMonth = $_POST["surgeryTimeMonth"];
		$surgeryTimeDay = $_POST["surgeryTimeDay"];
		$LHosTimeYear = $_POST["LHosTimeYear"];
		$LHosTimeMonth = $_POST["LHosTimeMonth"];
		$LHosTimeDay = $_POST["LHosTimeDay"];
		$Anesthesia = $_POST["Anesthesia"];
		$surgeon = $_POST["surgeon"];
		$anesthesiologist = $_POST["anesthesiologist"];
		$surgeryType = $_POST["surgeryType"];
		$surgeryTypeOther_text = $_POST["surgeryTypeOther_text"];
		$repairTypeUnilateralcleftlip = $_POST["repairTypeUnilateralcleftlip"];
		$repairTypeUnilateralcleftlip_text = $_POST["repairTypeUnilateralcleftlip_text"];
		$repairTypeBilateralcleftlip = $_POST["repairTypeBilateralcleftlip"];
		$repairTypeBilateralcleftlip_text = $_POST["repairTypeBilateralcleftlip_text"];
		$repairTypeCleftpalate = $_POST["repairTypeCleftpalate"];
		$repairTypeCleftpalate_text = $_POST["repairTypeCleftpalate_text"];
		$BoneGraft = $_POST["BoneGraft"];
		

		$beforeSurgeryYear1 = $_POST["beforeSurgeryYear1"];
		$beforeSurgeryMonth1 = $_POST["beforeSurgeryMonth1"];
		$beforeSurgeryDay1 = $_POST["beforeSurgeryDay1"];
		$beforeSurgeryYear2 = $_POST["beforeSurgeryYear2"];
		$beforeSurgeryMonth2 = $_POST["beforeSurgeryMonth2"];
		$beforeSurgeryDay2 = $_POST["beforeSurgeryDay2"];
		
		$afterSurgeryYear1 = $_POST["afterSurgeryYear1"];
		$afterSurgeryMonth1 = $_POST["afterSurgeryMonth1"];
		$afterSurgeryDay1 = $_POST["afterSurgeryDay1"];
		$afterSurgeryYear2 = $_POST["afterSurgeryYear2"];
		$afterSurgeryMonth2 = $_POST["afterSurgeryMonth2"];
		$afterSurgeryDay2 = $_POST["afterSurgeryDay2"];
		$afterSurgeryYear3 = $_POST["afterSurgeryYear3"];
		$afterSurgeryMonth3 = $_POST["afterSurgeryMonth3"];
		$afterSurgeryDay3 = $_POST["afterSurgeryDay3"];


		$usageofSocialResources = $_POST["usageofSocialResources"];
		$smileTrain = $_POST["smileTrain"];
		$MSitem = $_POST["MSitem"];
		$MSOther = $_POST["MSOther"];
		$MSOther_text = $_POST["MSOther_text"];
		$LAunit = $_POST["LAunit"];
		$LAitem = $_POST["LAitem"];
		$OAunit = $_POST["OAunit"];
		$OAitem = $_POST["OAitem"];
		$h2hdistance = $_POST["h2hdistance"];
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
		$hospitalname = $_POST["hospitalname"];
			
		
		$NCFMedicalNum = $NCFID.$branch.$serialcode; // 病历表编号
		
		
		
	//1. 判斷預設存放圖片之資料夾是否存在？
	// 设定病患照片路径
	$NCFMedicalNum_path = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
	
	if(is_dir($NCFMedicalNum_path)){																			// 判断上列 病患照片路径 是否已存在
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
	} else {
		$oldmask = umask(0);
		mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
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
		


/*
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
`diagnosis_bilateral_cleft_lip_2` =  '".$diagnosis_bilateral_cleft_lip_2."',
`diagnosis_bilateral_cleft_lip` =  '".$diagnosis_bilateral_cleft_lip."',
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
*/

$CNPatient_sql = "INSERT INTO `patient-china-record` ( `num` , `patientID` , `school` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` ,`MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `cellphone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` ,`BoneGraft_main` , `BoneGraft_select` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete` , `Combined_with_other_craniofacial_disorders` ,`Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` ,`beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10` , `beforeSurgery_11` , `beforeSurgery_other` , `beforeSurgery_other_reason` ,`familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics1` , `pedigree_graphics2` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` ,`usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` ,`surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname` ) VALUES ('', '".$patientID."', '".$school."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$cellphone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$pedigree_img[1]."', '".$pedigree_img[2]."', '".$pedigree_img[3]."', '".$pedigree_img[4]."', '".$pedigree_img[5]."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$hospitalname."')";

/*		
$CNPatient_sql = "UPDATE `patient-china-record` SET `school` = '".$school."', 
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
`diagnosis_bilateral_cleft_lip_2` =  '".$diagnosis_bilateral_cleft_lip_2."',
`diagnosis_bilateral_cleft_lip` =  '".$diagnosis_bilateral_cleft_lip."',
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
*/



$chinapatientrecord_insert = "INSERT INTO `patientrecord-china` ( `num` , `patientID` , `branch` , `serialcode` , `NCFID` , `NCFMedicalNum` , `patientName` , `BIHosTimeYear` , `BIHosTimeMonth` , `BIHosTimeDay` , `surgeryTimeYear` , `surgeryTimeMonth` , `surgeryTimeDay` , `LHosTimeYear` , `LHosTimeMonth` , `LHosTimeDay` , `Anesthesia` , `surgeon` , `anesthesiologist` , `surgeryType` , `surgeryTypeOther_text` , `repairTypeUnilateralcleftlip` , `repairTypeUnilateralcleftlip_text` , `repairTypeBilateralcleftlip` , `repairTypeBilateralcleftlip_text` , `repairTypeCleftpalate` , `repairTypeCleftpalate_text` , `BoneGraft` , `beforeSurgeryYear1` , `beforeSurgeryMonth1` , `beforeSurgeryDay1` , `beforeSurgeryYear2` , `beforeSurgeryMonth2` , `beforeSurgeryDay2` , `pedigree_graphics1` , `afterSurgeryYear1` , `afterSurgeryMonth1` , `afterSurgeryDay1` , `afterSurgeryYear2` , `afterSurgeryMonth2` , `afterSurgeryDay2` , `afterSurgeryYear3` , `afterSurgeryMonth3` , `afterSurgeryDay3` , `pedigree_graphics2` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `h2hdistance` , `subsidiesforMedicalExpenses` , `TotalSFME` , `NCFAllowance` , `NCFProportion` , `PatientPay` ,`PatientProportion` , `transportationSubsidies` , `NCFSOT` , `PatientSOT` , `NCFTotalSubsidies` , `remark` , `hospitalname` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `pedigree_graphics_other1` , `pedigree_graphics_other2` , `pedigree_graphics_other3` , `pedigree_graphics_other4` , `pedigree_graphics_other5` , `PGO1` , `PGO2` , `PGO3` , `PGO4` , `PGO5` , `DrID` ) VALUES ('', '".$patientID."', '".$branch."', '".$serialcode."', '".$NCFID."', '".$NCFMedicalNum."', '".$patientName."', '".$BIHosTimeYear."', '".$BIHosTimeMonth."', '".$BIHosTimeDay."', '".$surgeryTimeYear."', '".$surgeryTimeMonth."', '".$surgeryTimeDay."', '".$LHosTimeYear."', '".$LHosTimeMonth."', '".$LHosTimeDay."', '".$Anesthesia."', '".$surgeon."', '".$anesthesiologist."', '".$surgeryType."', '".$surgeryTypeOther_text."', '".$repairTypeUnilateralcleftlip."', '".$repairTypeUnilateralcleftlip_text."', '".$repairTypeBilateralcleftlip."', '".$repairTypeBilateralcleftlip_text."', '".$repairTypeCleftpalate."', '".$repairTypeCleftpalate_text."', '".$BoneGraft."', '".$beforeSurgeryYear1."', '".$beforeSurgeryMonth1."', '".$beforeSurgeryDay1."', '".$beforeSurgeryYear2."', '".$beforeSurgeryMonth2."', '".$beforeSurgeryDay2."', '".$pedigree_img[1]."', '".$afterSurgeryYear1."', '".$afterSurgeryMonth1."', '".$afterSurgeryDay1."', '".$afterSurgeryYear2."', '".$afterSurgeryMonth2."', '".$afterSurgeryDay2."', '".$afterSurgeryYear3."', '".$afterSurgeryMonth3."', '".$afterSurgeryDay3."', '".$pedigree_img[2]."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$h2hdistance."', '".$subsidiesforMedicalExpenses."', '".$TotalSFME."', '".$NCFAllowance."', '".$NCFProportion."', '".$PatientPay."', '".$PatientProportion."', '".$transportationSubsidies."', '".$NCFSOT."', '".$PatientSOT."', '".$NCFTotalSubsidies."', '".$remark."', '".$hospitalname."' , '".$pedigree_img[3]."' , '".$pedigree_img[4]."' , '".$pedigree_img[5]."' , '".$pedigree_other[1]."' , '".$pedigree_other[2]."' , '".$pedigree_other[3]."' , '".$pedigree_other[4]."' , '".$pedigree_other[5]."' , '".$PGO[1]."' , '".$PGO[2]."' , '".$PGO[3]."' , '".$PGO[4]."' , '".$PGO[5]."' , '".$DrID."')";
		
		$query_CNPatRecord = mysql_query($chinapatient_sql);
		$query_CNpatientrecord = mysql_query($CNPatient_sql);
		$query_chinapatientrecord = mysql_query($chinapatientrecord_insert);
	//	echo $chinapatient_sql."<br/><br/><br/>".$CNPatient_sql."<br/><br/><br/>".$chinapatientrecord_insert;
	    
		
		$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    echo "location.href='main.php'";
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