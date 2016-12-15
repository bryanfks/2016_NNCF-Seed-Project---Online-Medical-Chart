<?PHP
	session_cache_limiter("none");
	session_start();
	include 'db.php';
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$rus = $_SESSION["specialofMember"];
	
	if(!empty($seid) && !empty($sepwd)){
		$patient_id = $_GET["patid"];
		
		$sel_member = "SELECT * FROM `member` WHERE id='".$seid."'";
		$res_member = mysql_query($sel_member);
		$auth_id = mysql_fetch_array($res_member);
		
		//if(!empty($auth_id["specialty"]) && ($auth_id["specialty"] == "ncfa")){
			echo "<html><head>";
			echo "<Script Language='JavaScript'>";
			echo " location.href='for-dep-part.php?patid=".$patient_id."';";
			echo " </Script>";
			echo "</head></html>";
		//}else {
			//echo "Have error!";
		//}
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	
	
	
?>