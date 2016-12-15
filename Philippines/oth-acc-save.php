<?
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		$id = $seid;
		$email = $_POST['email'];
		//$picpath = $_POST['picpath'];
		$picpaths = $_POST['picpaths'];
		$sex = $_POST['sex'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$nationality = $_POST['nationality'];
		$nationalitys = $_POST['nationalitys'];
		$nationality_back = $_POST["nationality_back"];
		$countrycode = $_POST['countrycode'];
		$areacode = $_POST['areacode'];
		$tel = $_POST['tel'];
		$fax = $_POST['fax'];
		$mobile = $_POST['mobile'];
		$hospital = $_POST['hospital'];
		$hospitals = $_POST['hospitals'];
		$hospital_B = $_POST["hospital_B"];
		$note = $_POST['note'];
		$chgtime = $_POST['chgtime'];
		
		$filename = $_FILES['picpath']['name'];										// get picture's file name.

		$sel = "SELECT * FROM member WHERE id='".$id."'";
		$query = mysql_query($sel);
		$chk = mysql_fetch_array($query);
		//echo $query."</br>";
		
		$add_data = "UPDATE `member` SET ";
		//if($pwd != $chk['pwd']){
			$add_data .= "`email` = '".$email."'";
		//}
		
		if($sex != $chk['appellation']){
			$add_data .= ",`appellation` = '".$sex."'";
		}
		
		if($first != $chk['firstname']){
			$add_data .= ", `firstname` = '".$first."'";
		}
		
		if($last != $chk['lastname']){
			$add_data .= ",`lastname` = '".$last."'";
		}
		
		if($address != $chk['address']){
			$add_data .= ",`address` = '".$address."'";
		}
		
		if($city != $chk['city']){
			$add_data .= ",`city` = '".$city."'";
		}
		
		if($state != $chk['state']){
			$add_data .= ",`state` = '".$state."'";
		}
		
		if($zipcode != $chk['zipcode']){
			$add_data .= ",`zipcode` = '".$zipcode."'";
		}
		
		if($nationality != $chk['country']){
			if(!empty($nationalitys)) {
				$add_data .= ",`country` = '".$nationalitys."'";
			} else if ($nationality == "OTHER") {
				$add_data .= ",`country` = '".$nationality_back."'";
			} else {
				$add_data .= ",`country` = '".$nationality."'";
			}
		}
		
/*		if($countrycode != $chk['country']){
			$add_data .= ",`telcountry` = '".$countrycode."'";
		}
*/		
		if($countrycode != $chk['telcountry']){
			$add_data .= ",`telcountry` = '".$countrycode."'";
		}
		
		if($areacode != $chk['telarea']){
			$add_data .= ",`telarea` = '".$areacode."'";
		}
		
		if($tel != $chk['tel']){
			$add_data .= ",`tel` = '".$tel."'";
		}
		
		if($fax != $chk['fax']){
			$add_data .= ",`fax` = '".$fax."'";
		}
		
		if($mobile != $chk['mobile']){
			$add_data .= ",`mobile` = '".$mobile."'";
		}
		
		if($hospital != $chk['hospital']){
			if(!empty($hospitals)) {
				$add_data .= ",`hospital` = '".$hospitals."'";
			} else if ($hospital == "OTHER") {
				$add_data .= ",`hospital` = '".$hospital_B."'";
			} else {
				$add_data .= ",`hospital` = '".$hospital."'";
			}
		}
		
		
		
		
		
		if($note != $chk['note']){
			$add_data .= ",`note` = '".$note."'";
		}
		
		//echo "<br/> DB picture: ".$chk["picpath"];
		/*if(($picpaths != $chk['picpath']) || !empty($picpath)){	
			$add_data .= ",`picpath` = '".$picpath."'";
		} else {
			$add_data .= ",`picpath` = '".$picpaths."'";
		}*/
		
		
		if(!empty($filename)){
			$oldmask = umask(0);														
			@mkdir("/home/customer/seed-nncf.org/www/photo/member/".$id, 0777);				// create new image fold by new member fold
			umask($oldmask);															
			$img_path = "/home/customer/seed-nncf.org/www/photo/member/".$id."/";			// photo on server path.
			copy($_FILES['picpath']['tmp_name'], $img_path.$_FILES['picpath']['name']);					// save picture from temp_file to fold.
			$picture = "http://www.seed-nncf.org/photo/member/".$id."/".$filename;				// picture path for show picture on page.
			unset($_SESSION["picpaths"]);
			$_SESSION['picpaths'] = $picpaths;
			$add_data .= ",`picpath` = '".$picture."'";
		} else {
			$add_data .= ",`picpath` = '".$picpaths."'";
		}
		/*
		$filename = $_FILES['picpath']['name'];										// get picture's file name.
		$picpath = $_POST['picpath'];
			//echo "Where the picture: ".$filename."</br>";
			if(!empty($filename)){
				$oldmask = umask(0);														
				@mkdir("/home/customer/seed-nncf.org/www/photo/member/".$id, 0777);				// create new image fold by new member fold
				umask($oldmask);															
				$img_path = "/home/customer/seed-nncf.org/www/photo/member/".$id."/";			// photo on server path.
				copy($_FILES['picpath']['tmp_name'], $img_path.$_FILES['picpath']['name']);					// save picture from temp_file to fold.
				$picture = "http://www.seed-nncf.org/photo/member/".$id."/".$filename;				// picture path for show picture on page.
				unset($_SESSION["picpaths"]);
				$_SESSION['picpaths'] = $picpaths;
				$add_data .= ",`picpath` = '".$picture."'";
			} elseif ($picpath == "images/user-pic.jpg"){
				$add_data .= ",`picpath` = 'images/user-pic.jpg'";
			}else{
				$add_data .= ",`picpath` = '".$picpath."'";
			}
		*/
		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
		
		$add_data .= ",`chgtime` = '".$chgtime."'";
		
		$add_data .= "WHERE id='".$id."' LIMIT 1 ;";
		
		$query = mysql_query($add_data);
		
		$_SESSION['chkid'] = $id;
		$_SESSION['nationality']= $nationality;
		echo "<Script Language='JavaScript'>";		
		//echo " location.href='oth-acc-inf.php';";
		echo " location.href='oth-acc-inf.php';";
		echo " </Script>";
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>