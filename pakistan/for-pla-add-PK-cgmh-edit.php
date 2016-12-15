<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$num = $_POST["num"];
		$num2 = $_POST["num2"];  //指同一病患的第二筆以上的病歷資料編號
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
		//$beforeSurgery_11 = $_POST["beforeSurgery_12"];
		$beforeSurgery_other = $_POST["beforeSurgery_other"];
		//echo $beforeSurgery_9 = $_POST["beforeSurgery_9"]."<br/><br/><br/>";
		$beforeSurgery_other_reason = $_POST["beforeSurgery_other_reason"];
		$familyMembers = $_POST["familyMembers"];
		$live_together = $_POST["live_together"];
		$fatherAge = $_POST["fatherAge"];
		$fatherProfession_main = $_POST["fatherProfession_main"]; 
		$fatherProfession = $_POST["fatherProfession"];
		$motherAge = $_POST["motherAge"]; 
		$motherProfession_main = $_POST["motherProfession_main"];
		$motherProfession = $_POST["motherProfession"]; 
		$pedigree_graphics = $_POST["pedigree_graphics"];
		$descriptionCaseFamily = $_POST["descriptionCaseFamily"];
		$mainSourceofIncome = $_POST["mainSourceofIncome"];
		$income = $_POST["income"]; 
		$fixedExpenditure1 = $_POST["fixedExpenditure1"];
		$fixedExpenditure2 = $_POST["fixedExpenditure2"]; 
		$fixedExpenditure3 = $_POST["fixedExpenditure3"]; 
		$fixedExpenditure4 = $_POST["fixedExpenditure4"];
		$extimatedExpenditures = $_POST["extimatedExpenditures"];
		
		$usageofSocialResources = $_POST["usageofSocialResources"]; 

		if($usageofSocialResources == "N"){
			$smileTrain = "";
			$MSitem = "";
			$MSOther = "";
			$MSOther_text = "";
			$LAunit = "";
			$LAitem = "";
			$OAunit = "";
			$OAitem = "";
		}else {
			$smileTrain = $_POST["smileTrain"];
			$MSitem = $_POST["MSitem"]; 
			$MSOther = $_POST["MSOther"];
			$MSOther_text = $_POST["MSOther_text"];
			$LAunit = $_POST["LAunit"]; 
			$LAitem = $_POST["LAitem"];
			$OAunit = $_POST["OAunit"];
			$OAitem = $_POST["OAitem"]; 
		}
		
		$surgicalAssistanceForMedicalExpenses = $_POST["surgicalAssistanceForMedicalExpenses"];
		$surgicalAssistanceForMedicalExpenses_sel = $_POST["surgicalAssistanceForMedicalExpenses_sel"];
		$speechTherapySubsidies = $_POST["speechTherapySubsidies"]; 
		$transportationSubsidies = $_POST["transportationSubsidies"]; 
		$preoperativeOrthodonticSubsidies = $_POST["preoperativeOrthodonticSubsidies"];
		$NCFAssistance_Other = $_POST["NCFAssistance_Other"];
		$NCFAssistance_Other_text = $_POST["NCFAssistance_Other_text"];
		$signature = $_POST["signature"];
		$hospitalname = $_POST["hospitalname"]; 
		$remark = $_POST["remark"];
		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];
		$patientName = $_POST["patientName"];
		$NCFID = $_POST["NCFID"];
		
		
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
	
		$beforeSurgeryYear = $_POST["beforeSurgeryYear"]; 
		$beforeSurgeryMonth = $_POST["beforeSurgeryMonth"];
		$beforeSurgeryDay = $_POST["beforeSurgeryDay"];
		$afterSurgeryYear = $_POST["afterSurgeryYear"]; 
		$afterSurgeryMonth = $_POST["afterSurgeryMonth"];
		$afterSurgeryDay = $_POST["afterSurgeryDay"];
		
		
		$h2hdistance = $_POST["h2hdistance"]; 
				
		$subsidiesforMedicalExpenses = $_POST["subsidiesforMedicalExpenses"]; 
		
		
		$TotalSFME = $_POST["TotalSFME"]; 
		$NCFAllowance = $_POST["NCFAllowance"];
		$NCFProportion = $_POST["NCFProportion"];
		$PatientPay = $_POST["PatientPay"];
		$PatientProportion = $_POST["PatientProportion"];
		$OtherPay = $_POST["OtherPay"];	//  09/16/2013
		$transportationSubsidies = $_POST["transportationSubsidies"]; 
		$NCFSOT = $_POST["NCFSOT"];
		$PatientSOT = $_POST["PatientSOT"]; 
		$NCFTotalSubsidies = $_POST["NCFTotalSubsidies"]; 
		$remark = $_POST["remark"];
		//$hospitalname = $_POST["hospitalname"];
		
		//$NCFMedicalNum = $_POST["NCFMedicalNum"];
		//$pedigree_graphics1 = $_POST["pedigree_graphics1"];
		//$pedigree_graphics2 = $_POST["pedigree_graphics2"];
		
		$DrID = $seid;
		//$pedigree_graphics_other = $_POST["pedigree_graphics_other"];
			
		$NCFMedicalNum = $NCFID.$branch.$serialcode; // 病历表编号
		
	
