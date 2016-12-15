<?
	include 'db.php';  
	session_start();
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
		$patientid = $_POST['patientid'];
		$modifyid = $_POST["adminid"];
		$firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
		
		$sex_data = $_POST['gendered'];
        if($sex_data == "OTHER"){			
				$gendered  = $_POST['gendereds'];
		}else{
				$gendered  = $sex_data;
		}	
		
		$birthday = $_POST['day'];
		$birthmonth = $_POST['month'];
		$birthyears = $_POST['years'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$country_data = $_POST['country'];
		$countrys = $_POST["countrys"];
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
		$addtime2 = $get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
		$dates = $get_time['mon']."-".$get_time['mday']."-".$get_time['year'];
		
	    //-------------------- create Flow-no by Patient's No.
		// $no: patient online-record flow No.
		// Year + Month + Flow No.
/*
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

		if($flownum <10){
			$flo_code = "000".$flownum;
		}elseif(($flownum >= 10)&&($flownum < 100)){
			$flo_code = "00".$flownum;
		}elseif(($flownum >= 100)&&($flownum < 1000)){
			$flo_code = "0".$flownum;
		}elseif(($flownum >= 1000)&&($flownum < 10000)){
			$flo_code = $flownum;
		}
		$datecode =  date("y");
		$patid = $nationality.$datecode.$flo_code;
*/
//----------------------------------------------------------------
		
		$sel = "SELECT * FROM patient WHERE patientid='".$patientid."'";
		$query = mysql_query($sel);
		$chk = mysql_fetch_array($query);
	
//-----------  開始進行更新資料比對作業  ------------------------------	

		if(($firstname != $chks["firstname"]) || ($lastname != $chks["lastname"]) || ($seid != $chks["editorid"])){
			
		$add_data = "UPDATE `patient` SET `patientid` = '".$patientid."'";
		
		if($firstname != $chk['firstname']){
			$add_data .= ", `firstname` = '".$firstname."'";
		}
		
		if($lastname != $chk['lastname']){
			$add_data .= ", `lastname` = '".$lastname."'";
		}
		
		if($gendered != $chk['gendered']){
			$add_data .= ", `gendered` = '".$gendered."'";
		}
		
		if($day != $chk['birthday']){
			$add_data .= ", `birthday` = '".$day."'";
		}
		if($month != $chk['birthmonth']){
			$add_data .= ", `birthmonth` = '".$month."'";
		}
		if($years != $chk['birthyears']){
			$add_data .= ", `birthyears` = '".$years."'";
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
		
/*		if($country_data != $chk['nationality']){
			if(!empty($countrys)) {
				$add_data .= ",`country` = '".$countrys."'";
			} else if ($nationality == "OTHER") {
				$add_data .= ",`country` = '".$countrys_back."'";
			} else {
				$add_data .= ",`country` = '".$country_data."'";
			}
		}
*/		
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
		if($note != $chk['note']){
			$add_data .= ", `notes` = '".$note."'";
		}
		$add_data .= " WHERE num='".$_POST['num']."' LIMIT 1 ;";
		$query = mysql_query($add_data);
		
		
		
		$sel2 = "SELECT * FROM patrecord WHERE patid='".$patientid."'";
		$query2 = mysql_query($sel2);
		$chk2 = mysql_fetch_array($query2);
		
		$add_data2 = "UPDATE `patrecord` SET `patid` = '".$patientid."'";
		if($firstname != $chk2['firstname']){
			$add_data2 .= ", `firstname` = '".$firstname."'";
		}
		if($lastname != $chk2['lastname']){
			$add_data2 .= ", `lastname` = '".$lastname."'";
		}
		$add_data2 .= " WHERE num='".$chk2['num']."' LIMIT 1 ;";
		$query = mysql_query($add_data2);
		
//============================================================================
		
		//$sel_record = "SELECT * FROM patrecord WHERE patid='".$patid."'";
		//$query3 = mysql_query($sel_record);
		//$chks = mysql_fetch_array($query3);
	    //echo "chks: ".$chks."<br/>";	
	
	    //if(($firstname != $chks["firstname"]) || ($lastname != $chks["lastname"]) || ($country != $chks["nationality"]) || ($seid != $chks["editorid"]) || ($dates != $chks["datecode"])){
		//if(($firstname != $chks["firstname"]) || ($lastname != $chks["lastname"]) || ($seid != $chks["editorid"])){
		/*   此段為5/2使用中的code
		if(!empty($chks)){	
			$update_data = "UPDATE `patrecord` SET `firstname` = '".$firstname."'";
			if($lastname != $chks["lastname"]){
				$update_data .= ", lastname = '".$lastname."'";
		 	}
			if($country != $chks["nationality"]){
				$update_data .= ", nationality= '".$country."'";
		 	}
			*/
			
			/*   此段為暫停使用的code
			if($seid != $chks["editorid"]){
				$update_data .= ",  editorid= '".$seid."'";
		 	}
			if($dates != $chks["datecode"]){
				$update_data .= ",  datecode= '".$dates."'";
		 	}
			*/
			
			/*   此段為5/2使用中的code
			$update_data .= " WHERE `patid` = '".$patid."' LIMIT 1";
		echo "UPDATE: ".$update_data."<br/>";
			$query_Datas = mysql_query($update_data);
			*/
		} else {
			$add_data_patrecord = "INSERT INTO `patrecord` ( `num` , `addtime` , `patid` , `firstname` , `lastname` , `nationality` , `editorid` , `datecode` ) VALUES ('', '".$addtime2."', '".$patid."', '".$firstname."', '".$lastname."', '".$country."', '".$seid."', '".$dates."')";
			$query_patrecord = mysql_query($add_data_patrecord);
		//echo "Insert: ".$add_data_patrecord."<br/>";
		}

//============================================================================	
		$_SESSION['idnumber'] = $idnumber;
		$_SESSION['nationality']= $country;
	
		
		echo "<Script Language='JavaScript'>";
	 	echo "location.href = 'rec-pat-inf.php?id=".$patientid."'";
		echo " </Script>";
	//This page is process Save function by input patient's infomation.

?>