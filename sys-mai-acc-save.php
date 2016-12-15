<? 
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$id_Post = $_POST["id"];
		$authority = $_POST["authority"];
		$email = $_POST['email'];
		$specialty = $_POST['specialty'];
		$appellation = $_POST['appellation'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$country = $_POST['country'];
		$countrys = $_POST['countrys'];
		$cty = $_POST["cty"];
		$telcountry = $_POST['telcountry'];
		$telarea = $_POST['telarea'];
		$tel = $_POST['tel'];
		$fax = $_POST['fax'];
		$mobile = $_POST['mobile'];
		$hospital = $_POST['hospital'];
		$hospitals = $_POST['hospitals'];
		$hos = $_POST["hos"];
		$note = $_POST['note'];
		$picpath = $_POST['picpath'];
		$picpaths = $_POST['picpaths'];
				
		//------------------- Seting Doctor Nationality -------------------------
			//----- get position code -------
				$authcode= $specialty;
			//echo "Appellation=>>".$authcode."</br>";
				if(($authcode=="ppls") || ($authcode=="poms") || ($authcode=="psp") || ($authcode=="pd") || ($authcode=="po") || ($authcode=="pa") || ($authcode=="pps") || ($authcode=="pg") || ($authcode=="psw") || ($authcode=="pn") || ($authcode=="pp")){
					$authority_data = "p";
					//echo "Specialty 1=>>".$authority_data."</br>";
				}elseif(($authcode=="cgmhpls") || ($authcode=="cgmhoms") || ($authcode=="cgmhsp") || ($authcode=="cgmhd") || ($authcode=="cgmho") || ($authcode=="cgmha") || ($authcode=="cgmhps") || ($authcode=="cgmhg") || ($authcode=="cgmhn") || ($authcode=="cgmhp")){
					$authority_data = "c";
					//echo "Specialty 2=>>".$authority_data."</br>";
				}elseif(($authcode=="ncfsw") || ($authcode=="ncfs") || ($authcode=="ncffs")){
					$authority_data = "n";
					//echo "NCF=>>".$authority_data."</br>";
				}elseif($authcode=="ncfa"){
					$authority_data = "a";
				}
		//-------------------------------------------------------------------------
		
		$SEL_Data = "SELECT * FROM member WHERE id='".$id."'";
		$query = mysql_query($SEL_Data);
		$CHK_Data = mysql_fetch_array($query);
		
		if($hospital == "OTHER"){
			if(($CHK_Data['hospital'] == $hospitals) || ($hospitals == "")){
				$hospital_Data = $hos;
			}else{
				$hospital_Data = $hospitals;
			}
		}else{
			$hospital_Data = $hospital;
		}
		
		if($country == "OTHER"){										
			if(($CHK_Data['country'] == $countrys) || ($countrys == "")){
				$country_Data = $cty;
			}else{
				$country_Data = $countrys;
			}
		}else{
			$country_Data = $country;
		}

		$PicData = $_POST['picpaths'];
		
			$filename = $_FILES['picpath']['name'];										// get picture's file name.
			//echo "Where the picture: ".$filename."</br>";
			if(!empty($filename)){
				$oldmask = umask(0);														
				@mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/photo/member/".$id_Post, 0777);			// create new image fold by new member fold
				umask($oldmask);															
				$img_path = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/member/".$id_Post."/";			// photo on server path.
				copy($_FILES['picpath']['tmp_name'], $img_path.$_FILES['picpath']['name']);	// save picture from temp_file to fold.
				$picture = "http://www.seed-nncf.org/photo/member/".$id."/".$filename;			// picture path for show picture on page.
				unset($_SESSION["picpaths"]);
				$_SESSION['picpaths'] = $picpaths;
			}elseif(!empty($PicData)){
				$picture = $PicData;
			}else{
				$picture = "images/user-pic.jpg";
				//unset($_SESSION["picpaths"]);
				$_SESSION['picpaths'] = $picture;
			}
		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
			
		
		/*
		$occ = $result["authority"];
		$nat = $result['nationality'];
		list($year, $month, $day) = split("-",$result["birthday"]);
		*/
						
		$sel = "SELECT * FROM member WHERE id='".$id_Post."'";
		$query = mysql_query($sel);
		$chk = mysql_fetch_array($query);
		
		
		
		$add_data = "UPDATE `member` SET `id` = '".$id_Post."'";
		$add_data .= ", `pwd` = '".$pwd."'";
		
		
		$add_data .= ", `authority` = '".$authority_data."'";
		
		if($email != $chk['email']){
			$add_data .= ", `email` = '".$email."'";
		}
		
		if($specialty != $chk['specialty']){
			$add_data .= ", `specialty` = '".$specialty."'";
		}
		
		if($appellation != $chk['appellation']){
			$add_data .= ", `appellation` = '".$appellation."'";
		}
		
		if($firstname != $chk['firstname']){
			$add_data .= ", `firstname` = '".$firstname."'";
		}
		
		if($lastname != $chk['lastname']){
			$add_data .= ", `lastname` = '".$lastname."'";
		}
		
		if($address != $chk['address']){
			$add_data .= ", `address` = '".$address."'";
		}
		
		if($city != $chk['city']){
			$add_data .= ",`city` = '".$city."'";	
		}
		
		if($state != $chk['state']){
			$add_data .= ", `state` = '".$state."'";
		}
		
		if($zipcode != $chk['zipcode']){
			$add_data .= ", `zipcode` = '".$zipcode."'";
		}
		
		$add_data .= ", `country` = '".$country_Data."'";
		
		if($telcountry != $chk['telcountry']){
			$add_data .= ", `telcountry` = '".$telcountry."'";
		}
		
		if($telarea != $chk['telarea']){
			$add_data .= ", `telarea` = '".$telarea."'";
		}
		
		if($tel != $chk['tel']){
			$add_data .= ", `tel` = '".$tel."'";
		}
		
		if($fax != $chk['fax']){
			$add_data .= ", `fax` = '".$fax."'";
		}
		
		if($mobile != $chk['mobile']){
			$add_data .= ", `mobile` = '".$mobile."'";
		}
		
		$add_data .= ", `hospital` = '".$hospital_Data."'";
		
		if($note != $chk['note']){
			$add_data .= ", `note` = '".$note."'";
		}
		
		if($picture != $chk['picpath']){
			$add_data .= ", `picpath` = '".$picture."'";
		}
		
		if($chgtime != $chk['chgtime']){
			$add_data .= ", `chgtime` = '".$chgtime."'";
		}
		if($chgtime != $chk['chgtime']){	
			$add_data .= ", `chgtime` = '".$chgtime."'";
		}
		
		$add_data .= " WHERE num='".$_POST['num']."' LIMIT 1 ;";
		$query = mysql_query($add_data);
		//echo "NCF=>>".$add_data."</br>";
		
		$sel_mail = "SELECT * FROM mail WHERE id='".$id_Post."'";
		$query_mail = mysql_query($sel_mail);
		$chk_mail = mysql_fetch_array($query_mail);
		if($chk_mail['email'] != $email){
			$change_mail = "UPDATE `mail` SET `email` = '".$email."'";
		} else {
			$sel_mail2 = "SELECT * FROM mail WHERE assignID='".$id_Post."'";
			$query_mail2 = mysql_query($sel_mail2);
			$chk_mail2 = mysql_fetch_array($query_mail2);
			if($chk_mail['assignEmail	'] != $email){
				$change_mail = "UPDATE `mail` SET `assignEmail` = '".$email."'";
			}
		}
		
		$_SESSION['chkid'] = $id;
		$_SESSION['nationality']= $nationality;
		unset($_SESSION["picpaths"]);
		
		echo "<Script Language='JavaScript'>";
		echo " location.href='sys-mai-acc.php';";
		echo " </Script>";
		
}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}

?>
