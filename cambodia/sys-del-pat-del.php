<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
		$patientid  = $_GET["id"];
		$del = "DELETE FROM patient WHERE patientid='".$patientid ."' LIMIT 1";
		$query = mysql_query($del);
		$del2 = "DELETE FROM patrecord WHERE patid='".$patientid ."'";
		$query2 = mysql_query($del2);
		$del3 = "DELETE FROM patientmr WHERE patientid='".$patientid ."'";
		$query3 = mysql_query($del3);
		echo "<Script Language='JavaScript'>";
		echo " location.href='sys-del-pat.php';";
		echo " </Script>";
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?> 