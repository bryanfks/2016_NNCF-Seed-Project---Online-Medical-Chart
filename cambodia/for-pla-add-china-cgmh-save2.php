<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$caseYear  = $_POST["caseYear"];
		$caseMonth  = $_POST["caseMonth"];
		$caseDay  = $_POST["caseDay"];
		
		$NCFID = $_POST["NCFID"];	// NCF ID
		
		$qMaxNCFID = mysql_query("SELECT MAX(serialcode) FROM `chinapatientrecord` WHERE NCFID='".$NCFID."'");
		$valueMaxNCFID = mysql_fetch_array($qMaxNCFID);
		
		$maxNums = $valueMaxNCFID["MAX(serialcode)"]; //取得病患之最新病歷的開案次數，上限為9
		//echo $maxNums."<br/>";
		if(($maxNums < 10) || ($maxNums != 10) || ($maxNums != "10")){
			$serialcode = $maxNums + 1;
			$NCFMedicalNum = $NCFID."1".$serialcode;
		}
		//echo $NCFMedicalNum."<br/>";
		
		
		$surgeryDrName  = $_POST["surgeryDrName"];
		$languageTherapist  = $_POST["languageTherapist"];
		$orthodontics  = $_POST["orthodontics"];
		$MedicalRecordNumber  = $_POST["MedicalRecordNumber"];
		$idno  = $_POST["idno"];
		$name  = $_POST["name"];
		$gender  = $_POST["gender"];
		$birthYear  = $_POST["birthYear"];
		$birthMonth  = $_POST["birthMonth"];
		$birthDay  = $_POST["birthDay"];
		$profession  = $_POST["profession"];
		$tel  = $_POST["tel"];
		$education  = $_POST["education"];
		$address  = $_POST["address"];
		$contactperson  = $_POST["contactperson"];
		$relationship  = $_POST["relationship"];
		$phone  = $_POST["phone"];
		$h2hdistance  = $_POST["h2hdistance"];
		$height  = $_POST["height"];
		$weight  = $_POST["weight"];
		$diagnosis_unilateral_cleft_lip_1  = $_POST["diagnosis_unilateral_cleft_lip_1"];
		$diagnosis_unilateral_cleft_lip  = $_POST["diagnosis_unilateral_cleft_lip"];
		$diagnosis_bilateral_cleft_lip_2  = $_POST["diagnosis_bilateral_cleft_lip_2"];
		$diagnosis_bilateral_cleft_lip  = $_POST["diagnosis_bilateral_cleft_lip"];
		$CleftPalate  = $_POST["CleftPalate"];
		$incomplete_main  = $_POST["incomplete_main"];
		$incomplete  = $_POST["incomplete"];
		$complete_main  = $_POST["complete_main"];
		$complete  = $_POST["complete"];
		
		$BoneGraft_main  = $_POST["BoneGraft_main"];
		$BoneGraft_select  = $_POST["BoneGraft_select"];
		
		$Combined_with_other_craniofacial_disorders  = $_POST["Combined_with_other_craniofacial_disorders"];
		$Combined_with_other_craniofacial_disorders_text  = $_POST["Combined_with_other_craniofacial_disorders_text"];
		
		$Cleft_lip_and_palate_surgery  = $_POST["Cleft_lip_and_palate_surgery"];
		$beforeSurgery_1  = $_POST["beforeSurgery_1"];
		$beforeSurgery_2  = $_POST["beforeSurgery_2"];
		$beforeSurgery_3  = $_POST["beforeSurgery_3"];
		$beforeSurgery_4  = $_POST["beforeSurgery_4"];
		$beforeSurgery_5  = $_POST["beforeSurgery_5"];
		$beforeSurgery_6  = $_POST["beforeSurgery_6"];
		$beforeSurgery_7  = $_POST["beforeSurgery_7"];
		$beforeSurgery_8  = $_POST["beforeSurgery_8"];
		$beforeSurgery_9  = $_POST["beforeSurgery_9"];
		$beforeSurgery_10  = $_POST["beforeSurgery_10"];
		$beforeSurgery_11  = $_POST["beforeSurgery_11"];
		$beforeSurgery_other  = $_POST["beforeSurgery_other"];
		$beforeSurgery_other_reason  = $_POST["beforeSurgery_other_reason"];
		$familyMembers  = $_POST["familyMembers"];
		$live_together  = $_POST["live_together"];
		$fatherAge  = $_POST["fatherAge"];
		$fatherProfession_main  = $_POST["fatherProfession_main"];
		$fatherProfession  = $_POST["fatherProfession"];
		$motherAge  = $_POST["motherAge"];
		$motherProfession_main  = $_POST["motherProfession_main"];
		$motherProfession  = $_POST["motherProfession"];
		
		$pedigree_graphics  = $_POST["pedigree_graphics"];// need frocess graphics.
		
		$descriptionCaseFamily  = $_POST["descriptionCaseFamily"];
		$mainSourceofIncome  = $_POST["mainSourceofIncome"];
		$income  = $_POST["income"];
		$fixedExpenditure1  = $_POST["fixedExpenditure1"];
		$fixedExpenditure2  = $_POST["fixedExpenditure2"];
		$fixedExpenditure3  = $_POST["fixedExpenditure3"];
		$fixedExpenditure4  = $_POST["fixedExpenditure4"];
		$extimatedExpenditures  = $_POST["extimatedExpenditures"];
		$usageofSocialResources  = $_POST["usageofSocialResources"];
		$smileTrain  = $_POST["smileTrain"];
		$MSitem  = $_POST["MSitem"];
		$MSOther  = $_POST["MSOther"];
		$MSOther_text  = $_POST["MSOther_text"];
		$LAunit  = $_POST["LAunit"];
		$LAitem  = $_POST["LAitem"];
		$OAunit  = $_POST["OAunit"];
		$OAitem  = $_POST["OAitem"];
		$surgicalAssistanceForMedicalExpenses  = $_POST["surgicalAssistanceForMedicalExpenses"];
		$surgicalAssistanceForMedicalExpenses_sel  = $_POST["surgicalAssistanceForMedicalExpenses_sel"];
		$speechTherapySubsidies  = $_POST["speechTherapySubsidies"];
		$transportationSubsidies  = $_POST["transportationSubsidies"];
		$preoperativeOrthodonticSubsidies  = $_POST["preoperativeOrthodonticSubsidies"];
		$NCFAssistance_Other  = $_POST["NCFAssistance_Other"];
		$NCFAssistance_Other_text  = $_POST["NCFAssistance_Other_text"];
		$signature = $_POST["signature"];
		$BoneGraft = $_POST["BoneGraft"];
		
		//$NCFMedicalNum  = $_POST["NCFMedicalNum"];	// 病歷表編號
		
		//處理圖片區塊
		//1. 病患：pedigree_graphics
		//2. 病歷表：A. pedigree_graphics1
		//                B. pedigree_graphics2
		
		//A. 病患NCF ID: $NCFID
		//B. 病歷表 ID: $NCFMedicalNum
		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在 For 病患
		$pat_NCFID_path = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFID; 		// 設定病患照片路徑
		if(is_dir($pat_NCFID_path)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFID."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFID, 0777);			// create new image fold by new member fold
			$img_path_patient = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFID."/";		// photo on server path.
			umask($oldmask);
		}
		// 複製上傳的圖片到已病例號碼所建立的資料夾內
		$filename = $_FILES['pedigree_graphics']['name'];										// get picture's file name.
		if(!empty($filename)){
			copy($_FILES['pedigree_graphics']['tmp_name'], $img_path_patient.$_FILES['pedigree_graphics']['name']);	// save picture from temp_file to fold.
			$picpaths = "http://www.seed-nncf.org/cambodia/photo/patientrecord/".$NCFID."/".$filename;			// picture path for show picture on page.
			unset($_SESSION["pedigree_graphics"]);
			$_SESSION['photo'] = $picpaths;
		}else {
			$picpaths = "";
		}
		//}
		
		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在 For 病歷表
		$pat_NCFMedicalNum_path = "/home/customer/seed-nncf.org/www/cambodia/photo/medicalrecord/".$NCFMedicalNum; 		// 設定病患照片路徑
		if(is_dir($pat_NCFMedicalNum_path)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/cambodia/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/cambodia/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/cambodia/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		
		for ($i=1; $i<13; $i++) {
			$filenames[$i] = $_FILES['pedigree_graphics'.$i]['name'];										// get picture's file name.
			if(!empty($filenames[$i])){
				copy($_FILES['pedigree_graphics'.$i]['tmp_name'], $img_path_patient_record.$_FILES['pedigree_graphics'.$i]['name']);	// save picture from temp_file to fold.
				$picpaths_patienrecord[$i] = "http://www.seed-nncf.org/cambodia/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
				unset($_SESSION["pedigree_graphics"][$i]);
				$_SESSION['pedigree_graphics'][$i] = $picpaths[$i];
			}else {
				$picpaths_patienrecord[$i] = "";
			}
			
		}
		
		
		$chinapatient_sql ="UPDATE `chinapatient` SET `school` = '".$school."', `caseYear` = '".$caseYear."', `caseMonth` = '".$caseMonth."', `caseDay` = '".$caseDay."', `NCFID` = '".$NCFID."', `surgeryDrName` = '".$surgeryDrName."', `languageTherapist` = '".$languageTherapist."', `orthodontics` = '".$orthodontics."',`MedicalRecordNumber` = '".$MedicalRecordNumber."', `idno` = '".$idno."', `name` = '".$name."', `gender` = '".$gender."', `birthYear` = '".$birthYear."', `birthMonth` = '".$birthMonth."', `birthDay` = '".$birthDay."', `profession` = '".$profession."', `tel` = '".$tel."', `education` = '".$education."', `address` = '".$address."', `contactperson` = '".$contactperson."', `relationship` = '".$relationship."', `phone` = '".$phone."', `h2hdistance` = '".$h2hdistance."', `height` = '".$height."', `weight` = '".$weight."', `diagnosis_unilateral_cleft_lip_1` = '".$diagnosis_unilateral_cleft_lip_1."', `diagnosis_unilateral_cleft_lip` = '".$diagnosis_unilateral_cleft_lip."', `diagnosis_bilateral_cleft_lip_2` = '".$diagnosis_bilateral_cleft_lip_2."', `diagnosis_bilateral_cleft_lip` = '".$diagnosis_bilateral_cleft_lip."',`BoneGraft_main` = '".$BoneGraft_main."', `BoneGraft_select` = '".$BoneGraft_select."', `CleftPalate` = '".$CleftPalate."', `incomplete_main` = '".$incomplete_main."', `incomplete` = '".$incomplete."', `complete_main` = '".$complete_main."', `complete` = '".$complete."', `Combined_with_other_craniofacial_disorders` = '".$Combined_with_other_craniofacial_disorders."',`Combined_with_other_craniofacial_disorders_text` = '".$Combined_with_other_craniofacial_disorders_text."', `Cleft_lip_and_palate_surgery` = '".$Cleft_lip_and_palate_surgery."', `beforeSurgery_1` = '".$beforeSurgery_1."', `beforeSurgery_2` = '".$beforeSurgery_2."', `beforeSurgery_3` = '".$beforeSurgery_3."', `beforeSurgery_4` = '".$beforeSurgery_4."', `beforeSurgery_5` = '".$beforeSurgery_5."',`beforeSurgery_6` = '".$beforeSurgery_6."', `beforeSurgery_7` = '".$beforeSurgery_7."', `beforeSurgery_8` = '".$beforeSurgery_8."', `beforeSurgery_9` = '".$beforeSurgery_9."', `beforeSurgery_10` = '".$beforeSurgery_10."', `beforeSurgery_11` = '".$beforeSurgery_11."', `beforeSurgery_other` = '".$beforeSurgery_other."', `beforeSurgery_other_reason` = '".$beforeSurgery_other_reason."',`familyMembers` = '".$familyMembers."', `live_together` = '".$live_together."', `fatherAge` = '".$fatherAge."', `fatherProfession_main` = '".$fatherProfession_main."', `fatherProfession` = '".$fatherProfession."', `motherAge` = '".$motherAge."', `motherProfession_main` = '".$motherProfession_main."', `motherProfession` = '".$motherProfession."', `pedigree_graphics` = '".$picpaths."', `descriptionCaseFamily` = '".$descriptionCaseFamily."', `mainSourceofIncome` = '".$mainSourceofIncome."', `income` = '".$income."', `fixedExpenditure1` = '".$fixedExpenditure1."', `fixedExpenditure2` = '".$fixedExpenditure2."', `fixedExpenditure3` = '".$fixedExpenditure3."', `fixedExpenditure4` = '".$fixedExpenditure4."', `extimatedExpenditures` = '".$extimatedExpenditures."',`usageofSocialResources` = '".$usageofSocialResources."', `smileTrain` = '".$smileTrain."', `MSitem` = '".$MSitem."', `MSOther` = '".$MSOther."', `MSOther_text` = '".$MSOther_text."', `LAunit` = '".$LAunit."', `LAitem` = '".$LAitem."', `OAunit` = '".$OAunit."', `OAitem` = '".$OAitem."', `surgicalAssistanceForMedicalExpenses` = '".$surgicalAssistanceForMedicalExpenses."',`surgicalAssistanceForMedicalExpenses_sel` = '".$surgicalAssistanceForMedicalExpenses_sel."', `speechTherapySubsidies` = '".$speechTherapySubsidies."', `transportationSubsidies` = '".$transportationSubsidies."', `preoperativeOrthodonticSubsidies` = '".$preoperativeOrthodonticSubsidies."', `NCFAssistance_Other` = '".$NCFAssistance_Other."', `NCFAssistance_Other_text` = '".$NCFAssistance_Other_text."', `signature` = '".$signature."', `remark` = '".$remark."', `ncfCheck` = '".$ncfCheck."', `hospitalname` = '".$hospitalname."', `DrID` = '".$DrID."' WHERE `NCFID` = '".$NCFID."' LIMIT 1";
		
		
		//$NCFMedicalNum  = $_POST["NCFMedicalNum"];
		$branch = $_POST["branch"];										// 手術科別代碼
																						// serialcode : 病患的就診次數流水編號
		$patientName  = $_POST["patientName"];
		$BIHosTimeYear  = $_POST["BIHosTimeYear"];
		$BIHosTimeMonth  = $_POST["BIHosTimeMonth"];
		$BIHosTimeDay  = $_POST["BIHosTimeDay"];
		$surgeryTimeYear  = $_POST["surgeryTimeYear"];
		$surgeryTimeMonth  = $_POST["surgeryTimeMonth"];
		$surgeryTimeDay  = $_POST["surgeryTimeDay"];
		$LHosTimeYear  = $_POST["LHosTimeYear"];
		$LHosTimeMonth  = $_POST["LHosTimeMonth"];
		$LHosTimeDay  = $_POST["LHosTimeDay"];
		$Anesthesia  = $_POST["Anesthesia"];
		$surgeon  = $_POST["surgeon"];
		$anesthesiologist  = $_POST["anesthesiologist"];
		$surgeryType  = $_POST["surgeryType"];
		$surgeryTypeOther_text  = $_POST["surgeryTypeOther_text"];
		$repairTypeUnilateralcleftlip  = $_POST["repairTypeUnilateralcleftlip"];
		$repairTypeUnilateralcleftlip_text  = $_POST["repairTypeUnilateralcleftlip_text"];
		$repairTypeBilateralcleftlip  = $_POST["repairTypeBilateralcleftlip"];
		$repairTypeBilateralcleftlip_text  = $_POST["repairTypeBilateralcleftlip_text"];
		$repairTypeCleftpalate  = $_POST["repairTypeCleftpalate"];
		$repairTypeCleftpalate_text  = $_POST["repairTypeCleftpalate_text"];
		$beforeSurgeryYear  = $_POST["beforeSurgeryYear"];
		$beforeSurgeryMonth  = $_POST["beforeSurgeryMonth"];
		$beforeSurgeryDay  = $_POST["beforeSurgeryDay"];
		
		$pedigree_graphics1  = $_POST["pedigree_graphics1"]; //圖片
		
		
		$afterSurgeryYear  = $_POST["afterSurgeryYear"];
		$afterSurgeryMonth  = $_POST["afterSurgeryMonth"];
		$afterSurgeryDay  = $_POST["afterSurgeryDay"];
		$pedigree_graphics2  = $_POST["pedigree_graphics2"];//圖片
		
		
		$subsidiesforMedicalExpenses  = $_POST["subsidiesforMedicalExpenses"];
		$TotalSFME  = $_POST["TotalSFME"];
		$NCFAllowance  = $_POST["NCFAllowance"];
		$NCFProportion  = $_POST["NCFProportion"];
		$PatientPay  = $_POST["PatientPay"];
		$PatientProportion  = $_POST["PatientProportion"];
		$OtherPay = $_POST["OtherPay"];	//  09/16/2013
		
		$transportationSubsidies  = $_POST["transportationSubsidies"];
		$NCFSOT  = $_POST["NCFSOT"];
		$PatientSOT  = $_POST["PatientSOT"];
		$NCFTotalSubsidies  = $_POST["NCFTotalSubsidies"];
		
		
		
		// 指：粘貼其他資料圖片
		$pat_NCFMedical_other = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFMedicalNum; 		// 設定病患照片路徑
		if(is_dir($pat_NCFMedical_other)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/cambodia/photo/patientrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		// 複製上傳的圖片到已病例號碼所建立的資料夾內
		$pic_other = $_FILES['pedigree_graphics_other']['name'];										// get picture's file name.
		if(!empty($pic_other)){
			copy($_FILES['pedigree_graphics_other']['tmp_name'], $img_path_patient.$_FILES['pedigree_graphics_other']['name']);	// save picture from temp_file to fold.
			$pedigree_graphics_other = "http://www.seed-nncf.org/cambodia/photo/patientrecord/".$NCFID."/".$pic_other;			// picture path for show picture on page.
			unset($_SESSION["pedigree_graphics_other"]);
			$_SESSION['pedigree_graphics_other'] = $picpaths;
		}else {
			$pedigree_graphics_other = "";
		}
		
		$KHpatient_insert = "INSERT INTO `KHpatient` ( `num` ,`school` , `patientID` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `NCFMedicalNum` , `surgeryDrName` , `languageTherapist` , `orthodontics` , `MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete`, `BoneGraft_main`, `BoneGraft_select`, `Combined_with_other_craniofacial_disorders`, `Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` , `beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10`, `beforeSurgery_11`, `beforeSurgery_other` , `beforeSurgery_other_reason` , `familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` , `surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname`) 
VALUES ('', '".$school."', '".$seid."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$NCFMedicalNum."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$picpaths."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."' , '".$hospitalname."')";
		
		
		$chinapatientrecord_insert = "INSERT INTO `chinapatientrecord` ( `num` , `patientID` , `branch` , `serialcode` , `NCFID` , `NCFMedicalNum` , `patientName` , `BIHosTimeYear` , `BIHosTimeMonth` , `BIHosTimeDay` , `surgeryTimeYear` , `surgeryTimeMonth` , `surgeryTimeDay` , `LHosTimeYear` , `LHosTimeMonth` , `LHosTimeDay` , `Anesthesia` , `surgeon` , `anesthesiologist` , `surgeryType` , `surgeryTypeOther_text` , `repairTypeUnilateralcleftlip` , `repairTypeUnilateralcleftlip_text` , `repairTypeBilateralcleftlip` , `repairTypeBilateralcleftlip_text` , `repairTypeCleftpalate` , `repairTypeCleftpalate_text` , `BoneGraft` , `beforeSurgeryYear` , `beforeSurgeryMonth` , `beforeSurgeryDay` , `pedigree_graphics1` , `afterSurgeryYear` , `afterSurgeryMonth` , `afterSurgeryDay` , `pedigree_graphics2` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `h2hdistance` , `subsidiesforMedicalExpenses` , `TotalSFME` , `NCFAllowance` , `NCFProportion` , `PatientPay` , `PatientProportion` , `OtherPay` , `transportationSubsidies` , `NCFSOT` , `PatientSOT` , `NCFTotalSubsidies` , `remark` , `hospitalname` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `pedigree_graphics6` , `pedigree_graphics7` , `pedigree_graphics8` , `pedigree_graphics9` , `pedigree_graphics10` , `pedigree_graphics11` , `pedigree_graphics12` , `pedigree_graphics_other` , `DrID` , `ncfCheck` , `ncfAllMedicaid` , `ncfAllTransport` , `ncfAllTotal` , `ncfAllRemark` ) VALUES ('', '".$patientID."', '".$branch."', '".$serialcode."', '".$NCFID."', '".$NCFMedicalNum."', '".$name."', '".$BIHosTimeYear."', '".$BIHosTimeMonth."', '".$BIHosTimeDay."', '".$surgeryTimeYear."', '".$surgeryTimeMonth."', '".$surgeryTimeDay."', '".$LHosTimeYear."', '".$LHosTimeMonth."', '".$LHosTimeDay."', '".$Anesthesia."', '".$surgeon."', '".$anesthesiologist."', '".$surgeryType."', '".$surgeryTypeOther_text."', '".$repairTypeUnilateralcleftlip."', '".$repairTypeUnilateralcleftlip_text."', '".$repairTypeBilateralcleftlip."', '".$repairTypeBilateralcleftlip_text."', '".$repairTypeCleftpalate."', '".$repairTypeCleftpalate_text."', '".$BoneGraft."', '".$beforeSurgeryYear."', '".$beforeSurgeryMonth."', '".$beforeSurgeryDay."', '".$picpaths_patienrecord[1]."', '".$afterSurgeryYear."', '".$afterSurgeryMonth."', '".$afterSurgeryDay."', '".$picpaths_patienrecord[2]."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$h2hdistance."', '".$subsidiesforMedicalExpenses."', '".$TotalSFME."', '".$NCFAllowance."', '".$NCFProportion."', '".$PatientPay."', '".$PatientProportion."', '".$OtherPay."', '".$transportationSubsidies."', '".$NCFSOT."', '".$PatientSOT."', '".$NCFTotalSubsidies."', '".$remark."', '".$hospitalname."', '".$picpaths_patienrecord[3]."', '".$picpaths_patienrecord[4]."', '".$picpaths_patienrecord[5]."', '".$picpaths_patienrecord[6]."', '".$picpaths_patienrecord[7]."', '".$picpaths_patienrecord[8]."', '".$picpaths_patienrecord[9]."', '".$picpaths_patienrecord[10]."', '".$picpaths_patienrecord[11]."', '".$picpaths_patienrecord[12]."', '".$pedigree_graphics_other."', '".$DrID."', '".$ncfCheck."', '".$ncfAllMedicaid."', '".$ncfAllTransport."', '".$ncfAllTotal."', '".$ncfAllRemark."')";

		$query_Chinapatient = mysql_query($chinapatient_sql);
		$query_KHpatient = mysql_query($KHpatient_insert); //此儲存的資料同步病歷表資料
		$query_chinapatientrecord = mysql_query($chinapatientrecord_insert);
		//echo $chinapatient_sql."<br/><br/><br/><br/><br/><br/>".$KHpatient_insert."<br/><br/><br/><br/><br/><br/>".$chinapatientrecord_insert;
		
		
			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    //echo " location.href='for-pla-part.php?pat_id=".$patient_id."&branch=".$branch."';\n";
			echo "location.href='searchList.php'";
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