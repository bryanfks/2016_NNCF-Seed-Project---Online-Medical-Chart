<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$ncfCheck = $_POST["ncfCheck"];
		$ncfAllMedicaid = $_POST["ncfAllMedicaid"];
		$ncfAllTransport = $_POST["ncfAllTransport"];
		$ncfAllTotal = $_POST["ncfAllTotal"];
		$ncfAllRemark = $_POST["ncfAllRemark"];
		
		$num = $_POST["num"];
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
		$hospitalname = $_POST["hospitalname"]; 
		
		
		$remark = $_POST["remark"];
		$remark2 = $_POST["remark2"];
		
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
		$usageofSocialResources = $_POST["usageofSocialResources"];
		$smileTrain = $_POST["smileTrain"];
		$MSitem = $_POST["MSitem"]; 
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
		$OtherPay = $_POST["OtherPay"];	//  09/16/2013
		
		$transportationSubsidies = $_POST["transportationSubsidies"]; 
		$NCFSOT = $_POST["NCFSOT"];
		$PatientSOT = $_POST["PatientSOT"]; 
		$NCFTotalSubsidies = $_POST["NCFTotalSubsidies"]; 
		
		$ncfCheck = $_POST["ncfCheck"];
		//$hospitalname = $_POST["hospitalname"];
		
		$NCFMedicalNum = $_POST["NCFMedicalNum"];
		$DrID = $seid;
		
		$chinapatient_sql ="UPDATE `KHpatient` SET `remark` = '".$remark."' WHERE `NCFMedicalNum` = '".$NCFMedicalNum."' LIMIT 1";
		
		
		
		$selChinaPatientRecord = "SELECT * FROM `chinapatientrecord` WHERE NCFMedicalNum='".$NCFMedicalNum."'";
		$queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
		$resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
		//echo "<br/><br/><br/>".$resultChinaPatientRecord['pedigree_graphics1']."<br/><br/><br/>";
		
		
		
		$chinapatientrecord_sql = "UPDATE `chinapatientrecord` SET `ncfCheck` = '".$ncfCheck."',`ncfAllMedicaid` = '".$ncfAllMedicaid."', `ncfAllTransport` = '".$ncfAllTransport."', `ncfAllTotal` = '".$ncfAllTotal."', `ncfAllRemark` = '".$ncfAllRemark."' WHERE `NCFMedicalNum` = '".$NCFMedicalNum."' LIMIT 1";	  
	
		
		$query_Chinapatient = mysql_query($chinapatient_sql);
		$query_chinapatientrecord = mysql_query($chinapatientrecord_sql);
		//echo $chinapatient_sql."<br/><br/>".$chinapatientrecord_sql;
		
		
			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    //echo " location.href='for-pla-part.php?pat_id=".$patient_id."&branch=".$branch."';\n";
			echo "location.href='cambodiaList.php'";
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