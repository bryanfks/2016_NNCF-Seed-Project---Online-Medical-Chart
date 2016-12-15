<?PHP
	
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	
		$id = $seid;														
		
		$sel_data = "SELECT * FROM `member` ORDER BY `id`";			
		$query = mysql_query($sel_data);	
		
?>

<html>
<SCRIPT LANGUAGE="javascript">
	<!--
		function fetch_Data(num){
			if(num/2 != 0){			
				nums = num*2;
			}else{
				nums = num;
			}
			result = document.myForm.elements[nums].value;
			location.href = "sort.php?id="+result;
		}
	// -->
</SCRIPT>
<body>
<form name="myForm">
<table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3">ID</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3">Password</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3">First  
                              name</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3">Last  
                              name</font></td>
                    <td width="20%" align="center" valign="middle">¡@</td>
                  </tr>
                  	<?PHP		//reset($result);
                  				$i=0;
                  				while($result	=	mysql_fetch_array($query)){
                                		echo "<tr>";
                                		echo "<input type='hidden' name='".$i."' value='".$result["id"]."'>";
	                                	echo "<td width='20%' align='center' valign='middle' >".$result["id"]."</td>";
    	                            	echo "<td width='20%' align='center' valign='middle'>".$result["pwd"]."</td>";
        	                        	echo "<td width='20%' align='center' valign='middle'>".$result["firstname"]."</td>";
            	                    	echo "<td width='20%' align='center' valign='middle'>".$result["lastname"]."</td>";
                	    				echo "<td width='20%' align='center' valign='middle'><font size='3'>";
                	    				echo "<input type='button' value='MAINTAIN' name='maintain' onClick='fetch_Data(".$i.")'></font></td>";
	                	    			echo "</tr>";
	                	    			$i++;
	                	    	}
                    ?>
                 </table>
</form>
</body>
</html>
<?PHP
	


?>