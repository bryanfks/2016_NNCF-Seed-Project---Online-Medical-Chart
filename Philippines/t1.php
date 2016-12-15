<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
	include 'db.php';
	
		$sel_Mail1 = "SELECT `email` FROM `member` WHERE `authority`='a'";
		$query_mail1 = mysql_query($sel_Mail1);
		$res_mail1[] = mysql_fetch_array($query_mail1);
		
		$lengths = mysql_num_rows($query_mail1);
		$admin_mail[$i] = $res_mail1;
		
		while ($admin = $res_mail1) {
			echo "Test: ".$admin['email']."<br/>";
		}
		
		
				
		//echo "Lengths: ".$lengths."<br/>.";
		/*
		$i =1;
		while ($i <= $lengths) {
			while ($admin = each ($res_mail1)) {
				if(empty($admin_mail)) {
					$to2 = $admin_mail;	
					echo "First Mail: ".$to2."<br/>";
				}else {
					$to2 = ",".$admin_mail;
					echo "More Mail:".$to2."<br/>";
				}
			}
			$i++;
		}
		*/
	
	
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>