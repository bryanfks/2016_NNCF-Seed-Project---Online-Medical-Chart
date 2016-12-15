<?
		include 'db.php';					
		$clientid = "CAM2006021";					
		$sel_pat = "SELECT * FROM patient WHERE ";
		$sel_pat .= "clientid='".$clientid."' ";
		$query = mysql_query($sel_pat);
							
							
							
							
							$i = 1;
							$rows = mysql_fetch_array($query);
							echo $rows;
							while($rows = mysql_fetch_array($query)){
								echo "<form name='myform' method='get' active='rec-pat-inf.php'>";
	                            echo "<tr>";
              	              	echo "  <td width='14%' align='center'>";
                            	echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'> Client ID: ".$rows['clientid']."</a></td>";
              	              	echo "  <td width='19%' align='center'>";
	                            echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'> Patient Name: ".$rows['firstname']." ".$rows['lastname']."</td>";
                            	echo "  <td width='21%' align='center'>";
	                            echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>Nationality: ".$rows['nationality']."</td>";
              	              	echo "  <td width='17%' align='center'>";
              	              	echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>Dr. ID: ".$rows['drid']."</td>";
                            	echo "  <td width='17%' align='center'>";
	                            echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>Add Time: ".$rows['addtime']."</td>";
              	              	echo "<input type='hidden' name='clientid' value='".$rows['num']."'>";
	                            echo "<input type='hidden' name='clientid' value='".$rows['clientid']."'>";
              	              	echo "<input type='hidden' name='drid' value='".$rows['drid']."'>";
                            	echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='SHOW' name='B1' onClick='sends(".$i.")'></font></td>";
	                            echo "</tr>";
              	              	echo "</form>";
                            	$i++;
            	    		}




?>