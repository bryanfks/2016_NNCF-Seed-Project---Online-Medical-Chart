<?PHP 
	
	//session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function fetch_Data(num){
		alert(num);
			/*
			if(n/2 != 0){			
				num = n*2;
				result = document.myForm.elements[num].value;
				alert(result);
				//location.href = "sys-ass-ema.php?id="+result;
			}else{
				num = n;
				result = document.myForm.elements[num].value;
				alert(result);
				//location.href = "sys-ass-ema.php?id="+result;
			}
			*/
				var nums = num;
				Data = "id"+nums;
				alert("Data: "+Data);
				//result = document.myForm.id+num.value;
				//alert(result);
				
				V = document.myForm.elements.length;
				alert(V);
				
				//location.href = "sys-ema-ass-save.php?id="+result;
			
		}
	// -->
</SCRIPT>
</head>

<body topmargin="2">

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <p align="right"><font size="2"><img border="0" src="images/laebl-25.gif" width="160" height="40"></font></td>
                    </tr>
  <center>
  <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">&nbsp;</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Assign 
                      E-mail</font></b></i></td>        
                  </tr>
                </table>
              </div>
              <p></td>
          </tr>
        </center>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                </table>
                </center>
              </div>
              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">ID</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">E-mail</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Assign 
                              ID</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Assign 
                              E-mail</font></td>
                    <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%"><font size="3">&nbsp;</font></p>
                            </td>
                  </tr>
                  
                  	<?PHP
                  	/*
                  	    $i = 1;
                  	    $j = 1;
                  	    echo "<form name='myForm' enctype='multipart/form-data' method='post' action=''>";
                  	    while($result_Foreign = mysql_fetch_array($query_Foreign)){
                  	    	if($result_Foreign['authority'] == "p"){
                  			
                  				// 列出國外醫生的ID 
                  			 	echo "<tr>";
	                        	// show Foreign Doctor ID,E-mail
		                    	echo "<input type='hidden' name='id".$i."' value='".$result_Foreign['id']."'>";
			                	echo "<td width='20%' align='center' valign='middle' ><p style='line-height: 150%'>".$result_Foreign["id"]."</td>";
    		        	        echo "<td width='20%' align='center' valign='middle'><p style='line-height: 150%'>".$result_Foreign["email"]."</td>";
    		                	
    		                	// show Assign TW Doctoc ID,E-mail for Foreign Doctor
    		                	// 透過查詢mail,搜尋出與國外醫生配對的國內醫師 
	    		                $AssignEmail_sel = "SELECT * FROM `mail` WHERE id='".$result_Foreign['id']."'";
								$query_AEmail = mysql_query($AssignEmail_sel);
								$AssignEmail = mysql_fetch_array($query_AEmail);
        			     		//echo "<td width='25%' align='center' valign='middle'><p style='line-height: 150%'><select size='1' name='assignID'>";
	       			     		echo "<td width='25%' align='center' valign='middle'><p style='line-height: 150%'><select size='1' name='tw".$i."'>";
		                		echo "<option value=''>Please select...</option>";
		                    	while($result2 = mysql_fetch_array($query_TW)){
		                    		echo "<option value='".$result2['id']."'>".$result2['id']."</option>";
				      				$j++;
								}
	            		       echo "<td width='20%' align='center' valign='middle'><p style='line-height: 150%'>".$AssignEmail['assignID']."</td>";
							   echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='button' value='ASSIGN' name='assign' onClick='fetch_Data(".$i.")'></font></td>";
							echo "</tr>";
		                	$i++;
	    		      	  	}
	                    }
	                    
	              
	              	*/
	            	 ?>
	            	 <?PHP
					 		$chk_CGMH_sel = "SELECT * FROM `member` WHERE authority='c'";
							$chk_CGMH_query = mysql_query($chk_CGMH_sel);
							
							//$chk_CGMH = mysql_fetch_array($chk_CGMH_query);
							//$count_rows = mysql_num_rows($chk_CGMH_query);
							//UPDATE `mail` SET `assignEmail` = 'cgmh3@nncf.org.twtw' WHERE `num` = '36' LIMIT 1 
							while($chk_CGMH = mysql_fetch_array($chk_CGMH_query)){
								$cgmh_result['assignID'][$i] = $chk_CGMH['assignID'];
								$cgmh_result['assignEmail'][$j] = $chk_CGMH['assignEmail'];
								//echo "Value: ".$chk_CGMH['assignID']."<br/>";
								//."     ".$cgmh_result["assignEmail"][$j]."<br/>";
								
								$i ++;
								$j++;
							$chk_CGMH_mail_update_sel = "UPDATE `mail` SET assignEmail = '".$chk_CGMH["email"]."' WHERE assignID= '".$chk_CGMH["id"]."' LIMIT 1";
								$chk_CGMH_mail_query = mysql_query($chk_CGMH_mail_update_sel);
								//$result = mysql_fetch_row($chk_CGMH_mail_query);
								//echo $result["email"]."<br/>";
								//echo $chk_CGMH_mail_update_sel."<br/>";
							}
					 
					 		
					 		
	            	 		$id = $seid;														
		
							//------------- fetch Foreign Doctor data -----------------------------------
								$sel_Foreign = "SELECT * FROM `member` WHERE authority='p' ORDER BY `id` DESC";
								$query_Foreign = mysql_query($sel_Foreign);	
		
							//------------- fetch TW Doctor data ----------------------------------------
								$sel_TW = "SELECT * FROM `member` WHERE authority='c' ORDER BY `id` DESC";
								$query_TW = mysql_query($sel_TW);	
								
							while($result_Foreign = mysql_fetch_array($query_Foreign)){
                  	    		if($result_Foreign['authority'] == "p"){
                  	    			echo "<form name='myForm' enctype='multipart/form-data' method='post' action='sys-ass-ema.php'>";
                  	    				echo "<tr>";
	                        			echo "<input type='hidden' name='id' value='".$result_Foreign['id']."'>";
					                	echo "<td width='20%' align='center' valign='middle' ><p style='line-height: 150%'>".$result_Foreign["id"]."</td>";			// show Foreign Doctor ID,E-mail
    				        	        echo "<td width='20%' align='center' valign='middle'><p style='line-height: 150%'>".$result_Foreign["email"]."</td>";
    							
    									//-------------  透過查詢mail,搜尋出與國外醫生配對的國內醫師  ---------------
    									$AssignEmail_sel = "SELECT * FROM `mail` WHERE id='".$result_Foreign['id']."'";
										$query_AEmail = mysql_query($AssignEmail_sel);
										$AssignEmail = mysql_fetch_array($query_AEmail);
    		                			//echo "TW Doctor ID: ".$AssignEmail['assignID'];
    		                			echo "<td width='20%' align='center' valign='middle'><p style='line-height: 150%'>".$AssignEmail['assignID']."</td>";
					                	echo "<td width='20%' align='center' valign='middle'><p style='line-height: 150%'>".$AssignEmail['assignEmail']."</td>";
										echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='submit' value='ASSIGN' name='assign'></font></td>";
										echo "</tr>";
                  	    			echo "</form>";
                  	    		}
                  	    	}
                  	    		
                  	
	            	 ?>
                    
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">&nbsp;</p>
              </td>
  </tr>
                    </table>
                  </div>
                </td>
            </tr>
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;           
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：           
                </font><font face="Arial"><font color="#999999">Internet&nbsp;           
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;           
                Resolution<br>
                Copyright c 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;           
                Craniofacial&nbsp; Foundation<br>          
                <br>
                </font></a></font></font></i></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>

</body>

</html>
<?PHP
	
}


?>