<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
		$id = $_GET["id"];
		$del = "DELETE FROM member WHERE id='".$id."' LIMIT 1";
		$query = mysql_query($del);
		
		$sel_mail_acc = "SELECT * FROM `mail` WHERE id='".$id."'";
		$query_mail_acc = mysql_query($sel_mail_acc);
		$result_mail_acc = mysql_fetch_array($query_mail_acc);
		if ($result_mail_acc["id"] == $id) {
			$del_mail = "DELETE FROM `mail` WHERE id='".$id."' LIMIT 1 ";
			$query2 = mysql_query($del_mail);
		} else {
			$sel_mail_acc2 = "SELECT * FROM `mail` WHERE assignID='".$id."'";
			$query_mail_acc2 = mysql_query($sel_mail_acc2);
			$result_mail_acc2 = mysql_fetch_array($query_mail_acc2);
			$del_mail = "DELETE FROM `mail` WHERE assignID='".$result_mail_acc2["assignID"]."' LIMIT 1 ";
			$query2 = mysql_query($del_mail);
		}
		echo "<Script Language='JavaScript'>";
		echo " location.href='sys-del-acc.php';";
		echo " </Script>";
	
		
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?> 