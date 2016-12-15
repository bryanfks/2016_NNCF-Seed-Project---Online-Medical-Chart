<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	 
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];

	if(!empty($seid) && !empty($sepwd)){

		if(!empty($_POST["id"])){
			$patientid  = $_POST["id"];
			$fg = $_POST["f"];
		}else {
			$patientid  = $_GET["id"];
			$fg = $_GET["f"];
		}
		


		//echo $patientid."<br>".$fg."<br>";

		if($fg == 1){
			$sel1 = "SELECT * FROM `patient-china` WHERE num=".$id ."";
			$qData = mysql_fetch_array(mysql_query($sel1));

			$del = "DELETE FROM `patient-china` WHERE `NCFID`='".$qData["NCFID"]."' LIMIT 1";
			$query = mysql_query($del);
			$del2 = "DELETE FROM `patientrecord-china` WHERE `NCFID`='".$qData["NCFID"]."'";
			$query2 = mysql_query($del2);
			$query3 = mysql_query("DELETE FROM `patient_cn_lang_record` WHERE `NCFID`='".$qData["NCFID"]."'");
		}elseif ($fg == 2) {
			// Delete Cambodia patient.
			$sel1 = "SELECT * FROM `chinapatient` WHERE num=".$id ."";
			$qData = mysql_fetch_array(mysql_query($sel1));

			$del = "DELETE FROM chinapatientrecord WHERE NCFID='".$qData['NCFID']."'";
			$query = mysql_query($del);
			$del2 = "DELETE FROM chinapatient WHERE NCFID='".$qData['NCFID']."' LIMIT 1";
			$query = mysql_query($del2);
	
		}elseif ($fg == 3) {
			$sel1 = "SELECT * FROM `PKpatient` WHERE num=".$id ."";
			$qData = mysql_fetch_array(mysql_query($sel1));

			$del = "DELETE FROM PKpatient WHERE `NCFID`='".$qData["NCFID"]."' LIMIT 1";
			$query = mysql_query($del);
			$del2 = "DELETE FROM PKpatient2 WHERE `NCFID`='".$qData["NCFID"]."'";
			$query2 = mysql_query($del2);
			$del3 = "DELETE FROM PKpatientrecord WHERE `NCFID`='".$qData["NCFID"]."'";
			$query3 = mysql_query($del3);
		}elseif ($fg == 4) {
			$sel1 = "SELECT * FROM `PHpatient` WHERE num=".$id ."";
			$qData = mysql_fetch_array(mysql_query($sel1));

			$del = "DELETE FROM PHpatient WHERE `NCFID`='".$qData["NCFID"]."' LIMIT 1";
			$query = mysql_query($del);
			$del2 = "DELETE FROM PHpatient2 WHERE `NCFID`='".$qData["NCFID"]."'";
			$query2 = mysql_query($del2);
			$del3 = "DELETE FROM PHrecord WHERE `NCFID`='".$qData["NCFID"]."'";
			$query3 = mysql_query($del3);
		}
		echo "<Script Language='JavaScript'>";
		echo " location.href='sys-del-pat.php?f=".$fg."';";
		echo " </Script>";
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?> 