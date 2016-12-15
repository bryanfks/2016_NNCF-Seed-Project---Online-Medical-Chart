<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		$msg = $_POST['msg'];
		
		$get_time = getdate();
		$chgtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		
		$delMsg = "DELETE FROM message";
		$delMsg_query = mysql_query($delMsg);
		$sel = "INSERT INTO `message` ( `num` , `addtime` , `msg1` ) VALUES ('', '".$chgtime."' , '".$msg."')";
		$query_insert = mysql_query($sel);
	
		echo "<Script Language='JavaScript'>";
		//echo " location.href='sys-set-mes.php';";
		echo " location.href='main.php';";
		echo " </Script>";
	
		
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>