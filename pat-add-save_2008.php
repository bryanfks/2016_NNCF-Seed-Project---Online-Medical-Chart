<?
	session_start();
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$patientid = $_POST['patientid'];
		
	    $id = $_POST['id'];
	    $firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
		
		$sex_data = $_POST['gendered '];
        if($sex_data == "OTHER"){			
				$gendered  = $_POST['gendereds'];
		}else{
				$gendered  = $sex_data;
		}	
		$nationality = $_POST['nationality'];
		$birthday = $_POST['birthday'];
		$birthmonth = $_POST['birthmonth'];
		$bitthyears = $_POST['bitthyears'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$country = $_POST['country'];
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
		$chgtime =  $addtime;
		
	    //-------------------- create Flow-no by Patient's No.
		// $no: patient online-record flow No.
		// Year + Month + Flow No.

		$get_time = getdate();
		$date_year =  $get_time['year'];	// Year is 4 bits.
		$mon = $get_time['mon'];			// Month is 2 bits.
		if($date_mon != "10" && "11" && "12"){
			$date_mon = "0".$mon;
		}else{
			$date_mon = $mon;
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

		$add_data = "INSERT INTO `patient` ( `num` , `patientid` , `firstname` , `lastname` , `nationality` , `gendered` , `birthday` , `birthmonth` , `birthyears` , `address` , `city` , `state` , `zipcode` , `country` , `telcountry` , `telarea` , `tel` , `fax` , `mobile` , `note` , `addtime` , `chgtime` , `flownum` , `datecode`)";
		$add_data .= "VALUES ('', '".$patientid."', '".$firstname."', '".$lastname."', '".$nationality."', '".$gendered."', '".$birthday."', '".$birthmonth."', '".$birthyears."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$country."', '".$telcountry."', '".$telarea."', '".$tel."', '".$fax."', '".$mobile."', '".$note."', '".$addtime."', '".$chgtime."' , '".$flownum."','".$datecode."')";
		$query = mysql_query($add_data);
		
		$_SESSION['idnumber'] = $idnumber;
		$_SESSION['nationality']= $country;
		//echo "<Script Language='JavaScript'>";
		//echo " location.href='pat-pat-inf.php';";
		//echo " location.href='main.php';";
		//echo " </Script>";
	
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	
//This page is process Save function by input patient's infomation.

?>