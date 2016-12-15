<?
	//session_cache_limiter("none");
	@session_start();
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
		
		$patientid = $_POST['patientid'];
		
	    $id = $_POST['id'];
	    $firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
		
		$sex_data = $_POST['gendered'];
        if($sex_data == "OTHER"){			
				$gendered  = $_POST['gendereds'];
		}else{
				$gendered  = $sex_data;
		}	
		
		$nat = $_POST['nationality'];
		if($nat == "OTHER"){
			$nationality = $_POST['nationalitys'];
		}else{
			//$code = $_POST['nationality'];
			$nationality = $nat;
		}
		
		$birthday = $_POST['birthday'];
		$birthmonth = $_POST['birthmonth'];
		$bitthyears = $_POST['bitthyears'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		
		//$country = $_POST['country'];
		$country_data = $_POST['country'];
		if($country_data == "OTHER"){
			//$nat_other = $_POST['nationalitys'];
			$country = $_POST['countrys'];
		}else{
			$country = $country_data;
			/*
			$code = $_POST['country'];
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
			*/					 
		}
		
		$telcountry = $_POST['telcountry'];
		$telarea = $_POST['telarea'];
		$tel = $_POST['tel'];
		$fax = $_POST['fax'];
		$mobile = $_POST['mobile'];
		$note = $_POST['note'];
		$datecode = $_POST['datecode'];
		$flownum = $_POST['flownum'];
		
		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$addtimes = $get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
		$dates = $get_time['mon']."-".$get_time['mday']."-".$get_time['year'];
		
	    //-------------------- create Flow-no by Patient's No.
		// $no: patient online-record flow No.
		// Year + Month + Flow No.

		$get_time = getdate();
		$date_year =  $get_time['year'];	// Year is 4 bits.
		$mon = $get_time['mon'];			// Month is 2 bits.
		if(($mon == 10) || ($mon == 11) || ($mon == 12)){
			$date_mon = $mon;
		}else{
			$date_mon = "0".$mon;
		}
		$date = $date_year.$date_mon;		// $date is 6 bits.
		
		// if DB-no is not empty, get MAX no.
		$sel_max = "SELECT MAX(num) FROM patient";
		$query = mysql_query($sel_max);
		$result = mysql_fetch_array($query);
		$max = $result['num'];	//Get MAX num from patient's num.
		
		// split no 
		if(!empty($max)){	// If $max !empty than split no
			$no_date = substr($max,0,6);	// fetch 6 bits date
			$flow_no = substr($max,6);		// fetch 4 bits flow No.
			if($no_date = $date){
				$flow_no = $flow_no+1;
				$no = $date.$flow_no;
			}else{
				$no = $date."0001";	
			}
		}else{
			$no = $date."0001";
		}
// -----------------------------------------------------------------------------		
			$sel_flownum = "SELECT MAX(flownum) FROM patient WHERE nationality='".$nationality."'";
			$query_flownum = mysql_query($sel_flownum);
			$result_flownum = mysql_fetch_array($query_flownum);
			$flowcode = $result_flownum['MAX(flownum)'];				// flownum: patient's ID flow number by Nationality.
			echo "Flow Number: ".$flowcode;
			if(empty($flowcode)){
				$flownum = 0001;
			}else{
				$flownum = $flowcode + 1;
			}
// -----------------------------------------------------------------------------
		
		if($flownum <10){
			$flo_code = "000".$flownum;
		}else if($flownum < 100){
			$flo_code = "00".$flownum;
		}else if($flownum < 1000){
			$flo_code = "0".$flownum;
		}else if($flownum < 10000){
			$flo_code = $flownum;
		}
		$datecode =  date("y");
		$patid = $nationality.$datecode.$flo_code;
		

		$add_data = "INSERT INTO `patient` ( `num` , `patientid` , `firstname` , `lastname` , `nationality` , `gendered` , `birthday` , `birthmonth` , `birthyears` , `address` , `city` , `state` , `zipcode` , `country` , `telcountry` , `telarea` , `tel` , `fax` , `mobile` , `notes` , `addtime` , `chgtime` , `flownum` , `datecode`)";
		$add_data .= "VALUES ('', '".$patid."', '".$firstname."', '".$lastname."', '".$nationality."', '".$gendered."', '".$birthday."', '".$birthmonth."', '".$birthyears."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$country."', '".$telcountry."', '".$telarea."', '".$tel."', '".$fax."', '".$mobile."', '".$note."', '".$addtime."', '".$chgtime."' , '".$flownum."','".$dates."')";
		$query = mysql_query($add_data);
		
		$add_data_patrecord = "INSERT INTO `patrecord` ( `num` , `addtime` , `patid` , `firstname` , `lastname` , `nationality` , `editorid` , `datecode` ) VALUES ('', '".$addtimes."', '".$patid."', '".$firstname."', '".$lastname."', '".$nat."', '".$seid."', '".$dates."')";
		
		$query_patrecord = mysql_query($add_data_patrecord);
		
		$_SESSION['idnumber'] = $idnumber;
		$_SESSION['nationality']= $country;
		echo "<Script Language='JavaScript'>";
		echo "location.href='rec-pat-inf.php?id=".$patid."';";
		echo " </Script>";
	/*
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	*/
//This page is process Save function by input patient's infomation.

?>