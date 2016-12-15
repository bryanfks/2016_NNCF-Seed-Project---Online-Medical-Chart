<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$clientid = $_POST['clientid'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$nat = $_POST['nationality'];
		if($nat == "OTHER"){
			$nationality = $_POST['nationalitys'];
		}else{
			$code = $_POST['nationality'];
			$chk_acc = "SELECT * FROM country WHERE natcode='".$code."'";
			$query = mysql_query($chk_acc);
			$row = mysql_fetch_array($query);
			$nationality = $row['nationality'];
		}
		$drid = $_POST['drid'];
		
		$sel_pat = "SELECT * FROM patient WHERE ";
		
		if(!empty($clientid)){
			$sel_pat .= "clientid='".$clientid."' ";
		}elseif(!empty($firstname)){
			$sel_pat .= "firstname='".$firstname."' ";
		}elseif(!empty($lastname)){
			$sel_pat .= "lastname='".$lastname."' ";
		}elseif(!empty($nationality)){
			$sel_pat .= "nationality='".$nationality."' ";
		}elseif(!empty($drid)){
			$sel_pat .= "drid='".$drid."'";
		}
		$query = mysql_query($sel_pat);
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
	<meta name="ProgId" content="FrontPage.Editor.Document">
	<title>NCF -- Patient Record Online Management System</title>
	<script language="JavaScript">
		<!--
		function fetch_Data(){
			result = document.myform.clientid.value;
			location.href = "rec-pai-inf.php?clientid="+result;
		}
	//-->
	</script>
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/select.php"); ?></font></td>
            </tr>
			</center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="../images/label-21.gif" width="160" height="40"></font></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                      </td>
                    </tr>
                    <center>
					<tr>
                <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2"></font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i>
                      <font face="Arial" color="#FFFFFF" size="3"><b>Search  
                      Patient</b></font></i></td>   
                  </tr>
                </table>
              </div>
				</center>
                <p style="line-height: 200%" align="left"><font color="#666666" size="2"></font></td>
          </tr>
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
                  	<td width="16%" align="center" height="19" valign="middle">
                    	<p style="line-height: 150%">ID of the patient</td> 
                        <td width="16%" align="center" height="19" valign="middle">
                        	<p style="line-height: 150%">First name of the 
                              patient</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Last name of the 
                              patient</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Nationality of the 
                              patient birth</td>
                    		<td width="17%" align="center" valign="middle">
                      			<p style="line-height: 150%">ID of the doctor first 
                      creation</p>
                       </td>
                    <td width="17%" align="center" valign="middle"></td>
                  </tr>
                  <tr>
                    <td width="16%" align="center" valign="middle"></td>
                    <?PHP
                    	    $i = 2;
                    	    echo "<form name='myform' method='post' active='rec-pai-inf.php'>";
							while($rows = mysql_fetch_array($query)){
								echo "<tr>";
								echo "<td width='16%' align='center' height='19' valign='middle'>";
		                    	echo "<p style='line-height: 150%'>".$rows['clientid']."</td>";
                        		echo "<td width='16%' align='center' height='19' valign='middle'>";
                        	    echo "<p style='line-height: 150%'>".$rows['firstname']."</td>";
                            	echo "<td width='17%' align='center' height='19' valign='middle'>";
                              	echo "<p style='line-height: 150%'>".$rows['lastname']."</td>";
                            	echo "<td width='17%' align='center' height='19' valign='middle'>";
                              	echo "<p style='line-height: 150%'>".$rows['nationality']."</td>";
                    			echo "<td width='17%' align='center' valign='middle'>";
                      			echo "<p style='line-height: 150%'>".$rows['drid']."</p></td>";
                    			//echo "<td width='17%' align='center' valign='middle'></td>";
								//echo "<input type='hidden' name='num' value='".$rows['num']."'>";
	                            echo "<input type='hidden' name='clientid' value='".$rows['clientid']."'>";
              	              	echo "<input type='hidden' name='drid' value='".$rows['drid']."'>";
              	              	echo "<input type='hidden' name='addtime' value='".$rows['addtime']."'>";
                            	echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='SHOW' name='".$i."' onClick='sends(".$i.")'></font></td>";   //onClick='sends(".$i.")';;sends(".$i.") 
	                        	echo "</tr>";
							
              	              	$i++;
            	    		}
            	    		echo "</form>";
                    ?>
                  </tr>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">:
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
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>