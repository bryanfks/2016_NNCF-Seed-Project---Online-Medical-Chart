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
  		$suggestions = $_POST["suggestions"];
  		$op_result = $_POST["op_result"];
		$op_results = $_POST["op_results"];
  		$op_resultcmd = $_POST["op_resultcmd"];
  		$questions = $_POST["questions"];
  		$family_member = $_POST["family_member"];
 		$family_income = $_POST["family_income"];
  		$comments = $_POST["comments"];
 		
		$branch = $_POST["branch"];
		$serialcode = $_POST["serialcode"];
		$note = $_POST["note"];
		$accdate_day = $_POST["accdate_day"];
		$accdate_month = $_POST["accdate_month"];
		$accdate_year = $_POST["accdate_year"];

  		$condition = $_POST["condition"];		//判斷資料是否為下次會編輯的資料
		$chkcode = $_POST["chkcode"];			// 提供國內醫師與基金會判定是否能編輯用
		$chk_edit_auth = $conditon.$chkcode;
		if ($chk_edit_auth == "4n") {
			$chkcode_type = "f";	
		} else {
			$chkcode_type = $chkcode;
		}
		
		$editor = $seid;
		$get_time = getdate();
		$add_record_date  =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$add_record_ip = $REMOTE_ADDR;
		
		
		$select_Photo_path = "SELECT * FROM `patientmr` WHERE `record_num`='".$record_num."'";
		$query_Photo_path = mysql_query($select_Photo_path);
		$res_Photo_path = mysql_fetch_array($query_Photo_path);
		$photos[0] = $res_Photo_path["prephoto_frontal"];
		$photos[1] = $res_Photo_path["prephoto_intraoral"];
		$photos[2] = $res_Photo_path["posphoto_frontal1"];
		$photos[3] = $res_Photo_path["posphoto_frontal2"];
		$photos[4] = $res_Photo_path["posphoto_frontal3"];
		
		
		//  下列程式為：判斷欲建立的圖片資料夾是否已經存在
		$pat_record_num = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/patientrecord/".$record_num; 
		$dirs = is_dir($pat_record_num);
		if(is_dir($pat_record_num)){			
			$img_path = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/patientrecord/".$record_num."/";		// photo on server path.
		} else {
			$oldmask = umask(0);
			mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/photo/patientrecord/".$record_num, 0777);			// create new image fold by new member fold
			$img_path = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/patientrecord/".$record_num."/";		// photo on server path.
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
			}else {
				$picpaths[$i] = $photos[$i];
			}
		}
		
		//判斷病例是否已存在
		$chk_acc = "SELECT * FROM `patientmr` WHERE record_num='".$record_num."'";
		$query = mysql_query($chk_acc);
		$row = mysql_fetch_array($query);
		$num = mysql_num_rows($query);

		if(!empty($num)){
			$addData = "UPDATE `patientmr` SET `op_results` = '".$op_results."',`suggestions` = '".$suggestions."',`condition` = '".$condition."',`chkcode` = '".$chkcode_type."' WHERE `patientid` = '".$patient_id."' AND `branch`='".$branch."' AND `serialcode`='".$serialcode."' LIMIT 1";
		}else{
			$addData = "INSERT INTO `patientmr` ( `num` , `patname` , `patientid` , `hospital` , `hospitals` , `record_num` , `height` , `weight` , `surgery_state` , `surgery` , `lip` , `alveolus` , `hardpalate` , `softpalate` , `craniofacial_state` , `craniofacial` , `add_day` , `add_month` , `add_year` , `sur_day` , `sur_month` , `sur_year` , `dis_day` , `dis_month` , `dis_year` , `sur_type` , `sur_typeoth` , `sur_cmd` , `prephoto_frontal` , `prephoto_intraoral` , `posphoto_frontal1` , `posphoto_frontal2` , `posphoto_frontal3` , `op_result` , `op_resultcmd` , `questions` , `family_member` , `family_income` , `comments` , `note` , `accdate_day` , `accdate_month` , `accdate_year` , `add_record_date` , `add_record_ip` , `condition`, `chkcode`  , `editor`) 
VALUES (
'', '".$patname."','".$patient_id."' , '".$hospital."', '".$hospitals."', '".$record_num."', '".$height."', '".$weight."', '".$surgery_state."', '".$surgery."', '".$lip."', '".$alveolus."', '".$hardpalate."', '".$softpalate."', '".$craniofacial_state."', '".$craniofacial."', '".$add_day."', '".$add_month."', '".$add_year."', '".$sur_day."', '".$sur_month."', '".$sur_year."', '".$dis_day."', '".$dis_month."', '".$dis_year."', '".$sur_type."', '".$sur_typeoth."', '".$sur_cmd."', '".$picpaths[0]."', '".$picpaths[1]."', '".$picpaths[2]."', '".$picpaths[3]."', '".$picpaths[4]."', '".$op_result."', '".$op_resultcmd."', '".$questions."' , '".$family_member."', '".$family_income."', '".$comments."', '".$note."' , '".$accdate_day."' , '".$accdate_month."' , '".$accdate_year."' , '".$add_record_date."' , '".$add_record_ip."', '".$condition."', '".$chkcode_type."' ,'".$editor."' )";
		}
		
			$sel_mail = "SELECT * FROM `mail` WHERE `assignID`='".$seid."'";		//搜尋條件：國內醫師ID
			$query_mail = mysql_query($sel_mail);
			$res_mail = mysql_fetch_array($query_mail);
			
			$sel_pat_mail = "SELECT * FROM `patientmr` WHERE `patientid`='".$patient_id."' AND `record_num`='".$record_num."'";		//搜尋條件：病患 ID & 病例號碼(ex:KH10001X)
			$query_pat_mail = mysql_query($sel_pat_mail);
			$res_pat_mail = mysql_fetch_array($query_pat_mail);
			$pat_editor = $res_pat_mail["editor"];		// 此病例的建檔國外醫師 ID
			
			$mailaddress = $res_mail["assignEmail"];  // TW Dr. E-mail
			$mailaddress2 = $res_mail["email"];  // Foreign Dr. E-mail
			$mailacc = $res_mail["assignID"];    // TW Dr. ID
			$mailacc2 = $res_mail["id"];  // Foreign Dr. ID
			
			$sel_Mail1 = "SELECT `email` FROM `member` WHERE `id`='".$res_pat_mail["editor"]."'";
			$query_mail1 = mysql_query($sel_Mail1);
			$res_mail1 = mysql_fetch_array($query_mail1);		//國外醫師E-mail
			
			$sel_mail = "SELECT * FROM `member` WHERE `authority`='n'";		//搜尋條件：國內醫師ID
			$query_mail = mysql_query($sel_mail);
			$res_mail_row = mysql_num_rows($query_mail);
			
				$to1 = $res_mail1["email"];			//寄給國外醫師
				$to2 = $res_mail1["email"];			//寄給基金會
				$to3 = "bryan@layu.com";
				$subject = "Addition Patient Record.(CGMH)";
				$body = '
				Dear Dr. '.$mailacc2.',
				Dr. '.$mailacc.' has completed an cleft lip and palate operation, patient number '.$patient_id.$branch.$serialcode.'.
				Please give comments on
				http://www.seed-nncf.org/login.php
				Thank you for your time on using Patient Record on-line Management System.
				Your participation will make clefts patients different.
				Sincerely,
				Noordhoff Craniofacial Foundation
				Love Makes Whole';
				$mails1 = mail($to1, $subject, $body);
				while ($res_mail = mysql_fetch_array($query_mail)){
					$to2 = $res_mail["email"];
					$mails2 = mail($to2, $subject, $body);
				}
				$mails3 = mail($to3, $subject, $body);
				
				
			$queryData = mysql_query($addData);
			
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