<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];

//越南病例系統


	if(!empty($seid) && !empty($sepwd)){


		//製作自動帶出NCF編號code
        $get_time = getdate();
    	$date_year =  $get_time['year'];  // Year is 4 bits.
    	$date = substr($date_year, 2);    // get Year last 2 bits.
        
        // if DB-Num. is not empty, get MAX no.
        $sel_Max = "SELECT MAX(NCFID) AS NCFID FROM `patient-vn`";
        $queryData = mysql_query($sel_Max);
        $result = mysql_fetch_array($queryData);
        $maxNums = $result['NCFID'];
        
        // split no 
        if(!empty($maxNums)){   // If $max !empty than split no
            $no_date = substr($maxNums,2,2);    // fetch last 4 bits flow Num..
            $flow_no = substr($maxNums,-4);     // fetch 4 bits flow No.

            if($no_date == $date){
                $flow_no = $flow_no+1;
				if($flow_no <10){
                    $flow_no = "000".$flow_no;
                }else if($flow_no <100){
                    $flow_no = "00".$flow_no;
                }else if($flow_no <1000){
                    $flow_no = "0".$flow_no;
                }else if($flow_no <10000){
                    $flow_no = $flow_no;
                }
                $NCFNumX = "VN".$date.$flow_no;
            }else{
                $NCFNumX = "VN".$date."0001";
            }
        }else{
            $NCFNumX = "VN".$date."0001";
        }
        

        
        // Make Vietnam patient's Medical Record Number.
        // // $recordData = "SELECT MAX(NCFMedicalNum) AS MAXNCFNUM FROM `patient-vn-record` WHERE `NCFID`='".$NCFNumX."'";
        // $recordData = "SELECT MAX(NCFMedicalNum) AS MAXNCFNUM FROM `patient-vn-record`";
        // @$queryRecordData = mysql_query($recordData);
        // @$resultRecordData = mysql_fetch_array($queryRecordData);
        // $NCFMedicalNum = $resultRecordData["MAXNCFNUM"];
    
        // // 建立病歷表編號
        // if(!empty($NCFMedicalNum)){ // If $max !empty than split no
        //     if($NCFMedicalNum <10){
        //         $NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
        //     }else if($NCFMedicalNum <100){
        //         $NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
        //     }
        // }
        
        $branch = "1";
    	$serialcode = "1";    //暂时以此当作同病患的病历表流水号
        $NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;

		$school = $_POST['hospital'];
		
		$caseYear  = $_POST["caseYear"];
		$caseMonth  = $_POST["caseMonth"];
		$caseDay  = $_POST["caseDay"];
		
		// $NCFID = $_POST["NCFID"];	// NCF ID
		$NCFID = $NCFNumX;

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
		
		// $NCFMedicalNum  = $_POST["NCFMedicalNum"];	// 病歷表編號
		$NCFMedicalNum = $NCFMedicalNumNow;	// 病歷表編號
		//處理圖片區塊
		
		// $branch = $_POST["branch"];										
		$branch = '1';	// 手術科別代碼
		$serialcode = '1'; 	// serialcode : 病患的就診次數流水編號

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
		
		// $pedigree_graphics1  = $_POST["pedigree_graphics1"]; //圖片
		
		
		$afterSurgeryYear  = $_POST["afterSurgeryYear"];
		$afterSurgeryMonth  = $_POST["afterSurgeryMonth"];
		$afterSurgeryDay  = $_POST["afterSurgeryDay"];
		// $pedigree_graphics2  = $_POST["pedigree_graphics2"];//圖片
		
		
		$subsidiesforMedicalExpenses  = $_POST["subsidiesforMedicalExpenses"];
		$TotalSFME  = $_POST["TotalSFME"];
		$NCFAllowance  = $_POST["NCFAllowance"];
		$NCFProportion  = $_POST["NCFProportion"];
		$PatientPay  = $_POST["PatientPay"];
		$PatientProportion  = $_POST["PatientProportion"];
		$transportationSubsidies  = $_POST["transportationSubsidies"];
		$NCFSOT  = $_POST["NCFSOT"];
		$PatientSOT  = $_POST["PatientSOT"];
		$NCFTotalSubsidies  = $_POST["NCFTotalSubsidies"];
		
		$OtherPay = $_POST["OtherPay"];	//  09/16/2013
		
		$remark = '0';




	//1. 判斷預設存放圖片之資料夾是否存在？
	// 设定病患照片路径
	$NCFMedicalNum_path = "/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/medicalrecord/".$NCFMedicalNum; 		// 设定病患照片路径
	
	if(is_dir($NCFMedicalNum_path)){																			// 判断上列 病患照片路径 是否已存在
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
	} else {
		$oldmask = umask(0);
		mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/medicalrecord/".$NCFMedicalNum, 0777);			// create new image fold by new member fold
		$imgPath = "/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/medicalrecord/".$NCFMedicalNum."/";		// photo on server path.
		umask($oldmask);
	}

	
	//2. 取得上傳圖片並複製到指定資料夾
	for ($i=1; $i<=12; $i++) {
		$filenames[$i] = $_FILES['pedigree_graphics'.$i]['name'];										// get picture's file name.
		if(!empty($filenames[$i])){
			copy($_FILES['pedigree_graphics'.$i]['tmp_name'], $imgPath.$_FILES['pedigree_graphics'.$i]['name']);	// save picture from temp_file to folder.
			//$picpaths_patienrecord[$i] = "http://www.seed-nncf.org/china/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			$pedigree_graphics[$i] = "http://www.seed-nncf.org/Vietnam/photo/medicalrecord/".$NCFMedicalNum."/".$filenames[$i];			// picture path for show picture on page.
			// unset($_SESSION["pedigree_graphics"][$i]);
			// $_SESSION['pedigree_graphics'][$i] = $picpaths[$i];
		}else {
			$pedigree_graphics[$i] = "";
		}
	}


	$PationRecord_path = '/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/patientrecord/';
	if(is_dir($PationRecord_path)){																			// 判断上列 病患照片路径 是否已存在
		$imgPath_other = "/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/patientrecord/".$NCFID."/";		// photo on server path.
	} else {
		$oldmask = umask(0);
		mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/patientrecord/".$NCFID, 0777);			// create new image fold by new member fold
		$imgPath_other = "/var/www/vhosts/seed-nncf.org/httpdocs/Vietnam/photo/patientrecord/".$NCFID."/";		// photo on server path.
		umask($oldmask);
	}

	// 複製上傳的圖片到已病例號碼所建立的資料夾內
	$pic_other = $_FILES['pedigree_graphics_other']['name'];										// get picture's file name.
	if(!empty($pic_other)){
		copy($_FILES['pedigree_graphics_other']['tmp_name'], $imgPath_other.$_FILES['pedigree_graphics_other']['name']);	// save picture from temp_file to fold.
		// $pedigree_graphics_other = "http://www.seed-nncf.org/Vietnam/photo/patientrecord/".$NCFID."/".$pic_other;			// picture path for show picture on page.
		$pedigree_graphics_other = "http://www.seed-nncf.org/Vietnam/photo/patientrecord/".$NCFID."/".$pic_other;
		// unset($_SESSION["pedigree_graphics_other"]);
		// $_SESSION['pedigree_graphics_other'] = $picpaths;
	}else {
		$pedigree_graphics_other = "";
	}




		
		$insPinfo = "INSERT INTO `patient-vn` ( `num` ,`school` , `patientID` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` , `MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete`, `BoneGraft_main`, `BoneGraft_select`, `Combined_with_other_craniofacial_disorders`, `Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` , `beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10`, `beforeSurgery_11`, `beforeSurgery_other` , `beforeSurgery_other_reason` , `familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` , `surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `ncfCheck` , `hospitalname`) 
VALUES ('', '".$school."', '".$seid."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$picpaths."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$ncfCheck."', '".$hospitalname."')";
		
		$queryPinfo = mysql_query($insPinfo);
		mysql_free_result ($queryPinfo);


		$insPinfoRecordUse = "INSERT INTO `patient-vn-recorduse` ( `num` ,`school` , `patientID` , `caseYear` , `caseMonth` , `caseDay` , `NCFID` , `surgeryDrName` , `languageTherapist` , `orthodontics` , `MedicalRecordNumber` , `idno` , `name` , `gender` , `birthYear` , `birthMonth` , `birthDay` , `profession` , `tel` , `education` , `address` , `contactperson` , `relationship` , `phone` , `h2hdistance` , `height` , `weight` , `diagnosis_unilateral_cleft_lip_1` , `diagnosis_unilateral_cleft_lip` , `diagnosis_bilateral_cleft_lip_2` , `diagnosis_bilateral_cleft_lip` , `CleftPalate` , `incomplete_main` , `incomplete` , `complete_main` , `complete`, `BoneGraft_main`, `BoneGraft_select`, `Combined_with_other_craniofacial_disorders`, `Combined_with_other_craniofacial_disorders_text` , `Cleft_lip_and_palate_surgery` , `beforeSurgery_1` , `beforeSurgery_2` , `beforeSurgery_3` , `beforeSurgery_4` , `beforeSurgery_5` , `beforeSurgery_6` , `beforeSurgery_7` , `beforeSurgery_8` , `beforeSurgery_9` , `beforeSurgery_10`, `beforeSurgery_11`, `beforeSurgery_other` , `beforeSurgery_other_reason` , `familyMembers` , `live_together` , `fatherAge` , `fatherProfession_main` , `fatherProfession` , `motherAge` , `motherProfession_main` , `motherProfession` , `pedigree_graphics` , `descriptionCaseFamily` , `mainSourceofIncome` , `income` , `fixedExpenditure1` , `fixedExpenditure2` , `fixedExpenditure3` , `fixedExpenditure4` , `extimatedExpenditures` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `surgicalAssistanceForMedicalExpenses` , `surgicalAssistanceForMedicalExpenses_sel` , `speechTherapySubsidies` , `transportationSubsidies` , `preoperativeOrthodonticSubsidies` , `NCFAssistance_Other` , `NCFAssistance_Other_text` , `signature` , `remark` , `ncfCheck` , `hospitalname`) 
VALUES ('', '".$school."', '".$seid."', '".$caseYear."', '".$caseMonth."', '".$caseDay."', '".$NCFID."', '".$surgeryDrName."', '".$languageTherapist."', '".$orthodontics."', '".$MedicalRecordNumber."', '".$idno."', '".$name."', '".$gender."', '".$birthYear."', '".$birthMonth."', '".$birthDay."', '".$profession."', '".$tel."', '".$education."', '".$address."', '".$contactperson."', '".$relationship."', '".$phone."', '".$h2hdistance."', '".$height."', '".$weight."', '".$diagnosis_unilateral_cleft_lip_1."', '".$diagnosis_unilateral_cleft_lip."', '".$diagnosis_bilateral_cleft_lip_2."', '".$diagnosis_bilateral_cleft_lip."', '".$CleftPalate."', '".$incomplete_main."', '".$incomplete."', '".$complete_main."', '".$complete."', '".$BoneGraft_main."', '".$BoneGraft_select."', '".$Combined_with_other_craniofacial_disorders."', '".$Combined_with_other_craniofacial_disorders_text."', '".$Cleft_lip_and_palate_surgery."', '".$beforeSurgery_1."', '".$beforeSurgery_2."', '".$beforeSurgery_3."', '".$beforeSurgery_4."', '".$beforeSurgery_5."', '".$beforeSurgery_6."', '".$beforeSurgery_7."', '".$beforeSurgery_8."', '".$beforeSurgery_9."', '".$beforeSurgery_10."', '".$beforeSurgery_11."', '".$beforeSurgery_other."', '".$beforeSurgery_other_reason."', '".$familyMembers."', '".$live_together."', '".$fatherAge."', '".$fatherProfession_main."', '".$fatherProfession."', '".$motherAge."', '".$motherProfession_main."', '".$motherProfession."', '".$picpaths."', '".$descriptionCaseFamily."', '".$mainSourceofIncome."', '".$income."', '".$fixedExpenditure1."', '".$fixedExpenditure2."', '".$fixedExpenditure3."', '".$fixedExpenditure4."', '".$extimatedExpenditures."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$surgicalAssistanceForMedicalExpenses."', '".$surgicalAssistanceForMedicalExpenses_sel."', '".$speechTherapySubsidies."', '".$transportationSubsidies."', '".$preoperativeOrthodonticSubsidies."', '".$NCFAssistance_Other."', '".$NCFAssistance_Other_text."', '".$signature."', '".$remark."', '".$ncfCheck."', '".$hospitalname."')";
		
		$queryPinfoRecordUse = mysql_query($insPinfoRecordUse);
		mysql_free_result ($queryPinfoRecordUse);
		

		$insPrecord = "INSERT INTO `patient-vn-record` ( `num` , `patientID` , `branch` , `serialcode` , `NCFID` , `NCFMedicalNum` , `patientName` , `BIHosTimeYear` , `BIHosTimeMonth` , `BIHosTimeDay` , `surgeryTimeYear` , `surgeryTimeMonth` , `surgeryTimeDay` , `LHosTimeYear` , `LHosTimeMonth` , `LHosTimeDay` , `Anesthesia` , `surgeon` , `anesthesiologist` , `surgeryType` , `surgeryTypeOther_text` , `repairTypeUnilateralcleftlip` , `repairTypeUnilateralcleftlip_text` , `repairTypeBilateralcleftlip` , `repairTypeBilateralcleftlip_text` , `repairTypeCleftpalate` , `repairTypeCleftpalate_text` , `BoneGraft` , `beforeSurgeryYear` , `beforeSurgeryMonth` , `beforeSurgeryDay` , `pedigree_graphics1` , `afterSurgeryYear` , `afterSurgeryMonth` , `afterSurgeryDay` , `pedigree_graphics2` , `usageofSocialResources` , `smileTrain` , `MSitem` , `MSOther` , `MSOther_text` , `LAunit` , `LAitem` , `OAunit` , `OAitem` , `h2hdistance` , `subsidiesforMedicalExpenses` , `TotalSFME` , `NCFAllowance` , `NCFProportion` , `PatientPay` , `PatientProportion`, `OtherPay` , `transportationSubsidies` , `NCFSOT` , `PatientSOT` , `NCFTotalSubsidies` , `remark` , `hospitalname` , `pedigree_graphics3` , `pedigree_graphics4` , `pedigree_graphics5` , `pedigree_graphics6` , `pedigree_graphics7` , `pedigree_graphics8` , `pedigree_graphics9` , `pedigree_graphics10` , `pedigree_graphics11` , `pedigree_graphics12` , `pedigree_graphics_other` , `DrID` , `ncfAllMedicaid` , `ncfAllTransport` , `ncfAllTotal` , `ncfAllRemark` ) VALUES ('', '".$patientID."', '".$branch."', '".$serialcode."', '".$NCFID."', '".$NCFMedicalNumNow."', '".$name."', '".$BIHosTimeYear."', '".$BIHosTimeMonth."', '".$BIHosTimeDay."', '".$surgeryTimeYear."', '".$surgeryTimeMonth."', '".$surgeryTimeDay."', '".$LHosTimeYear."', '".$LHosTimeMonth."', '".$LHosTimeDay."', '".$Anesthesia."', '".$surgeon."', '".$anesthesiologist."', '".$surgeryType."', '".$surgeryTypeOther_text."', '".$repairTypeUnilateralcleftlip."', '".$repairTypeUnilateralcleftlip_text."', '".$repairTypeBilateralcleftlip."', '".$repairTypeBilateralcleftlip_text."', '".$repairTypeCleftpalate."', '".$repairTypeCleftpalate_text."', '".$BoneGraft."', '".$beforeSurgeryYear."', '".$beforeSurgeryMonth."', '".$beforeSurgeryDay."', '".$pedigree_graphics[1]."', '".$afterSurgeryYear."', '".$afterSurgeryMonth."', '".$afterSurgeryDay."', '".$pedigree_graphics[2]."', '".$usageofSocialResources."', '".$smileTrain."', '".$MSitem."', '".$MSOther."', '".$MSOther_text."', '".$LAunit."', '".$LAitem."', '".$OAunit."', '".$OAitem."', '".$h2hdistance."', '".$subsidiesforMedicalExpenses."', '".$TotalSFME."', '".$NCFAllowance."', '".$NCFProportion."', '".$PatientPay."', '".$PatientProportion."', '".$OtherPay."', '".$transportationSubsidies."', '".$NCFSOT."', '".$PatientSOT."', '".$NCFTotalSubsidies."', '".$remark."', '".$hospitalname."', '".$pedigree_graphics[3]."', '".$pedigree_graphics[4]."', '".$pedigree_graphics[5]."', '".$pedigree_graphics[6]."', '".$pedigree_graphics[7]."', '".$pedigree_graphics[8]."', '".$pedigree_graphics[9]."', '".$pedigree_graphics[10]."', '".$pedigree_graphics[11]."', '".$pedigree_graphics[12]."', '".$pedigree_graphics_other."', '".$DrID."', '".$ncfAllMedicaid."', '".$ncfAllTransport."', '".$ncfAllTotal."', '".$ncfAllRemark."')";
		
		$queryPrecord = mysql_query($insPrecord); //病歷表資料與 KHpatient 資料表同時顯示
		mysql_free_result ($queryPrecord);
		
		
		
		// echo $insPinfo."<br/><br/>".$insPinfoRecordUse.'<br><br>'.$insPrecord."<br/><br/>";
		
		
			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    echo "location.href='vn-searchList.php'";
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