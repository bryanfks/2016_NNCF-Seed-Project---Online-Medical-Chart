<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	/*  This file was saveing NCF Allowrance Data.*/
	
	if(!empty($seid) && !empty($sepwd)){
		
		
		
		$num = $_POST["num"];
		$DrID = $seid;
		
		$ncfAllMedicaid = $_POST["ncfAllMedicaid"];
		$ncfAllTransport = $_POST["ncfAllTransport"];
		$ncfAllTotal = $_POST["ncfAllTotal"];
		$ncfAllRemark = $_POST["ncfAllRemark"];
		$ncfAllStatus = $_POST["ncfAllStatus"];
		
		$getAllDate = getdate();
		$year = $getAllDate["year"];
		$months = $getAllDate["mon"];
		
		if($month < 10){
			$month = "0".$months;
		}else{
			$month = $months;
		}
		
	
		$day = $getAllDate["mday"];
		$ncfAlltime = $year."/".$month."/".$day;
		
		$ncfAll2China = $_POST["ncfAll2China"];
			
	
		$NCFAllowance_sql = "UPDATE `patient-china` SET `ncfAllMedicaid` = '".$ncfAllMedicaid."',`ncfAllTransport` = '".$ncfAllTransport."',`ncfAllTotal` = '".$ncfAllTotal."',`ncfAllRemark` = '".$ncfAllRemark."',`ncfAllStatus` = '".$ncfAllStatus."',`ncfAlltime` = '".$ncfAlltime."',`ncfAll2China` = '".$ncfAll2China."' WHERE `num` = '".$num."' LIMIT 1";


		$query_NCFAllowance = mysql_query($NCFAllowance_sql);
		//echo $NCFAllowance_sql."<br>";

			$_SESSION["record_Num"] = $record_num;
			$_SESSION["patient_name"] = $patname;
			echo "<html>";
			echo "<head>";
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
			echo "location.href='chinaList.php?c=ps'";
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