<? 
	@session_start();
	//session_cache_limiter("none");
	
	include 'db.php';  
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
		
		// Fetch Data from sys-ass-ema.php 
		$ForID = $_GET["id"];
		$AssignID = $_GET["assignID"];
		
		// Search Data from member.db that save to mail.db
		$sel_ForID = "SELECT * FROM `member` WHERE id='".$ForID."'";      /* Fr Dr. ID */
		$sel_AssignID = "SELECT * FROM `member` WHERE id='".$AssignID."'";     /* TW Dr. ID */
		$query_FID = mysql_query($sel_ForID);	
		$query_AID = mysql_query($sel_AssignID);
		
		//  Fetch DB Data 
		$result_FID = mysql_fetch_array($query_FID);
		$result_AID = mysql_fetch_array($query_AID);
		
		// Assign Data to id-element
		$Assign_ID = $result_AID["id"];          /* TW Dr. ID */
		$Assign_Email = $result_AID["email"];    /* TW Dr. ID */
		$Forign_ID = $result_FID["id"];          /* Fr Dr. ID */   
		$Forign_Email = $result_FID["email"];    /* Fr Dr. ID */
		
		$AssignEmail_sel = "SELECT * FROM `mail` WHERE id='".$Forign_ID."'";
		$query_AEmail = mysql_query($AssignEmail_sel);
		$AssignEmail = mysql_fetch_array($query_AEmail);
		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		
		if($AssignEmail['assignID'] != "" || $AssignEmail['assignID'] == $AssignID){
			$add_data = "UPDATE `mail` SET `assignID` = '".$Assign_ID."',`assignEmail` = '".$Assign_Email."',`chgtime` = '".$addtime."' WHERE `id` = '".$AssignEmail['id']."' LIMIT 1 ";
			$query = mysql_query($add_data);
		}else{
			$add_data = "INSERT INTO  `mail` ";
			$add_data .= "( `num` , `id` , `email` , `assignID` , `assignEmail` , `addtime` , `chgtime` )";
			$add_data .= "VALUES ('', '".$Forign_ID."', '".$Forign_Email."', '".$Assign_ID."', '".$Assign_Email."', '".$addtime."', '".$addtime."')";
			$query = mysql_query($add_data);
		}
		echo "<Script Language='JavaScript'>";
		echo " location.href='sys-assign.php';";
		echo " </Script>";
		
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>