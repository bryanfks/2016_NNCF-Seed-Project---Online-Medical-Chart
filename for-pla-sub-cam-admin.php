<?PHP
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	

	if(!empty($seid) && !empty($sepwd)){
		
		$num = $_POST["num"];
		$patname = $_POST["patname"];
		$patient_id = $_POST["patient_id"];
 		$hospital = $_POST["hospital"];
  		$hospitals = $_POST["hospitals"];
  		$record_num = $_POST["record_num"];
  		$height = $_POST["height"];
  		$weight = $_POST["weight"];
  		$surgery_state = $_POST["surgery_state"];
  		$surgery = $_POST["surgery"];
  		$lip = $_POST["lip"];
  		$alveolus = $_POST["alveolus"];
  		$hardpalate = $_POST["hardpalate"];
  		$softpalate = $_POST["softpalate"];
  		$craniofacial_state = $_POST["craniofacial_state"];
		$craniofacial = $_POST["craniofacial"];
  		$add_day = $_POST["add_day"];
  		$add_month = $_POST["add_month"];
  		$add_year = $_POST["add_year"];
 		$sur_day = $_POST["sur_day"];
  		$sur_month = $_POST["sur_month"];
  		$sur_year = $_POST["sur_year"];
  		$dis_day = $_POST["dis_day"];
 		$dis_month = $_POST["dis_month"];
 		$dis_year = $_POST["dis_year"];
  		$sur_type = $_POST["sur_type"];
  		$sur_typeoth = $_POST["sur_typeoth"];
  		$sur_cmd = $_POST["sur_cmd"];
  		
  		$op_result = $_POST["op_result"];
  		$op_resultcmd = $_POST["op_resultcmd"];
  		$questions = $_POST["questions"];
		
		$op_results  = $_POST["op_results"];
		$suggestions = $_POST["suggestions"];
		
  		$family_member = $_POST["family_member"];
 		$family_income = $_POST["family_income"];
  		$comments = $_POST["comments"];
 		
		/*$liv_allows= $_POST["liv_allows"];
		if (!empty($liv_allows)) {
			$liv_allow = $liv_allows;
		} else {
			$liv_allow = "";
		}
		
		$liv_allows = $_POST["liv_allows"];
		$tra_allows = $_POST["tra_allows"];
		$sur_allows = $_POST["sur_allows"];
		$ncf_livallow = $_POST["ncf_livallows"];
		$ncf_traallow = $_POST["ncf_traallows"];
		$ncf_surallows = $_POST["ncf_surallows"];
		*/
		
		$liv_allows = $_POST["liv_allows"];
		$tra_allows = $_POST["tra_allows"];
		$sur_allows = $_POST["sur_allows"];
		$ncf_livallow_source = $_POST["ncf_livallow"];
		$ncf_traallow_source = $_POST["ncf_traallow"];
		$ncf_surallow_source = $_POST["ncf_surallow"];
	/*	
		if ($ncf_livallow_source == "ON") {
			$ncf_livallow = "ON";
		} else if ($ncf_livallow_source == "false" || ""){
			$ncf_livallow = "";
			$ncf_livallowday = "";
		}
		if ($ncf_traallow_source == "ON") {
			$ncf_traallow = "ON";
		} else if ($ncf_traallow_source == "false" || ""){
			$ncf_traallow = "";
			$ncf_traallowper = "";
			$ncf_traallowdist = "";
		}
		if ($ncf_surallow_source == "ON") {
			$ncf_surallow = "ON";
		} else if ($ncf_surallow_source == "false"){
			$ncf_surallow = "";
		}
	*/	
		
		
/* 2010-10-08 modify	  */
		if ((!empty($liv_allows)) || (!empty($tra_allows)) || (!empty($sur_allows))) {
			if ((empty($ncf_livallow)) && (empty($ncf_traallow)) && (empty($ncf_surallows))) {
				if (!empty($liv_allows)) {
					$liv_allow = $liv_allows;
					$liv_allowday = $_POST["liv_allowday"];
					$ncf_livallow = $liv_allows;
					$ncf_livallowday = $liv_allowday;
				} else {
					$liv_allowday = "0";
					$ncf_livallow = "";
					$ncf_livallowday = "0";
				}
				$tra_allowper = $_POST["tra_allowper"];
  				$tra_allowdist = $_POST["tra_allowdist"];
				if (!empty($tra_allows)) {
					$tra_allowper = $_POST["tra_allowper"];
  					$tra_allowdist = $_POST["tra_allowdist"];
					$tra_allow = $tra_allows;
					$ncf_traallow = $tra_allows;
					$ncf_traallowper = $tra_allowper;
					$ncf_traallowdist = $tra_allowdist;
				} else {
					$tra_allow = "";
					$tra_allowper = "";
					$tra_allowdist = "0";
					$ncf_traallowper = "0";
					$ncf_traallowdist = "0";
					$ncf_traallow = "0";
				}
				$sur_allows = $_POST["sur_allows"];
				if (!empty($sur_allows)) {
					$sur_allow = $sur_allows;
					$ncf_surallow = $sur_allows;
				} else {
					$sur_allow = "";
					$ncf_surallow = "";
				}
				$ncf_tolamont = $_POST["tol_amount"];
			} else {
				if (!empty($ncf_livallow)) {
					$liv_allow = $liv_allows;
					$liv_allowday = $_POST["liv_allowday"];
					$ncf_livallowday = $_POST["ncf_livallowday"];
				} else {
					$ncf_livallowday = "0";
				}
				
				$tra_allowper = $_POST["tra_allowper"];
  				$tra_allowdist = $_POST["tra_allowdist"];
				
				//$ncf_traallow = $_POST["ncf_traallows"];
				if (!empty($ncf_traallow)) {
					$tra_allow = $tra_allows;
					$tra_allowper = $_POST["tra_allowper"];
  					$tra_allowdist = $_POST["tra_allowdist"];
					$ncf_traallowper = $_POST["ncf_traallowper"];
  					$ncf_traallowdist = $_POST["ncf_traallowdist"];
				} else {
					$ncf_traallowper = "0";
					$ncf_traallowdist = "0";
				}
		
				//$ncf_surallows = $_POST["ncf_surallows"];
				if (!empty($ncf_surallows)) {
					$ncf_surallow = $_POST["ncf_surallows"];
				} else {
					$ncf_surallow = "false";
				}	
			}
		}	else if ((!empty($ncf_livallow)) || (!empty($ncf_traallow)) || (!empty($ncf_surallows))){
				if (!empty($ncf_livallow)) {
					$ncf_livallowday = $_POST["ncf_livallowday"];
				} else {
					$ncf_livallowday = "0";
				}
				
				$tra_allowper = $_POST["tra_allowper"];
  				$tra_allowdist = $_POST["tra_allowdist"];
				
				//$ncf_traallow = $_POST["ncf_traallows"];
				if (!empty($ncf_traallow)) {
					$tra_allow = $tra_allows;
					$tra_allowper = $_POST["tra_allowper"];
  					$tra_allowdist = $_POST["tra_allowdist"];
					$ncf_traallowper = $_POST["ncf_traallowper"];
  					$ncf_traallowdist = $_POST["ncf_traallowdist"];
				} else {
					$ncf_traallowper = "0";
					$ncf_traallowdist = "0";
				}
		
				//$ncf_surallows = $_POST["ncf_surallows"];
				if (!empty($ncf_surallows)) {
					$ncf_surallow = $_POST["ncf_surallows"];
				} else {
					$sur_allow = $sur_allows;
					$ncf_surallow = "false";
				}	
				$ncf_tolamont = $_POST["ncf_tolamont"];
		}
  /*  */		
		//原始ABC三項目判斷式
	/*	$liv_allows = $_POST["liv_allows"];
		if (!empty($liv_allows)) {
			$liv_allow = $liv_allows;
			$liv_allowday = $_POST["liv_allowday"];
			$ncf_livallow = $liv_allows;
			$ncf_livallowday = $liv_allowday;
		} else {
			$liv_allowday = "0";
			$ncf_livallow = "";
			$ncf_livallowday = "0";
		}
		$tra_allowper = $_POST["tra_allowper"];
  		$tra_allowdist = $_POST["tra_allowdist"];
		$tra_allows = $_POST["tra_allows"];
		if (!empty($tra_allows)) {
			$tra_allowper = $_POST["tra_allowper"];
  			$tra_allowdist = $_POST["tra_allowdist"];
			$tra_allow = $tra_allows;
			$ncf_traallow = $tra_allows;
			$ncf_traallowper = $tra_allowper;
			$ncf_traallowdist = $tra_allowdist;
		} else {
			$tra_allow = "";
			$tra_allowper = "";
			$tra_allowdist = "0";
			$ncf_traallowper = "0";
			$ncf_traallowdist = "0";
			$ncf_traallow = "0";
		}
		$sur_allows = $_POST["sur_allows"];
		if (!empty($sur_allows)) {
			$sur_allow = $sur_allows;
			$ncf_surallow = $sur_allows;
		} else {
			$sur_allow = "";
			$ncf_surallow = "";
		}
		
		
		$ncf_livallow = $_POST["ncf_livallows"];
		if (!empty($ncf_livallow)) {
			$ncf_livallowday = $_POST["ncf_livallowday"];
		} else {
			$ncf_livallowday = "0";
		}
		
		$tra_allowper = $_POST["tra_allowper"];
  		$tra_allowdist = $_POST["tra_allowdist"];
		
		$ncf_traallow = $_POST["ncf_traallows"];
		if (!empty($ncf_traallow)) {
			$ncf_traallowper = $_POST["ncf_traallowper"];
  			$ncf_traallowdist = $_POST["ncf_traallowdist"];
		} else {
			$ncf_traallowper = "0";
			$ncf_traallowdist = "0";
		}
		
		$ncf_surallows = $_POST["ncf_surallows"];
		if (!empty($ncf_surallows)) {
			$ncf_surallow = $_POST["ncf_surallows"];
		} else {
			$ncf_surallow = "false";
		}
		*/
		
	//echo "Value is: ".$ncf_livallow." & ".$ncf_traallow." & ".$ncf_surallow."<br/>";
		
		
		//$ncf_livallowday = $_POST["ncf_livallowday"];
		
		/*
		if(!empty($ncf_livallowday)){
			$ncf_livallow ="ON";
		}
		$ncf_traallowper = $_POST["ncf_traallowper"];
		$ncf_traallowdist = $_POST["ncf_traallowdist"];
		
		if(!empty($ncf_traallowper) && !empty($ncf_traallowdist)){
			$ncf_traallow ="ON";
		}
		$ncf_tolamont = $_POST["ncf_tolamont"];
		
		$NCF_TotalAmount = $ncf_tolamont - (($ncf_livallowday * 2) + ($tra_allowper * $tra_allowdist));
		if ($NCF_TotalAmount = 20) {
			$ncf_surallow = "ON";
		}  else {
			$ncf_surallow = "";
		}
		
  		//$ncf_surallow = $_POST["ncf_surallow"];
		
		if(!empty($tra_allowper) && !empty($tra_allowdist)){
			$tra_allow ="ON";
		}
		*/
				
		$sign = $_POST["sign"];
		$note = $_POST["note"];
		$accdate_day = $_POST["accdate_day"];
		$accdate_month = $_POST["accdate_month"];
		$accdate_year = $_POST["accdate_year"];
		$tol_amount = $_POST["tol_amount"];
		
		$count_TotalAmount = $tol_amount - (($liv_allowday * 2) + ($tra_allowper * $tra_allowdist));
		/*
		if ($count_TotalAmount = 20) {
			$sur_allow = "ON";
		}  else {
			$sur_allow = "";
		}
  		*/
		
		$condition = $_POST["condition"];		//判斷資料是否為下次會編輯的資料
		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];
		
		$editor = $seid;
		//echo "Fina. State =".$sur_allow."<br/>".$liv_allowday."<br/>".$tra_allowper."<br/>".$tra_allowdist."<br/>".$count_TotalAmount;
		// load 5 pic. pictures
		
		$get_time = getdate();
		$add_record_date  =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$add_record_ip = $REMOTE_ADDR;
		
		
		//$select_Photo_path = "SELECT * FROM `patientmr` WHERE `record_num`='".$record_num."'";
		$select_Photo_path = "SELECT * FROM `patientmr` WHERE `patientid`='".$patient_id."' AND `branch`='".$branch."' AND `serialcode`='".$serialcode."'";
		$query_Photo_path = mysql_query($select_Photo_path);
		$res_Photo_path = mysql_fetch_array($query_Photo_path);
		$photos[0] = $res_Photo_path["prephoto_frontal"];
		$photos[1] = $res_Photo_path["prephoto_intraoral"];
		$photos[2] = $res_Photo_path["posphoto_frontal1"];
		$photos[3] = $res_Photo_path["posphoto_frontal2"];
		$photos[4] = $res_Photo_path["posphoto_frontal3"];
		
		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在
		$pat_record_num = "/home/customer/seed-nncf.org/www/photo/patientrecord/".$record_num; 
		$dirs = is_dir($pat_record_num);
		//echo "Record Num.'s =".$dirs."<br/>";
		if(is_dir($pat_record_num)){			
			$img_path = "/home/customer/seed-nncf.org/www/photo/patientrecord/".$record_num."/";		// photo on server path.
			//echo "Image 1 =".$img_path."<br/>";
		} else {
			$oldmask = umask(0);
			mkdir("/home/customer/seed-nncf.org/www/photo/patientrecord/".$record_num, 0777);			// create new image fold by new member fold
			$img_path = "/home/customer/seed-nncf.org/www/photo/patientrecord/".$record_num."/";		// photo on server path.
			//echo "Image 2 =".$img_path."<br/>";
			umask($oldmask);
		}
		
		// 複製上傳的圖片到已病例號碼所建立的資料夾內
		for ($i=0; $i<5; $i++) {
			$filename[$i] = $_FILES['photo'.$i]['name'];										// get picture's file name.
			if(!empty($filename[$i])){
				copy($_FILES['photo'.$i]['tmp_name'], $img_path.$_FILES['photo'.$i]['name']);	// save picture from temp_file to fold.
				$picpaths[$i] = "http://www.seed-nncf.org/photo/patientrecord/".$record_num."/".$filename[$i];			// picture path for show picture on page.
				unset($_SESSION["photo"][$i]);
				$_SESSION['photo'][$i] = $picpaths[$i];
				//echo "There have file=>".$picpaths[$i]."<br/>";
			}else {
				$picpaths[$i] = $photos[$i];
				//echo "There was not  has file =>".$picpaths[$i]."<br/>";
			}
		}
		
		//判斷病例是否已存在
		//$chk_acc = "SELECT * FROM `patientmr` WHERE record_num='".$record_num."'";
		$chk_acc = "SELECT * FROM `patientmr` WHERE `patientid`='".$patient_id."' AND `branch`='".$branch."' AND `serialcode`='".$serialcode."'";
		$query = mysql_query($chk_acc);
		$row = mysql_fetch_array($query);
		$num = mysql_num_rows($query);
	
		if(!empty($num)){
			$addData = "UPDATE `patientmr` SET `patientid` = '".$patient_id."', `branch` = '".$branch."', `serialcode` = '".$serialcode."', `hospital` = '".$hospital."',`hospitals` = '".$hospitals."',`record_num` = '".$record_num."',`height` = '".$height."',`weight` = '".$weight."',`surgery_state` = '".$surgery_state."',`surgery` = '".$surgery."',`lip` = '".$lip."',`alveolus` = '".$alveolus."',`hardpalate` = '".$hardpalate."',`softpalate` = '".$softpalate."',`craniofacial_state` = '".$craniofacial_state."',`craniofacial` = '".$craniofacial."',`add_day` = '".$add_day."',`add_month` = '".$add_month."',`add_year` = '".$add_year."',`sur_day` = '".$sur_day."',`sur_month` = '".$sur_month."',`sur_year` = '".$sur_year."',`dis_day` = '".$dis_day."',`dis_month` = '".$dis_month."',`dis_year` = '".$dis_year."',`sur_type` = '".$sur_type."',`sur_typeoth` = '".$sur_typeoth."',`sur_cmd` = '".$sur_cmd."',`prephoto_frontal` = '".$picpaths[0]."',`prephoto_intraoral` = '".$picpaths[1]."',`posphoto_frontal1` = '".$picpaths[2]."',`posphoto_frontal2` = '".$picpaths[3]."',`posphoto_frontal3` = '".$picpaths[4]."',`op_result` = '".$op_result."',`op_resultcmd` = '".$op_resultcmd."',`questions` = '".$questions."',`sign` = '".$sign."',`family_member` = '".$family_member."',`family_income` = '".$family_income."',`comments` = '".$comments."',`liv_allow` = '".$liv_allow."',`liv_allowday` = '".$liv_allowday."',`tra_allow` = '".$tra_allow."',`tra_allowper` = '".$tra_allowper."',`tra_allowdist` = '".$tra_allowdist."',`sur_allow` = '".$sur_allow."',`tol_amount` = '".$tol_amount."',`op_results` = '".$op_results."',`suggestions` = '".$suggestions."',`ncf_livallow` = '".$ncf_livallow."',`ncf_livallowday` = '".$ncf_livallowday."',`ncf_traallow` = '".$ncf_traallow."',`ncf_traallowper` = '".$ncf_traallowper."',`ncf_traallowdist` = '".$ncf_traallowdist."',`ncf_surallow` = '".$ncf_surallow."',`ncf_tolamont` = '".$ncf_tolamont."',`note` = '".$note."',`accdate_day` = '".$accdate_day."',`accdate_month` = '".$accdate_month."',`accdate_year` = '".$accdate_year."',`add_record_date` = '".$add_record_date."',`add_record_ip` = '".$add_record_ip."', `condition`='".$condition."' WHERE `patientid`='".$patient_id."' AND `branch`='".$branch."' AND `serialcode`='".$serialcode."' LIMIT 1";
		}else{
			$addData = "INSERT INTO `patientmr` ( `num` , `patname` , `patientid` ,`branch`,`serialcode`, `hospital` , `hospitals` , `record_num` , `height` , `weight` , `surgery_state` , `surgery` , `lip` , `alveolus` , `hardpalate` , `softpalate` , `craniofacial_state` , `craniofacial` , `add_day` , `add_month` , `add_year` , `sur_day` , `sur_month` , `sur_year` , `dis_day` , `dis_month` , `dis_year` , `sur_type` , `sur_typeoth` , `sur_cmd` , `prephoto_frontal` , `prephoto_intraoral` , `posphoto_frontal1` , `posphoto_frontal2` , `posphoto_frontal3` , `op_result` , `op_resultcmd` , `questions` , `sign` , `family_member` , `family_income` , `comments` , `liv_allow` , `liv_allowday` , `tra_allow` , `tra_allowper` , `tra_allowdist` , `sur_allow` , `tol_amount` , `op_results` , `suggestions` , `ncf_livallow` , `ncf_livallowday` , `ncf_traallow` , `ncf_traallowper` , `ncf_traallowdist` , `ncf_surallow` , `ncf_tolamont` , `note` , `accdate_day` , `accdate_month` , `accdate_year` , `add_record_date` , `add_record_ip` , `condition` , `editor`) 
VALUES (
'', '".$patname."','".$patient_id."' ,'".$branch."' ,'".$serialcode."' , '".$hospital."', '".$hospitals."', '".$record_num."', '".$height."', '".$weight."', '".$surgery_state."', '".$surgery."', '".$lip."', '".$alveolus."', '".$hardpalate."', '".$softpalate."', '".$craniofacial_state."', '".$craniofacial."', '".$add_day."', '".$add_month."', '".$add_year."', '".$sur_day."', '".$sur_month."', '".$sur_year."', '".$dis_day."', '".$dis_month."', '".$dis_year."', '".$sur_type."', '".$sur_typeoth."', '".$sur_cmd."', '".$picpaths[0]."', '".$picpaths[1]."', '".$picpaths[2]."', '".$picpaths[3]."', '".$picpaths[4]."', '".$op_result."', '".$op_resultcmd."', '".$questions."', '".$sign."' , '".$family_member."', '".$family_income."', '".$comments."', '".$liv_allow."', '".$liv_allowday."', '".$tra_allow."', '".$tra_allowper."', '".$tra_allowdist."', '".$sur_allow."', '".$tol_amount."', '' , '' , '".$ncf_livallow."' , '".$ncf_livallowday."' , '".$ncf_traallow."' , '".$ncf_traallowper."' , '".$ncf_traallowdist."' , '".$ncf_surallow."' , '".$ncf_tolamont."' , '".$note."' , '".$accdate_day."' , '".$accdate_month."' , '".$accdate_year."' , '".$add_record_date."' , '".$add_record_ip."', '".$condition."' ,'".$editor."' )";
		}
		$queryData = mysql_query($addData);
			
			// Setting Send Mail to Taiwan Dr. with someone message that the for-Dr. already created new patient's record.
			$sendMail = $_POST["sendMail"];
			
			//This step is find editor that foreign Dr. ID.
			$sel_Mail = "SELECT * FROM `patientmr` WHERE `patientid`='".$patient_id."'";
			$query_mail = mysql_query($sel_Mail);
			$res_mail = mysql_fetch_array($query_mail);
			$pat_editor = $res_mail["editor"];
			
			
			$sel_mail_admin = "SELECT * FROM `member` WHERE `id`='admin'";   // 搜尋id為 'admin' 
			$query_mail_admin = mysql_query($sel_mail_admin);
			$res_mail = mysql_fetch_array($query_mail_admin);
			$to_admin = $res_mail["email"];
			
			$sel_mail2 = "SELECT * FROM `member` WHERE `id`='".$pat_editor."'";
			$query_mail2 = mysql_query($sel_mail2);
			$res_mail2 = mysql_fetch_array($query_mail2);
			$mailaddress2 = $res_mail2["email"];
			$FirstName = $res_mail2["firstname"];
			$LastName = $res_mail2["lastname"];
			$mailacc2 = $FirstName." ".$LastName;
			//$mailacc2 = $res_mail2["assignID"];
			//echo "<p>".$mailaddress2."</p>";
			
		
				$to1 = $mailaddress2;
				$to2 = $to_admin;
				$to3 = "bryan@layu.com";
				$subject = "Addition Patient Record.";
				$body = '
				Dear Dr. '.$mailacc2.',
				Dr. '.$mailacc2.' has completed an cleft lip and palate operation, patient number '.$patient_id.$branch.$serialcode.'.
				Please give comments on
				http://www.seed-nncf.org/login.php
				Thank you for your time on using Patient Record on-line Management System.
				Your participation will make clefts patients different.
		
				Sincerely,
				Noordhoff Craniofacial Foundation
				Love Makes Whole';
				
				$mails1 = mail($to1, $subject, $body); //Send mail to for-Dr.
				$mails2 = mail($to2, $subject, $body);
				$mails3 = mail($to3, $subject, $body);
			
			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    echo " location.href='for-pla-part.php?pat_id=".$patient_id."&branch=".$branch."';\n";
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