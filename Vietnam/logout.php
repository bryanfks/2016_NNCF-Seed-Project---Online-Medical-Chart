<?
	SESSION_START();
	include 'db.php';
	
	$id = $_SESSION["seid"];
	$login_time = $_SESSION["logintime"];
	//echo $id."</br>";
	//echo $login_time."</br>";
	
	$get_time = getdate();
	$logout_time = $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
			
	
	$up_data = "UPDATE  `record` SET  `logout` =  '".$logout_time."' WHERE  `id` = '".$id."' AND `login` = '".$login_time."' LIMIT 1";
	$query = mysql_query($up_data);
	//echo $up_data."</br>";
	mysql_close();
	unset($_SESSION["seid"]);
	unset($_SESSION["sepwd"]);
	unset($_SESSION["logintime"]);
	unset($_SESSION["picpaths"]);
	echo "<Script Language='JavaScript'> location.href='http://www.seed-nncf.org/login.php'; </Script>";	
?>