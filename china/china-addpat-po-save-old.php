<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$NCFID = $_POST["NCFID"];
		$NCFMedicalNum = $_POST["NCFMedicalNum"];
		
		$school = $_POST["school"];
		$caseYear = $_POST["caseYear"];
		$caseMonth = $_POST["caseMonth"];
		$caseDay = $_POST["caseDay"];
		$surgeryDrName = $_POST["surgeryDrName"];
		$languageTherapist = $_POST["languageTherapist"];
		$orthodontics = $_POST["orthodontics"];
		$idno = $_POST["idno"];
		$name = $_POST["name"];
		$gender = $_POST["gender"];
		$MedicalRecordNumber = $_POST["MedicalRecordNumber"];
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
		
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$diagnosis_unilateral_cleft_lip_1 = $_POST["diagnosis_unilateral_cleft_lip_1"];
		$diagnosis_unilateral_cleft_lip = $_POST["diagnosis_unilateral_cleft_lip"];
		$diagnosis_bilateral_cleft_lip_2 = $_POST["diagnosis_bilateral_cleft_lip_2"];
		$diagnosis_bilateral_cleft_lip = $_POST["diagnosis_bilateral_cleft_lip"];
		$CleftPalate = $_POST["CleftPalate"];
		$incomplete_main = $_POST["incomplete_main"];
		$incomplete = $_POST["incomplete"];
		$complete_main = $_POST["complete_main"];
		$complete = $_POST["complete"];
		$BoneGraft_main = $_POST["BoneGraft_main"];
		$BoneGraft_select = $_POST["BoneGraft_select"];
		$Combined_with_other_craniofacial_disorders = $_POST["Combined_with_other_craniofacial_disorders"];
		$Combined_with_other_craniofacial_disorders_text = $_POST["Combined_with_other_craniofacial_disorders_text"];
		$Cleft_lip_and_palate_surgery = $_POST["Cleft_lip_and_palate_surgery"];
		$beforeSurgery_1 = $_POST["beforeSurgery_1"];
		$beforeSurgery_12 = $_POST["beforeSurgery_12"];
		$beforeSurgery_13 = $_POST["beforeSurgery_13"];
		$beforeSurgery_14 = $_POST["beforeSurgery_14"];
		$beforeSurgery_15 = $_POST["beforeSurgery_15"];
		$beforeSurgery_16 = $_POST["beforeSurgery_16"];
		$beforeSurgery_17 = $_POST["beforeSurgery_17"];
		$beforeSurgery_18 = $_POST["beforeSurgery_18"];
		$beforeSurgery_19 = $_POST["beforeSurgery_19"];
		$beforeSurgery_20 = $_POST["beforeSurgery_20"];
		$beforeSurgery_22 = $_POST["beforeSurgery_22"];
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

		$surgeon = $_POST["surgeon"];
		$BIHosTimeYear = $_POST["BIHosTimeYear"];
		$BIHosTimeMonth = $_POST["BIHosTimeMonth"];
		$BIHosTimeDay = $_POST["BIHosTimeDay"];
		$LHosTimeYear0 = $_POST["LHosTimeYear"];
		$LHosTimeMonth0 = $_POST["LHosTimeMonth"];
		$LHosTimeDay0 = $_POST["LHosTimeDay"];
		$surgeryTimeYear0 = $_POST["surgeryTimeYear"];
		$surgeryTimeMonth0 = $_POST["surgeryTimeMonth"];
		$surgeryTimeDay0 = $_POST["surgeryTimeDay"];
		$beforeSurgeryYear = $_POST["beforeSurgeryYear"];
		$beforeSurgeryMonth = $_POST["beforeSurgeryMonth"];
		$beforeSurgeryDay = $_POST["beforeSurgeryDay"];
		//pedigree_graphics1

		$afterSurgeryYear = $_POST["afterSurgeryYear"];
		$afterSurgeryMonth = $_POST["afterSurgeryMonth"];
		$afterSurgeryDay = $_POST["afterSurgeryDay"];
		//pedigree_graphics2

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
		
		//$NCFMedicalNum = $NCFID.$branch.$serialcode; // 病历表编号
		//$NCFMedicalNum  = $_POST["NCFMedicalNum"];	// 病历表编号
		
		//处理图片区块
		//1. 病患：pedigree_graphics
		//2. 病历表：A. pedigree_graphics1
		//                B. pedigree_graphics2
		
		//A. 病患NCF ID: $NCFID
		//B. 病历表 ID: $NCFMedicalNum
		
		//  下列程式为：判断欲建立的图片资料夹是否已经存在 For 病患
		
		$pat_NCFID_path = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
		if(is_dir($pat_NCFID_path)){																													// 判断上列 病患照片路径 是否已存在
			$img_path_patient = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		
		
		//  下列程式为：判断欲建立的图片资料夹是否已经存在 For 病历表
		$pat_NCFMedicalNum_path = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
		if(is_dir($pat_NCFMedicalNum_path)){																													// 判断上列 病患照片路径 是否已存在
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		
		for ($i=1; $i<3; $i++) {
			$filenames[$i] = $_FILES['pedigree_graphics'.$i]['name'];										// get picture's file name.
			if(!empty($filenames[$i])){
				copy($_FILES['pedigree_graphics'.$i]['tmp_name'], $img_path_patient_record.$_FILES['pedigree_graphics'.$i]['name']);	// save picture from temp_file to fold.
				$picpaths_patienrecord[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
				unset($_SESSION["pedigree_graphics"][$i]);
				$_SESSION['pedigree_graphics'][$i] = $picpaths[$i];
			}else {
				$picpaths_patienrecord[$i] = "";
			}
			
		}
		
		
		// 指：粘贴其他资料图片
		$pat_NCFMedical_other = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
		if(is_dir($pat_NCFMedical_other)){																													// 判断上列 病患照片路径 是否已存在
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/china/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		// 复制上传的图片到已病例号码所建立的资料夹内
		$pic_other = $_FILES['pedigree_graphics_other']['name'];										// get picture's file name.
		if(!empty($pic_other)){
			copy($_FILES['pedigree_graphics_other']['tmp_name'], $img_path_patient.$_FILES['pedigree_graphics_other']['name']);	// save picture from temp_file to fold.
			$pedigree_graphics_other = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$pic_other;			// picture path for show picture on page.
			unset($_SESSION["pedigree_graphics_other"]);
			$_SESSION['pedigree_graphics_other'] = $picpaths;
		}else {
			$pedigree_graphics_other = "";
		}
		


		$chinapatient_insert = "INSERT INTO `patient-china` ( `num` , `patientID` , `school` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` ,`MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` ,`BoneGraft_main` , `BoneGraft_select` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete` , `Combined_with_other_craniofacial_disorders` ,`Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` ,`beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10` , `beforeSurgery_11` , `beforeSurgery_other` , `beforeSurgery_other_reason` ,`familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` ,`usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` ,`surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname` ) VALUES ('', '".$patientID."', '".$school."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$picpaths."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$hospitalname."')";
		$CNPat_insert = "INSERT INTO `patient-china-record` ( `num` , `patientID` , `school` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `NCFMedicalNum` , `surgeryDrName` , `languageTherapist` , `orthodontics` ,`MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` ,`BoneGraft_main` , `BoneGraft_select` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete` , `Combined_with_other_craniofacial_disorders` ,`Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` ,`beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10` , `beforeSurgery_11` , `beforeSurgery_other` , `beforeSurgery_other_reason` ,`familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` ,`usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` ,`surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `hospitalname` ) VALUES ('', '".$patientID."', '".$school."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$NCFMedicalNum."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$picpaths."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$hospitalname."')";
		$CNPatRecord_insert = "INSERT INTO `patientrecord-china` ( `num` , `patientID` , `branch` , `serialcode` , `NCFID` , `NCFMedicalNum` , `patientName` , `BIHosTimeYear` , `BIHosTimeMonth` , `BIHosTimeDay` , `surgeryTimeYear` , `surgeryTimeMonth` , `surgeryTimeDay` , `LHosTimeYear` , `LHosTimeMonth` , `LHosTimeDay` , `Anesthesia` , `surgeon` , `anesthesiologist` , `surgeryType` , `surgeryTypeOther_text` , `repairTypeUnilateralcleftlip` , `repairTypeUnilateralcleftlip_text` , `repairTypeBilateralcleftlip` , `repairTypeBilateralcleftlip_text` , `repairTypeCleftpalate` , `repairTypeCleftpalate_text` , `BoneGraft` , `beforeSurgeryYear` , `beforeSurgeryMonth` , `beforeSurgeryDay` , `pedigree_graphics1` , `afterSurgeryYear` , `afterSurgeryMonth` , `afterSurgeryDay` , `pedigree_graphics2` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `h2hdistance` , `subsidiesforMedicalExpenses` , `TotalSFME` , `NCFAllowance` , `NCFProportion` , `PatientPay` ,`PatientProportion` , `transportationSubsidies` , `NCFSOT` , `PatientSOT` , `NCFTotalSubsidies` , `remark` , `hospitalname` , `pedigree_graphics_other` ) VALUES ('', '".$patientID."', '".$branch."', '".$serialcode."', '".$NCFID."', '".$NCFMedicalNum."', '".$patientName."', '".$BIHosTimeYear."', '".$BIHosTimeMonth."', '".$BIHosTimeDay."', '".$surgeryTimeYear."', '".$surgeryTimeMonth."', '".$surgeryTimeDay."', '".$LHosTimeYear."', '".$LHosTimeMonth."', '".$LHosTimeDay."', '".$Anesthesia."', '".$surgeon."', '".$anesthesiologist."', '".$surgeryType."', '".$surgeryTypeOther_text."', '".$repairTypeUnilateralcleftlip."', '".$repairTypeUnilateralcleftlip_text."', '".$repairTypeBilateralcleftlip."', '".$repairTypeBilateralcleftlip_text."', '".$repairTypeCleftpalate."', '".$repairTypeCleftpalate_text."', '".$BoneGraft."', '".$beforeSurgeryYear."', '".$beforeSurgeryMonth."', '".$beforeSurgeryDay."', '".$picpaths_patienrecord[1]."', '".$afterSurgeryYear."', '".$afterSurgeryMonth."', '".$afterSurgeryDay."', '".$picpaths_patienrecord[2]."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$h2hdistance."', '".$subsidiesforMedicalExpenses."', '".$TotalSFME."', '".$NCFAllowance."', '".$NCFProportion."', '".$PatientPay."', '".$PatientProportion."', '".$transportationSubsidies."', '".$NCFSOT."', '".$PatientSOT."', '".$NCFTotalSubsidies."', '".$remark."', '".$hospitalname."','".$pedigree_graphics_other."')";
		
		$query_Chinapatient1 = mysql_query($chinapatient_insert);
		$query_Chinapatient2 = mysql_query($CNPat_insert);
		$query_chinapatientrecord = mysql_query($CNPatRecord_insert);
		
		//echo $CNPat_insert."<br/><br/>".$chinapatient_insert."<br/><br/>".$CNPatRecord_insert;
	    
		
		$_SESSION["record_Num"] = $record_num;
		$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
			echo "location.href='searchList.php?c=2'";
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