$chinapatient_sql ="UPDATE `PKpatient` SET `school` = '".$school."', `caseYear` = '".$caseYear."', `caseMonth` = '".$caseMonth."', `caseDay` = '".$caseDay."', `NCFID` = '".$NCFID."', `surgeryDrName` = '".$surgeryDrName."', `languageTherapist` = '".$languageTherapist."', `orthodontics` = '".$orthodontics."',`MedicalRecordNumber` = '".$MedicalRecordNumber."', `idno` = '".$idno."', `name` = '".$name."', `gender` = '".$gender."', `birthYear` = '".$birthYear."', `birthMonth` = '".$birthMonth."', `birthDay` = '".$birthDay."', `profession` = '".$profession."', `tel` = '".$tel."', `education` = '".$education."', `address` = '".$address."', `contactperson` = '".$contactperson."', `relationship` = '".$relationship."', `phone` = '".$phone."', `h2hdistance` = '".$h2hdistance."', `height` = '".$height."', `weight` = '".$weight."', `diagnosis_unilateral_cleft_lip_1` = '".$diagnosis_unilateral_cleft_lip_1."', `diagnosis_unilateral_cleft_lip` = '".$diagnosis_unilateral_cleft_lip."', `diagnosis_bilateral_cleft_lip_2` = '".$diagnosis_bilateral_cleft_lip_2."', `diagnosis_bilateral_cleft_lip` = '".$diagnosis_bilateral_cleft_lip."',`BoneGraft_main` = '".$BoneGraft_main."', `BoneGraft_select` = '".$BoneGraft_select."', `CleftPalate` = '".$CleftPalate."', `incomplete_main` = '".$incomplete_main."', `incomplete` = '".$incomplete."', `complete_main` = '".$complete_main."', `complete` = '".$complete."', `Combined_with_other_craniofacial_disorders` = '".$Combined_with_other_craniofacial_disorders."',`Combined_with_other_craniofacial_disorders_text` = '".$Combined_with_other_craniofacial_disorders_text."', `Cleft_lip_and_palate_surgery` = '".$Cleft_lip_and_palate_surgery."', `beforeSurgery_1` = '".$beforeSurgery_1."', `beforeSurgery_2` = '".$beforeSurgery_2."', `beforeSurgery_3` = '".$beforeSurgery_3."', `beforeSurgery_4` = '".$beforeSurgery_4."', `beforeSurgery_5` = '".$beforeSurgery_5."',`beforeSurgery_6` = '".$beforeSurgery_6."', `beforeSurgery_7` = '".$beforeSurgery_7."', `beforeSurgery_8` = '".$beforeSurgery_8."', `beforeSurgery_9` = '".$beforeSurgery_9."', `beforeSurgery_10` = '".$beforeSurgery_10."', `beforeSurgery_11` = '".$beforeSurgery_11."', `beforeSurgery_other` = '".$beforeSurgery_other."', `beforeSurgery_other_reason` = '".$beforeSurgery_other_reason."',`familyMembers` = '".$familyMembers."', `live_together` = '".$live_together."', `fatherAge` = '".$fatherAge."', `fatherProfession_main` = '".$fatherProfession_main."', `fatherProfession` = '".$fatherProfession."', `motherAge` = '".$motherAge."', `motherProfession_main` = '".$motherProfession_main."', `motherProfession` = '".$motherProfession."', `pedigree_graphics` = '".$picpaths."', `descriptionCaseFamily` = '".$descriptionCaseFamily."', `mainSourceofIncome` = '".$mainSourceofIncome."', `income` = '".$income."', `fixedExpenditure1` = '".$fixedExpenditure1."', `fixedExpenditure2` = '".$fixedExpenditure2."', `fixedExpenditure3` = '".$fixedExpenditure3."', `fixedExpenditure4` = '".$fixedExpenditure4."', `extimatedExpenditures` = '".$extimatedExpenditures."',`usageofSocialResources` = '".$usageofSocialResources."', `smileTrain` = '".$smileTrain."', `MSitem` = '".$MSitem."', `MSOther` = '".$MSOther."', `MSOther_text` = '".$MSOther_text."', `LAunit` = '".$LAunit."', `LAitem` = '".$LAitem."', `OAunit` = '".$OAunit."', `OAitem` = '".$OAitem."', `surgicalAssistanceForMedicalExpenses` = '".$surgicalAssistanceForMedicalExpenses."',`surgicalAssistanceForMedicalExpenses_sel` = '".$surgicalAssistanceForMedicalExpenses_sel."', `speechTherapySubsidies` = '".$speechTherapySubsidies."', `transportationSubsidies` = '".$transportationSubsidies."', `preoperativeOrthodonticSubsidies` = '".$preoperativeOrthodonticSubsidies."', `NCFAssistance_Other` = '".$NCFAssistance_Other."', `NCFAssistance_Other_text` = '".$NCFAssistance_Other_text."', `signature` = '".$signature."', `remark` = '".$remark."', `ncfCheck` = '".$ncfCheck."', `hospitalname` = '".$hospitalname."', `DrID` = '".$DrID."' WHERE `NCFID` = '".$NCFID."' LIMIT 1";
		
		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在 For 病歷表
		$pat_NCFMedicalNum_path = "/home/customer/seed-nncf.org/www/pakistan/photo/medicalrecord/".$NCFMedicalNum; 		// 設定病患照片路徑
		//echo $pat_NCFMedicalNum_path."<br><br>";
		
		
		if(is_dir($pat_NCFMedicalNum_path)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/pakistan/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			//echo $img_path_patient_record."<br><br>";
			
		} else {
			$oldmask = umask(0);
			@mkdir("/home/customer/seed-nncf.org/www/pakistan/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_record = "/home/customer/seed-nncf.org/www/pakistan/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
			//echo $img_path_patient_record."<br><br>";
			
			umask($oldmask);
		}
		
		for ($i=1; $i<13; $i++) {
			$filenames[$i] = $_FILES['pedigree_graphics'.$i]['name'];										// get picture's file name.
			if(!empty($filenames[$i])){
				copy($_FILES['pedigree_graphics'.$i]['tmp_name'], $img_path_patient_record.$_FILES['pedigree_graphics'.$i]['name']);	// save picture from temp_file to fold.
				$picpaths_patienrecord[$i] = "http://www.seed-nncf.org/pakistan/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
				unset($_SESSION["pedigree_graphics"][$i]);
				$_SESSION['pedigree_graphics'][$i] = $picpaths[$i];
			}else {
				if($i == 1){
					$picpaths_patienrecord[1] = $ChinaPatientRecord_graphics1;
				}else if($i == 2){
					$picpaths_patienrecord[2] = $ChinaPatientRecord_graphics2;
				}
			//echo $picpaths_patienrecord[$i]."<br/><br/><br/><br/>";
			}
		}
		
		// 指：粘貼其他資料圖片
		$pat_NCFMedical_other = "/home/customer/seed-nncf.org/www/pakistan/photo/patientrecord/".$NCFMedicalNum; 		// 設定病患照片路徑
		if(is_dir($pat_NCFMedical_other)){																													// 判斷上列 病患照片路徑 是否已存在
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/pakistan/photo/patientrecord/".$NCFMedicalNum."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			@mkdir("/home/customer/seed-nncf.org/www/pakistan/photo/patientrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
			$img_path_patient_other = "/home/customer/seed-nncf.org/www/pakistan/photo/patientrecord/".$NCFMedicalNum."/";		// photo on server path.
			umask($oldmask);
		}
		
		// 複製上傳的圖片到已病例號碼所建立的資料夾內
		$img_path_patient = "/home/customer/seed-nncf.org/www/pakistan/photo/patientrecord/".$NCFID."/";
		
		$pic_other = $_FILES['pedigree_graphics_other']['name'];										// get picture's file name.
		//echo "<br><br>".$pic_other."<br><br>";
		
		if(!empty($pic_other)){
			copy($_FILES['pedigree_graphics_other']['tmp_name'], $img_path_patient.$_FILES['pedigree_graphics_other']['name']);	// save picture from temp_file to fold.
			$pedigree_graphics_other = "http://www.seed-nncf.org/pakistan/photo/patientrecord/".$NCFID."/".$pic_other;			// picture path for show picture on page.
			
			unset($_SESSION["pedigree_graphics_other"]);
			$_SESSION['pedigree_graphics_other'] = $picpaths;
		}else {
			$pedigree_graphics_other = "";
		}
		
		//echo "<br/><br/><br/><br/>".$picpaths."<br/><br/><br/><br/>";
		
		$selChinaPatientRecord = "SELECT * FROM `PKpatientrecord` WHERE NCFMedicalNum='".$num2."'";
		$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
		$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
		
		
		if(empty($picpaths_patienrecord[1])){
			$picpaths_patienrecord[1] = $resultChinaPatientRecord['pedigree_graphics1'];
		}
		if(empty($picpaths_patienrecord[2])){
			$picpaths_patienrecord[2] = $resultChinaPatientRecord['pedigree_graphics2'];
		}
		if(empty($picpaths_patienrecord[3])){
			$picpaths_patienrecord[3] = $resultChinaPatientRecord['pedigree_graphics3'];
		}
		if(empty($picpaths_patienrecord[4])){
			$picpaths_patienrecord[4] = $resultChinaPatientRecord['pedigree_graphics4'];
		}
		if(empty($picpaths_patienrecord[5])){
			$picpaths_patienrecord[5] = $resultChinaPatientRecord['pedigree_graphics5'];
		}
		if(empty($picpaths_patienrecord[6])){
			$picpaths_patienrecord[6] = $resultChinaPatientRecord['pedigree_graphics6'];
		}
		if(empty($picpaths_patienrecord[7])){
			$picpaths_patienrecord[7] = $resultChinaPatientRecord['pedigree_graphics7'];
		}
		if(empty($picpaths_patienrecord[8])){
			$picpaths_patienrecord[8] = $resultChinaPatientRecord['pedigree_graphics8'];
		}
		if(empty($picpaths_patienrecord[9])){
			$picpaths_patienrecord[9] = $resultChinaPatientRecord['pedigree_graphics9'];
		}
		if(empty($picpaths_patienrecord[10])){
			$picpaths_patienrecord[10] = $resultChinaPatientRecord['pedigree_graphics10'];
		}
		if(empty($picpaths_patienrecord[11])){
			$picpaths_patienrecord[11] = $resultChinaPatientRecord['pedigree_graphics11'];
		}
		if(empty($picpaths_patienrecord[12])){
			$picpaths_patienrecord[12] = $resultChinaPatientRecord['pedigree_graphics12'];
		}
		if(empty($pedigree_graphics_other)){
			$pedigree_graphics_other = $resultChinaPatientRecord['pedigree_graphics_other'];
		}
		
		$KHpatient_sql ="UPDATE `PKpatient2` SET `school` = '".$school."', `caseYear` = '".$caseYear."', `caseMonth` = '".$caseMonth."', `caseDay` = '".$caseDay."', `surgeryDrName` = '".$surgeryDrName."', `languageTherapist` = '".$languageTherapist."', `orthodontics` = '".$orthodontics."',`MedicalRecordNumber` = '".$MedicalRecordNumber."', `idno` = '".$idno."', `name` = '".$name."', `gender` = '".$gender."', `birthYear` = '".$birthYear."', `birthMonth` = '".$birthMonth."', `birthDay` = '".$birthDay."', `profession` = '".$profession."', `tel` = '".$tel."', `education` = '".$education."', `address` = '".$address."', `contactperson` = '".$contactperson."', `relationship` = '".$relationship."', `phone` = '".$phone."', `h2hdistance` = '".$h2hdistance."', `height` = '".$height."', `weight` = '".$weight."', `diagnosis_unilateral_cleft_lip_1` = '".$diagnosis_unilateral_cleft_lip_1."', `diagnosis_unilateral_cleft_lip` = '".$diagnosis_unilateral_cleft_lip."', `diagnosis_bilateral_cleft_lip_2` = '".$diagnosis_bilateral_cleft_lip_2."', `diagnosis_bilateral_cleft_lip` = '".$diagnosis_bilateral_cleft_lip."',`BoneGraft_main` = '".$BoneGraft_main."', `BoneGraft_select` = '".$BoneGraft_select."', `CleftPalate` = '".$CleftPalate."', `incomplete_main` = '".$incomplete_main."', `incomplete` = '".$incomplete."', `complete_main` = '".$complete_main."', `complete` = '".$complete."', `Combined_with_other_craniofacial_disorders` = '".$Combined_with_other_craniofacial_disorders."',`Combined_with_other_craniofacial_disorders_text` = '".$Combined_with_other_craniofacial_disorders_text."', `Cleft_lip_and_palate_surgery` = '".$Cleft_lip_and_palate_surgery."', `beforeSurgery_1` = '".$beforeSurgery_1."', `beforeSurgery_2` = '".$beforeSurgery_2."', `beforeSurgery_3` = '".$beforeSurgery_3."', `beforeSurgery_4` = '".$beforeSurgery_4."', `beforeSurgery_5` = '".$beforeSurgery_5."',`beforeSurgery_6` = '".$beforeSurgery_6."', `beforeSurgery_7` = '".$beforeSurgery_7."', `beforeSurgery_8` = '".$beforeSurgery_8."', `beforeSurgery_9` = '".$beforeSurgery_9."', `beforeSurgery_10` = '".$beforeSurgery_10."', `beforeSurgery_11` = '".$beforeSurgery_11."', `beforeSurgery_other` = '".$beforeSurgery_other."', `beforeSurgery_other_reason` = '".$beforeSurgery_other_reason."',`familyMembers` = '".$familyMembers."', `live_together` = '".$live_together."', `fatherAge` = '".$fatherAge."', `fatherProfession_main` = '".$fatherProfession_main."', `fatherProfession` = '".$fatherProfession."', `motherAge` = '".$motherAge."', `motherProfession_main` = '".$motherProfession_main."', `motherProfession` = '".$motherProfession."', `pedigree_graphics` = '".$picpaths."', `descriptionCaseFamily` = '".$descriptionCaseFamily."', `mainSourceofIncome` = '".$mainSourceofIncome."', `income` = '".$income."', `fixedExpenditure1` = '".$fixedExpenditure1."', `fixedExpenditure2` = '".$fixedExpenditure2."', `fixedExpenditure3` = '".$fixedExpenditure3."', `fixedExpenditure4` = '".$fixedExpenditure4."', `extimatedExpenditures` = '".$extimatedExpenditures."',`usageofSocialResources` = '".$usageofSocialResources."', `smileTrain` = '".$smileTrain."', `MSitem` = '".$MSitem."', `MSOther` = '".$MSOther."', `MSOther_text` = '".$MSOther_text."', `LAunit` = '".$LAunit."', `LAitem` = '".$LAitem."', `OAunit` = '".$OAunit."', `OAitem` = '".$OAitem."', `surgicalAssistanceForMedicalExpenses` = '".$surgicalAssistanceForMedicalExpenses."',`surgicalAssistanceForMedicalExpenses_sel` = '".$surgicalAssistanceForMedicalExpenses_sel."', `speechTherapySubsidies` = '".$speechTherapySubsidies."', `transportationSubsidies` = '".$transportationSubsidies."', `preoperativeOrthodonticSubsidies` = '".$preoperativeOrthodonticSubsidies."', `NCFAssistance_Other` = '".$NCFAssistance_Other."', `NCFAssistance_Other_text` = '".$NCFAssistance_Other_text."', `signature` = '".$signature."', `remark` = '".$remark."', `hospitalname` = '".$hospitalname."', `DrID` = '".$DrID."' WHERE `NCFMedicalNum` = '".$num2."' LIMIT 1";
		
		$chinapatientrecord_sql = "UPDATE `PKpatientrecord` SET `patientName` = '".$patientName."' , `BIHosTimeYear` = '".$BIHosTimeYear."' , `BIHosTimeMonth` = '".$BIHosTimeMonth."' , `BIHosTimeDay` = '".$BIHosTimeDay."' , `surgeryTimeYear` = '".$surgeryTimeYear."' , `surgeryTimeMonth` = '".$surgeryTimeMonth."' , `surgeryTimeDay` = '".$surgeryTimeDay."' , `LHosTimeYear` = '".$LHosTimeYear."' , `LHosTimeMonth` = '".$LHosTimeMonth."' , `LHosTimeDay` = '".$LHosTimeDay."' , `Anesthesia` = '".$Anesthesia."' , `surgeon` = '".$surgeon."' , `anesthesiologist` = '".$anesthesiologist."' , `surgeryType` = '".$surgeryType."' , `surgeryTypeOther_text` = '".$surgeryTypeOther_text."' , `repairTypeUnilateralcleftlip` = '".$repairTypeUnilateralcleftlip."' , `repairTypeUnilateralcleftlip_text` = '".$repairTypeUnilateralcleftlip_text."', `repairTypeBilateralcleftlip` = '".$repairTypeBilateralcleftlip."', `repairTypeBilateralcleftlip_text` = '".$repairTypeBilateralcleftlip_text."', `repairTypeCleftpalate` = '".$repairTypeCleftpalate."', `repairTypeCleftpalate_text` = '".$repairTypeCleftpalate_text."', `BoneGraft` = '".$BoneGraft."', `beforeSurgeryYear` = '".$beforeSurgeryYear."', `beforeSurgeryMonth` = '".$beforeSurgeryMonth."', `beforeSurgeryDay` = '".$beforeSurgeryDay."', `pedigree_graphics1` = '".$picpaths_patienrecord[1]."', `afterSurgeryYear` = '".$afterSurgeryYear."', `afterSurgeryMonth` = '".$afterSurgeryMonth."', `afterSurgeryDay` = '".$afterSurgeryDay."', `pedigree_graphics2` = '".$picpaths_patienrecord[2]."', `usageofSocialResources` = '".$usageofSocialResources."', `smileTrain` = '".$smileTrain."', `MSitem` = '".$MSitem."', `MSOther` = '".$MSOther."', `MSOther_text` = '".$MSOther_text."', `LAunit` = '".$LAunit."', `LAitem` = '".$LAitem."', `OAunit` = '".$OAunit."', `OAitem` = '".$OAitem."', `h2hdistance` = '".$h2hdistance."', `subsidiesforMedicalExpenses` = '".$subsidiesforMedicalExpenses."', `TotalSFME` = '".$TotalSFME."', `NCFAllowance` = '".$NCFAllowance."', `NCFProportion` = '".$NCFProportion."', `PatientPay` = '".$PatientPay."',`PatientProportion` = '".$PatientProportion."',`OtherPay` = '".$OtherPay."', `transportationSubsidies` = '".$transportationSubsidies."', `NCFSOT` = '".$NCFSOT."', `PatientSOT` = '".$PatientSOT."', `NCFTotalSubsidies` = '".$NCFTotalSubsidies."', `remark` = '".$remark."', `hospitalname` = '".$hospitalname."', `pedigree_graphics3` = '".$picpaths_patienrecord[3]."', `pedigree_graphics4` = '".$picpaths_patienrecord[4]."', `pedigree_graphics5` = '".$picpaths_patienrecord[5]."', `pedigree_graphics6` = '".$picpaths_patienrecord[6]."', `pedigree_graphics7` = '".$picpaths_patienrecord[7]."', `pedigree_graphics8` = '".$picpaths_patienrecord[8]."', `pedigree_graphics9` = '".$picpaths_patienrecord[9]."', `pedigree_graphics10` = '".$picpaths_patienrecord[10]."', `pedigree_graphics11` = '".$picpaths_patienrecord[11]."', `pedigree_graphics12` = '".$picpaths_patienrecord[12]."', `pedigree_graphics_other` = '".$pedigree_graphics_other."', `DrID` = '".$DrID."', `ncfCheck` = '".$ncfCheck."' WHERE `num` = '".$num."' LIMIT 1";
		
		$query_Chinapatient = mysql_query($chinapatient_sql);
		$query_KHpatient = mysql_query($KHpatient_sql);
		$query_chinapatientrecord = mysql_query($chinapatientrecord_sql);
		//echo "<br/><br/><br/><br/>".$chinapatient_sql."<br/><br/><br/><br/>".$KHpatient_sql."<br/><br/><br/><br/>".$chinapatientrecord_sql;
	
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