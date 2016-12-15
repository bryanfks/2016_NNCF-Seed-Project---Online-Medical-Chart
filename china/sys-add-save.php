<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
	$seid   = $_SESSION["seid"];
	$sepwd  = $_SESSION["sepwd"];
	$seauth = $_SESSION["seauthority"];
	
	if(isset($seid) && isset($sepwd)){
		$id = $_POST['id'];
		
/*		$chk_id = "SELECT * FROM member WHERE id=".$id."";
		@$chk_id_query = mysql_query($chk_id);
		@$chk_id_result = mysql_fetch_array($chk_id_query);
		if (!empty($chk_id_result)) {
			echo "<Script Language='JavaScript'>";
			echo "alert('ID already Have, Please reinput again.');";
			echo "history.back();";
			echo "</Script>";
		}
*/		
		$pwd = $_POST['pwd'];
		$email = $_POST['email'];
		$specialty = $_POST['specialty'];
		$appellation = $_POST['appellation'];
		$first = $_POST['firstname'];
		$last = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$country = $_POST['country'];
		$countrys = $_POST['countrys'];
		$telcountry = $_POST['telcountry'];
		$telarea = $_POST['telarea'];
		$tel = $_POST['tel'];
		$fax = $_POST['fax'];
		$mobile = $_POST['mobile'];
		//$hospital = $_POST['hospital'];
		//$hospitals = $_POST['hospitals'];
		$note = $_POST['note'];
		
	//echo "Specialty =>>".$specialty."</br>";
		
		//------------------- Seting Doctor Nationality -------------------------
			//----- get position code -------
				//$authcode= $appellation;
				$authcode= $specialty;
				if(($authcode=="ppls") || ($authcode=="poms") || ($authcode=="psp") || ($authcode=="pd") || ($authcode=="po") || ($authcode=="pa") || ($authcode=="pps") || ($authcode=="pg") || ($authcode=="psw") || ($authcode=="pn") || ($authcode=="pp")){
					$authority_data = "p";
					//echo "Specialty 1=>>".$authority_data."</br>";
				}elseif(($authcode=="cgmhpls") || ($authcode=="cgmhoms") || ($authcode=="cgmhsp") || ($authcode=="cgmhd") || ($authcode=="cgmho") || ($authcode=="cgmha") || ($authcode=="cgmhps") || ($authcode=="cgmhg") || ($authcode=="cgmhn") || ($authcode=="cgmhp")){
					$authority_data = "c";
					//echo "Specialty 2=>>".$authority_data."</br>";
				}elseif(($authcode=="ncfsw") || ($authcode=="ncfs") || ($authcode=="ncffs")){
					$authority_data = "n";
					//echo "NCF=>>".$authority_data."</br>";
				}elseif(($authcode=="ncfa")){
					$authority_data = "a";
				}
		//-------------------------------------------------------------------------
		
		
		
		// ----------  取得DB中的國家英文名與簡碼  ----------------------------------------------------------
		/*
		$country = $_POST['nationality'];	//國別簡碼
		if($country == "OTHER"){
			$nationality = $_POST['nationalitys'];
		}else{
			$sel_nat = "SELECT * FROM country WHERE natcode='".$country."'";
			$query_nat = mysql_query($sel_nat);
			$result_nat = mysql_fetch_array($query_nat);
			$nationality = $result_nat['nationality'];						//將國別簡碼轉換成國別全名
		}
		*/
		// ---------------------------------------------------------------------------------------------------
		

		$hospital = $_POST['hospital'];
		//判斷 country 若為 other時, 則帶入空格欄的值 nationalitys value.
		if($hospital == "OTHER"){										
			$hospital = $_POST['hospitals'];
		}elseif($hospital == ""){
			$hospital = "";
		}
		
		$filename = $_FILES['picpath']['name'];										// get picture's file name.
		if(!empty($filename)){
			$oldmask = umask(0);														
			@mkdir("/home/customer/seed-nncf.org/www/photo/member/".$id, 0777);			// create new image fold by new member fold
			umask($oldmask);															
			$img_path = "/home/customer/seed-nncf.org/www/photo/member/".$id."/";			// photo on server path.
			copy($_FILES['picpath']['tmp_name'], $img_path.$_FILES['picpath']['name']);	// save picture from temp_file to fold.
			$picpaths = "http://www.seed-nncf.org/photo/member/".$id."/".$filename;			// picture path for show picture on page.
			unset($_SESSION["picpaths"]);
			$_SESSION['picpaths'] = $picpaths;
	    }elseif(!empty($_SESSION['picpaths'])){
			$picpaths = $_SESSION['picpaths'];
		}else{
			$picpaths = "images/user-pic.jpg";
			unset($_SESSION["picpaths"]);
			$_SESSION['picpaths'] = $picpaths;
		}
		

		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
			
		
		// -------------------- 判斷新建帳號是否重複 -----------------------------

		$chk_acc = "SELECT id FROM member WHERE id='".$id."'";
		$query = mysql_query($chk_acc);
		$row = mysql_fetch_array($query);
		$num = mysql_num_rows($query);
		if($num){
			echo "<script language='Javascript'>";
			echo "alert('This Account is exist, please change other ID name.');";
			echo "history.back();";
			//echo " location.href='sys-add-acc.php';";
			echo "</script>";
		} else {
		
		$add_data = "INSERT INTO `member` ( `num` , `id` , `pwd` , `authority` , `email` , `specialty` , `appellation` , `firstname` , `lastname` , `address` , `city` , `state` , `zipcode` , `country` , `telcountry` , `telarea` , `tel` , `fax` , `mobile` , `hospital` , `note` , `picpath` , `addtime` , `chgtime` )";
		$add_data .= "VALUES ('', '".$id."', '".$pwd."', '".$authority_data."', '".$email."', '".$specialty."', '".$appellation."', '".$firstname."', '".$lastname."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$country."', '".$telcountry."', '".$telarea."', '".$tel."', '".$fax."', '".$mobile."', '".$hospital."', '".$note."', '".$picpaths."', '".$addtime."', '".$chgtime."')";
		//echo $add_data;
		$query = mysql_query($add_data);
		
		$_SESSION['chkid'] = $id;
		$_SESSION['nationality']= $nationality;
		unset($_SESSION["picpaths"]);
		
		echo "<Script Language='JavaScript'>";
		echo " location.href='main.php';";
		echo " </Script>";
		}
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}

?>