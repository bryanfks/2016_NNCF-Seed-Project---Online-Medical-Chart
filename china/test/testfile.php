<?PHP 
	
	
	include 'db.php';  
	
	
		$sel_data = "SELECT * FROM `member` ORDER BY `id`";				
		$query = mysql_query($sel_data);	
		echo $sel_data."</br>";
		$i=2;
                  		while($result = mysql_fetch_array($query)){
                  			echo "<tr>";
	                        echo "<input type='hidden' name='".$i."' value='".$result["id"]."'>";
		                    echo "<td width='20%' align='center' valign='middle' >".$result["id"]."</td>";
    		                echo "<td width='20%' align='center' valign='middle'>".$result["pwd"]."</td>";
        		            echo "<td width='20%' align='center' valign='middle'>".$result["firstname"]."</td>";
            		        echo "<td width='20%' align='center' valign='middle'>".$result["lastname"]."</td>";
                		    echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='button' value='MAINTAIN' name='maintain' onClick='fetch_Data(".$i.")'></font></td>";
	                		echo "</tr>";
	                		$i++;
	                	}
		
		
	
		
		
		
		
?>