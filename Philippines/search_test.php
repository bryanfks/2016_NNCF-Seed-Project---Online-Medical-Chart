<?
	session_start();

	include 'db.php';
	
	$name = "Hak Amouy";
	$idno = "1";
	$selChinaPatientinfo = "SELECT * FROM `chinapatient` WHERE `name` LIKE '%".$name."%' OR `idno` LIKE '%".$idno."%' "; //屬廣泛搜尋法 ％：表示分配字元
	
		
		$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
		$rows = mysql_num_rows($queryChinaPatientinfo);
		echo $rows;
?>