<?
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
	
	
	    $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$datecode = $_POST['datecode'];
		$flownum = $_POST['flownum'];
		$nat = $_POST['nationality'];
		if($nat == "OTHER"){
			//$nat_other = $_POST['nationalitys'];
			$nationality = $_POST['nationalitys'];
		}else{
			$code = $_POST['nationality'];
			if(empty($code)){
				$nationality = $nat_other;
				$clientid = $nationality.$datecode.$flownum;
			}else{
				$chk_acc = "SELECT * FROM country WHERE natcode='".$code."'";
				$query = mysql_query($chk_acc);
				$row = mysql_fetch_array($query);
				$nationality = $row['nationality'];
				$clientid = $code.$datecode.$flownum;
			}					 
		}

		$sex_data = $_POST['sex'];
		if($sex_data == "OTHER"){
			$sex = $_POST['sexs'];
		}else{
			$sex = $_POST['sex'];
		}
		
		$birthday = $_POST['addate'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		$birthday = $year."-".$month."-".$day;
		$idnumber = $_POST['idnumber'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$telephone = $_POST['telephone'];
		$guardian = $_POST['guardian'];
		$familynum = $_POST['family'];
		$income = $_POST['income'];
		$introduction = $_POST['introduction'];
		$drid = $_POST['drid'];
		
		
		
		// ----------------------------------- New get picture ---------------------------------------------------------------------------------------------
		
		$filename = $_FILES['picture']['name'];										// get picture's file name.
		if(!empty($filename)){
			$oldmask = umask(0);
			@mkdir("/home/customer/seed-nncf.org/www/photo/member/".$id, 0777);			// create new image fold by new member fold
			umask($oldmask);
			$img_path = "/home/customer/seed-nncf.org/www/photo/patients/".$clientid."/";			// photo on server path.
			copy($_FILES['picture']['tmp_name'], $img_path.$_FILES['picture']['name']);	// save picture from temp_file to fold.
			$picture = "http://www.seed-nncf.org/photo/patients/".$clientid."/".$filename;			// picture path for show picture on page.
			unset($_SESSION["picture"]);
			$_SESSION['picture'] = $picture;
			}elseif(!empty($_SESSION['picture'])){
				$picture = $_SESSION['picture'];
			}else{
				$picture = "images/user-pic.jpg";
				unset($_SESSION["picture"]);
				$_SESSION['picture'] = $picture;
			}
		//-----------------------------------------------------------------------------------------------------------------------------------------
		
		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$addtime2 = $get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
	
		if($flownum <10){
			$flo_code = "000".$flownum;
		}elseif($flownum < 100){
			$flo_code = "00".$flownum;
		}elseif($flownum < 1000){
			$flo_code = "0".$flownum;
		}elseif($flownum < 10000){
			$flo_code = $flownum;
		}
		$datecode =  date("m");
		$patid = $nat.$datecode.$flo_code;
	
		$add_data = "INSERT INTO  `patient` (  `patientid` , `firstname` , `lastname` , `nationality` , `gendered` , `birthday` , `birthmonth` , `birthyears` , `address` , `city` , `state` , `zipcode` , `country` , `telcountry` , `telarea` , `tel` , `fax` , `mobile` , `note` , `addtime` , `chgtime` , `flownum` , `datecode`)";
		
		$add_data .= " VALUES ('".$patid."', '".$firstname."',  '".$lastname."',  '".$nationality."',  '".$sex."',  '".$day."',  '".$month."',  '".$year."',  '".$."',  '".$idnumber."',  '".$height."',  '".$weight."',  '".$telephone."',  '".$guardian."',  '".$familynum."',  '".$income."',  '".$introduction."',  '".$addtime."',  '".$chgtime."')";
		$query = mysql_query($add_data);
		
											
		$add_data_patrecord = "INSERT INTO `patrecord` ( `num` , `addtime` , `patid` , `firstname` , `lastname` , `nationality` , `editorid` , `datecode` ) VALUES ('', '".$addtime2."', '".$patid."', '".$firstname."', '".$lastname."', '".$nat."', '".$seid."', '".$datecode."')";
		//echo $add_data_patrecord;
		$query_patrecord = mysql_query($add_data_patrecord);
		
		$_SESSION['clientid'] = $clientid;
		$_SESSION['nationality']= $nationality;
		/*
		echo "<Script Language='JavaScript'>";
		echo " location.href='rec-pai-inf.php?clientid=".$clientid."';";
		echo " location.href='main.php'";
		echo " </Script>";
		*/
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	
//This page is process Save function by input patient's infomation.
//Direct page to pat-pat-inf.php when data Save done.

?>